<?php

namespace App\Http\Controllers;

use App\Models\Practice;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Foundation\Application;

class DomainController extends Controller
{

    final public function index(Request $request): Factory|View|Application
    {
        $request->session()->remove('domain');

        return view('pages.home', ['practices' => Practice::allPublished()]);
    }

    final public function bySlug(Request $request, string $slug): Factory|View|Application
    {
        $request->session()->put('domain', $slug);
        $collection = Practice::allPublishedBy('domain', $slug, true);

        return view('pages.domain', ['practices' => $collection]);
    }
}
