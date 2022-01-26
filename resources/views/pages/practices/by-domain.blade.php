<x-layout>
    <x-slot name="titlePage">Best practices par domaine {{ strtolower($domain->name) }}</x-slot>
    <livewire:practice-container-component :original-practices="$practices" :is-domain-section="true"/>
</x-layout>
