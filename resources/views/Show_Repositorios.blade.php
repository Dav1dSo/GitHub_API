@extends('layouts.Main')

@section('10primeiros')
    <div class="col-lg-8 my-5 mx-auto">
        <h1 class="display-5 text-center">Pesquisado: {{ $Repositorio }}</h1>
        <h2 class="text-center lead">Selecionados os 10 Primeiros repositórios !</h2>
    </div> 
    <table id="table2" class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome do Repositório</th>
                <th scope="col">Url</th>
                <th scope="col">Organização</th>
                <th scope="col">Commits</th>
            </tr>
        </thead>
    <tbody> 
        <tr>
            <td scope="row">1º</td>
            <td> nameReposi </td>
            <td> https:github.com/teste </td>
            <td> {{ $Repositorio }} </td>
            <td> 90 </td>
        </tr>
    </tbody>
    </table>
@endsection
