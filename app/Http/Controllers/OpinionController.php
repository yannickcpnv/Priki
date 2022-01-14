<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Models\Opinion;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\QueryException;

class OpinionController extends Controller
{

    final public function store(Request $request): RedirectResponse
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
            return $e->errorInfo[1] === 1062 ? $this->redirectWitWarning(
                $request->input('practice_id'),
                __('business.opinion.error.unique user in practice')
            ) : throw $e;
        }
    }

    final public function storeComment(Request $request): RedirectResponse
    {
        try {
            $opinion = Opinion::find($request->input('opinion_id'));
            $opinion->addComment(Auth::user(), $request->all());

            return redirect()
                ->route('practice', ['practice' => $request->input('practice_id')])
                ->with('success', __('business.comment.added'));
        } catch (QueryException $e) {
            return $e->errorInfo[1] === 1406 ? $this->redirectWitWarning(
                $request->input('practice_id'),
                __('business.error.data too long')
            ) : throw $e;
        }
    }

    final public function destroy(Request $request, Opinion $opinion): RedirectResponse
    {
        return $opinion->delete()
            ? redirect()->route('practice', ['practice' => $request->input('practice_id')])
                        ->with('success', __('business.opinion.deleted'))
            : $this->redirectWitWarning(
                $request->input('practice_id'),
                __('business.opinion.error.unique user in practice')
            );
    }

    private function redirectWitWarning(int $practiceId, string $message): RedirectResponse
    {
        return redirect()->route('practice', ['practice' => $practiceId])->with('warning', $message);
    }
}
