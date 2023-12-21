<x-app-layout>
    <x-slot name="header">
        <x-header>
            {{ __('My Questions') }}
        </x-header>
    </x-slot>

    <x-container>
        <x-form action="{{ route('question.store') }}">
            <x-text-area label="Question" name="question" />
            <x-btn.primary>Save</x-btn.primary>
            <x-btn.reset>Cancel</x-btn.reset>
        </x-form>

        <hr class="my-4 border-dotted border-gray-700">

        <h2 class="mb-1 font-bold uppercase dark:text-gray-400">
            Drafts
        </h2>
        <div class="space-y-4 dark:text-gray-400">
            <x-table>
                <x-table.thead>
                    <tr>
                        <x-table.th>Question</x-table.th>
                        <x-table.th>Actions</x-table.th>
                    </tr>
                </x-table.thead>
                <x-table.tbody>
                    @foreach ($questions->where('draft', true) as $question)
                        <x-table.tr>
                            <x-table.td>{{ $question->question }}</x-table.td>
                            <x-table.td>
                                <x-form :action="route('question.destroy', $question)" delete onsubmit="return confirm('Are you sure?')">
                                    <button type="submit" class="text-blue-500 hover:underline">
                                        Delete
                                    </button>
                                </x-form>
                                <x-form :action="route('question.publish', $question)" put>
                                    <button type="submit" class="text-blue-500 hover:underline">
                                        Publish
                                    </button>
                                </x-form>
                                <a href="{{ route('question.edit', $question) }}" class="text-blue-500 hover:underline">
                                    Edit
                                </a>
                            </x-table.td>
                        </x-table.tr>
                    @endforeach
                </x-table.tbody>
            </x-table>
        </div>

        <hr class="my-4 border-dotted border-gray-700">

        <h2 class="mb-1 font-bold uppercase dark:text-gray-400">
            My Questions
        </h2>
        <div class="space-y-4 dark:text-gray-400">
            <x-table>
                <x-table.thead>
                    <tr>
                        <x-table.th>Question</x-table.th>
                        <x-table.th>Actions</x-table.th>
                    </tr>
                </x-table.thead>
                <x-table.tbody>
                    @foreach ($questions->where('draft', false) as $question)
                        <x-table.tr>
                            <x-table.td>{{ $question->question }}</x-table.td>
                            <x-table.td>
                                <x-form :action="route('question.destroy', $question)" delete onsubmit="return confirm('Are you sure?')">
                                    <button type="submit" class="text-blue-500 hover:underline">
                                        Delete
                                    </button>
                                </x-form>
                                <x-form :action="route('question.archive', $question)" patch>
                                    <button type="submit" class="text-blue-500 hover:underline">
                                        Archive
                                    </button>
                                </x-form>
                            </x-table.td>
                        </x-table.tr>
                    @endforeach
                </x-table.tbody>
            </x-table>
        </div>
        <h2 class="mb-1 font-bold uppercase dark:text-gray-400">
            Archived Questions
        </h2>
        <div class="space-y-4 dark:text-gray-400">
            <x-table>
                <x-table.thead>
                    <tr>
                        <x-table.th>Question</x-table.th>
                        <x-table.th>Actions</x-table.th>
                    </tr>
                </x-table.thead>
                <x-table.tbody>
                    @foreach ($archivedQuestions->where('draft', false) as $question)
                        <x-table.tr>
                            <x-table.td>{{ $question->question }}</x-table.td>
                            <x-table.td>
                                <x-form :action="route('question.restore', $question)" patch>
                                    <button type="submit" class="text-blue-500 hover:underline">
                                        Restore
                                    </button>
                                </x-form>
                            </x-table.td>
                        </x-table.tr>
                    @endforeach
                </x-table.tbody>
            </x-table>
        </div>
    </x-container>
</x-app-layout>
