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
        
        // Chamada para rpositorios
        $Search = $request->search; // nome pesquisado
        
        $response = Http::withToken('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')->get("https://api.github.com/users/{$Search}/repos");
        $resjson = $response->json();
        $repositorios = array_slice($resjson, 0, 10 );
        $quantRepositorios = count($repositorios); // quantidade de repositorios  
        
        // Save values
        
        foreach($repositorios as $repos){
            // Chamada para commits
            $reposSave = new Repositorios;
   
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

            $url = $repos['html_url'];

            $verifyId = DB::table('repositorios')->where('url', '=' , "{$url}")->get();
            $verifyRes = count($verifyId);
            
            if($verifyRes == 0 && $commit > 10 ){
                $reposSave->save();
            }

        }
        
        $reposResult = Repositorios::all();

        return view('Show_Repositorios', 
            [  
                'repositorios' => $reposResult,
                'search' => $Search, 
                'commits' => $commit
            ]);
    }
}
