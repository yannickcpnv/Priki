<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\Practice;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class DomainController extends Controller
{

    /**
     * Go to the domains index page.
     *
     * @param Request $request The HTTP request.
     *
     * @return View
     */
    final public function index(Request $request): View
    {
        $request->session()->remove('domain');

        return view('pages.home', ['practices' => Practice::allPublished()]);
    }

    /**
     * Go to a domain page by slug.
     *
     * @param \Illuminate\Http\Request $request The HTTP request.
     * @param string                   $slug    The slug name
     *
     * @return View
     */
    final public function bySlug(Request $request, string $slug): View
    {
        $domain = Domain::whereSlug($slug)->first();
        $request->session()->put('domain', $domain);
        $practices = Practice::allPublishedBy('domain', $slug, true);

        return view('pages.domain', compact('practices', 'domain'));
    }
}
