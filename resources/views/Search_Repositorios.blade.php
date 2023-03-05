@extends('layouts.Main')

@section('navbar')
  <nav id="navbar" class="navbar navbar-expand-lg bg-body-blue">
      <div>
          <img src="https://icones.pro/wp-content/uploads/2021/06/icone-github-orange.png" alt="">
      </div>
      <li type="none" class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Filtrar repositórios</a>
          <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Javascript</a></li>
              <li><a class="dropdown-item" href="#">Python</a></li>
              <li><a class="dropdown-item" href="#">PHP</a></li>
              <li><a class="dropdown-item" href="#"></a></li>
          </ul>
      </li>
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
