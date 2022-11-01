<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Http\Requests\StoreFileRequest;
use App\Http\Requests\UpdateFileRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File as RulesFile;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($info)
    {
        //create an instance of file to be ready to store it
        $file = new File;

        //fill the object proprieties
        $file->name = $info['name'];
        $file->description = $info['desc'];
        $file->path = $info['path'];
        $file->user_id = Auth::user()->id;

        $name = $info['name'].".txt";

        $fullPath = $info['path']."/".$name;

        if(Storage::exists($fullPath)){
            return null;
        }



        //store the file in the storage
        Storage::putFileAs($info['path'] , $info['file'] , $info['name'].".txt");

        //return the object to store function to store it in the database
        return $file;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFileRequest $request)
    {
        //make sure that the  form is fully fulled and every thing is all right
        $request->validate([
            'fileName' => 'required|max:255',
            'file'     => [
                'required',
                RulesFile::types(['txt'])
            ]
        ]);

        

        $info = [
            'name' => $request->input('fileName'),
            'file' => $request->file("file"),
            'desc' => $request->input("desc"),
            'path' => "/public/user_".Auth::user()->id
        ];

        $file = $this->create($info);

        if($file == null){
            //this is mean that the file is already existe
            return Redirect::back()->withErrors("sorry dude this file is already exists");
        }


        //save the file information in database to make it accessible another time
        $file->save();
        


        return Redirect::to(route('workspace'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFileRequest  $request
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFileRequest $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        //
    }
}
