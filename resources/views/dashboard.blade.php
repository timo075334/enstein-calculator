<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Enstein calculator') }}
        </h2>
    </x-slot>

    <div class="py-6 sm:py-12">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-4 sm:space-y-6">
            <div class="bg-white border border-gray-200 overflow-hidden shadow-sm rounded-xl">
                <div class="p-4 sm:p-6 text-gray-900">
                    <h3 class="text-lg sm:text-xl font-bold mb-2">Why calculators help every day</h3>
                    <p class="text-sm sm:text-base text-gray-700 mb-5">From shopping budgets to school and work tasks, calculators save time and reduce mistakes in daily decisions.</p>

                    <div class="grid grid-cols-1 gap-3 sm:grid-cols-3">
                        <div class="rounded-lg border border-gray-200 p-4">
                            <div class="mb-2 inline-flex h-9 w-9 items-center justify-center rounded-full bg-blue-100 text-blue-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 1.12-3 2.5S10.343 13 12 13s3 1.12 3 2.5S13.657 18 12 18m0-10V6m0 12v-2" />
                                </svg>
                            </div>
                            <h4 class="font-semibold mb-1">Money control</h4>
                            <p class="text-sm text-gray-600">Quickly total costs, taxes, and discounts before spending.</p>
                        </div>

                        <div class="rounded-lg border border-gray-200 p-4">
                            <div class="mb-2 inline-flex h-9 w-9 items-center justify-center rounded-full bg-emerald-100 text-emerald-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 17v-6m6 6v-3m5 8H4a1 1 0 01-1-1V4a1 1 0 011-1h16a1 1 0 011 1v17a1 1 0 01-1 1z" />
                                </svg>
                            </div>
                            <h4 class="font-semibold mb-1">Work productivity</h4>
                            <p class="text-sm text-gray-600">Get fast and accurate results for office and business tasks.</p>
                        </div>

                        <div class="rounded-lg border border-gray-200 p-4">
                            <div class="mb-2 inline-flex h-9 w-9 items-center justify-center rounded-full bg-purple-100 text-purple-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l6.16-3.422A12.083 12.083 0 0112 20.055a12.083 12.083 0 01-6.16-9.477L12 14z" />
                                </svg>
                            </div>
                            <h4 class="font-semibold mb-1">Learning support</h4>
                            <p class="text-sm text-gray-600">Practice arithmetic and check answers with confidence.</p>
                        </div>
                    </div>

                    <div class="mt-5 flex flex-col gap-2 sm:flex-row">
                        <a href="{{ route('calculator') }}" class="inline-flex items-center justify-center rounded border border-black bg-black px-4 py-2 text-sm font-medium text-black">Open Calculator</a>
                        <a href="{{ route('profile.edit') }}" class="inline-flex items-center justify-center rounded border border-black bg-white px-4 py-2 text-sm font-medium text-black">Manage Profile</a>
                        <a href="{{ route('home') }}" class="inline-flex items-center justify-center rounded border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-black">Back to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
