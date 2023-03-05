@extends('layouts.Main')

@section('content')

@section('navbar')
  <nav id="navbar" class="navbar navbar-expand-lg bg-body-blue">
      <div>
        <a href="/">
          <img src="https://icones.pro/wp-content/uploads/2021/06/icone-github-orange.png" alt=""> 
        </a>
      </div>
  </nav>
@endsection
  <div class="col-lg-8 my-3 mx-auto">
    <h1 class="display-4 text-center">Pesquisar repositórios</h1>
    <p class="text-center lead">Pesquise por organização para obter dados de repositórios!</p>
  </div> 
  <form action="/searchRepositorio" method="POST" class="d-flex" role="search">
    <input name="search" class="form-control me-2" type="search" placeholder="Pesquisar repositório" aria-label="Search">
      @csrf
    <button type="submit" class="btn btn-outline-success" type="submit">Buscar</button>
  </form>
@endsection