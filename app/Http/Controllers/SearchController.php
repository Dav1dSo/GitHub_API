<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use  App\Models\Repositorios;

class SearchController extends Controller
{

    public function ServiceApi(Request $request) {
        // Conexão com Api
        $Search = $request->search; // nome pesquisado
        $url = "https://api.github.com/users/{$Search}/repos"; 
        $response = Http::get($url);
        $resjson = $response->json();
        $repositorios = $resjson;
        $quantRepositorios = count($repositorios); // quantidade de repositorios

        // Save values
        $reposSave = new Repositorios;

        foreach($repositorios as $repos){
            $reposSave->node_id = $repos['id'];
            $reposSave->name = $repos['name'];
            $reposSave->url = $repos['html_url'];
            $reposSave->organizacao = $repos['owner']['login'];
            $reposSave->linguagem = $repos['language'];
            $reposSave->imagem = $repos['owner']['avatar_url'];
            $reposSave->commits = $repos['size'];
        };
        
        return view('Show_Repositorios', 
            [
                'repositorios' => $reposSave,
                'search' => $Search
            ]);
    }
}
