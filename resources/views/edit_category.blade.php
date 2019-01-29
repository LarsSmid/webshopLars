@extends('layouts.app')

@section('content')
<form method="post" action="/category/edit" >
		@csrf
	<div class="modal-body">
		<div class="form-group">
		    <label for="name">Name </label>
		    <input type="text" class="form-control" id="name" name="name" placeholder="Enter category" value="{{$category['name']}}">
		</div>
	</div>
	<div style="display: none;">
		<input type="hide" class="form-control" id="id" name="id" value="{{Request::segment(2)}}">
	</div>
	<div class="modal-footer">
		<a href="/home"><button type="button" class="btn btn-secondary" data-dismiss="modal"> Back</button></a>
		<button type="submit" class="btn btn-primary">Save</button>
	</div>
</form>
@endsection