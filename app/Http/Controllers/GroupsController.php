<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
       

        $groups= Group::all()->sortDesc();
        return view("groups.index",compact("groups"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $reports=Report::all();
        return view("groups.create",compact("reports"));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|unique:groups|max:150|string',
        ]);

        $group=Group::create($request->all());

       $group->reports()->attach($request->input('reports'));


        return redirect()->route("groups.index")->with('success','Un nouveau groupe est créé avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {
        //
        return view("groups.show",compact("group"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Group $group)
    {
        //
        $reports=Report::all();
     //  dd($group->reports->toArray());
      $reprts_id=[];
     foreach($group->reports->toArray() as $report){
     $reprts_id[]=$report['id'];

            }
//dd($reprts_id);
        return view("groups.edit",compact("group","reports","reprts_id"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Group $group)
    {
        //
        $request->validate([
            'name' => 'required|max:150|string',
        ]);
        $group->update($request->all());
        $group->reports()->sync($request->input('reports'));

        return redirect()->route("groups.index")->with('success','Un groupe est modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {
        //

        $group->reports()->detach();
        $group->delete();
        return redirect()->route("groups.index")->with('success','Un groupe est supprimé avec succès');
    }
}
