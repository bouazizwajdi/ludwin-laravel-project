<?php

namespace App\Http\Controllers;

use File;
use Image;
use App\Models\User;
use App\Models\Group;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $reports = Report::all()->sortDesc();

        return view("reports.index", compact("reports"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("reports.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:190|string',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'integration_code' => 'required',
        ]);

        $inputs = $request->all();
        // $this->validate($request,["logo"=>"image|mimes:png,jpg,webp,jpeg|max:2048"]);
        if ($request->hasFile('logo')) {

            if ($photo = $request->file('logo')) {


                $nameimg = uniqid() . time() . '.' . $photo->getClientOriginalExtension();

                $photo->move(public_path() . "/files/reports/", $nameimg);
                $inputs['logo'] = $nameimg;
            }
        } else {
            $inputs['logo'] = "";
        }

        Report::create($inputs);

        return redirect()->route("reports.index")->with('success', 'Un rapport est créé avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Report $report)
    {
        //
        return view("reports.show", compact("report"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Report $report)
    {
        //
        return view("reports.edit", compact("report"));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Report $report)
    {
        //
        //    $this->validate($request,["logo"=>"image|mimes:png,jpg,webp,jpeg|max:2048"]);
        // $nameimg= $report->logo;
        $request->validate([
            'name' => 'required|max:190|string',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'integration_code' => 'required',
        ]);

        $inputs = $request->all();
        if ($request->hasFile('logo')) {

            if ($photo = $request->file('logo')) {
                //  dd($report);
                if (file_exists(public_path() . "/files/reports/" . $report->logo) && is_file(public_path() . "/files/reports/" . $report->logo))
                unlink((public_path() . "/files/reports/" . $report->logo));

                $nameimg = uniqid() . time() . '.' . $photo->getClientOriginalExtension();

                $photo->move("files/reports/", $nameimg);
                $inputs['logo'] = $nameimg;
            }
        } else {
            unset($inputs['logo']);
        }

        $report->update($inputs);

        return redirect()->route("reports.index")->with('success', 'Un rapport est modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report)
    {
        //
        if (file_exists(public_path() . "files/reports/" . $report->logo))
            unlink((public_path() . "files/reports/" . $report->logo));

            $report->groups()->detach();
            $report->users()->detach();
        $report->delete();

        return redirect()->route("reports.index")->with('success', 'Un rapport est supprimé avec succès');
    }
    public function listreports()
    {

        if (Auth::guard()->user()->role == 'client') {
            $user = User::find(Auth::guard()->user()->id);
            $reports = $user->group->reports()->orderBy('name')->get();
        } elseif (Auth::guard()->user()->role == 'admin')
            $reports = Report::orderBy('name', 'asc')->get();

        return view("reports.list", compact("reports"));
    }
}
