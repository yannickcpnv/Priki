<x-layout>
    <div class="is-flex is-justify-content-center">
        <div class="md:w-3/4">
            <x-slot name="titlePage">Par {{ $practice->user->fullname }}</x-slot>
            <x-practice-details :practice="$practice"/>
            <a class="button is-link w-full lg:w-1/4" href="{{ route('practices') }}">{{ __('Go back') }}</a>
        </div>
    </div>
</x-layout>
