<x-layout>
    <x-slot name="titlePage">Par {{ $practice->user->fullname }}</x-slot>
    <x-practice-details :practice="$practice"/>
</x-layout>
