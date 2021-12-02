<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\Practice;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Foundation\Application;

class DomainController extends Controller
{

    final public function index(Request $request): Factory|View|Application
    {
        $sessionName = 'domain';
        if ($request->session()->exists($sessionName)) {
            $request->session()->remove($sessionName);
        }

        return view('pages.home', ['practices' => Practice::allPublished()]);
    }

    final public function bySlug(Request $request, string $slug): Factory|View|Application
    {
        $sessionName = 'domain';
        $domain = Domain::where('slug', $slug)->first();
        if (!$request->session()->exists($sessionName)) {
            $request->session()->put($sessionName, $domain);
        }
        $collection = Practice::allPublishedBy('domain', $slug, true);

        return view('pages.domain', ['practices' => $collection, 'domain' => $domain]);
    }
}
