<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Ajax crud</title>
  </head>
  <body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-10 offset-sm-1">

                <div class="alert alert-success" style="display: none;">
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4>Item list
                            <button class="btn btn-success" style="float: right;" data-bs-toggle="modal" data-bs-target="#addItemModal">Add Item</button>
                        </h4>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Sl no.</th>
                                    <th>Item name</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php
                                    $i=1;
                                @endphp
                               @foreach ($items as  $key=>$row)
                                  <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->price }}</td>
                                    <td>
                                        <img src="{{ asset($row->image) }}" width="80" height="80" alt="">
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-success edit"
                                        data-id = {{ $row->id }}
                                        >Edit</button>
                                        <button type="button" class="btn btn-danger delete"
                                        data-id = {{ $row->id }}
                                        >Delete</button>
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

    <!--Add Item Modal -->
<div class="modal fade" id="addItemModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Item</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form  id="addItemForm">
            @csrf
            <div class="modal-body">
            <div class="form-group">
                <label for="">Item Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="">Item Price</label>
                <input type="text" name="price" id="price" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="">Image</label>
                <input type="file" name="image" id="image" class="form-control" required>
            </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary submit">Submit</button>
            </div>
        </form>
      </div>
    </div>
  </div>
  <!-- end modal-->

  {{-- edit modal --}}
  <div class="modal fade" id="editItemModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Item</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form  id="editItemForm">
            @csrf
            <div class="modal-body">
            <div class="form-group">
                <label for="">Item Name</label>
                <input type="text" name="name" id="e_name" class="form-control" required>
                 <input type="hidden" name="edit_id" id="edit_id" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="">Item Price</label>
                <input type="text" name="price" id="e_price" class="form-control" required>

            </div>

            <div class="form-group">
                <label for="">Image</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary update">Update</button>
            </div>
        </form>
      </div>
    </div>
  </div>
  {{-- edit modal end --}}




    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>

<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>

<script>
    $(document).ready(function(){
        //add item
       $(document).on('click','.submit',function(e){
        e.preventDefault();
        //alert('submitted');
        formData = new FormData($('#addItemForm')[0]);

        $.ajax({
            method:'POST',
            url:'/store/item',
            data:formData,
            cache:false,
            processData: false,
            contentType: false,

            success:function(response){
              $('.alert').show();
              $('.alert').html('Item added successfully.');
              $('#addItemForm')[0].reset();
              $('#addItemModal').modal('hide');
              $('.table').load(location.href+' .table');
            },
        });
       });
        //add item end

        //show data in edit modal
        $(document).on('click','.edit',function(e){
            e.preventDefault();
            let id = $(this).data('id');
            //alert(id);
            $('#editItemModal').modal('show');

            $.ajax({
                method:'GET',
                url:'/edit/item/'+id,
                success:function(response){
                      //console.log(response);
                      $('#e_name').val(response.item.name);
                      $('#e_price').val(response.item.price);
                      $('#edit_id').val(id);
                },
            });
        });
        //show data in edit modal end

        //update item
        $(document).on('click','.update',function(e){
            e.preventDefault();
            let id = $('#edit_id').val();

            let editData = new FormData($('#editItemForm')[0])

            $.ajax({
            method:'POST',
            url:'/update/item/'+id,
            data:editData,
            cache:false,
            processData: false,
            contentType: false,

            success:function(response){
              $('.alert').show();
              $('.alert').html('Item updated successfully.');
              $('#editItemForm')[0].reset();
              $('#editItemModal').modal('hide');
              $('.table').load(location.href+' .table');
            },
        });
        });
        //update item end

        //delete item
        $(document).on('click','.delete',function(e){
            e.preventDefault();
            let id = $(this).data('id');
            //alert(id);
           if(confirm('Are you sure to delete this item permanently????')){
            $.ajax({
            method:'GET',
            url:'/delete/item/'+id,


            success:function(response){
              $('.alert').show();
              $('.alert').html('Item deleted successfully.');
              $('.table').load(location.href+' .table');
            },
        });
           }
        });
        //delete item end
    });
</script>
