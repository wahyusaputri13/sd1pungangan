<?php

namespace App\Http\Middleware;

use App\Models\Counter;
use Closure;
use Illuminate\Http\Request;
use App\Models\Website;
use App\Models\FrontMenu;
use App\Models\Gallery;
use App\Models\News;
use App\Models\Inbox;
use App\Models\RelatedLink;
use Illuminate\Support\Facades\DB;

class WebHelper
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //its just a dummy data object.
        $data = Website::first();
        $menu = FrontMenu::all();
        $news = News::all()->count();
        $gallery = Gallery::all()->count();
        $counter = Counter::all()->count();
        $inbox = Inbox::all()->count();
        $related = RelatedLink::all();
        // Sharing is caring
        view()->share('data_website', $data);
        view()->share('nav_menu', $menu);
        view()->share('news_all', $news);
        view()->share('gallery_all', $gallery);
        view()->share('counter_web', $counter);
        view()->share('related', $related);
        view()->share('inbox', $inbox);
        return $next($request);
    }
}
