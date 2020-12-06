@extends('layouts.master')

@section('title')
    Edit - Service Category List
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit - Service Category List
                <a href="/service-list" class="btn btn-primary float-right py-2">Back</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="{{url('/service-list-update/'.$serv_list->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Service Category</label>
                            <select class="form-control" name="serv_cat_id" required>
                                <option value="{{$serv_list->id}}"> {{$serv_list->service_category->service_name}} </option>
                                @foreach ($service_cate as $cate_item)
                                    <option value="{{$cate_item->id}}"> {{$cate_item->service_name}} </option>                                    
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Service List Name</label>
                            <input type="text" class="form-control" name="title" value="{{$serv_list->title}}">
                        </div>
                        <div class="form-group">
                            <label for="">Service List Description</label>
                            <textarea type="text" class="form-control" name="description">{{$serv_list->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Service List Price</label>
                            <input type="text" class="form-control" name="price" value="{{$serv_list->price}}">
                        </div>
                        <div class="form-group">
                            <label for="">Service List Duration</label>
                            <input type="text" class="form-control" name="duration" value="{{$serv_list->duration}}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection