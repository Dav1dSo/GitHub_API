@extends('layouts.Main')

@section('navbar')
  <nav id="navbar" class="navbar navbar-expand-lg bg-body-blue">
    <div>
        <a href="/">
            <img src="https://icones.pro/wp-content/uploads/2021/06/icone-github-orange.png" alt="">
        </a>
    </div>
    <div>
        <form action="/filterLanguage" id="search" class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="Filter language" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
  </nav>
@endsection

@section('10primeiros')

@foreach ( $repositorios as $repo) @endforeach

<div class="col-lg-8 my-5 mx-auto">
    <h1 class="display-5 text-center">Última pesquisa: {{ $search }}</h1>
    <h2 class="text-center lead">Selecionados os 10 Primeiros repositórios !</h2>
    <img id="avatar" src="{{ $repo->imagem}}" alt="">
</div> 
<table id="table" class="table table-bordered">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nome do Repositório</th>
            <th scope="col">Url</th>
            <th scope="col">Organização</th>
            <th scope="col">Linguagem</th>
            <th scope="col">Commits</th>
        </tr>
    </thead>
    <tbody> 
        @foreach ($repositorios as $repo)
        <tr>
            <td scope="row">{{ $repo->node_id }}</td>
            <td> {{ $repo->name }} </td>
            <td> {{ $repo->url }} </td>
            <td> {{ $repo->organizacao }} </td>
            <td> {{ $repo->linguagem }} </td>
            <td> {{ $repo->commits }} </td>
        </tr>
        @endforeach
    </tbody>
    </table>
@endsection
