@extends('layouts.master')

@section('title')
    Edit - Service Category
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Service Category - Edit
                <a href="{{url('/service-category')}}" class="btn btn-primary float-right py-2">Back</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="{{url('/service-update/'.$service_category->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Service Category Name</label>
                                <input type="text" class="form-control" name="service_name" value="{{$service_category->service_name}}">
                            </div>
                            <div class="form-group">
                                <label for="">Service Category Description</label>
                                <textarea type="text" class="form-control" name="service_description" placeholder="Enter Service Descriotion">{{$service_category->service_description}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-info">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection