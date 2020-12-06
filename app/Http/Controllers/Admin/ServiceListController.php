<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Servicecategory;
use App\Models\ServiceList;
use App\Http\Controllers\Controller;

class ServiceListController extends Controller
{
    public function index()
    {
        $service_cate = Servicecategory::all();
        $service_list = Servicelist::all();
        return view('admin.service-list.index')
                    ->with('service_cate', $service_cate)
                    ->with('service_list',$service_list);
    }

    public function store(Request $request)
    {
        $serv_list = new Servicelist();
        $serv_list->serv_cat_id = $request->input('serv_cat_id');
        $serv_list->title = $request->input('title');
        $serv_list->description = $request->input('description');
        $serv_list->price = $request->input('price');
        $serv_list->duration = $request->input('duration');
        $serv_list->save();
        return redirect()->back()->with('status','Service Category List added Successfully');
    }

    public function edit($id)
    {
        $serv_list = Servicelist::find($id);
        $service_cate= Servicecategory::all();
        return view('admin.service-list.edit_list')->with('serv_list',$serv_list)->with('service_cate',$service_cate);
    }

    public function update(Request $request ,$id)
    {
        $serv_list= Servicelist::find($id);

        $serv_list->serv_cat_id = $request->input('serv_cat_id');
        $serv_list->title = $request->input('title');
        $serv_list->description = $request->input('description');
        $serv_list->price = $request->input('price');
        $serv_list->duration = $request->input('duration');
        $serv_list->update();
        return redirect('/service-list')->with('status','Service Category List Update Successfully');
    }
}
