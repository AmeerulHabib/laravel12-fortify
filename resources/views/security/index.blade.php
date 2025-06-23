<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Security Settings') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 bg-white shadow sm:rounded-lg">
                {{-- Placeholder for your 2FA & recovery UI later --}}
                <p class="text-gray-600">Here you’ll manage Two-Factor Authentication & recovery codes.</p>
            </div>
        </div>
    </div>
</x-app-layout>
