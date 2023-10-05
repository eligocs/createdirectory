@extends('layouts.app')

@section('content')
<style>
    .mainform {
        width: 50%;
        margin-left: auto;
        margin-right: auto;
    }

    .rightme {
        text-align: right;
    }

    .card-body {
        height: 600px;
    }

    .cropper-container.cropper-bg {
        margin-top: 8px;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css"> 

<div class="container">
    <div class="row">
        <div class="card mainform ">
            <div class="card-body">
                <div class="col-md-12 startdatabaseMigration text-center mt-4" style="display:none;">
                    <h3>Finish Setup</h3>
                    <div class="mb-3 mt-5 ">
                        <button type="button" class="btn btn-primary finishsetup">Finish Setup</button>
                    </div>
                </div>
                <div class="col-md-12 wizard text-center mt-4">
                    <h3>Start Installation Wizard</h3>
                    <div class="mb-3 mt-5 ">
                        <button type="button" class="btn btn-primary" id="startinstaller">Next</button>
                    </div>
                </div>
                <form id="step-form" style='display:none;'>
                    <div class="col-md-12 stepdiv">
                        <h3>Basic info</h3>
                        <div class="mb-3 mt-3">
                            <label for="field1" class="form-label">Company Name</label>
                            <input type="text" class="form-control" id="field1" name="company_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="field1" class="form-label">Email</label>
                            <input type="email" class="form-control" id="field1" name="email" required>
                        </div>
                    </div>
                    <div class="col-md-12 stepdiv">
                        <h3>Database/Assets</h3>
                        <div class="mb-3 mt-3">
                            <label for="directory_name" class="form-label">Assets Directory</label>
                            <input type="text" class="form-control" id="directory_name" name="directory_name" required>
                            <div class="existmessage text-danger mt-2" style="display: none;">Directory exist !</div>
                            <div class="can_create mt-2 text-success" style="display: none;"></div>
                        </div>
                        <div class="mb-3">
                            <label for="database_name" class="form-label">Database</label>
                            <input type="text" class="form-control" id="database_name" name="database" required>
                            <div class="databaseExistmessage text-danger mt-2" style="display: none;">Database exist !
                            </div>
                            <div class="can_create_two mt-2 text-success" style="display: none;"></div>
                        </div>
                        <div class="mb-3">
                            <label for="database_username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="database_username" name="username" required>
                            <div class="databaseExistmessage_three text-danger mt-2" style="display: none;">Database
                                Username exist !</div>
                            <div class="can_create_two_three mt-2 text-success" style="display: none;"></div>
                        </div>
                    </div>
                    <div class="col-md-12 stepdiv">
                        <h3>Upload Company Logo</h3>
                        <div class="mb-3 mt-3">
                            <input type="file" id="imageInput" accept="image/*">
                            <div class="  logoDiv">
                                <img id="logo" src="" alt="Cropped Image">
                                {{-- <button type="button" class="btn btn-success mt-2" id="cropButton">Crop</button>
                                --}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 ">
                            <button type="button" class="btn btn-primary" id="prev-step">Previous</button>
                        </div>
                        <div class="col-md-6 rightme">
                            <button type="button" class="btn btn-primary" id="next-step">Next</button>
                        </div>
                    </div>
                </form>
                {{-- <div class="text-center">
                    <button type="submit" class="btn btn-success" id="submit-form">Submit</button>
                </div> --}}
            </div>
        </div>
    </div>

    <!-- Navigation buttons -->
</div>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function () {

        $('.finishsetup').click(function(e){
            e.preventDefault(); 
            Swal.fire(
                'Good job!',
                'Setup Complete',
                'success'
            )
            window.location.reload();
        });

        var err = false;
        
        $(document).on('input','#directory_name',function(){
            checkdir(); 
        });
        $(document).on('blur','#directory_name',function(){
            checkdir();
        });
        $(document).on('input','#database_name',function(){
            checkdatabase();
        });
        $(document).on('blur','#database_name',function(){
            checkdatabase();
        });
        $(document).on('input','#database_username',function(){
            checkusername();
        });
        $(document).on('blur','#database_username',function(){
            checkusername();
        });

        function checkdir(){
            var sanitizedValue =  $('#directory_name').val().replace(/ /g, '');
            var sanitizedValue = sanitizedValue.replace(/\/\//g, '/');
            $('#directory_name').val(sanitizedValue);
            var path = sanitizedValue; 
            if(path){
                $('#next-step').attr('disabled',true);
                $('.can_create').hide();
                $('.existmessage').hide(); 
                $.ajax({
                    url: '{{url("checkDirectoryExist")}}', 
                    type: 'GET',  
                    data: { path: path },  
                    success: function(response) { 
                        if(response == 1){
                            $('.existmessage').show();  
                            $('.can_create').hide(); 
                            err = true;
                            $('#next-step').attr('disabled',true); 
                        }else{
                            $('.existmessage').hide(); 
                            $('.can_create').show();
                            $('.can_create').html('--path : public_html/storage/app/public/admin-directory/'+path); 
                            $('#next-step').attr('disabled',false); 
                        }
                    },
                    error: function(xhr, status, error) { 
                        console.error(error);
                    }
                }); 
            }else{
                $('.can_create').html('');
                $('.can_create').hide();
                $('.existmessage').hide(); 
                $('#next-step').attr('disabled',true);
            }
        }

        function checkdatabase(){
            var sanitizedValue =  $('#database_name').val().replace(/ /g, '');
            var sanitizedValue = sanitizedValue.replace(/[^a-zA-Z0-9]/g, '');
            $('#database_name').val(sanitizedValue);
            var database = sanitizedValue; 
            if(database){
                $('#next-step').attr('disabled',true);
                $('.can_create_two').hide();
                $('.databaseExistmessage').hide(); 
                $.ajax({
                    url: '{{url("checkDatabaseExist")}}', 
                    type: 'GET',  
                    data: { database: database },  
                    success: function(response) { 
                        if(response == 1){
                            $('.databaseExistmessage').show();  
                            $('.can_create_two').html('--database : '+database+' already exist !');
                            err = true;
                            $('#next-step').attr('disabled',true); 
                        }else{
                            $('.databaseExistmessage').hide();
                            $('#next-step').attr('disabled',false);
                            $('.can_create_two').show();
                            $('.can_create_two').html('--database : '+database+' can be created');  
                        }
                    },
                    error: function(xhr, status, error) { 
                        console.error(error);
                    }
                }); 
            }else{
                $('.can_create_two').html('');
                $('.can_create_two').hide();
                $('.databaseExistmessage').hide(); 
                $('#next-step').attr('disabled',true);
            }
        }

        function checkusername(){
            var sanitizedValue =  $('#database_username').val().replace(/ /g, '');
            var sanitizedValue = sanitizedValue.replace(/[^a-zA-Z0-9]/g, '');
            $('#database_username').val(sanitizedValue);
            var username = sanitizedValue; 
            if(username){
                $('#next-step').attr('disabled',true);
                $('.can_create_two_three').hide();
                $('.databaseExistmessage_three').hide(); 
                $.ajax({
                    url: '{{url("checkUsernameExist")}}', 
                    type: 'GET',  
                    data: { username: username },  
                    success: function(response) { 
                        if(response == 1){
                            $('.databaseExistmessage_three').show(); 
                            err = true;
                            $('.can_create_two_three').html('--username : '+username+' already exist !');
                            $('#next-step').attr('disabled',true); 
                        }else{
                            $('.databaseExistmessage_three').hide(); 
                            $('.can_create_two_three').show();
                            $('.can_create_two_three').html('--username : '+username+' can be created'); 
                            $('#next-step').attr('disabled',false); 
                        }
                    },
                    error: function(xhr, status, error) { 
                        console.error(error);
                    }
                }); 
            }else{
                $('.can_create_two_three').html('');
                $('.can_create_two_three').hide();
                $('.databaseExistmessage_three').hide(); 
                $('#next-step').attr('disabled',true);
            }
        }
        
        const image = document.getElementById('logo');
        const cropper = new Cropper(image, { 
            dragMode: 'move',
            aspectRatio: 16 / 9,
            autoCropArea: 0.65,
            restore: false,
            guides: false,
            center: false,
            highlight: false,
            cropBoxMovable: true,
            cropBoxResizable: false,
            toggleDragModeOnDblclick: false,
        });
        
        const imageInput = document.getElementById('imageInput'); 
        imageInput.addEventListener('change', function (event) {
            $('.errormessage').hide();
            const files = event.target.files;
            if (files && files.length > 0) {
                const reader = new FileReader();
                reader.onload = function () {
                    image.src = reader.result;
                    cropper.replace(reader.result); 
                };
                reader.readAsDataURL(files[0]);
            }
            $('.logoDiv').show();
        });
        
        $(document).on('click','.cropButton', function () {
            // Get the cropped image data
            // const croppedData = cropper.getCroppedCanvas().toDataURL('image/jpeg');
            const croppedCanvas = cropper.getCroppedCanvas();
            console.log(croppedCanvas)
            if (croppedCanvas) { 
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            var company_name = $('input[name="company_name"]').val();
            var email = $('input[name="email"]').val();
            var directory_name = $('input[name="directory_name"]').val();
            var database = $('input[name="database"]').val();
            var username = $('input[name="username"]').val(); 
            croppedCanvas.toBlob(function (blob) { 
                const formData = new FormData();
                formData.append('image', blob,'logo.jpg');   
                formData.append('company_name', company_name);   
                formData.append('email', email);   
                formData.append('directory_name', directory_name);   
                formData.append('database', database);   
                formData.append('username', username);   
                fetch('{{url("setupadmin")}}', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,  
                    },
                    'Content-Type': 'application/json', 
                    'Accept': 'application/json', 
                })
                .then(response => { 
                    console.log(response)
                    if (response.status == 200) {
                        $('.startdatabaseMigration').show(); 
                        $('#step-form').hide(); 
                    } else {
                        $('.startdatabaseMigration').hide();
                        $('#step-form').show(); 
                        $('#imageInput').after('<span class="text-danger errormessage">'+response.message+'!</span>');
                    }
                })
                .catch(error => {
                    console.error('Image upload error:', error);
                });
            }, 'image/jpeg', 0.9); // Adjust the format and quality as needed
            }else{
                $('#imageInput').after('<span class="text-danger errormessage">Please select company logo!</span>');
                return 0;
            }
        });


        const startinstalled = $("#startinstaller");
        const form = $("#step-form");
        const wizard =  $('.wizard');
        $('.logoDiv').hide();
        startinstalled.click(function(){
            form.show()
            wizard.hide()
        });
        const prevButton = $("#prev-step");
        const nextButton = $("#next-step"); 
        const steps = form.find(".stepdiv");
        prevButton.hide();
        let currentStep = 0;

        // Initially, hide all steps except the first one
        steps.hide();
        $(steps[0]).show();

        // Handle "Next" button click
        nextButton.click(function () {
            if(!validateInputs()){
                return;
            }
            prevButton.show(); 
            if(currentStep == 0){ 
                checkdir();checkdatabase();checkusername(); 
            } 
            if(err){
                $('#next-step').attr('disabled',true); 
                return;
            }else{
                // $('#next-step').attr('disabled',false); 
            }
            if (currentStep == 1) { 
                setTimeout(() => {
                    nextButton.addClass('cropButton');
                    nextButton.attr('id','');
                }, 1000);
            } 
            
            if (currentStep < steps.length - 1) {
                $(steps[currentStep]).hide();
                currentStep++;
                $(steps[currentStep]).show();
            }  
        });
        
        $('input[name="company_name"]').on('input',function(){
           var val =  $(this).val();
           val = val.replace(/\s/g, '').toLowerCase();
           $('#directory_name').val(val) 
           $('input[name="database"]').val(val) 
           $('input[name="username"]').val(val) 
        });
        function isEmailValid(email) {
            // Regular expression pattern to match an email address
            const emailPattern = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;

            // Use the test() method to check if the email matches the pattern
            return emailPattern.test(email);
        }
        function validateInputs(){
            $('.errormessage').hide();
            if($('input[name="company_name"]').val() == ''){ 
                $('input[name="company_name"]').after('<span class="text-danger errormessage">Company Name is required!</span>');
                return 0;
            }
            if($('input[name="email"]').val() == ''){
                $('input[name="email"]').after('<span class="text-danger errormessage">Email is required</span>');
                return 0;
            }
            var validate = isEmailValid($('input[name="email"]').val());
            if(!validate){
                $('input[name="email"]').after('<span class="text-danger errormessage">Please check email address is incorrect!</span>');
                return 0;
            } 
            if($('input[name="directory_name"]').val() == ''){
                $('input[name="directory_name"]').after('<span class="text-danger errormessage">Directory name is required!</span>');
                return 0;
            }
            if($('input[name="database"]').val() == ''){
                $('input[name="database"]').after('<span class="text-danger errormessage">Database name is required!</span>');
                return 0;
            }
            if($('input[name="username"]').val() == ''){
                $('input[name="username"]').after('<span class="text-danger errormessage">Database user name is required!</span>');
                return 0;
            }
            return 1;
        }

        // Handle "Previous" button click
        prevButton.click(function () { 
            if (currentStep > 0) {
                $(steps[currentStep]).hide();
                currentStep--;
                $(steps[currentStep]).show();
            } 
            if(currentStep == 0){
                prevButton.hide();
            }
        });
 
        form.submit(function (e) {
            e.preventDefault(); 
        });

        
    });
</script>
@endsection