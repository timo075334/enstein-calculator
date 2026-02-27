<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') }} - Home</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            .account-menu {
                display: none;
            }

            details[open] .account-menu {
                display: grid;
            }

            .account-dropdown {
                position: relative;
            }

            .account-dropdown .account-menu {
                position: absolute;
                right: 0;
                top: calc(100% + 4px);
                min-width: 130px;
                background: #fff;
                border: 1px solid #e5e7eb;
                border-radius: 8px;
                box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
                padding: 4px;
                z-index: 20;
            }

            .section-flat {
                border: 1px solid #e5e7eb;
                background: #ffffff;
                border-radius: 10px;
                padding: 14px;
            }

            .section-title {
                display: flex;
                align-items: center;
                gap: 10px;
                margin-bottom: 6px;
            }

            .section-icon {
                width: 28px;
                height: 28px;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                border-radius: 999px;
                background: #f3e8ff;
                color: #7e22ce;
                flex-shrink: 0;
            }
        </style>
    </head>
    <body class="min-h-screen bg-gray-100 text-black flex flex-col">
        <div class="mx-auto w-full max-w-3xl px-4 py-6 sm:px-6 sm:py-10 flex-1">
            <div class="mb-6">
                <div class="flex items-center justify-between">
                <div class="flex flex-col gap-2">
                    <x-application-logo class="w-fit" />
                </div>
                <div class="w-auto">
                    @auth
                        <details class="account-dropdown">
                            <summary class="list-none inline-flex cursor-pointer items-center justify-center rounded px-2 py-2 text-sm text-black">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path d="M20 21a8 8 0 1 0-16 0"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                            </summary>
                            <div class="account-menu gap-1">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="inline-flex w-full items-center justify-start rounded px-3 py-2 text-sm text-black">Log out</button>
                                </form>
                            </div>
                        </details>
                    @else
                        <details class="account-dropdown">
                            <summary class="list-none inline-flex cursor-pointer items-center justify-center rounded px-2 py-2 text-sm text-black">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path d="M20 21a8 8 0 1 0-16 0"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                            </summary>
                            <div class="account-menu gap-1">
                                <a href="{{ route('login') }}" class="inline-flex items-center justify-start rounded px-3 py-2 text-sm text-black">Log in</a>
                                <a href="{{ route('register') }}" class="inline-flex items-center justify-start rounded px-3 py-2 text-sm text-black">Sign up</a>
                            </div>
                        </details>
                    @endauth
                </div>
                </div>
            </div>

            <div class="mb-3 h-1 w-20 rounded-full bg-purple-600"></div>

            <div class="space-y-3 sm:space-y-4">
                <section class="section-flat">
                    <div class="section-title">
                        <span class="section-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <circle cx="12" cy="12" r="10"></circle>
                                <path d="M12 8v4l3 3"></path>
                            </svg>
                        </span>
                        <h2 class="text-base font-semibold">What this app does</h2>
                    </div>
                    <p class="mt-1 text-sm text-gray-700">Fast daily calculations for school, shopping, and work.</p>
                </section>

                <section class="section-flat">
                    <div class="section-title">
                        <span class="section-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M9 18l6-6-6-6"></path>
                            </svg>
                        </span>
                        <h2 class="text-base font-semibold">How it works</h2>
                    </div>
                    <p class="mt-1 text-sm text-gray-700">Create account → Log in → Open Calculator.</p>
                </section>

                <section class="section-flat">
                    <div class="section-title">
                        <span class="section-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M20 21a8 8 0 1 0-16 0"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </span>
                        <h2 class="text-base font-semibold">Why sign up</h2>
                    </div>
                    <p class="mt-1 text-sm text-gray-700">Sign up gives protected access now and supports future saved history features.</p>
                </section>

                <section class="section-flat">
                    <div class="section-title">
                        <span class="section-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M12 3l7 4v5c0 5-3.5 8-7 9-3.5-1-7-4-7-9V7l7-4z"></path>
                            </svg>
                        </span>
                        <h2 class="text-base font-semibold">Trust & Safety</h2>
                    </div>
                    <p class="mt-1 text-sm text-gray-700">Your account is required to access calculator features securely.</p>
                </section>

                <section class="section-flat">
                    <div class="section-title">
                        <span class="section-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M7 7h10M7 12h10M7 17h6"></path>
                            </svg>
                        </span>
                        <h2 class="text-base font-semibold">Quick examples</h2>
                    </div>
                    <ul class="mt-1 text-sm text-gray-700 list-disc list-inside">
                        <li>1200 * 0.15 (tax)</li>
                        <li>4500 / 30 (daily budget)</li>
                    </ul>
                </section>

                <section class="section-flat">
                    <a href="{{ route('calculator') }}" class="inline-flex w-full items-center justify-center rounded border border-purple-700 bg-purple-700 px-4 py-2 text-sm font-medium text-black sm:w-auto">
                        Open Calculator
                    </a>
                </section>
            </div>
        </div>

        <footer class="border-t border-gray-200 bg-white py-4">
            <div class="mx-auto max-w-3xl px-4 text-center text-xs text-gray-600 sm:px-6">
                © {{ date('Y') }} Enstein Calculator. Simple, secure, mobile-first.
            </div>
        </footer>
    </body>
</html>
