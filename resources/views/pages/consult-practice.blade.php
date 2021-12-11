<x-layout>
    <div class="is-flex is-justify-content-center">
        <div class="w-3/4">
            <x-slot name="titlePage">Par {{ $practice->user->fullname }}</x-slot>
            <x-practice-details :practice="$practice"/>
            @foreach ($practice->opinions as $opinion)
                <livewire:opinion-with-comments :opinion="$opinion"/>
            @endforeach
            <a class="button is-link w-full lg:w-1/4" href="{{ route('practices') }}">{{ __('Go back') }}</a>
        </div>
    </div>
</x-layout>
