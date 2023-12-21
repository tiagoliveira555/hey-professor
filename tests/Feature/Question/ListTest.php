<?php

use App\Models\{Question, User};
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

use function Pest\Laravel\{actingAs, get};

it('should only be listed to questions that have been published', function () {
    $user = User::factory()->create();

    $publishedQuestions = Question::factory()->count(5)->create(['draft' => false]);
    $draftQuestions     = Question::factory()->count(5)->create(['draft' => true]);

    actingAs($user);

    $response = get(route('dashboard'));

    /** @var Question $q */
    foreach ($publishedQuestions as $q) {
        $response->assertSee($q->question);
    }

    /** @var Question $q */
    foreach ($draftQuestions as $q) {
        $response->assertDontSee($q->question);
    }
});

it('should paginate the result', function () {
    $user = User::factory()->create();
    Question::factory()->count(5)->create();

    actingAs($user);

    get(route('dashboard'))->assertViewHas('questions', fn ($value) => $value instanceof LengthAwarePaginator);
});

it('should order by like and unlike with most liked question at the top and with most unlike questions in the bottom', function () {
    $user       = User::factory()->create();
    $secondUser = User::factory()->create();
    Question::factory()->count(5)->create(['draft' => false]);

    $mostLikedQuestion  = Question::find(3);
    $mostUnlikeQuestion = Question::find(1);

    $user->like($mostLikedQuestion);
    $secondUser->unlike($mostUnlikeQuestion);

    actingAs($user);

    get(route('dashboard'))->assertViewHas('questions', function ($questions) {
        expect($questions)
            ->first()->id->toBe(3)
            ->and($questions)
            ->last()->id->toBe(1);

        return true;
    });
});
