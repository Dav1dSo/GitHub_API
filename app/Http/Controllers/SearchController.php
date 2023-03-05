<?php

namespace App\Http\Controllers;
// namespace Illuminate\Support\Facades\URL;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use  App\Models\Repositorios;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{

    public function ServiceApi(Request $request) {
        
        // Chamada para repositorios
        $Search = $request->search; // nome pesquisado
        
        $response = Http::withToken('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')->get("https://api.github.com/users/{$Search}/repos");
        $resjson = $response->json();
        $repositorios = array_slice($resjson, 0, 10 );
        $quantRepositorios = count($repositorios); // quantidade de repositorios  
        
        foreach($repositorios as $repos){
            
            // Chamada para commits
            $commitsUrl = Http::withtoken('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')->get("https://api.github.com/repos/{$Search}/{$repos['name']}/commits");
            $commitsRes = $commitsUrl->json();
            $commits = sizeof($commitsRes);
            $commit = strval($commits);

            // Save values
            $reposSave = new Repositorios;

            $reposSave->node_id = $repos['id'];
            $reposSave->name = $repos['name'];
            $reposSave->url = $repos['html_url'];
            $reposSave->organizacao = $repos['owner']['login'];
            $reposSave->linguagem = $repos['language'];
            $reposSave->imagem = $repos['owner']['avatar_url'];
            $reposSave->commits = $commit;

            // Captura url
            $url = $repos['html_url'];

            // Select repositório por url
            $verifyId = DB::table('repositorios')->where('url', '=' , "{$url}")->get();
            $verifyRes = count($verifyId);
            
            // Verifica quantidade de commits e existencia de repositorio ja cadastrado
            if($verifyRes == 0 && $commit > 10 ){
                $reposSave->save();
            }

        }
        // retorno dos dados dobanco
        $reposResult = Repositorios::all();

        return view('Search_Repositorios', 
            [  
                'repositorios' => $reposResult,
                'search' => $Search, 
                'commits' => $commit
            ]);
    }
}
