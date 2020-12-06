@extends('layouts.master')

@section('title')
    Create Service Category
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Service Category - Add
                    <a href="{{url('/service-category')}}" class="btn btn-primary float-right py-2">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{url('/service-add')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Service Category Name</label>
                                    <input type="text" class="form-control" name="service_name" placeholder="Enter Service Name">
                                </div>
                                <div class="form-group">
                                    <label for="">Service Category Description</label>
                                    <textarea type="text" class="form-control" name="service_description" placeholder="Enter Service Descriotion"></textarea>
                                </div>
                                <button type="submit" class="btn btn-info">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection