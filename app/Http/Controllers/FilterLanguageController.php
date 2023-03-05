<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\Repositorios;
use Illuminate\Support\Facades\DB;

class FilterLanguageController extends Controller
{
    public function FilterLanguage(Request $request) {
        $filter = $request->filter;
        $selectFilter = DB::table('repositorios')->where('linguagem', '=' , "{$filter}")->get(); 

        return view('FilterRepositorios', [
            'filters' => $selectFilter,
            'reqFilter' => $filter
        ]);

    }
}
