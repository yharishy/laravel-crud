@extends('layouts.app')


@section('content')
    
	<div id="content">

		<!--  start page-heading -->
		<nav aria-label="breadcrumb">
		  <ol class="breadcrumb">
		    <li class="breadcrumb-item active" aria-current="page">Items List <a href="/admin/items/create"><span class="badge badge-secondary">Add New</span></a></li>
		  </ol>
		</nav>		
		<!-- end page-heading -->
		<div class="input-group mb-3">
		  <div class="input-group-prepend">
		    <span class="input-group-text" id="inputGroup-sizing-default">Search</span>
		  </div>
		  <input name="name" type="text" class="form-control" id="exampleInput1" aria-describedby="emailHelp" placeholder="Enter name" value="{{old('name', isset($item) ? $item->name : null)}}" autocomplete="off">
		</div>



		@if(@$message)						
			<div class="alert alert-success" role="alert">{{{ $message }}}</div>
		@endif

		<table border="0" width="100%" cellpadding="0" cellspacing="0" id="items-table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Email</th>
					<th>Status</th>
					<th>Created At</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody></tbody>
		</table>		

	</div>
	
@endsection


{{-- Scripts --}}
@section('scripts')
    @parent  
    
	<link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

	<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">
	$(function() {
		
		$('#items-table').DataTable({
			processing: true,
			serverSide: true,
			ajax: '{{ URL::to("admin/items/data") }}',
			columns: [
				{data: 'id', name: 'id'},
				{data: 'name', name: 'name'},
				{data: 'email', name: 'email'},
				{data: 'status', name: 'status'},			
				{data: 'created_at', name: 'created_at'},						
				/*{data: 'actions', name: 'actions', orderable: false, searchable: false}		*/
			],
		    drawCallback: function( settings ) {
		    	$('#users-table tbody tr').each(function() {

		    		var firsttd = $(this).find('td:first');

					if(firsttd.hasClass('dataTables_empty')) {

						var colspanval = firsttd.attr('colspan');
						firsttd.attr('colspan', colspanval+1);

					} else {
		    			var id = firsttd.text();
		    			var actioncol = $('div#actioncolumndata').html().replace(/##ID##/g, id);
		    			$(this).append('<td>'+actioncol+'</td>');
		    		}
		    	});
		    }			
		});  
            
    });
    </script>    
@stop