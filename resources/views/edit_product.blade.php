@extends('layouts.app')

@section('content')
<form method="post" action="/products/edit" >
		@csrf
	<div class="modal-body">
		<div class="form-group">
		    <label for="name">Name </label>
		    <input type="text" class="form-control" id="name" name="name" placeholder="Enter product" value="{{$product['name']}}">
		</div>
	</div>
	<div class="modal-body">
		<div class="form-group">
		    <label for="name">Price </label>
		    <input type="number" class="form-control" id="price" name="price" placeholder="Enter price" value="{{$product['price']}}">
		</div>
	</div>
	<div style="display: none;">
		<input type="hide" class="form-control" id="id" name="id" value="{{Request::segment(2)}}">
	</div>
	<div class="modal-footer">
		<a href="/products/{{$product['category_id']}}"><button type="button" class="btn btn-secondary" data-dismiss="modal"> Back</button></a>
		<button type="submit" class="btn btn-primary">Save</button>
	</div>
</form>
@endsection