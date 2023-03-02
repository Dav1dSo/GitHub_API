@extends('layouts.Main')

@section('10primeiros')
 
<div class="col-lg-8 my-5 mx-auto">
    <h1 class="display-5 text-center">Pesquisado: {{ $search }}</h1>
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
        @foreach ($repositorios as $repo)
        <tr>
            <td scope="row">{{ $repo['id'] }}</td>
            <td> {{ $repo['name'] }} </td>
            <td> {{ $repo['html_url'] }} </td>
            <td> {{ $repo['owner']['login'] }} </td>
            <td> {{ $repo['language'] }} </td>
            <td> {{ $commits }} </td>
        </tr>
        @endforeach
    </tbody>
    </table>
@endsection
