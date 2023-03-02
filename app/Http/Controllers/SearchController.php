<?php

namespace App\Http\Controllers;
// namespace Illuminate\Support\Facades\URL;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use  App\Models\Repositorios;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SearchController extends Controller
{

    public function ServiceApi(Request $request) {

        // Chamada para rpositorios
        $Search = $request->search; // nome pesquisado

        $response = Http::withToken('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')->get("https://api.github.com/users/{$Search}/repos");
        $resjson = $response->json();
        $repositorios = $resjson;
        $quantRepositorios = count($repositorios); // quantidade de repositorios  
        
        // Save values
        $reposSave = new Repositorios;
        
        foreach($repositorios as $repos){
            // Chamada para commits

            $commitsUrl = Http::withtoken('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')->get("https://api.github.com/repos/{$Search}/{$repos['name']}/commits");
            $commitsRes = $commitsUrl->json();
            $commits = sizeof($commitsRes);
            $commit = strval($commits);

            $reposSave->node_id = $repos['id'];
            $reposSave->name = $repos['name'];
            $reposSave->url = $repos['html_url'];
            $reposSave->organizacao = $repos['owner']['login'];
            $reposSave->linguagem = $repos['language'];
            $reposSave->imagem = $repos['owner']['avatar_url'];
            $reposSave->commits = $commit;

            if( $commit > 10 ) {
                $reposSave->save();
            }
        }

        // Verifica se já não existe o mesmo repositorio cadastrodo
        // $verifyId = DB::table('repositorios')
        // ->selectRaw(' node_id ')->get();

        // if($verifyId !== $reposSave->commits){
        // }


        return view('Show_Repositorios', 
            [  
                'repositorios' => $repositorios,
                'search' => $Search, 
                'commits' => $commit
            ]);
    }
}
