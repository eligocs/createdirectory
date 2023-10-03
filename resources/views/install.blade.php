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
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css">


<div class="container">
    <div class="row">
        <div class="card mainform ">
            <div class="card-body">
                <div class="col-md-12 wizard">
                    <h3>Start Installation Wizard</h3>
                    <div class="mb-3 mt-5"> 
                        <button type="button" class="btn btn-primary" id="startinstaller">Next</button> 
                    </div>
                </div>
                <form id="step-form" style='display:none;'>
                    <div class="col-md-12 stepdiv" >
                        <h3>Basic info</h3>
                        <div class="mb-3">
                            <label for="field1" class="form-label">Company Name</label>
                            <input type="text" class="form-control" id="field1" name="company_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="field1" class="form-label">Email</label>
                            <input type="email" class="form-control" id="field1" name="email" required>
                        </div> 
                    </div>
                    <div class="col-md-12 stepdiv" >
                        <h3>Upload Company Logo</h3>
                        <div class="mb-3">
                            <input type="file" id="imageInput" accept="image/*">
                            <img id="image" src="" alt="Cropped Image">
                            <button type="button" class="btn btn-success mt-2" id="cropButton">Crop</button> 
                        </div> 
                    </div>
                    <div class="col-md-12 stepdiv">
                        <h3>Database/Assets</h3>
                        <div class="mb-3">
                            <label for="field1" class="form-label">Assets Directory</label>
                            <input type="text" class="form-control" id="field1" name="directory" required>
                        </div>
                        <div class="mb-3">
                            <label for="field2" class="form-label">Database</label>
                            <input type="text" class="form-control" id="field2" name="database" required>
                        </div>
                        <div class="mb-3">
                            <label for="field3" class="form-label">Username</label>
                            <input type="text" class="form-control" id="field3" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="field4" class="form-label">Password</label>
                            <input type="password" class="form-control" id="field4" name="password" required>
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
<script>
    // JavaScript code for handling step navigation
    $(document).ready(function () {
        
        const image = document.getElementById('image');
        const cropper = new Cropper(image, {
            aspectRatio: 16 / 9, // Set the desired aspect ratio (e.g., 16:9)
            viewMode: 1,
        });
        
        const imageInput = document.getElementById('imageInput'); 
        imageInput.addEventListener('change', function (event) {
            const files = event.target.files;
            if (files && files.length > 0) {
                const reader = new FileReader();
                reader.onload = function () {
                    image.src = reader.result;
                    cropper.replace(reader.result); // Load the image into Cropper.js
                };
                reader.readAsDataURL(files[0]);
            }
        });
        
        const cropButton = document.getElementById('cropButton');
        
        cropButton.addEventListener('click', function () {
            // Get the cropped image data
            // const croppedData = cropper.getCroppedCanvas().toDataURL('image/jpeg');
            if (cropper) {
            // Get the cropped image data
            const croppedCanvas = cropper.getCroppedCanvas();

            // Convert the canvas to a Blob (you can change the format and quality)
            croppedCanvas.toBlob(function (blob) {
                // Create a FormData object and append the Blob to it
                const formData = new FormData();
                formData.append('image', blob, 'cropped_image.jpg'); // Adjust the file name if needed

                // Send the FormData to your server (adjust the URL and method as needed)
                fetch('/upload-url', {
                    method: 'POST',
                    body: formData,
                })
                .then(response => {
                    // Handle the server response as needed
                    if (response.ok) {
                        console.log('Image uploaded successfully.');
                    } else {
                        console.error('Image upload failed.');
                    }
                })
                .catch(error => {
                    console.error('Image upload error:', error);
                });
            }, 'image/jpeg', 0.9); // Adjust the format and quality as needed
            }
        });


        const startinstalled = $("#startinstaller");
        const form = $("#step-form");
        const wizard =  $('.wizard');
        startinstalled.click(function(){
            form.show()
            wizard.hide()
        });
        const prevButton = $("#prev-step");
        const nextButton = $("#next-step");
        const submitButton = $("#submit-form");
        const steps = form.find(".stepdiv");
        prevButton.hide();
        let currentStep = 0;

        // Initially, hide all steps except the first one
        steps.hide();
        $(steps[0]).show();

        // Handle "Next" button click
        nextButton.click(function () {
            prevButton.show();
            if (currentStep < steps.length - 1) {
                $(steps[currentStep]).hide();
                currentStep++;
                $(steps[currentStep]).show();
            }
        });

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

        // Handle form submission (you can customize this)
        form.submit(function (e) {
            e.preventDefault();
            // You can handle the form submission here
        });
    });
</script>
@endsection