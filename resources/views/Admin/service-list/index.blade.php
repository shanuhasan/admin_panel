@extends('layouts.master')

@section('title')
    Service Category List
@endsection

@section('content')


    {{-- Add Category List Modal --}}
    <!-- Button trigger modal -->
  
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Service Category List</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="{{url('/service-list-add')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Service Category</label>
                            <select class="form-control" name="serv_cat_id" required>
                                <option value=""> -- Select Service Category -- </option>
                                @foreach ($service_cate as $cate_item)
                                    <option value="{{$cate_item->id}}"> {{$cate_item->service_name}} </option>                                    
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Service List Name</label>
                            <input type="text" class="form-control" name="title" placeholder="Enter Title">
                        </div>
                        <div class="form-group">
                            <label for="">Service List Description</label>
                            <textarea type="text" class="form-control" name="description" placeholder="Enter Description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Service List Price</label>
                            <input type="text" class="form-control" name="price" placeholder="Enter Price">
                        </div>
                        <div class="form-group">
                            <label for="">Service List Duration</label>
                            <input type="text" class="form-control" name="duration" placeholder="Enter Duration">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>                
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Service Category List
                    <button class="btn btn-primary float-right py-2" data-toggle="modal" data-target="#exampleModal">Add</button>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Service Category</td>
                                <td>Title</td>
                                <td>Price</td>
                                <td>Edit</td>
                                <td>Delete</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($service_list as $item)                                
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->service_category->service_name}}</td>
                                    <td>{{$item->title}}</td>
                                    <td>{{$item->price}}</td>
                                    <td>
                                        <a href="{{url('service-list-edit/'.$item->id)}}" class="btn btn-info">Edit</a></td>
                                    <td><button type="button" class="btn btn-danger servicedeletebtn">Delete</button></td>
                                </tr>
                            @endforeach                         
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection