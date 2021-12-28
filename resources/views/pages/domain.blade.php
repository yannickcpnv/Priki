<x-layout>
    <x-slot name="titlePage">Best practice par domaine {{ strtolower($domain->name) }}</x-slot>
    <livewire:practice-container-component :original-practices="$practices"/>
</x-layout>
