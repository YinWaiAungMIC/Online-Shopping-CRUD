@extends('frontendtemplate')
@section('title','Item Detail')

@section('content')

<div class="container">
	
	<div class="container-fluid my-4">
	<center><h2>Product Detail</h2></center>

	
		<div class="row my-4">
			<div class="col col-md-4">
				<img src="{{asset($item->photo)}}" class="img-fluid">
			</div>
			<div class="col col-md-8">
				<!-- <table class="table table-bordered">
					<tbody>
						<tr>

							<td>Product Name:</td>
							<td>"{{$item->name}}"</td>
						</tr>
						<tr>

							<td>Product Code:</td>
							<td>"{{$item->codeno}}"</td>
						</tr>
						<tr>

							<td>Product Price:</td>
							<td>"{{$item->price}}"</td>
						</tr>
						<tr>

							<td>Description:</td>
							<td>"{{$item->description}}"</td>
						</tr>


					</tbody>
				</table> -->
				
        <p>Product Name:{{$item->name}}</p>
        <p>Product Price:{{$item->price}}</p>
        
        
				<div class="row">
					<div class="col">
						<a href="{{route('cart')}}" class="btn btn-success btn-sm add_to_cart" data-photo="{{asset($item->photo)}}" data-name="{{$item->name}}" data-id="{{$item->id}}" data-price="{{$item->price}}" data-description="{{$item->description}}"><i class='fa fa-shopping-cart'></i>Add to Cart</a>
					</div>
				</div>

			</div>

		</div>
		<

	


</div>

@endsection

@section('script')

<script type="text/javascript" src="{{asset('frontendtemplate/js/custom.js')}}">

	
</script>

@endsection