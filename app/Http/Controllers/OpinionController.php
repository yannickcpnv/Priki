<?php

namespace App\Http\Controllers;

use DB;
use Log;
use Auth;
use App\Models\Opinion;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\QueryException;

class OpinionController extends Controller
{

    public function store(Request $request): RedirectResponse
    {
        try {
            DB::transaction(function () use ($request) {
                $opinion = new Opinion();
                $opinion->description = $request->input('description');
                $opinion->practice_id = $request->input('practice_id');
                $opinion->user_id = Auth::user()->id;
                $opinion->save();
                $opinion->references()->attach($request->input('references'));
            });

            return redirect()->route('practice', ['practice' => $request->input('practice_id')])
                ->with('success', __('business.opinion.added'));
        } catch (QueryException $e) {
            Log::Error($e->getMessage());
            $message = null;
            if ($e->errorInfo[1] === 1062) {
                $message = __('business.opinion.error.unique user in practice');
            }

            return $this->redirectWithError($request, $message);
        }
    }

    public function storeComment(Request $request): RedirectResponse
    {
        try {
            $opinion = Opinion::find($request->input('opinion_id'));
            $opinion->addComment(Auth::user(), $request->all());

            return redirect()
                ->route('practice', ['practice' => $request->input('practice_id')])
                ->with('success', __('business.comment.added'));
        } catch (QueryException $e) {
            Log::Error($e->getMessage());
            $message = null;
            if ($e->errorInfo[1] === 1406) {
                $message = __('business.error.data too long');
            }

            return $this->redirectWithError($request, $message);
        }
    }

    private function redirectWithError(Request $request, string $message = null): RedirectResponse
    {
        return redirect()
            ->route('practice', ['practice' => $request->input('practice_id')])
            ->with(isset($message) ? 'warning' : 'error', $message);
    }
}
