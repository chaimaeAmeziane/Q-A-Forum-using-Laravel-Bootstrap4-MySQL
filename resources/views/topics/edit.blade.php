@extends('layouts.app')

@section('content')

<div class="container">
	<h1>{{ $topic->title}}</h1>
	<hr>
	<form action=" {{ route('topics.update', $topic)}}" method="POST">
     {{csrf_field()}}
     {{ method_field('PUT') }}
     <div class="form-group">
     	<label for="title">Titre</label>
     	<input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ $topic->title }}">
     	@error('title')
     	<div class="invalid-feedback">{{ $errors->first('title') }}</div>
     	@enderror
     </div>
     <div class="form-group">
     	<label for="content">Description</label>
     	<textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" row="5">{{ $topic->content }}</textarea>
     	@error('content')
     	<div class="invalid-feedback">{{ $errors->first('content') }}</div>
     	@enderror
     </div>
     <button type="submit" class="btn btn-primary">Modifier ce sujet</button>
	</form>
</div>
@endsection