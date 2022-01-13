<?php

namespace App\Http\Controllers;

use Gate;
use App\Models\Practice;
use Illuminate\Contracts\View\View;

class PracticeController extends Controller
{

    public function index()
    {
        if (!Gate::allows('access-moderator')) {
            return redirect()->route('home')->with('warning', __('business.role.error.access moderator'));
        }

        return view('pages.list-practices', ['practices' => Practice::allOrderByDomainOrderByState()]);
    }

    public function consultPractice(Practice $practice): View
    {
        return view('pages.consult-practice', compact('practice'));
    }
}
