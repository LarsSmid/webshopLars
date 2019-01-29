@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="container">
			<div style="margin: 3px" class="btn-group float-right">
				<a href="/home"><button type="button " class="btn btn-primary" >Home</button></a>
			</div>
			<table id="example" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%"> 
		    	<thead> 
		    		<tr> 
		    			<th style="min-width: 500px;">Number </th>
		    			<th>
		    				Total price
		    			</th>
		    			<th>
		    				Date
						</th>
		    		</tr>
		    	</thead> 
		    	<tbody> 
		    		@foreach ($orders as $order)
		    	
			    		<tr>
			    			<td>{{ $order->id }}</a></td>
			   
			    			<td>€ {{ $order->total_price}}</td>
			    			<td>{{ $order->created_at}}</td>
			    		</tr>
		    		@endforeach
		    	</tbody>
			</table>
		</div>
	</div>
</div>
@endsection
