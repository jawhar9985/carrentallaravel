<!-- create.blade.php -->
@extends('layout')
<head>
<link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="{{asset('js/bootstrap.bundle.min.js')}}" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</head>

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>

<div class="card uper">
  <div class="card-header">
    Ajouter une Voiture
  </div>

  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif

      <form method="post" action="{{ route('voitures.store') }}">
.         @csrf
          <div class="form-group">
              <label for="marque">Marque de Voiture:</label>
              <input type="text" class="form-control" name="marque"/>
          </div>

          <div class="form-group">
              <label for="prix">Prix :</label>
              <input type="text" class="form-control" name="prix"/>
          </div>
          <button type="submit" class="btn btn-primary">Ajouter</button>
      </form>
  </div>
</div>
@endsection