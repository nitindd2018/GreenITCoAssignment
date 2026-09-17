<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FileUploadController extends Controller
{
 
    public function index()
    {
        $files = File::files(storage_path('app/uploads'));
        return view('uploadFiles', ['files'=>$files]);
    }

    public function upload(Request $request){

        $file = $request->file('file');

        $filename= time().'.'.$file->getClientOriginalExtension();
        
        $path= $file->storeAs('uploads', $filename);

        return response()->json([
            'message'=> 'File uploaded successfully',
            'file' => $file,
            'filename'=> $filename,
            'path' => $path,
        ]);
        
    }

    public function getFiles(){
        $files = File::files(public_path('uploads'));

        return response()->json([
            'files' => $files,
        ]);
    }
}
