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

    .opacity_zero {
        opacity: 0;
    }

    div#spinner {
        height: 15px;
        width: 15px;
    }

    #progress-container {
        width: 100%;
        background-color: #f0f0f0;
    }

    #progress-bar {
        width: 0%;
        height: 30px;
        background-color: linear;
        transition: width 0.6s;
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
                        <h3>Enter information</h3>
                        <div class="mb-3 mt-3">
                            <label for="field1" class="form-label">Company Name</label>
                            <input type="text" class="form-control" id="company_name" name="company_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="field1" class="form-label">Email</label>
                            <input type="email" class="form-control" id="field1" name="email" required>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="directory_name" class="form-label">Assets Directory</label>
                            <div id="spinner" class="spinner-border text-primary" role="status" style="display:none;">
                            </div>
                            <input type="text" class="form-control" id="directory_name" name="directory_name" required>
                            <div class="can_create mt-2 text-success" style="display: none;"></div>
                            <div class="can_create_two mt-2 text-success" style="display: none;"></div>
                            <div class="can_create_two_three mt-2 text-success" style="display: none;"></div>
                        </div>
                        <div class="mb-3 opacity_zero">
                            <label for="database_name" class="form-label">Database</label>
                            <input type="hidden" class="form-control" id="database_name" name="database" required>
                        </div>
                        <div class="mb-3 opacity_zero">
                            <label for="database_username" class="form-label">Username</label>
                            <input type="hidden" class="form-control" id="database_username" name="username" required>
                        </div>
                    </div>
                    {{-- <div class="col-md-12 stepdiv">
                        <h3>Database/Assets</h3>
                    </div> --}}
                    <div class="col-md-12 stepdiv logodiv_section">
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
                        <div class="col-md-12 m-3">
                            <progress id="progress-bar" max="100" value="0"></progress>
                            <p id="progress-label">0%</p> 
                        </div>
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
            setTimeout(() => {
                Swal.fire(
                    'Good job!',
                    'Setup Complete',
                    'success'
                )
                window.location.reload();
            }, 3000);
        });

        
        $(document).on('blur','#company_name',function(){ 
            checkdir();  
        }); 
        
        function checkdir(){
            var err = false;
            $('#spinner').show();
            $('#next-step').attr('disabled',true);
            var sanitizedValue =  $('#directory_name').val().replace(/ /g, '');
            var sanitizedValue = sanitizedValue.replace(/\/\//g, '/');
            $('#directory_name').val(sanitizedValue);
            var path = sanitizedValue; 
            if(path){
                $('.can_create').hide(); 
                $.ajax({
                    url: '{{url("checkDirectoryExist")}}', 
                    type: 'GET',  
                    data: { path: path },  
                    success: function(response) { 
                        $('.can_create').show();
                        if(response == 1){ 
                            $('.can_create').addClass('text-danger').html('1) Directory Path : public_html/storage/app/public/admin-directory/'+path+' Already exist !');  
                            err = true; 
                        }else{  
                            $('.can_create').removeClass('text-danger').html('1) Directory Path : public_html/storage/app/public/admin-directory/'+path);  
                        }
                    },
                    error: function(xhr, status, error) { 
                        console.error(error);
                    }
                }); 
            }else{
                $('.can_create').html('');
                $('.can_create').hide();  
            }
            var sanitizedValue =  $('#database_name').val().replace(/ /g, '');
            var sanitizedValue = sanitizedValue.replace(/[^a-zA-Z0-9]/g, '');
            $('#database_name').val(sanitizedValue);
            var database = sanitizedValue; 
            if(database){ 
                $('.can_create_two').hide(); 
                $.ajax({
                    url: '{{url("checkDatabaseExist")}}', 
                    type: 'GET',  
                    data: { database: database },  
                    success: function(response) { 
                        $('.can_create_two').show();
                        if(response == 1){ 
                            $('.can_create_two').addClass('text-danger').html('2) Database : '+database+' already exist !');
                            err = true; 
                        }else{  
                            $('.can_create_two').removeClass('text-danger').html('2) Database : '+database+' can be created');  
                        }
                    },
                    error: function(xhr, status, error) { 
                        console.error(error);
                    }
                }); 
            }else{
                $('.can_create_two').html('');
                $('.can_create_two').hide();  
            }
            var sanitizedValue =  $('#database_username').val().replace(/ /g, '');
            var sanitizedValue = sanitizedValue.replace(/[^a-zA-Z0-9]/g, '');
            $('#database_username').val(sanitizedValue);
            var username = sanitizedValue; 
            if(username){ 
                $('.can_create_two_three').hide(); 
                $.ajax({
                    url: '{{url("checkUsernameExist")}}', 
                    type: 'GET',  
                    data: { username: username },  
                    success: function(response) { 
                        $('.can_create_two_three').show();
                        if(response == 1){ 
                            err = true;
                            $('.can_create_two_three').addClass('text-danger').html('3) Database User : '+username+' already exist !'); 
                        }else{ 
                            $('.can_create_two_three').removeClass('text-danger').html('3) Database User : '+username+' can be created');  
                        }
                    },
                    error: function(xhr, status, error) { 
                        console.error(error);
                    }
                }); 
            }else{
                $('.can_create_two_three').html('');
                $('.can_create_two_three').hide();  
            }
            console.log(err)
            setTimeout(() => {
                if(err){
                    $('#next-step').attr('disabled',true); 
                }else{
                    $('#next-step').attr('disabled',false); 
                }
                $('#spinner').hide();
            }, 3000);
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

      
        $("#progress-bar").hide() 
        $("#progress-label").hide() 
        $(document).on('click','.cropButton', function () {  
            const croppedData = cropper.getCroppedCanvas().toDataURL('image/jpeg');
            const croppedCanvas = cropper.getCroppedCanvas(); 
            if (croppedCanvas) {  
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
                    makeAjaxRequest(formData);    
                }, 'image/jpeg', 0.9); // Adjust the format and quality as needed
            }else{
                $('#imageInput').after('<span class="text-danger errormessage">Please select company logo!</span>');
                return 0;
            }
        });
        

       
          function makeAjaxRequest(formData) {
            $("#prev-step").hide() 
            $("#next-step").hide() 
            $(".cropButton").hide() 
            $("#progress-bar").show() 
            $("#progress-label").show() 
            const progressBar = document.getElementById("progress-bar"); 
            const progressLabel = document.getElementById("progress-label"); 
            var xhr = new XMLHttpRequest();
            var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            xhr.open("POST", "{{url('setupadmin')}}", true);
            xhr.setRequestHeader("X-CSRF-TOKEN", csrfToken);
            xhr.responseType = "blob";
            xhr.onprogress = function (event) { 
                if (event.lengthComputable) {
                    const percentComplete = (event.loaded / event.total) * 100;
                    progressBar.value = percentComplete;
                    progressLabel.innerText = percentComplete.toFixed(2) + "%";
                } else { 
                    const percentComplete = (event.loaded / (1024 * 1024)) * 1000;  
                    progressBar.value = percentComplete;
                    var valpro = percentComplete.toFixed(2);
                    progressLabel.innerText = valpro + "%";
                    progressBar.style.width = valpro + "%"; 
                    if(valpro > 1 && valpro < 20){
                        progressLabel.innerText =  "Starting setup "+ valpro + "%"; 
                    }else if(valpro > 20 && valpro < 45){
                        progressLabel.innerText =  "Setting up credentials "+ valpro + "%"; 
                    }else if(valpro > 45 && valpro < 85){
                        progressLabel.innerText =  "Installing Database "+ valpro + "%"; 
                    }else if(valpro > 85 && valpro < 95){
                        progressLabel.innerText =  "Setting up demo data.. "+valpro + "%"; 
                    }else if(valpro > 95){
                        progressLabel.innerText =  "Finishing... "+ valpro + "%"; 
                        progressBar.style.width = "100%"; 
                    }  
                }
            };
            xhr.onload = function () {
                if (xhr.status === 200) { 
                    progressLabel.innerText = 100 + "%";
                    progressBar.style.width = 100 + "%"; 
                    $("#progress-bar").after('Done.')
                    $("#progress-bar").hide() 
                    $("#progress-label").hide()  
                    $(".logodiv_section").hide() 
                } else {
                    console.error("Request failed with status: " + xhr.status);
                } 
            };
            xhr.send(formData);   
        }


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
            if (currentStep == 0) { 
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
            $('.can_create,.can_create_two,.can_create_two_three').hide();
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
                nextButton.removeClass('cropButton');
                nextButton.attr('id','#next-step');
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