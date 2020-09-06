@extends('layouts.app')
@section('extra-js')

<script type="text/javascript">
  function toggleReplyComment(id)
  {
    let element = document.getElementById('replyComment-'+ id);
    element.classList.toggle('d-none');
  }
</script>

@endsection
@section('content')

<div class="container">
	<div class="card">
      <div class="card-body">
          <h5 class="card-title">{{ $topic->title }}</h5>
          <p>{{$topic->content}}</p>
          <div class="d-flex justify-content-between align-items-center">
               <small>Publié le {{ $topic->created_at->format('d/m/Y à H:m')}}</small>    
               <span class="badge badge-danger">{{ $topic->user->name }}</span>
          </div>
      <div class="d-flex justify-content-between align-items-center mt-3">
          @can('update',$topic)
          <a href="{{route('topics.edit',$topic)}}" class="btn btn-danger">Editer</a>
          @endcan
          @can('delete',$topic)
          <form action="{{ route('topics.destroy', $topic)}}" method="POST">
               {{csrf_field()}}
               {{ method_field('DELETE') }}
               <button type="submit" class="btn btn-dark">Supprimer</button>
          </form>
          @endcan
      </div>   
     </div>
</div>
<hr>
<h5>Commentaires</h5>
@forelse($topic->comments as $comment)
<div class="card mb-2">
  <div class="card-body">
    {{ $comment->content }}
    <div class="d-flex justify-content-between align-items-center">
    <small>Publié le {{ $comment->created_at->format('d/m/Y à H:m')}}</small> 
    <span class="badge badge-danger">{{ $comment->user->name }}</span>     
    </div>
  </div>
</div>

@foreach($comment->comments as $replyComment)

<div class="card mb-2 ml-5">
  <div class="card-body">
    {{ $replyComment->content }}
    <div class="d-flex justify-content-between align-items-center">
    <small>Publié le {{ $replyComment->created_at->format('d/m/Y à H:m')}}</small> 
    <span class="badge badge-danger">{{ $replyComment->user->name }}</span>     
    </div>
  </div>
</div>

@endforeach


@auth 
<button id="CommentReplyId" class="btn btn-info mb-3 " onclick="toggleReplyComment({{$comment->id}})">Répondre</button>

<form action="{{ route('comments.storeReply',$comment)}}" method="POST" class=" mb-3 ml-5 d-none" id="replyComment-{{ $comment->id }}">
  {{csrf_field()}}
  <div class="form-group">
    <label for="replyComment">Ma réponse</label>
    <textarea name="replyComment" id="replyComment" class="form-control @error('replyComment') is-invalid @enderror" rows="5" ></textarea>
    @error('replyComment')
    <div class="invalid-feedback">{{ $errors->first('replyComment')}}</div>
    @enderror
  </div>
<button class="btn btn-primary" type="submit">Répondre à ce commentaire</button>
</form>
@endauth
@empty
<div class="alert alert-info">Aucun commentaire pour ce sujet</div>
@endforelse
<form action="{{ route('comments.store',$topic)}}" method="POST" class="mt-3">
{{csrf_field()}}
<div class="form-group">
  <label for="content">Votre commentaire</label>
  <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" rows="5"></textarea>
  @error('content')
<div class="invalid-feedback">{{ $errors->first('content')}}</div>
@enderror
</div>

<button type="submit" class="btn btn-primary">Soumettre mon commentaire</button>
</form>
</div>
@endsection