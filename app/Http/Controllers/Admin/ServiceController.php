<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Servicecategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ServiceController extends Controller
{
    public function index()
    {
        $service = Servicecategory::all();
        return view('admin.services.index')->with('service',$service);
    }

    public function create()
    {
        return view('admin.services.createServices');
    }

    public function store(Request $req)
    {
        $service = new Servicecategory;
        $service->service_name=$req->input('service_name');
        $service->service_description=$req->input('service_description');
        $service->save();

        Session::flash('statuscode','success');
        return redirect('/service-category')->with('status','category add successfully');
    }

    public function edit($id)
    {
        $service_category = Servicecategory::find($id);
        return view('admin.services.edit')->with('service_category',$service_category);
    }

    public function update(Request $req, $id)
    {
        $service_category = Servicecategory::find($id);
        $service_category->service_name= $req->input('service_name');
        $service_category->service_description=$req->input('service_description');
        $service_category->update();
        Session::flash('statuscode','success');
        return redirect('/service-category')->with('status','Updated Successfully');
    }
    public function delete($id)
    {
        $service = Servicecategory::find($id);
        $service->delete();
        return response()->json(['status'=>'Service Category Deleted Successfully']);
    }
}
