<?php

namespace App\Http\Controllers;

use App\Models\Practice;
use Illuminate\Contracts\View\View;

class PracticeController extends Controller
{

    public function index()
    {
        return view('pages.list-practices', ['practices' => Practice::allOrderByDomainOrderByState()]);
    }

    public function consultPractice(Practice $practice): View
    {
        return view('pages.consult-practice', compact('practice'));
    }
}
