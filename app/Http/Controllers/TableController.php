<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use jcobhams\NewsApi\NewsApi;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;

class TableController extends Controller
{
    public function tableJS()
    {
        return view('table-js');
    }

    public function tablePHP(Request $request)
    {
        $page = $request->get('page', 1);

        $newsapi = new NewsApi(env('NEW_API_KEY', ''));

        $allArticles = $newsapi->getEverything('bitcoin', null, null, null, null, null, null, null, null, $page);
        $articles = $newsapi->getEverything('bitcoin', null, null, null, null, null, null, null, 10, $page);
        $articles = $articles->articles;  

        $paginate = new Paginator($articles, count($allArticles->articles), 10, $page, ["path" => 'table-php']);

        return view('table-php', compact('articles', 'paginate'));
    }
}
