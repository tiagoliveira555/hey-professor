<?php

namespace App\Http\Controllers\Question;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\RedirectResponse;

class PublishController extends Controller
{
    public function __invoke(Question $question): RedirectResponse
    {
        $question->update(['draft' => false]);

        return to_route('dashboard');
    }
}
