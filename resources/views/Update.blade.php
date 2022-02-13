@extends('layout')

@section('content')

<div class="container">
	<div class="row mt-5">
		<div class="col-md-8 m-auto">
			<div class="card card-body">
				<form action="{{route('update.postUpdate')}}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="row justify-content-center my-5">
  						<div class="text-center">
							<img src="{{asset('storage/uploads/' . $image->file)}}" alt="" width=500>
						</div>
						<input type="hidden" name="id" value='{{$image->id}}'>
						<div class="col-sm-10 form-group mt-3">
							@if($errors->has('file'))
								<input type="file" name="file" class="form-control border-danger">
								<small class="text-danger">@error('file'){{$message}}@enderror</small>
							@else
								<input type="file" name="file" class="form-control">
							@endif
						</div>
						<div class="col-sm-10 form-group mt-2">
							@if($errors->has('name'))
								<input type="text" name="name" class="form-control border-danger" placeholder="Pic Name">
								<small class="text-danger">@error('name'){{$message}}@enderror</small>
							@else
								<input type="text" name="name" class="form-control" placeholder="Pic Name" value="{{$image->name}}">
							@endif
						</div>
						<div class="col-sm-10 form-group mt-2">
							@if($errors->has('story'))
								<textarea name="story" id="story" class="form-control border-danger" placeholder="Write Pic Story..."></textarea>
								<small class="text-danger">@error('story'){{$message}}@enderror</small>
							@else
								<textarea name="story" id="story" class="form-control" placeholder="Write your Pic Story...">{{$image->story}}</textarea>
							@endif
						</div>
						<div class="col-sm-10 form-group mt-4">
							<input type="submit" value="Update" class="btn btn-success form-control">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection