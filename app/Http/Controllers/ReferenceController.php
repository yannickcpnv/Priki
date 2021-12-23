<?php

namespace App\Http\Controllers;

use App\Models\Reference;
use Illuminate\Http\Request;
use Nette\NotImplementedException;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
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
        return view('pages.references-list', ['references' => Reference::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create(): void
    {
        throw new NotImplementedException();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function store(Request $request): void
    {
        throw new NotImplementedException();
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
