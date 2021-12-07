<x-layout>
    <x-slot name="titlePage">Best practice de {{ $practice->user->name }}</x-slot>
    <x-practice-details :practice="$practice"/>
</x-layout>
