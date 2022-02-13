@extends('layout')

@section('content')

<div class="container">
	<div class="row m-auto">
		<div class="col-md-16 mt-5">
			<div class="card card-body">
				@if($images->isEmpty())
					<h1 class="text-secondary text-center">Image Not Found</h1>
				@else
					@if(Session::has('status'))
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							<div class="text-center">{{Session::get('status')}}</div>
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
					@endif
					<div class="row row-cols-1 row-cols-md-3 g-4">
						@foreach($images as $image)
							<div class="col">
								<div class="card h-100">
									<img src={{asset('storage/uploads/' . $image->file)}} class="card-img-top" alt="...">
									<div class="card-body">
										<h5 class="card-title text-center">{{$image->name}}</h5>
										<p class="text-center">{{$image->story}}</p>
									</div>
									<div class="d-grid d-md-block text-center mb-2">
										<a href="/update/{{$image->id}}" class="btn btn-info col-md-5">Edit</a>
										<a href="/delete/{{$image->id}}" class="btn btn-danger col-md-5">Delete</a>
									</div>
								</div>
							</div>
						@endforeach
					</div>
				@endif
			</div>
		</div>
	</div>
</div>

@endsection