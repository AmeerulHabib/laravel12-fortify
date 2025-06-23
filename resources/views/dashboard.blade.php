<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                {{--
                    This is where you can add any dashboard widgets or components.
                    For example, you might want to show user statistics, recent activity, etc.
                --}}

                {{-- <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div> --}}

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg mt-6">
                    <h3 class="text-lg font-medium text-gray-900">{{ __('Two-Factor Authentication') }}</h3>

                    <div class="mt-4">
                        @include('auth.two-factor-authentication')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
