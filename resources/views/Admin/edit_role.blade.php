@extends('layouts.master')

@section('title')
    Edit Registered User
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Registered Role</h4>
                </div>
                <div class="card-body">
                    <form action="/role-update/{{$users->id}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$users->name}}" >
                          </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" name="email" value="{{$users->email}}" readonly id="email" >
                        </div>
                        <div class="form-group">
                            <label for="phone">Give Role</label>
                            <select name="usertype" class="form-control">
                                <option value="admin">Admin</option>
                                <option value="vendor">Vendor</option>
                                <option value="">None</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                        <a href="/register-role" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    
@endsection