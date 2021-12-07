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
        $sessionName = 'domain';
        if ($request->session()->exists($sessionName)) {
            $request->session()->remove($sessionName);
        }

        return view('pages.home', ['practices' => Practice::allPublished()]);
    }

    /**
     * Go to a domain page by slug.
     *
     * @param \Illuminate\Http\Request $request The HTTP request.
     * @param string                   $slug The slug name
     *
     * @return View
     */
    final public function bySlug(Request $request, string $slug): View
    {
        $sessionName = 'domain';
        $domain = Domain::whereSlug($slug)->first();
        if (!$request->session()->exists($sessionName)) {
            $request->session()->put($sessionName, $domain);
        }
        $practices = Practice::allPublishedBy('domain', $slug, true);

        return view('pages.domain', compact('practices', 'domain'));
    }
}
