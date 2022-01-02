<?php

namespace App\Http\Controllers;

use Log;
use Auth;
use App\Models\Opinion;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\QueryException;

class OpinionController extends Controller
{

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
            if ($e->errorInfo[1] === 1406) {
                $message = __('business.error.data too long');
            }

            return redirect()
                ->route('practice', ['practice' => $request->input('practice_id')])
                ->with('error', $message ?? __('Server Error'));
        }
    }
}
