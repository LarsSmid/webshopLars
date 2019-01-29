@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="container">
			<div style="margin: 3px" class="btn-group float-right">
				<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Add category</button>
			</div>
			<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Add category</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      	<form method="post" action="/categories/create" >
			      		@csrf
						<div class="modal-body">
							<div class="form-group">
							    <label for="name">Name</label>
							    <input type="text" class="form-control" id="name" name="name" placeholder="Enter category">
							</div>
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
		    			<th style="min-width: 700px;">Name 
		    				<div class="btn-group float-right" >
			    				<a style="color: grey; margin: 0 2px;" href="/categories/sortCategoriesDesc">
			    					<i class="fas fa-arrow-up"></i>  
			    				</a>
			    				<a style="color: grey;  margin: 0 2px;" href="/categories/sortCategories">
			    					<i class="fas fa-arrow-down"></i>
			    				</a>
		    				</div>
		    			</th>
		    			<th>
		    				
						</th>
		    		</tr>
		    	</thead> 
		    	<tbody> 
		    		@foreach ($categories as $category)
		    		<tr>
		    			<td><a href="/products/{{$category->id}}">{{ $category->name }}</a></td>
		    			<td>
							<a href="/getEditCategory/{{$category->id}}"><button type="button" class="btn btn-info">Edit</button></a>
							<a href="/categories/delete/{{$category->id}}"><button type="button" class="btn btn-danger">Delete</button></a>
						</td>
		    		</tr>
		    		@endforeach
		    	</tbody>
			</table>
		</div>
	</div>
</div>
@endsection
