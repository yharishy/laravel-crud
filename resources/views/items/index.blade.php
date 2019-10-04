@extends('layouts.app')


@section('content')
    
	<div id="content">

		<!--  start page-heading -->
		<nav aria-label="breadcrumb">
		  <ol class="breadcrumb">
		    <li class="breadcrumb-item active" aria-current="page">Items List 
		    	<a href="/admin/items/create"><span class="badge badge-secondary">Add New</span></a>
		    	<a href="/admin/itemlist"><span class="badge badge-secondary">Navigate to Search</span></a>
		    </li>
		  </ol>
		</nav>


		@if(@$message)						
			<div class="alert alert-success" role="alert">{{{ $message }}}</div>
		@endif

		<table class="table table-hover">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Name</th>
		      <th scope="col">Brand</th>
		      <th scope="col">Price</th>
		      <th scope="col">Added On</th>
		      <th scope="col">Updated On</th>
		      <th scope="col">Action</th>
		    </tr>
		  </thead>
		  <tbody>
		    @foreach ($items as $key=>$item)		        
			    <tr>
			      <th scope="row">{{ $items->firstItem() + $key }}</th>
			      <td>{{ $item->name }}</td>
			      <td>{{ $item->brand }}</td>
			      <td>{{ $item->amount }}</td>
			      <td>{{ $item->updated_at }}</td>
			      <td>{{ $item->created_at }}</td>			      			      
				  <td>
				  	<a href="{{ URL::to('admin/items/' . $item->id . '/edit') }}" class="card-link">Edit</a>
				  	<a href="{{ URL::to('admin/items/' . $item->id . '/delete') }}" class="card-link" onclick="return confirm('Are you sure to delete this item?');">Delete</a>
				  </td>
			    </tr>	        
		    @endforeach		    	
		  </tbody>
		</table>

		{{ $items->links() }}		

	</div>
	
@endsection

@section('scripts')
    @parent
     
@stop
