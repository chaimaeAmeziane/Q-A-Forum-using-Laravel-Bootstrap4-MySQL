@extends('layouts.app')
@section('content')

<div class="container">
 <form action="{{ route('contact.store') }}" method="POST">
 {{ csrf_field() }}
 <div class="form-group">
    <h3>Contact Us</h3>
 </div>
 <hr>
 <div class="form-group">
   <label for="nom">Nom</label>
   <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom')}}">
   @error('nom')
   <div class="invalid-feedback">{{ $errors->first('nom')}}</div>
   @enderror
</div>  
 <div class="form-group">
   <label for="mail">E-mail</label>
   <input type="text" class="form-control @error('mail') is-invalid @enderror" name="mail" value="{{ old('mail')}}">
   @error('mail')
   <div class="invalid-feedback">{{ $errors->first('mail')}}</div>
   @enderror
</div>  
<div class="form-group">
   <label for="msg">Message</label>
   <textarea name="msg" id="msg" class="form-control @error('msg') is-invalid @enderror" rows="5">{{ old('msg')}}</textarea>
    @error('msg')
   <div class="invalid-feedback">{{ $errors->first('msg')}}</div>
   @enderror
</div>    
<div class="form-group">
<button type="submit" class="form-control btn btn-outline-info">Envoyer</button>
</div>
</form>
</div>
@endsection