@extends('layouts.app')
@section('content')

<div class="container">
<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="p3.jpg" class=" img-thumbnail d-inline-block h-100 w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h3 class="text-light">Welcome to LEFORUM</h3>
        <p>La plateforme QUESTION ET RÉPONSE où les questions sont posées, répondues, suivies et éditées par nous, pour vous fournir toutes vos recommandations</p>
      </div>
    </div>
    

    <div class="carousel-item">
      <img src="picture.jpg" class="img-thumbnail d-inline-block h-100 w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5 class="text-light">SHARE</h5>
        <p>N'oubliez pas de partager vos connaissances, vos questions et vos favoris.</p>
      </div>
    </div>
  </div>

  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  </div>



<div class="list-group">
	@foreach($topics as $topic)
	<div class="list-group-item">
		<h4><strong><a href="{{ route('topics.show',$topic)}}">{{ $topic->title }}</a></strong></h4>
		<p>{{$topic->content}}</p>
		<div class="d-flex justify-content-between align-items-center">
		<small>Publié le {{ $topic->created_at->format('d/m/Y à H:m')}}</small>	
		<span class="badge badge-primary">{{ $topic->user->name }}</span>
        
		</div>
	</div>
    @endforeach
</div>
<div class="d-flex justify-content-center mt-3">
	{{ $topics->links()}}
</div>
</div>
@endsection