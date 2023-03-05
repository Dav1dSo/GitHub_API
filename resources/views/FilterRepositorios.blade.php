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
            <input class="form-control mr-sm-2" type="search" placeholder="Filter language" name="filter" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
  </nav>
@endsection

@section('10primeiros')



<div class="col-lg-8 my-5 mx-auto">
    <h1 class="display-5 text-center">Linguagem pesquisada: {{ $reqFilter }}</h1>
    <h2 class="text-center lead">Selecionados os 10 Primeiros repositórios !</h2>
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
        @foreach ($filters as $filter)
        <tr>
            <td scope="row">{{ $filter->node_id }}</td>
            <td> {{ $filter->name }} </td>
            <td> {{ $filter->url }} </td>
            <td> {{ $filter->organizacao }} </td>
            <td> {{ $filter->linguagem }} </td>
            <td> {{ $filter->commits }} </td>
        </tr>
        @endforeach
    </tbody>
    </table>
@endsection