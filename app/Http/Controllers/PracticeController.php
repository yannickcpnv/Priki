<?php

namespace App\Http\Controllers;

use Gate;
use App\Models\Practice;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class PracticeController extends Controller
{

    final public function index(): View|RedirectResponse
    {
        if (Gate::denies('access-moderator')) {
            return redirect()->route('home')->with('warning', __('business.error.access.moderator'));
        }

        return view('pages.list-practices', ['practicesGroups' => Practice::allGroupByDomainOrderByState()]);
    }

    final public function view(Practice $practice): View|RedirectResponse
    {
        if (Gate::denies('consult', $practice)) {
            return redirect()->route('home')->with('warning', __('business.error.access.consult practice'));
        }

        $practice->load('opinions.references', 'opinions.comments', 'opinions.user');

        return view('pages.consult-practice', compact('practice'));
    }

    final public function publish(Request $request, Practice $practice): RedirectResponse
    {
        if ($request->user()->cannot('publish', $practice)) {
            abort(403);
        }

        $practice->publish();

        return redirect()->route('home')->with('success', __('business.practice.published'));
    }
}
