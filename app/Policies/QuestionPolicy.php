<?php

namespace App\Policies;

use App\Models\{Question, User};

class QuestionPolicy
{
    public function publish(User $user, Question $question): bool
    {
        return $question->createdBy->is($user);
    }

    public function update(User $user, Question $question): bool
    {
        return $question->draft;
    }

    public function destroy(User $user, Question $question): bool
    {
        return $question->createdBy->is($user);
    }
}
