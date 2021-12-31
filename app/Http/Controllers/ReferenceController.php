<?php

namespace App\Http\Controllers;

use Log;
use App\Models\Reference;
use Illuminate\Http\Request;
use Nette\NotImplementedException;
use Illuminate\Routing\Redirector;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Foundation\Application;

class ReferenceController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View|Application
     */
    public function index(): Factory|View|Application
    {
        return view('pages.reference.list', ['references' => Reference::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View|Application
     */
    public function create(): Factory|View|Application
    {
        return view('pages.reference.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return Redirector|Application|RedirectResponse
     */
    public function store(Request $request): Redirector|Application|RedirectResponse
    {
        try {
            Reference::create(
                [
                    'description' => $request->input('description'),
                    'url'         => $request->input('url'),
                ]
            );
            return redirect(route('references.index'))->with('success', __('business.reference.added'));
        } catch (QueryException $e) {
            Log::Error($e->getMessage());
            return redirect(route('references.index'))->with('error', __('business.reference.error.unique url'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Reference $reference
     */
    public function show(Reference $reference): void
    {
        throw new NotImplementedException();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Reference $reference
     */
    public function edit(Reference $reference): void
    {
        throw new NotImplementedException();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Reference    $reference
     */
    public function update(Request $request, Reference $reference): void
    {
        throw new NotImplementedException();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Reference $reference
     */
    public function destroy(Reference $reference): void
    {
        throw new NotImplementedException();
    }
}
