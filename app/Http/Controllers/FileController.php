<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use Storage;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = File::with('project')->simplePaginate(10);
        
        return view('files.index', compact('files'));
    }

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id, Request $request)
    {
        $this->validate($request, [

            'upload' => 'required|file',
    
        ]);
        
        $upload = $request->file('upload');
        $filePath = Storage::put($id, $upload);
        
        $file = new File();
        $file->name = $upload->getClientOriginalName();
        $file->project_id = $id;
        $file->filePath = $filePath;
        $file->mime = $upload->getMimeType();
        $file->save();
        
        return back();
        
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $file = File::findOrFail($id);
        $filepath = storage_path('app') . '/' . $file->filepath;
        return response()->download($filepath, $file->name);

    }

    

    
}
