@extends('layouts.app')


@section('content')
    
	<div id="content">

		<!--  start page-heading -->
		<nav aria-label="breadcrumb">
		  <ol class="breadcrumb">
		    <li class="breadcrumb-item active" aria-current="page">Search Items <a href="/admin/items"><span class="badge badge-secondary">Go to Main List</span></a></li>
		  </ol>
		</nav>			
		<!-- end page-heading -->
		@if(@$message)						
			<div class="alert alert-success" role="alert">{{{ $message }}}</div>
		@endif

		<table border="0" width="100%" cellpadding="0" cellspacing="0" id="items-table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Brand</th>
					<th>Price</th>
					<th>Created At</th>
					<th>Updated At</th>
				</tr>
			</thead>
			<tbody></tbody>
		</table>		

	</div>


	
	
@endsection


@section('scripts')
    @parent  
    

	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

	<script src="https://code.jquery.com/jquery-3.4.1.min.js" defer></script>
	<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" defer></script>

    <script type="text/javascript">

	$(document).ready(function() {
		$('#items-table').DataTable( {
		    serverSide: true,
		    ajax: {
		        url: '{{ URL::to("admin/items/data") }}',
		        type: 'GET'
		    },
		    columns: [
				{data: 'id', name: 'id'},
				{data: 'name', name: 'name'},
				{data: 'brand', name: 'brand'},
				{data: 'amount', name: 'amount'},			
				{data: 'created_at', name: 'created_at'},						
				{data: 'updated_at', name: 'updated_at'},						
				/*{data: 'actions', name: 'actions', orderable: false, searchable: false}		*/
			],
		} );    		
	} );
    </script>   
 
@stop