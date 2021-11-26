<?php

namespace App\Http\Controllers;

use App\Models\Practice;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Foundation\Application;

class HomeController extends Controller
{

    final public function index(): Factory|View|Application
    {
        $allPublished = Practice::allPublished();
        $lastUpdates = Practice::lastUpdates();
        $duplicates = $allPublished->intersect($lastUpdates);

        return view('home', [
            'practices' => $duplicates,
        ]);
    }
}
