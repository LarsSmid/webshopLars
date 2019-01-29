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
		    			<th style="min-width: 500px;">Name </th>
		    			<th>
		    				Amount
		    			</th>
		    			<th>
		    				Total price
						</th>
						<th>
							Delete
						</th>
		    		</tr>
		    	</thead> 
		    	<tbody> 
		    		@foreach ($items['data'] as $item)
		    	
			    		<tr>
			    			<td>{{ $item['name'] }}</a></td>
			   
			    			<td>
			    				<form method="post" action="{{ Route('updateItem', ['id' => $item['id']])}}" >
				      			@csrf
				      				<div class="input-group mb-3">
										<input type="amount" class="form-control" id="amount" name="amount" value="{{ $item['amount']}}">
										<div class="input-group-append">
											{{csrf_field()}}
										    <button type="submit" class="btn btn-success" action="">update</button>
										</div>
									</div>
								</form>
				    		</td>
			    			<td>{{ $item['totalPrice']}}</td>
			    			<td>
			    				<a href="/shoppingcart/deleteItem/{{$item['id']}}"><button type="button" class="btn btn-danger">Delete</button></a>
			    			</td>
			    		</tr>
		    		@endforeach
		    	</tbody>
			</table>
			<div>
				<p>Total price: €{{ $items['totalPrice']}}</p>
				<p>Total amount: {{ $items['totalAmount']}}</p>
				@guest

				@else
				<a href="/shoppingcart/placeOrder"><button type="button" class="btn btn-success">Place order</button></a>
				@endguest
			</div>
		</div>
	</div>
</div>
@endsection
