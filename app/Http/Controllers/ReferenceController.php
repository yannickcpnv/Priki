<?php

namespace App\Http\Controllers;

use Log;
use Validator;
use App\Models\Reference;
use Illuminate\Http\Request;
use Nette\NotImplementedException;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\QueryException;

class ReferenceController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    final public function index(): View
    {
        return view('pages.reference.list', ['references' => Reference::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    final public function create(): View
    {
        return view('pages.reference.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    final public function store(Request $request): RedirectResponse
    {
        try {
            Validator::make($request->all(), [

            ]);
            $validated = $request->validate([
                'description' => 'required|max:100|regex:/\s*(\S\s*){10,}/',
                'url'         => 'url|unique:references',
            ], [
                'description.regex' => __('business.reference.error.description format'),
            ]);

            Reference::create([
                'description' => $validated['description'],
                'url'         => $validated['url'],
            ]);

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
     *
     * @throws \Nette\NotImplementedException
     */
    final public function show(Reference $reference): void
    {
        throw new NotImplementedException();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Reference $reference
     *
     * @throws \Nette\NotImplementedException
     */
    final public function edit(Reference $reference): void
    {
        throw new NotImplementedException();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Reference    $reference
     *
     * @throws \Nette\NotImplementedException
     */
    final public function update(Request $request, Reference $reference): void
    {
        throw new NotImplementedException();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Reference $reference
     *
     * @throws \Nette\NotImplementedException
     */
    final public function destroy(Reference $reference): void
    {
        throw new NotImplementedException();
    }
}
