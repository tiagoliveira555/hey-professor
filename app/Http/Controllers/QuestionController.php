<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\{RedirectResponse, Request};

class QuestionController extends Controller
{
    public function store(): RedirectResponse
    {

        Question::query()->create(['question' => request()->question]);

        return to_route('dashboard');
    }
}
