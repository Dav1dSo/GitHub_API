<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SearchController extends Controller
{
    public function Search(Request $request) {
        $repositorioPesquisado = $request->search;

    }

    public function ServiceApi(Request $request) {
        $Search = $request->search; // nome pesquisado
        $url = "https://api.github.com/users/{$Search}/repos"; 
        $response = Http::get($url);
        $resjson = $response->json();
        $repositorios = $resjson;
        $quantRepositorios = count($repositorios); // quantidade de repositorios
        
        $urlCommit = "https://api.github.com/repos/OWNER/REPO/stats/contributors";  

        // return view('Show_Repositorios', 
        //     [
        //         'repositorios' => $repositorios,
        //         'search' => $Search
        //     ]);



        // return response($res);

    }
}
