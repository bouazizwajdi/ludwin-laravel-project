<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class FoldersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $folders= Folder::all()->sortDesc();
        return view("folders.index",compact("folders"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("folders.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|unique:folders|max:150|string',
        ]);

        $folder=Folder::create($request->all());

        return redirect()->route("folders.index")->with('success','Un nouveau dossier est créé avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Folder $folder)
    {
        //
        return view("folders.show",compact("folder"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Folder $folder)
    {
        //
        return view("folders.edit",compact("folder"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Folder $folder)
    {
        //
        $request->validate([
            'name' => 'required|max:150|string',
        ]);
        $folder->update($request->all());
        return redirect()->route("folders.index")->with('success','Un dossier est modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Folder $folder)
    {
        //
        $folder->delete();
        return redirect()->route("folders.index")->with('success','Un dossier est supprimé avec succès');
    }
    public function listfolders()
    {

        if (Auth::guard()->user()->role == 'client') {
            $user = User::find(Auth::guard()->user()->id);
            $folders = $user->group->folders()->orderBy('name')->get();
        } elseif (Auth::guard()->user()->role == 'admin')
            $folders = Folder::orderBy('name', 'asc')->get();

        return view("folders.list", compact("folders"));
    }
}
