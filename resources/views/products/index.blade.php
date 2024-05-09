@extends('products.layout')
 
@section('content')


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="{{ route('products.store') }}" method="POST">
    @csrf
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Detail:</strong>
                <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail"></textarea>
            </div>
        </div>
        <!-- <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        </div> -->
    </div>
        </div>
        <div class="modal-footer">
            <input type="hidden" name="id" value=""/>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
        </div>
    </div>
    </form>
</div>

    <div class="row">
        <div class="col-lg-12 margin-tb mt-4 mb-4">
            <div class="pull-left">
                <h2>Laravel 8 CRUD Example from scratch - solusikoding.com</h2>
            </div>
            <div class="pull-right">
                <!-- <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a> -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Launch demo modal</button>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->detail }}</td>
            <td>
                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
   
                    <!-- <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a> -->
                    <!-- <a href="#" class="btn-show" data-data="{{json_encode($product)}}">Show</a> -->
    
                    <a class="btn btn-primary btn-edit" data-data="{{json_encode($product)}}" href="#">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $products->links() !!}

<script>
$( document ).ready(function() {
    console.log( "ready!" );
    // alert('test');
    $('.btn-edit').click(function(){
        _data = jQuery.parseJSON($(this).attr('data-data'));

        $('input[name=id').val('')
        $('input[name=name').val('')
        $('textaarea[name=detail').val('')

        $('input[name=id').val(_data.id)
        $('input[name=name]').val(_data.name)
        $('textarea[name=detail]').val(_data.detail)
        
        $('#exampleModal').modal('show');
    })
});
</script>
@endsection