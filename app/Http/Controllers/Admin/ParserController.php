<?php

namespace App\Http\Controllers\Admin;

use App\Jobs\JobNewsParsing;
use Illuminate\Http\Request;
use App\Services\Contracts\Parser;
use App\Http\Controllers\Controller;
use App\QueryBuilders\NewsSourcesDataQueryBuilder;

class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, NewsSourcesDataQueryBuilder $sources, Parser $parser)
    {
        $urls = $sources->getUrl();
        foreach ($urls as $url) {
            if ($url['id'] < 3) {
                \dispatch(new JobNewsParsing($url['url'], $url['id']));
            }

            continue;

        }
    }
}
