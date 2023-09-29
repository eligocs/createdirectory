<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use Session;
use Storage;
class FrontController extends Controller
{
    public function index()
    {    
        $contents = []; 
        $directories = []; 
        $directory = 'admin-directory';    
        if (Storage::disk('public')->exists($directory)) {  
            $contents = Storage::disk('public')->files($directory);
            $directories = Storage::disk('public')->directories($directory);  
        }  
        return view('create-directory',compact('contents','directories'));
    }

    public function store(Request $request)
    { 
        $filename = $request->input('directory_name');
        $content = 'Test dummy file';
        if (pathinfo($filename, PATHINFO_EXTENSION) === 'txt') { 
            Storage::disk('public')->put($filename, $content); 
            return redirect('create')->with('success',"Text file '{$filename}' has been created.");
        }  
        $folderName = $request->input('directory_name'); 
        if (!Storage::disk('public')->exists($folderName)) {
            Storage::disk('public')->makeDirectory($folderName); 
            return redirect('create')->with('success', "Folder '{$folderName}' created successfully.");
        } else { 
            return redirect('create')->with('error', 'Folder already exists.');
        }
        
    }
}  
