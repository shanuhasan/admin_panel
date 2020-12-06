@extends('layouts.master')

@section('title')
    Services Category
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Service Category
                    <a href="{{url('/create-services')}}" class="btn btn-primary float-right py-2">Add</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Service Name</td>
                                <td>Description</td>
                                <td>Edit</td>
                                <td>Delete</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($service as $item)
                            <tr>
                                <input type="hidden" class="serdelete_val_id" value="{{$item->id}}">
                                <td>{{$item->id}}</td>
                                <td>{{$item->service_name}}</td>
                                <td>{{$item->service_description}}</td>
                                <td><a href="{{url('service-cat-edit/'.$item->id)}}" class="btn btn-info">Edit</a></td>
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

@section('scripts')
    <script>
    $(document).ready(function () {

        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        $('.servicedeletebtn').click(function (e) { 
            e.preventDefault();
           
            var delete_id = $(this).closest('tr').find('.serdelete_val_id').val();
            // alert(delete_id);
            
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this data!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {

                    var data = {
                        "_token": $('input[name=_token]').val(),
                        "id" : delete_id,
                    };
                    $.ajax({
                        type: "DELETE",
                        url: '/service-cat-delete/'+delete_id,
                        data: data,
                        success: function (response) {
                            swal(response.status, {
                                icon: "success",
                            })
                            .then((result) => {
                                location.reload();
                            });
                        }
                    });
                    
                }
            });

        });
    });
    </script>
@endsection