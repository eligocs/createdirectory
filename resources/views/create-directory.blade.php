@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    ul {
        list-style-type: none;
    }

    i.fa.fa-folder {
        color: #efbe0c;
    }
</style>
<div class="container">
    <div class="row">
        <div class="form-group col-12">
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
        </div>
    </div>
    <div class="row">
        <h2>Create Folder</h2>
        <div class="form-group col-6">
            <form method="POST" action="{{ url('create') }}">
                @csrf
                <div class="form-group ">
                    <label for="directory_name">Directory path:</label>
                    <input type="text" name="directory_name" id="directory_name"
                        placeholder='Folder name or text file with path and .txt extension' value=''
                        class="form-control" required>
                    <div class="existmessage text-danger mt-2" style="display: none;">Directory exist !</div>
                    <div class="can_create mt-2 text-success" style="display: none;"></div>
                </div>
                <button type="submit" class="btn btn-primary submit_dir mt-3">Submit</button>
            </form>
        </div>
        <div class="form-group col-6">
            <ul>
                <li>
                    <h5>Current Folder Path </h5>
                    <p>public_html/storage/app/public/admin-directory/</p>
                </li>
                <li>
                    <ul>
                        <li>
                            <ul>

                                <li>
                                    <?php
                                    foreach ($directories as $i => $subdirectory) {
                                        echo "<h5><i class='fa fa-folder'></i> " . str_replace('admin-directory', '', $subdirectory) . ' <i class="fa fa-trash  text-danger delete_dir" data-type="folder" data-path="'.$subdirectory.'"></i></h6></h5>';
                                        if (Storage::disk('public')->exists($subdirectory)) {
                                            $subcontents = [];
                                            $subdirectories = [];
                                            $subcontents = Storage::disk('public')->files($subdirectory);
                                            $subdirectories = Storage::disk('public')->directories($subdirectory);
                                        }
                                    ?>
                                    <ul>
                                        <li>
                                            <?php
                                                foreach ($subdirectories as $k => $file) {
                                                    echo "<h6><i class='fa fa-folder'></i> " . str_replace($subdirectory, '', $file) . ' <i class="fa fa-trash  text-danger delete_dir" data-type="folder" data-path="'.$file.'"></i></h6>';
                                                    if (Storage::disk('public')->exists($subdirectory)) {
                                                        $subcontents = [];
                                                        $subdirectories = [];
                                                        $childcontents = Storage::disk('public')->files($file);
                                                        $childdirectories = Storage::disk('public')->directories($file);
                                                    }   ?>
                                                    <ul>
                                                        <li>
                                                            <?php
                                                                foreach ($childdirectories as $k => $fileTwo) {
                                                                    echo "<h6><i class='fa fa-folder'></i> " . str_replace($file, '', $fileTwo) . ' <i class="fa fa-trash  text-danger delete_dir" data-type="folder" data-path="'.$fileTwo.'"></i></h6>';
                                                                    if (Storage::disk('public')->exists($subdirectory)) {
                                                                        $subcontents = [];
                                                                        $subdirectories = [];
                                                                        $subchildcontents = Storage::disk('public')->files($fileTwo);
                                                                        $subchilddirectories = Storage::disk('public')->directories($fileTwo);
                                                                    }  
                                                                    ?>
                                                                    <ul>
                                                                        <li>
                                                                            <?php
                                                                                foreach ($subchilddirectories as $k => $fileTwo_child) {
                                                                                    echo "<h6><i class='fa fa-folder'></i> " . str_replace($fileTwo, '', $fileTwo_child) . ' <i class="fa fa-trash  text-danger delete_dir" data-type="folder" data-path="'.$fileTwo_child.'"></i></h6>';  
                                                                                }   ?>
                                                                        </li>
                                                                        <li>
                                                                            <?php
                                                                                foreach ($subchildcontents as $k => $fileThree_child) {
                                                                                    echo "<h6><i class='fa fa-file'></i> " . str_replace($fileTwo, '', $fileThree_child) . ' <i class="fa fa-trash  text-danger delete_dir" data-type="file"   data-path="'.$fileThree_child.'"></i></h6>';
                                                                                } ?>
                                                                        </li>
                                                                    </ul>

                                                        <?php  }   ?>
                                                        </li>
                                                        <li>
                                                            <?php
                                                                foreach ($childcontents as $k => $fileThree) {
                                                                    echo "<h6><i class='fa fa-file'></i> " . str_replace($file, '', $fileThree) . ' <i class="fa fa-trash  text-danger delete_dir" data-type="file"   data-path="'.$fileThree.'"></i></h6>';
                                                                } ?>
                                                        </li>
                                                    </ul>
                                            <?php  } ?>
                                        </li>
                                        <li>
                                            <?php
                                                foreach ($subcontents as $k => $file) {
                                                    echo "<h6><i class='fa fa-file'></i> " . str_replace($subdirectory, '', $file) . ' <i class="fa fa-trash  text-danger delete_dir" data-type="file"   data-path="'.$file.'"></i></h6>';
                                                } ?>
                                        </li>
                                    </ul>
                                    <?php } ?>
                                </li>
                                <li>
                                    <?php
                                    foreach ($contents as $k => $file) {
                                        echo "<h5><i class='fa fa-file'></i> " . str_replace('admin-directory', '', $file) . '</h5>';
                                    } ?>
                                </li>
                            </ul>
                        </li>
                    </ul>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="form-group col-6">
            <h2>Create database</h2>
            <form method="POST" action="{{ url('create_database') }}">
                @csrf
                <div class="form-group ">
                    <label for="database_name"> Name:</label>
                    <input type="text" name="database_name" id="database_name" placeholder='Database Name' value=''
                        class="form-control" required>
                </div>
                <div class="form-group ">
                    <label for="db_username"> Username:</label>
                    <input type="text" name="db_username" id="db_username" placeholder='Username' value=''
                        class="form-control" required>
                </div>
                <div class="form-group ">
                    <label for="db_password"> Password:</label>
                    <input type="text" name="db_password" id="db_password" placeholder='Password' value=''
                        class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </form>
        </div>
        <div class="form-group col-6">
            <h2>List of current database</h2>
            <ul>
                @foreach ($databases as $k =>$database)
                <li>{{$k+1}}. {{ $database->Database }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function(){
        $(document).on('click','.delete_dir',function(){
            var path = $(this).data('path');
            var type = $(this).data('type');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                    url: '{{url("deleteDirectory")}}', 
                    type: 'GET',  
                    data: { path: path, type: type },  
                    success: function(response) { 
                        if(response.status == 200){
                            Swal.fire(
                                'Deleted!',
                                response.message,
                                'success'
                            );
                        }else{
                            Swal.fire(
                                'Deleted!',
                                response.message,
                                'error'
                            );
                        }
                        window.location.reload();
                    },
                    error: function(xhr, status, error) { 
                        console.error(error);
                    }
                }); 
                   
                }
            });
        });
        
        $(document).on('input','#directory_name',function(){
            checkdir();
        });
        $(document).on('blur','#directory_name',function(){
            checkdir();
        });

        function checkdir(){
            var sanitizedValue =  $('#directory_name').val().replace(/ /g, '');
            var sanitizedValue = sanitizedValue.replace(/\/\//g, '/');
            $('#directory_name').val(sanitizedValue);
            var path = sanitizedValue; 
            if(path){
                $('.submit_dir').attr('disabled',true);
                $('.can_create').hide();
                $('.existmessage').hide(); 
                $.ajax({
                    url: '{{url("checkDirectoryExist")}}', 
                    type: 'GET',  
                    data: { path: path },  
                    success: function(response) { 
                        if(response == 1){
                            $('.existmessage').show();
                            $('.submit_dir').attr('disabled',true); 
                            $('.can_create').hide();
                        }else{
                            $('.existmessage').hide();
                            $('.submit_dir').attr('disabled',false);
                            $('.can_create').show();
                            $('.can_create').html('--path : public_html/storage/app/public/admin-directory/'+path);
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
                $('.submit_dir').attr('disabled',true);
            }
        }
});
</script>
@endsection