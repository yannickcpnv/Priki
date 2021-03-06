<?php

namespace App\Http\Controllers;

use Gate;
use App\Models\Domain;
use App\Models\Practice;
use Illuminate\Http\Request;
use App\Services\PracticeService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class PracticeController extends Controller
{

    final public function index(): View|RedirectResponse
    {
        if (Gate::denies('access-moderator')) {
            return redirect()->route('home')->with('warning', __('business.error.access.moderator'));
        }

        return view('pages..practices.list', ['practicesGroups' => Practice::allGroupByDomainOrderByState()]);
    }

    final public function listPublished(): View
    {
        $practices = Practice::allPublished('domain')->sortByDesc(fn($practice) => $practice->updated_at);

        return view('pages.home', compact('practices'));
    }

    final public function byDomain(Domain $domain): View
    {
        $practices = Practice::allPublishedBy('domain', $domain->slug, true);

        return view('pages.practices.by-domain', compact('practices', 'domain'));
    }

    final public function show(Practice $practice): View|RedirectResponse
    {
        if (Gate::denies('view', $practice)) {
            return redirect()->route('home')->with('warning', __('business.error.access.consult practice'));
        }

        $practice->load('opinions.references', 'opinions.comments', 'opinions.user');

        return view('pages.practices.show', compact('practice'));
    }

    /**
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    final public function edit(Practice $practice): View
    {
        $this->authorize('edit', $practice);

        return view('pages.practices.edit', compact('practice'));
    }

    final public function update(
        Request $request,
        Practice $practice,
        PracticeService $practiceService
    ): RedirectResponse {
        $validated = $request->validate([
            'title'  => 'required|min:3|max:40|unique:practices',
            'reason' => 'nullable',
        ]);

        $practiceService->updateWithChangelog($practice, $validated);

        return redirect(route('practices.show', $practice->id))->with('success', __('business.practice.edited'));
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
