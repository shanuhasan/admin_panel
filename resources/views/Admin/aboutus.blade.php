@extends('layouts.master')

@section('title')
    About Us
@endsection

@section('content')

{{-- Start About US Modal --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add About US</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="/save-about-us" method="post">
            @csrf
            <div class="modal-body">            
                <div class="form-group">
                    <label for="title" class="col-form-label">Title:</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>
                <div class="form-group">
                    <label for="subtitle" class="col-form-label">Sub-Title:</label>
                    <input class="form-control" id="subtitle" name="subtitle">
                </div>
                <div class="form-group">
                    <label for="description" class="col-form-label">Description:</label>
                    <textarea class="form-control" id="description" name="description"></textarea>
                </div>          
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
      </div>
    </div>
  </div>
{{-- End About US Modal --}}

<!--Start Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete About Us Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="delete_modal_form" method="post">
        @csrf
        @method('DELETE')
        <div class="modal-body">           
            <input type="hidden" id="delete_aboutus_id">
            <h4>Are you Sure? You want to delete data?</h4>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Delete</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!--End Delete Modal -->

<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
            <h4 class="card-title"> About Us
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">Add</button>
            </h4>
            
        </div>
        <style>
            .w-10p{
                width: 10%;
            }
        </style>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-stripped" id="datatable">
              <thead class=" text-primary">
                <th class="w-10p">ID</th>
                <th class="w-10p">Title</th>
                <th class="w-10p">Sub-Title</th>
                <th class="w-10p">Description</th>
                <th class="w-10p">Edit</th>
                <th class="w-10p">Delete</th>
              </thead>
              <tbody>
                    @foreach ($abouts as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->title}}</td>
                        <td>{{$item->subtitle}}</td>
                        <td>{{$item->description}}</td>
                        <td>
                            <a href="{{ url('about-us/'.$item->id)}}" class="btn btn-success">Edit</a>
                        </td>
                        <td>
                            <a href="javascript:void(0)" class="btn btn-danger deletebtn">Delete</a>
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
    <script>
        $(document).ready( function () {
            // $('#datatable').DataTable();

            $('#datatable').on( 'click' , '.deletebtn', function () {
              
              $tr = $(this).closest('tr');
              var data = $tr.children("td").map(function(){
                return $(this).text();
              }).get();

              $('#delete_aboutus_id').val(data[0]);

              $('#delete_modal_form').attr('action','/aboutus-delete/'+data[0]);

              $('#deleteModal').modal('show');

            });
        });
    </script>
@endsection