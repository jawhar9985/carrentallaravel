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

<div class="uper">

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  
  <table class="table table-striped">

    <thead>
        <tr>
          <td>ID</td>
          <td>Marque</td>
          <td>Prix/jour</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>

    <tbody>
      
        @foreach($voiture as $voiture)

        <tr>
            <td>{{$voiture->id}}</td>
            <td>{{$voiture->marque}}</td>
            <td>{{$voiture->prix}}</td>
            <td><a href="{{ route('voitures.edit', $voiture->id)}}" class="btn btn-primary">Modifier</a></td>
            <td>
                <form action="{{ route('voitures.destroy', $voiture->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  <a href="{{ route('voitures.create')}}" class="btn btn-primary">Ajouter une voiture</a>
  
<div>
@endsection