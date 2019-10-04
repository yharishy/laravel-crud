@extends('layouts.app') 


@section('content')

	<div id="content">

		<!--  start page-heading -->
		<nav aria-label="breadcrumb">
		  <ol class="breadcrumb">
		    <li class="breadcrumb-item active" aria-current="page">@if (isset($item)) Edit @else Create @Endif Item <a href="{{ URL::to('admin/items') }}"><span class="badge badge-secondary">Back to Listing</span></a></li>
		  </ol>
		</nav>		
		<!-- end page-heading -->		

		@if(@$message)						
			<div class="alert alert-success" role="alert">{{{ $message }}}</div>
		@endif

		<form method="post" action="@if (isset($item)){{ URL::to('admin/items/' . $item->id . '/edit') }}@endif" autocomplete="off">
			<div class="form-group">
			<label for="exampleInput1">Name</label>
			<input name="name" type="text" class="form-control" id="exampleInput1" aria-describedby="emailHelp" placeholder="Enter name" value="{{old('name', isset($item) ? $item->name : null)}}">
			</div>

			<div class="form-group">
			<label for="exampleInput2">Brand</label>
			<input name="brand" type="text" class="form-control" id="exampleInput2" placeholder="Enter Brand" value="{{old('brand', isset($item) ? $item->brand : null)}}">
			</div>		  

			<div class="form-group">
			<label for="exampleInput3">Detail</label>
			<textarea name="detail" class="form-control" id="exampleInput3" rows="3">{{old('detail', isset($item) ? $item->detail : '')}}</textarea>
			</div>

			<div class="form-group">
			<label for="exampleInput4">Price</label>
			<input name="amount" type="number" class="form-control col-sm-2" id="exampleInput4" placeholder="Enter Price" value="{{old('amount', isset($item) ? $item->amount : null)}}">
			</div>

			<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />	
		  	<button name="submit" type="submit" class="btn btn-primary">Submit</button>
		</form>

	</div>

@stop 

@section('scripts')
    @parent
  
@stop
