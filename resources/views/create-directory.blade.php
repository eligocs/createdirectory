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
                    <input type="text" name="directory_name" id="directory_name" placeholder='Folder name or text file with path and .txt extension' value='' class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
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
                                        echo "<h5><i class='fa fa-folder'></i> " . str_replace('admin-directory', '', $subdirectory) . '</h5>';
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
                                                    echo "<h6><i class='fa fa-folder'></i> " . str_replace($subdirectory, '', $file) . '</h6>';
                                                } ?>
                                            </li>
                                            <li>
                                                <?php
                                                foreach ($subcontents as $k => $file) {
                                                    echo "<h6><i class='fa fa-file'></i> " . str_replace($subdirectory, '', $file) . '</h6>';
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
                    <input type="text" name="database_name" id="database_name" placeholder='Database Name' value='' class="form-control" required>
                </div>
                <div class="form-group ">
                    <label for="db_username"> Username:</label>
                    <input type="text" name="db_username" id="db_username" placeholder='Username' value='' class="form-control" required>
                </div>
                <div class="form-group ">
                    <label for="db_password"> Password:</label>
                    <input type="text" name="db_password" id="db_password" placeholder='Password' value='' class="form-control" required>
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