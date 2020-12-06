<?php

namespace App\Http\Controllers\Admin;

use App\Models\Abouts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AboutusController extends Controller
{
    public function index()
    {
        $abouts = Abouts::all();

        return view('admin.aboutus')->with('abouts',$abouts);
    }
    public function store(Request $req)
    {
        $aboutus = new Abouts;
        $aboutus->title = $req->input('title');
        $aboutus->subtitle = $req->input('subtitle');
        $aboutus->description = $req->input('description');
        $aboutus->save();

        Session::flash('statuscode','success');
        return redirect('/about-us')->with('status','About us Add Successfully');
    }


    public function edit($id)
    {
        $abouts = Abouts::find($id);
        return view('admin.edit_aboutus')->with('abouts',$abouts);
    }


    public function update(Request $req, $id)
    {
        $abouts = Abouts::find($id);
        $abouts->title = $req->input('title');
        $abouts->subtitle = $req->input('subtitle');
        $abouts->description = $req->input('description');
        $abouts->update();
        
        Session::flash('statuscode','info');
        return redirect('/about-us')->with('status','Data is Updated Successfully');
    }
    public function delete($id)
    {
        $abouts = Abouts::find($id);
        $abouts->delete();

        Session::flash('statuscode','error');
        return redirect('/about-us')->with('status','Deleted Successfully');
    }
}
