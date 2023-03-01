<?php

namespace App\Http\Controllers;
// namespace Illuminate\Support\Facades\URL;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use  App\Models\Repositorios;

class SearchController extends Controller
{

    public function ServiceApi(Request $request) {
        // Chamada para rpositorios
        $Search = $request->search; // nome pesquisado
        // $url = "https://api.github.com/users/{$Search}/repos"; 
        $response = Http::withToken('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')->get("https://api.github.com/users/{$Search}/repos");;
        $resjson = $response->json();
        $repositorios = $resjson;
        $quantRepositorios = count($repositorios); // quantidade de repositorios

        
        // Save values
        $reposSave = new Repositorios;
        
        foreach($repositorios as $repos){
            // Chamada para commits

            $commitsUrl = Http::withtoken('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')->get("https://api.github.com/repos/{$Search}/{$repos['name']}/commits");
            $commitsRes = $commitsUrl->json();
            $commits = $commitsRes; 

            $reposSave->node_id = $repos['id'];
            $reposSave->name = $repos['name'];
            $reposSave->url = $repos['html_url'];
            $reposSave->organizacao = $repos['owner']['login'];
            $reposSave->linguagem = $repos['language'];
            $reposSave->imagem = $repos['owner']['avatar_url'];
            $reposSave->commits = $repos['size'];
        };
        
        dd($commits);


        // return view('Show_Repositorios', 
        //     [
        //         'repositorios' => $reposSave,
        //         'search' => $Search
        //     ]);
    }
}
