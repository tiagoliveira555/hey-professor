<x-app-layout>
    <x-slot name="header">
        <x-header>
            {{ __('Vote for a question') }}
        </x-header>
    </x-slot>

    <x-container>
        <form action="{{ route('dashboard') }}" method="get" class="flex items-center gap-2">
            <x-text-input type="text" name="search" value="{{ request()->search }}" class="w-full" />
            <x-btn.primary>Search</x-btn.primary>
        </form>
        @if ($questions->isEmpty())
            <div class="flex flex-col items-center justify-center text-center dark:text-gray-300">
                <div>
                    <x-draw.searching width="300" />
                </div>
                <h2 class="mt-6 text-2xl font-bold dark:text-gray-400">Question not found</h2>
            </div>
        @else
            <div class="mt-6 space-y-4 dark:text-gray-400">
                @foreach ($questions as $item)
                    <x-question :question="$item" />
                @endforeach
            </div>

            {{ $questions->withQueryString()->links() }}
        @endif
    </x-container>
</x-app-layout>
