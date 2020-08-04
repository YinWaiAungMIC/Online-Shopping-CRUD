@extends('backendtemplate')
@section('title','Items')
@section('css')
  <link href="{{ asset('backend_template/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@section('content')

<div class="container-fluid">
	<h2 class="d-inline-block">Items List</h2>
	<a href="{{route('items.create')}}" class="btn btn-success float-right btn-sm">Add New</a>
	<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">CodeNo</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col" colspan="2">Action</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($items as $item)
    <tr>
      <input type="hidden" name="" id="deleteser" value="{{$item->id}}" >
      <td>{{$item->id}}</td><!-- table's column name -->
      <td>{{$item->codeno}}
      <a href="{{route('items.show',$item->id)}}" class="d-block"><span class="badge badge-primary badge-pill ml-2"><i class='fas fa-eye'></i></span></a>

      <a href="#" class="detailBtn" data-photo="{{asset($item->photo)}}" data-name="{{$item->name}}" data-codeno="{{$item->codeno}}" data-price="{{$item->price}}" data-description="{{$item->description}}"><span class="badge badge-success badge-pill ml-2"  ><i class='fas fa-eye'></i></span></a>

      </td>
      <td>{{$item->name}}</td>
      <td>{{$item->price}}</td>
      <td>
      	<a href="{{route('items.edit',$item->id)}}" class="btn btn-warning ">Edit</a>
       <form method="post" action="{{route('items.destroy',$item->id)}}" class="d-inline-block" id="delete-item{{ $item->id }}">
      		@csrf
      		@method('DELETE')
      	
        <input type="submit" class="btn btn-danger btn-flat btn-sm " value="Delete"> 
      	
      	</form>  
        
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

</div>
<!-- Detail Modal -->
<div class="modal" id="detailModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title name"></h4>

      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <img src="" class="img-fluid itemImg">
          </div>
          <div class="col-md-6 content">
            
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

@endsection

 @section('script')
<script type="text/javascript">
  
    $(document).ready(function(){
      $('.detailBtn').click(function(){
        var photo=$(this).data('photo');
        var name=$(this).data('name');
        var codeno=$(this).data('codeno');
        var price=$(this).data('price');
        var description=$(this).data('description');
        
        
        $('.itemImg').attr('src',photo);
        $('.name').text(name);
        $('.content').html(`<p>${codeno}</p>
                            <p>${price}</p>
                            <p>${description}</p>`);
        $('#detailModal').modal('show');

      })
      // body...
    })
  </script>

@endsection




 