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
    <h2>Create Folder</h2>
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
    <form method="POST" action="{{ url('create') }}">
        @csrf
        <div class="form-group">
            <label for="directory_name">Directory path:</label>
            <input type="text" name="directory_name" id="directory_name" placeholder='Folder name or text file with path and .txt extension' value='' class="form-control" required> 
        </div>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
    <div class="mt-4">
        <ul>
            <li>
                <h3>root/public</h3>
            </li>
            <li>
                <ul>
                    <li>
                        <h4>/admin-directory</h4>
                    </li>
                    <li>
                        <ul>
                            <li>
                                <?php
                                foreach ($contents as $k => $file) {
                                    echo "<h4><i class='fa fa-file'></i> " . str_replace('admin-directory', '', $file) . '</h4>';
                                } ?>
                            </li>
                            <li>
                                <?php
                                foreach ($directories as $i => $subdirectory) {
                                    echo "<h4><i class='fa fa-folder'></i> " . str_replace('admin-directory', '', $subdirectory) . '</h4>';
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
                                        foreach ($subcontents as $k => $file) {
                                            echo "<h4><i class='fa fa-file'></i> " . str_replace($subdirectory, '', $file) . '</h4>';
                                        } ?>
                                    </li>
                                    <li>
                                        <?php
                                        foreach ($subdirectories as $k => $file) {
                                            echo "<h4><i class='fa fa-folder'></i> " . str_replace($subdirectory, '', $file) . '</h4>';
                                        } ?>
                                    </li>
                                    </ul>
                               <?php } ?>
                            </li>
                        </ul>
                    </li>
                </ul>

                <!-- <br>
                <h3>Sub Directory</h3>
                <?php

                ?> -->

    </div>
</div>
@endsection