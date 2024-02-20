<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class FilesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $files= File::all()->sortDesc();
        return view("files.index",compact("files"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("files.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|unique:files|max:150|string',
        ]);

        $file=File::create($request->all());

        return redirect()->route("files.index")->with('success','Un nouveau fichier est créé avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(File $file)
    {
        //
        return view("files.show",compact("file"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(File $file)
    {
        //
        return view("files.edit",compact("file"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, File $file)
    {
        //
        $request->validate([
            'name' => 'required|max:150|string',
        ]);
        $file->update($request->all());
        return redirect()->route("files.index")->with('success','Un fichier est modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(File $file)
    {
        //
        $file->delete();
        return redirect()->route("files.index")->with('success','Un fichier est supprimé avec succès');
    }
}
