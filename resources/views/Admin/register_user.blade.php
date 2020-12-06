@extends('layouts.master')

@section('title')
    Registered User
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Registered Role</h4>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>UserType</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </thead>
                            <tbody>
                                @foreach ($users as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->phone}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->usertype}}</td>
                                    <td>
                                        <a href="/edit-role/{{ $item->id}}" class="btn btn-success">Edit</a>                                       
                                    </td>
                                    <td>
                                        <form action="/role-delete/{{ $item->id}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                        
                                    </td>
                                </tr>  
                                @endforeach                                              
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>    
    </div>
@endsection

@section('scripts')
    
@endsection