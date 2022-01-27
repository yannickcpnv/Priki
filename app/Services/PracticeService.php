<?php

namespace App\Services;

use Auth;
use App\Models\Practice;
use JetBrains\PhpStorm\ArrayShape;

class PracticeService
{

    /**
     * Update a practice and create a new changelog.
     *
     * @param \App\Models\Practice $practice
     * @param array                $validated
     *
     * @return void
     */
    final public function updateWithChangelog(
        Practice $practice,
        #[ArrayShape(['title' => 'string', 'reason' => 'string',])] array $validated
    ) {
        $oldTitle = $practice->title;
        $practice->update(['title' => $validated['title']]);
        $practice->changelogs()->attach(Auth::id(), [
            'reason'     => $validated['reason'],
            'previously' => $oldTitle,
        ]);
    }
}
