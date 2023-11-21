<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Group;
use App\Models\Report;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users= User::all()->sortDesc();
        return view("users.index",compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $reports=Report::all();
        $groups=Group::all();
        return view("users.create",compact("groups","reports"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'first_name' =>['required','string','max:50'],
            'last_name' => ['required', 'string','max:50'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'string','max:15'],
            'group_id' => [ 'required','integer','exists:groups,id'],

        ]);

        $user=User::create($request->all());
        $user->reports()->attach($request->input('reports'));
        return redirect()->route("users.index")->with('success','Un nouveau utilisateur est créé avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
        return view("users.show",compact("user"));
    }

    /**
     * Show the form for editing the specified resource.
     */
  public function edit(User $user)
    {
        //
        $groups=Group::all();
        $reports=Report::all();
     //  dd($user->reports->toArray());
         $reprts_id=[];
        foreach($user->reports->toArray() as $report){
        $reprts_id[]=$report['id'];
     }
        return view("users.edit",compact("user","groups","reports","reprts_id"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
        $request->validate([
            'first_name' =>['required','string','max:50'],
            'last_name' => ['required', 'string','max:50'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['nullable','string', 'min:8','confirmed'],
            'role' => ['required', 'string','max:15'],
            'group_id' => [ 'required','integer','exists:groups,id'],

        ]);
        $user->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'company_name' => $request->input('company_name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'password' => bcrypt($request->input('password')),
            'role' => $request->input('role'),
            'group_id' => $request->input('group_id'),
           ]);
        $user->reports()->sync($request->input('reports'));
        return redirect()->route("users.index")->with('success','Un utilisateur est modifié avec succès');
    }

    public function editprofil (int $id)
    {
       $user=User::find($id);
        return view("users.editprofil",compact("user"));
    }

    public function updateprofil(Request $request , int $id)
    {

        $user=User::find($id);

        //
        $request->validate([
            'first_name' =>['required','string','max:50'],
            'last_name' => ['required', 'string','max:50'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['nullable','string', 'min:8','confirmed'],
        ]);
        $inputs=$request->all();
        unset($inputs['password']);
        if(!empty($request->input('password'))){
        $inputs['password']=bcrypt($request->input('password'));
        }

        $user->update($inputs);

        return redirect()->route("reports.list")->with('success','Mon profil est modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        $user->reports()->detach();
        $user->delete();
        return redirect()->route("users.index")->with('success','Un utilisateur est supprimé avec succès');

    }

    public function getreport(Request $request)
    {
        //
        $reports=Report::all();

        $id = $request->input('id');
        $group=Group::find($id);
        $group_reports= $group->reports;
        $reprts_id=[];
        foreach($group_reports as $report){
        $reprts_id[]=$report['id'];
        }
        $lang=app()->getLocale();
        $lg=session()->get('locale');
        $list=trans('messages.List Reports');
        return response()->json(['group_reports' => $reprts_id, 'reports'=>$reports,'lang'=>$lang,'lg'=>$lg,'list'=>$list], 200);

    }


}
