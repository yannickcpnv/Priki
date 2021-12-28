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
        $sessionName = 'domain';
        if ($request->session()->exists($sessionName)) {
            $request->session()->remove($sessionName);
        }

        return view('pages.home', ['practices' => Practice::allPublished('domain')]);
    }
}
