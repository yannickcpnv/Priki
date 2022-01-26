<x-layout>
    <x-slot name="titlePage">Par {{ $practice->user->fullname }}</x-slot>

    <x-practice-details :practice="$practice"/>
    <a class="button is-link is-outlined w-full lg:w-1/4"
       href="{{ url()->previous() }}"
    >{{ __('Go back') }}</a>
</x-layout>
