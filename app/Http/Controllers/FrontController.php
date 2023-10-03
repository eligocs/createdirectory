<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use Session;
use Storage;
use DB;
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
        $databases = DB::select('SHOW DATABASES');
        return view('create-directory',compact('contents','directories','databases'));
    }

    public function store(Request $request)
    { 
        $filename = '/admin-directory'.'/'.$request->input('directory_name');
        $content = 'Test dummy file';
        if (pathinfo($filename, PATHINFO_EXTENSION) === 'txt') { 
            Storage::disk('public')->put($filename, $content); 
            return redirect('create')->with('success',"Text file '{$filename}' has been created.");
        }  
        $folderName = '/admin-directory'.'/'.$request->input('directory_name'); 
        if (!Storage::disk('public')->exists($folderName)) {
            Storage::disk('public')->makeDirectory($folderName); 
            return redirect('create')->with('success', "Folder '{$folderName}' created successfully.");
        } else { 
            return redirect('create')->with('error', 'Folder already exists.');
        }
        
    }

    public function create_database(Request $request)
    { 
        $request->validate([
            'database_name' => 'required',
            'db_username' => 'required',
            'db_password' => 'required',
        ]);

        $databaseName = $request->input('database_name');
        $username = $request->input('db_username');
        $password = $request->input('db_password');

        // Create the database
        DB::statement("CREATE DATABASE IF NOT EXISTS $databaseName");

        // Create the user and grant privileges
        DB::statement("CREATE USER '$username'@'localhost' IDENTIFIED BY '$password'");
        $res = DB::statement("GRANT ALL PRIVILEGES ON $databaseName.* TO '$username'@'localhost'"); 
   
        if($res){
            return redirect('create')->with('success',  "Database '$databaseName' created, and user '$username' assigned.");
        } else { 
            return redirect('create')->with('error', 'Folder already exists.');
        }
        
    }


    public function checkDirectoryExist(Request $request){ 
        if($request->input('path')){ 
            $folderName = '/admin-directory'.'/'.$request->input('path'); 
            if (Storage::disk('public')->exists($folderName)) { 
                return 1;
            } else {
                return 0;
            } 
        }else{
            return 0;
        }
    }

    public function deleteDirectory(Request $request){ 
        if($request->input('path')){ 
            $folderName = $request->input('path'); 
            if (Storage::disk('public')->exists($folderName)) { 
                if($request->type == 'file'){
                    if (Storage::disk('public')->delete($folderName)) {  
                        return response()->json([
                            'status'=>200,
                            'message'=>'File deleted successfully',
                        ]);
                    }
                }else if($request->type == 'folder'){
                    if (Storage::disk('public')->deleteDirectory($folderName)) {  
                        return response()->json([
                            'status'=>200,
                            'message'=>'Folder deleted successfully',
                        ]);
                    }
                }else {
                    return response()->json([
                        'status'=>500,
                        'message'=>'Fail to delete folder or file !',
                    ]);
                } 
            }else{
                return response()->json([
                    'status'=>404,
                    'message'=>'Folder you are trying to delete does not exist !',
                ]);
            }
        }else{
            return response()->json([
                'status'=>200,
                'message'=>'Path to delete is not added in the request',
            ]);
        }
    }

    public function install(){
        
        return view('install');
    }

}  
