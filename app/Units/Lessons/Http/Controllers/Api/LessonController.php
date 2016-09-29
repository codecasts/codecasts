<?php

namespace Codecasts\Units\Lessons\Http\Controllers\Api;

use Codecasts\Domains\Lessons\Contracts\LessonRepository;
use Codecasts\Support\Http\Controller;
use Illuminate\Http\Request;

/**
 * Class LessonController.
 */
class LessonController extends Controller
{
    public function search(LessonRepository $repository, Request $request)
    {
        $term = $request->get('term');

        return response()->json($repository->search($term, 10)->toArray());
    }
}
