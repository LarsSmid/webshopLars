@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="container">
			<div style="margin: 3px" class="btn-group float-right">
				<a><button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Add product</button></a>
				<a href="/home"><button type="button " class="btn btn-primary" >Home</button></a>
			</div>
			<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Add product</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      	<form method="post" action="/products/create" >
			      		@csrf
						<div class="modal-body">
							<div class="form-group">
							    <label for="name">Name</label>
							    <input type="text" class="form-control" id="name" name="name" placeholder="Enter category">
							</div>
						</div>
						<div class="modal-body">
							<div class="form-group">
							    <label for="name">Price </label>
							    <input type="number" class="form-control" id="price" name="price" placeholder="Enter price">
							</div>
						</div>
						<div style="display: none;">
							<input type="hide" class="form-control" id="category_id" name="category_id" value="{{Request::segment(2)}}">
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Save</button>
						</div>
			  		</form>
			    </div>
			  </div>
			</div>
		    <table id="example" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%"> 
		    	<thead> 
		    		<tr> 
		    			<th style="min-width: 500px;">Name </th>
		    			<th>
		    				Price
		    			</th>
		    			<th>
		    				Amount
		    			</th>
		    			<th>
		    				
						</th>
		    		</tr>
		    	</thead> 
		    	<tbody> 
		    		@foreach ($products as $product)
		    	
			    		<tr>
			    			<td>{{ $product->name }}</a></td>
			    			<td>{{ $product->price }}</td>
			    			<td>
								<form method="post" action="{{ Route('add', ['id' => $product->id])}}" >
				      				<div class="input-group mb-3">
										<input type="amount" class="form-control" id="amount" name="amount" value="{{ $product['amount']}}">
										<div class="input-group-append">
											{{csrf_field()}}
										    <button type="submit" class="btn btn-success" action="">Add to cart</button>
										</div>
									</div>
								</form>
				    		</td>
			    			<td>
								<a href="/getEditProduct/{{$product->id}}"><button type="button" class="btn btn-info">Edit</button></a>
								<a href="/products/delete/{{$product->id}}"><button type="button" class="btn btn-danger">Delete</button></a>
							</td>
			    		</tr>
		    		@endforeach
		    	</tbody>
			</table>
		</div>
	</div>
</div>
@endsection
