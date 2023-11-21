<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;

class LangueController extends Controller
{
    //
    public function changerLangue($lang)
    {
      // dd(app()->getLocale());
        App::setLocale($lang);
        session()->put('locale', $lang);
       //return Redirect::back();
        return redirect()->back();
       // return view('reports.create');
    }

}
