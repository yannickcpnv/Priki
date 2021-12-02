<?php

namespace App\Http\Controllers;

use App\Models\Practice;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Foundation\Application;

class HomeController extends Controller
{

    /**
     * Go to the home page.
     *
     * @param Request $request The HTTP request.
     *
     * @return Factory|View|Application
     */
    final public function index(Request $request): Factory|View|Application
    {
        $sessionName = 'domain';
        if ($request->session()->exists($sessionName)) {
            $request->session()->remove($sessionName);
        }

        return view('pages.home', ['practices' => Practice::allPublished()]);
    }
}
