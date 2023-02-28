<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function Search(Request $request) {
        $repositorioPesquisado = $request->search;
        return view('Show_Repositorios', ['Repositorio' => $repositorioPesquisado]);
    }
}
