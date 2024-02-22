<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\File;
use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

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
        $folders= Folder::all()->sortDesc();
        return view("files.create",compact("folders"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $file = new File();

        $request->validate([
            'name' => 'required|unique:files|max:150|string',
            'file' => 'required|mimes:xls,xlsx',
            'folder_id' => [ 'required','integer','exists:folders,id'],
        ]);

       // $file=File::create($request->all());

        $inputs = $request->all();
 //dd($inputs['file']);

         if ($request->hasFile('file')) {

            // Get the uploaded file instance
            $excelFile = $request->file('file');

            // Generate a unique filename for the Excel file
         //   $excelName = uniqid().'.'.$excelFile->getClientOriginalExtension();
            $excelName = $excelFile->getClientOriginalName();
            $excelFile->move(public_path() . "/files/excels/", $excelName);

        }


        // if ($request->hasFile('file')) {
        //     if ($excelFile = $request->file('file')) {
        //         $excelFile->move(public_path() . "/files/excels/", $excelName);
        //       //  $inputs['file'] = $excelFile;
        //     }
       else {
            $inputs['file'] = "";
        }
//dd($excelName);
        $file->name=$inputs['name'];
        $file->file=$excelName;
        $file->folder_id=$inputs['folder_id'];

        //File::create($inputs);


        if($file->save())
        return redirect()->route("excels.index")->with('success','Un nouveau fichier est créé avec succès');
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
    public function edit(int $id)
    {
        //
        $file=File::find($id);
        $folders= Folder::all()->sortDesc();
        return view("files.edit",compact('file','folders'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        //
        $file=File::find($id);
        $request->validate([
            'name' => 'required|max:150|string',
            'file' => 'mimes:xls,xlsx',
            'folder_id' => [ 'required','integer','exists:folders,id'],
        ]);


       $inputs = $request->all();

     //
        if ($request->hasFile('file')) {

            if (file_exists(public_path() . "/files/excels/" . $file->file) && is_file(public_path() . "/files/excels/" . $file->file))
            unlink((public_path() . "/files/excels/" . $file->file));

            $excelFile = $request->file('file');
            $excelName = $excelFile->getClientOriginalName();
            $excelFile->move(public_path() . "/files/excels/", $excelName);
            $file->file= $excelName;
        }
        else {
            $inputs['file'] = "";
        }
        if(isset($inputs['folder_id']))
        $file->folder_id=$inputs['folder_id'];

        $file->update($request->all());

        return redirect()->route("excels.index")->with('success','Un fichier est modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        //
        $file=File::find($id);
        $file->delete();
        return redirect()->route("excels.index")->with('success','Un fichier est supprimé avec succès');
    }
    public function listfiles(int $id)
    {
$files= File::where('folder_id',$id)->get();

if (Auth::guard()->user()->role == 'client') {
    $user = User::find(Auth::guard()->user()->id);

    $folders = $user->group->folders()->get();
$tabf=[];
foreach ($folders as $folder)
 {
    $tabf[]=$folder->id;

 }
 if(!in_array($id,$tabf))
 return view("error.index");

}

        $folder=Folder::find($id);
        return view("files.list", compact("files","folder"));
    }
}
