<x-app-layout>
    <x-slot name="header">
        <x-header>
            {{ __('Dashboard') }}
        </x-header>
    </x-slot>

    <x-container>
        <x-form action="{{ route('question.store') }}">
            <x-text-area label="Question" name="question" />
            <x-btn.primary>Save</x-btn.primary>
            <x-btn.reset>Cancel</x-btn.reset>
        </x-form>

        <hr class="my-4 border-dotted border-gray-700">

        <h2 class="mb-1 font-bold uppercase dark:text-gray-400">List of Questions</h2>
        <div class="space-y-4 dark:text-gray-400">
            @foreach ($questions as $item)
                <x-question :question="$item" />
            @endforeach
        </div>
    </x-container>
</x-app-layout>
