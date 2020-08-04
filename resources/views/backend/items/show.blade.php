@extends('backendtemplate')
@section('title','Subcategories')

@section('content')

<div class="container-fluid">
	<center><h2>Product Detail</h2></center>

	<div class="container-fluid my-5">
		<div class="row">
			<div class="col col-md-4">
				<img src="{{asset($item->photo)}}" class="img-fluid">
			</div>
			<div class="col col-md-8">
				<table class="table table-bordered">
					<tbody>
						<tr>

							<td>Product Name:</td>
							<td>"{{$item->name}}"</td>
						</tr>
						<tr>

							<td>Product Code:</td><!-- table's column name -->
							<td>"{{$item->codeno}}"</td>
						</tr>
						<tr>

							<td>Product Price:</td><!-- table's column name -->
							<td>"{{$item->price}}"</td>
						</tr>
						<tr>

							<td>Description:</td><!-- table's column name -->
							<td>"{{$item->description}}"</td>
						</tr>


					</tbody>
				</table>

			</div>
		</div>
	</div>
</div>

@endsection