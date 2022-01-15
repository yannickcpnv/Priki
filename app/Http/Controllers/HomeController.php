<?php

namespace App\Http\Controllers;

use App\Models\Practice;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{

    /**
     * Go to the home page.
     *
     * @param Request $request The HTTP request.
     *
     * @return View
     */
    final public function index(Request $request): View
    {
        $request->session()->remove('domain');

        return view('pages.home', ['practices' => Practice::allPublished('domain')]);
    }
}
