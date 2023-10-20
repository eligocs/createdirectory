<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Config; 
use Illuminate\Http\Request;
use File;
use Session;
use Storage;
use App\Models\Credentials;
use DB; 
use Artisan;
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

    public function checkDatabaseExist(Request $request){ 
        if($request->input('database')){ 
            $databaseName = $request->input('database');  
            $query = "SELECT SCHEMA_NAME FROM information_schema.SCHEMATA WHERE SCHEMA_NAME = ?";
            $results = DB::select($query, [$databaseName]);  
            if (count($results) > 0) {
                return 1;
            } else {
                return 0;
            }
        } 
        return 0;
    }

    public function checkUsernameExist(Request $request){ 
        if($request->input('username')){ 
            $username = $request->input('username');   
            $query = "SELECT COUNT(*) as userCount FROM mysql.user WHERE user = ?";
            $results = DB::select($query, [$username]);
            if (count($results) > 0 && $results[0]->userCount > 0) {
                return 1;
            } else {
                return 0;
            }
        }
        return 0;
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

    public function setupadmin(Request $request){  
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'company_name' => 'required',
            'email' => 'required',
            'directory_name' => 'required',
            'database' => 'required',
            'username' => 'required',
        ]);
      
        $total = 100;
        for ($i = 1; $i <= $total; $i++) { 
            usleep(250000); 
            $progress = ($i / $total) * 100;
              
            echo str_repeat(' ', 1024); // Flush the output buffer to update the browser
            ob_flush();
            flush();
        }  
        $folderName = '/admin-directory'.'/'.$request->input('directory_name'); 
        if (!Storage::disk('public')->exists($folderName)) {
            Storage::disk('public')->makeDirectory($folderName);  
            $folder = "Folder '{$folderName}' created successfully.";
        } else { 
            return response()->json([
                'status'=>500,
                'message'=>'Folder already exists!'
            ]); 
        }
        if ($request->hasFile('image')) { 
            $imageFile = $request->file('image');   
            $imagePath = $folderName;
            $newFileName = uniqid() . '.' . $imageFile->getClientOriginalExtension(); 
            $moved = Storage::disk('public')->putFileAs($imagePath, $imageFile, $newFileName); 
        }else{
            return response()->json([
                'status'=>500,
                'message'=>'Fail to upload logo!'
            ]); 
        }
        $company_name = $request->company_name ?? '';
        $email = $request->email ?? '';
        $directory_name = $request->directory_name ?? '';
        $database = $request->database ?? '';
        $username = $request->username ?? '';
        $password  = $this->generateRandomPassword(); 
        // Create the database 
        $encryptedString = encrypt($password);  
       
        DB::statement("CREATE DATABASE IF NOT EXISTS ".$database."");  
        DB::statement("CREATE USER '".$username."'@'127.0.0.1' IDENTIFIED BY '".$password."'");
        $res = DB::statement( "GRANT ALL PRIVILEGES ON ".$database.".* TO '".$username."'@'127.0.0.1'"); 
        $this->runMigrations($database,$username,$password);  
        if(!$res){
            return response()->json([
                'status'=>500,
                'message'=>'Fail to create database user!'
            ]); 
        } 
        $res = Credentials::create([
            'company_name'=>$company_name,
            'email'=>$email,
            'directory_name'=>$directory_name,
            'database'=>$database,
            'username'=>$username,
            'password'=>$encryptedString,
        ]);
        return response()->json([
            'status'=>200,
            'company_name'=>$company_name,
            'email'=>$email,
            'directory_name'=>$directory_name,
            'logo_path'=>$imagePath,
            'database'=>$database,
            'username'=>$username,
            'password'=>$password,
            'message'=>'Done',
        ]); 

    }

    public function dycryptDbPass($pass) {
        $decryptedString = decrypt($pass);
        return $decryptedString;
    }
    

    public function generateRandomPassword($length = 10) {
        $characters = '0123456789!@#$&*'; // Include any other characters you want in the password 
        $password = '';
        $max = strlen($characters) - 1; 
        for ($i = 0; $i < $length; $i++) {
            $password .= $characters[random_int(0, $max)];
        } 
        return $password;
    }
    
 


    public function runMigrations($database,$username,$password)
    {
        // Define the new database connection configuration
        $newConnectionName = 'new_connection';
        $newConnectionConfig = [
            'driver' => 'mysql',
            'host' => '127.0.0.1',
            'database' => $database,
            'username' => $username,
            'password' => $password,
        ]; 
        // Set the new database connection configuration
        Config::set("database.connections.$newConnectionName", $newConnectionConfig); 
        // Use the new connection to run migrations
        Config::set("database.default", $newConnectionName); 
        // Run migrations using Artisan
        $migrationPath = 'database/migrations/software'; 
        // Run migrations for specific tables using Artisan with --path option
        Artisan::call('migrate', ['--path' => $migrationPath]); 
        Artisan::call('db:seed');
        // Optionally, revert back to the original/default connection
        Config::set("database.default", 'mysql'); 
        return true;
    }

    public function runSpecificSeeders()
    {
        // Run specific seeders using the Artisan command
        Artisan::call('db:seed', ['--class' => 'DummyDataSeeder']); 
        Artisan::call('db:seed', ['--class'=> 'DummyDataSeederTwo']); 
        // Add more seeders as needed 
        return true;
    }

}  
