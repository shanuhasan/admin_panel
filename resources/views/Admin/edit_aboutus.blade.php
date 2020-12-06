@extends('layouts.master')

@section('title')
    About Us
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit About Us</h4>
                    <form action="{{url('/aboutus-update/'.$abouts->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">            
                            <div class="form-group">
                                <label for="title" class="col-form-label">Title:</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{$abouts->title}}">
                            </div>
                            <div class="form-group">
                                <label for="subtitle" class="col-form-label">Sub-Title:</label>
                                <input class="form-control" id="subtitle" name="subtitle" value="{{$abouts->subtitle}}">
                            </div>
                            <div class="form-group">
                                <label for="description" class="col-form-label">Description:</label>
                                <textarea class="form-control" id="description" name="description">{{$abouts->description}}</textarea>
                            </div>          
                        </div>
                        <div class="modal-footer">
                            <a href="{{url('/about-us')}}" class="btn btn-secondary">Back</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection