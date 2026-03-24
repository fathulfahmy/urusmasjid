<?php

use Livewire\Component;

new class extends Component {
    //
};
?>

<div class="relative isolate bg-white dark:bg-zinc-900">
    {{-- OVERLAY --}}
    <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
        <div class="bg-linear-to-tr aspect-1155/678 w-144.5 sm:w-288.75 rotate-30 relative left-[calc(50%-11rem)] -translate-x-1/2 from-emerald-200 to-emerald-400 opacity-30 sm:left-[calc(50%-30rem)] dark:from-emerald-700 dark:to-emerald-900"
            style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
        </div>
    </div>

    <div class="absolute inset-x-0 top-[15%] -z-10 transform-gpu overflow-hidden blur-3xl" aria-hidden="true">
        <div class="bg-linear-to-tr aspect-1155/678 w-144.5 sm:w-288.75 rotate-120 relative left-[calc(50%+11rem)] -translate-x-1/2 from-emerald-200 to-emerald-400 opacity-30 sm:left-[calc(50%+30rem)] dark:from-emerald-700 dark:to-emerald-900"
            style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
        </div>
    </div>

    <div class="absolute inset-x-0 top-[45%] -z-10 transform-gpu overflow-hidden blur-3xl" aria-hidden="true">
        <div class="bg-linear-to-tr aspect-1155/678 w-144.5 sm:w-288.75 relative left-[calc(50%-25rem)] -translate-x-1/2 rotate-[-60deg] from-emerald-200 to-emerald-400 opacity-30 sm:left-[calc(50%-40rem)] dark:from-emerald-700 dark:to-emerald-900"
            style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
        </div>
    </div>

    <div class="absolute inset-x-0 bottom-0 -z-10 transform-gpu overflow-hidden blur-3xl" aria-hidden="true">
        <div class="bg-linear-to-tr aspect-1155/678 w-144.5 sm:w-288.75 rotate-240 relative left-[calc(50%-11rem)] -translate-x-1/2 from-emerald-200 to-emerald-400 opacity-30 sm:left-[calc(50%-30rem)] dark:from-emerald-700 dark:to-emerald-900"
            style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
        </div>
    </div>

    {{-- HEADER --}}
    <header class="relative" x-data="{ open: false }" :class="{ 'overflow-hidden': open }">
        <div class="relative z-50">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-end md:justify-center">
                    <div class="hidden md:block">
                        <nav aria-label="Global">
                            <ul class="flex items-center gap-6 text-sm">
                                <li>
                                    <a class="text-zinc-700 transition hover:text-zinc-700/75 dark:text-zinc-200 dark:hover:text-zinc-200/75"
                                        href="#features">Features</a>
                                </li>
                                <li>
                                    <a class="text-zinc-700 transition hover:text-zinc-700/75 dark:text-zinc-200 dark:hover:text-zinc-200/75"
                                        href="#pricing">Pricing</a>
                                </li>
                                <li>
                                    <a class="text-zinc-700 transition hover:text-zinc-700/75 dark:text-zinc-200 dark:hover:text-zinc-200/75"
                                        href="#faq">FAQ</a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                    <div class="flex items-center gap-4">
                        <div class="block md:hidden">
                            <button
                                class="relative z-50 rounded-md bg-zinc-50 p-2 text-zinc-900 transition dark:bg-zinc-800 dark:text-white"
                                @click="open = !open">
                                <svg class="size-5" x-show="!open" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16">
                                    </path>
                                </svg>
                                <svg class="size-5" x-cloak x-show="open" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="fixed inset-0 z-40 bg-white md:hidden dark:bg-zinc-900" x-show="open"
            x-transition:enter="transition ease-out duration-300" x-transition:enter-start="-translate-y-full"
            x-transition:enter-end="translate-y-0" x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="translate-y-0" x-transition:leave-end="-translate-y-full" x-cloak>
            <nav class="flex h-full flex-col px-4 pt-20 sm:px-6 lg:px-8">
                <ul class="space-y-6">
                    <li><a class="text-zinc-700 hover:text-zinc-700/75 dark:text-zinc-200 dark:hover:text-zinc-200/75"
                            href="#features" @click="open = false">Features</a>
                    </li>
                    <li><a class="text-zinc-700 hover:text-zinc-700/75 dark:text-zinc-200 dark:hover:text-zinc-200/75"
                            href="#pricing" @click="open = false">Pricing</a>
                    </li>
                    <li><a class="text-zinc-700 hover:text-zinc-700/75 dark:text-zinc-200 dark:hover:text-zinc-200/75"
                            href="#faq" @click="open = false">FAQ</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    {{-- HERO --}}
    <section class="lg:grid lg:h-screen lg:place-content-center">
        <div class="mx-auto w-screen max-w-7xl px-4 py-16 sm:px-6 sm:py-24 lg:px-8 lg:py-32">
            <div class="mx-auto max-w-prose text-center">
                <h1 class="text-4xl font-semibold text-zinc-900 sm:text-5xl dark:text-white">
                    Urus Masjid
                </h1>

                <p class="mt-4 text-pretty text-base text-zinc-700 sm:text-lg/relaxed dark:text-zinc-200">
                    A platform to manage digital displays, record donations and spendings, and to track appliances
                    service history and stock supply level.
                </p>

                <div class="mt-4 flex justify-center gap-4 sm:mt-6">
                    <a class="inline-block rounded-full border border-emerald-600 bg-emerald-600 px-5 py-3 font-medium text-white transition-colors hover:bg-emerald-700"
                        href="#features">
                        Live Demo
                    </a>

                    <a class="inline-block rounded-full border border-zinc-200 px-5 py-3 font-medium text-zinc-700 transition-colors hover:bg-zinc-50 hover:text-zinc-900 dark:border-zinc-700 dark:text-zinc-200 dark:hover:bg-zinc-800 dark:hover:text-white"
                        href="#features">
                        Learn More
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- FEATURE --}}
    <div class="mx-auto mb-8 mt-16 max-w-lg text-center" id="features">
        <h2 class="text-3xl/tight font-semibold text-zinc-900 sm:text-4xl dark:text-white">Features</h2>
    </div>

    <section>
        <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-4 md:grid-cols-12 md:items-center md:gap-8">
                <div class="col-span-5">
                    <div class="max-w-prose md:max-w-none">
                        <h2 class="text-2xl font-semibold text-zinc-900 sm:text-3xl dark:text-white">
                            Dynamic Digital Display
                        </h2>

                        <p class="mt-4 text-pretty text-zinc-700 dark:text-zinc-200">
                            Transform existing mosque digital displays with infographics, prayer times, iqamat
                            countdown, and zen pray screen.
                        </p>

                        <a class="mt-8 inline-block rounded-full border border-zinc-200 px-5 py-3 font-medium text-zinc-700 transition-colors hover:bg-zinc-50 hover:text-zinc-900 dark:border-zinc-700 dark:text-zinc-200 dark:hover:bg-zinc-800 dark:hover:text-white"
                            href="/display" target="_blank" rel="noopener noreferrer">
                            Live Demo
                        </a>
                    </div>
                </div>

                <div class="col-span-7">
                    <img class="rounded-md" src="{{ asset('images/display.png') }}" alt="">
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-4 md:grid-cols-12 md:items-center md:gap-8">
                <div class="col-span-5">
                    <div class="max-w-prose md:max-w-none">
                        <h2 class="text-2xl font-semibold text-zinc-900 sm:text-3xl dark:text-white">
                            Transparent Report Page
                        </h2>

                        <p class="mt-4 text-pretty text-zinc-700 dark:text-zinc-200">
                            Build trust with the community with real-time donation, spending, appliances service
                            history, and supply stock level.
                        </p>

                        <a class="mt-8 inline-block rounded-full border border-zinc-200 px-5 py-3 font-medium text-zinc-700 transition-colors hover:bg-zinc-50 hover:text-zinc-900 dark:border-zinc-700 dark:text-zinc-200 dark:hover:bg-zinc-800 dark:hover:text-white"
                            href="/report" target="_blank" rel="noopener noreferrer">
                            Live Demo
                        </a>
                    </div>
                </div>

                <div class="col-span-7">
                    <img class="rounded-md" src="{{ asset('images/report.png') }}" alt="">
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-4 md:grid-cols-12 md:items-center md:gap-8">
                <div class="col-span-5">
                    <div class="max-w-prose md:max-w-none">
                        <h2 class="text-2xl font-semibold text-zinc-900 sm:text-3xl dark:text-white">
                            Simple Admin Panel
                        </h2>

                        <p class="mt-4 text-pretty text-zinc-700 dark:text-zinc-200">
                            Take control of mosque operations by updating gallery, donations, spendings, appliances
                            and supply records.
                        </p>

                        <a class="mt-8 inline-block rounded-full border border-zinc-200 px-5 py-3 font-medium text-zinc-700 transition-colors hover:bg-zinc-50 hover:text-zinc-900 dark:border-zinc-700 dark:text-zinc-200 dark:hover:bg-zinc-800 dark:hover:text-white"
                            href="/admin" target="_blank" rel="noopener noreferrer">
                            Live Demo
                        </a>
                    </div>
                </div>

                <div class="col-span-7">
                    <img class="rounded-md" src="{{ asset('images/admin.png') }}" alt="">
                </div>
            </div>
        </div>
    </section>

    {{-- PRICING --}}
    <div class="mx-auto mb-8 mt-16 max-w-lg text-center" id="pricing">
        <h2 class="text-3xl/tight font-semibold text-zinc-900 sm:text-4xl dark:text-white">Pricing</h2>
    </div>

    <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 sm:py-12 lg:px-8">
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-3 sm:items-center md:gap-8">
            {{-- SELF HOSTED --}}
            <div class="shadow-xs rounded-2xl border border-zinc-200 p-6 sm:px-8 lg:p-12 dark:border-zinc-700">
                <div class="text-center">
                    <h2 class="text-lg font-medium text-zinc-900 dark:text-white">
                        Self-hosted
                        <span class="sr-only">Plan</span>
                    </h2>

                    <p class="mt-2 sm:mt-4">
                        <strong class="text-3xl font-semibold text-zinc-900 sm:text-4xl dark:text-white">RM0</strong>
                    </p>
                </div>

                <ul class="mt-6 space-y-2">
                    <li class="flex items-center gap-1">
                        <svg class="size-5 text-emerald-700 dark:text-emerald-500" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                        </svg>

                        <span class="text-zinc-700 dark:text-zinc-200">Digital Display</span>
                    </li>

                    <li class="flex items-center gap-1">
                        <svg class="size-5 text-emerald-700 dark:text-emerald-500" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                        </svg>

                        <span class="text-zinc-700 dark:text-zinc-200">Report Page</span>
                    </li>
                    <li class="flex items-center gap-1">
                        <svg class="size-5 text-emerald-700 dark:text-emerald-500" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                        </svg>

                        <span class="text-zinc-700 dark:text-zinc-200">Admin Panel</span>
                    </li>

                    <li class="flex items-center gap-1">
                        <svg class="size-5 text-emerald-700 dark:text-emerald-500" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                        </svg>

                        <span class="text-zinc-700 dark:text-zinc-200">Audit Log</span>
                    </li>

                    <li class="flex items-center gap-1">
                        <svg class="size-5 text-emerald-700 dark:text-emerald-500" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                        </svg>

                        <span class="text-zinc-700 dark:text-zinc-200">Export to Excel</span>
                    </li>

                    <li class="flex items-center gap-1">
                        <svg class="size-5 text-red-700 dark:text-red-500" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 6l12 12M6 18L18 6"></path>
                        </svg>

                        <span class="text-zinc-700 dark:text-zinc-200">Managed hosting</span>
                    </li>

                    <li class="flex items-center gap-1">
                        <svg class="size-5 text-red-700 dark:text-red-500" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 6l12 12M6 18L18 6"></path>
                        </svg>

                        <span class="text-zinc-700 dark:text-zinc-200">Automatic update</span>
                    </li>

                    <li class="flex items-center gap-1">
                        <svg class="size-5 text-red-700 dark:text-red-500" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 6l12 12M6 18L18 6"></path>
                        </svg>

                        <span class="text-zinc-700 dark:text-zinc-200">Customer support</span>
                    </li>

                    <li class="flex items-center gap-1">
                        <svg class="size-5 text-red-700 dark:text-red-500" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 6l12 12M6 18L18 6"></path>
                        </svg>

                        <span class="text-zinc-700 dark:text-zinc-200">Custom features</span>
                    </li>
                </ul>

                <a class="mt-8 block rounded-full border border-emerald-600 px-12 py-3 text-center text-sm font-medium text-emerald-600 hover:ring-1 hover:ring-emerald-600"
                    href="https://github.com/fathulfahmy/urusmasjid" target="_blank" rel="noopener noreferrer">
                    Get started
                </a>
            </div>

            {{-- CLOUD --}}
            <div class="shadow-xs rounded-2xl border border-emerald-600 p-6 ring-1 ring-emerald-600 sm:px-8 lg:p-12">
                <div class="text-center">
                    <h2 class="text-lg font-medium text-zinc-900 dark:text-white">
                        Cloud
                        <span class="sr-only">Plan</span>
                    </h2>

                    <p class="mt-2 sm:mt-4">
                        <strong class="text-3xl font-semibold text-zinc-900 sm:text-4xl dark:text-white">
                            RM2,999
                        </strong>
                    </p>

                    <p class="text-sm font-medium text-zinc-700 dark:text-zinc-200">+ RM150/month</p>
                </div>

                <ul class="mt-6 space-y-2">
                    <li class="flex items-center gap-1">
                        <svg class="size-5 text-emerald-700 dark:text-emerald-500" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                        </svg>

                        <span class="text-zinc-700 dark:text-zinc-200">Digital Display</span>
                    </li>

                    <li class="flex items-center gap-1">
                        <svg class="size-5 text-emerald-700 dark:text-emerald-500" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                        </svg>

                        <span class="text-zinc-700 dark:text-zinc-200">Report Page</span>
                    </li>

                    <li class="flex items-center gap-1">
                        <svg class="size-5 text-emerald-700 dark:text-emerald-500" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                        </svg>

                        <span class="text-zinc-700 dark:text-zinc-200">Admin Panel</span>
                    </li>

                    <li class="flex items-center gap-1">
                        <svg class="size-5 text-emerald-700 dark:text-emerald-500" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                        </svg>

                        <span class="text-zinc-700 dark:text-zinc-200">Audit Log</span>
                    </li>

                    <li class="flex items-center gap-1">
                        <svg class="size-5 text-emerald-700 dark:text-emerald-500" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                        </svg>

                        <span class="text-zinc-700 dark:text-zinc-200">Export to Excel</span>
                    </li>

                    <li class="flex items-center gap-1">
                        <svg class="size-5 text-emerald-700 dark:text-emerald-500" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                        </svg>

                        <span class="text-zinc-700 dark:text-zinc-200">Managed hosting</span>
                    </li>

                    <li class="flex items-center gap-1">
                        <svg class="size-5 text-emerald-700 dark:text-emerald-500" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                        </svg>

                        <span class="text-zinc-700 dark:text-zinc-200">Automatic update</span>
                    </li>

                    <li class="flex items-center gap-1">
                        <svg class="size-5 text-emerald-700 dark:text-emerald-500" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                        </svg>

                        <span class="text-zinc-700 dark:text-zinc-200">Customer support</span>
                    </li>

                    <li class="flex items-center gap-1">
                        <svg class="size-5 text-red-700 dark:text-red-500" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 6l12 12M6 18L18 6"></path>
                        </svg>

                        <span class="text-zinc-700 dark:text-zinc-200">Custom features</span>
                    </li>
                </ul>

                <a class="mt-8 block rounded-full border border-emerald-600 bg-emerald-600 px-12 py-3 text-center text-sm font-medium text-white hover:bg-emerald-700 hover:ring-1 hover:ring-emerald-700"
                    href="https://wa.me/{{ config('app.whatsapp') }}?text=Hello%20Fathul,%20I%20want%20to%20start%20Urus%20Masjid%20free%20trial.%20What%20are%20the%20next%20steps?"
                    target="_blank" rel="noopener noreferrer">
                    Start free trial
                </a>
            </div>

            <div class="shadow-xs rounded-2xl border border-zinc-200 p-6 sm:px-8 lg:p-12 dark:border-zinc-700">
                <div class="text-center">
                    <h2 class="text-lg font-medium text-zinc-900 dark:text-white">
                        Enterprise
                        <span class="sr-only">Plan</span>
                    </h2>

                    <p class="mt-2 sm:mt-4">
                        <strong
                            class="text-3xl font-semibold text-zinc-900 sm:text-4xl dark:text-white">Custom</strong>
                    </p>
                </div>

                <ul class="mt-6 space-y-2">
                    <li class="flex items-center gap-1">
                        <svg class="size-5 text-emerald-700 dark:text-emerald-500" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                        </svg>

                        <span class="text-zinc-700 dark:text-zinc-200">Digital Display</span>
                    </li>

                    <li class="flex items-center gap-1">
                        <svg class="size-5 text-emerald-700 dark:text-emerald-500" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                        </svg>

                        <span class="text-zinc-700 dark:text-zinc-200">Report Page</span>
                    </li>
                    <li class="flex items-center gap-1">
                        <svg class="size-5 text-emerald-700 dark:text-emerald-500" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                        </svg>

                        <span class="text-zinc-700 dark:text-zinc-200">Admin Panel</span>
                    </li>

                    <li class="flex items-center gap-1">
                        <svg class="size-5 text-emerald-700 dark:text-emerald-500" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                        </svg>

                        <span class="text-zinc-700 dark:text-zinc-200">Audit Log</span>
                    </li>

                    <li class="flex items-center gap-1">
                        <svg class="size-5 text-emerald-700 dark:text-emerald-500" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                        </svg>

                        <span class="text-zinc-700 dark:text-zinc-200">Export to Excel</span>
                    </li>

                    <li class="flex items-center gap-1">
                        <svg class="size-5 text-emerald-700 dark:text-emerald-500" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                        </svg>

                        <span class="text-zinc-700 dark:text-zinc-200">Managed hosting</span>
                    </li>

                    <li class="flex items-center gap-1">
                        <svg class="size-5 text-emerald-700 dark:text-emerald-500" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                        </svg>

                        <span class="text-zinc-700 dark:text-zinc-200">Automatic update</span>
                    </li>

                    <li class="flex items-center gap-1">
                        <svg class="size-5 text-emerald-700 dark:text-emerald-500" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                        </svg>

                        <span class="text-zinc-700 dark:text-zinc-200">Customer support</span>
                    </li>

                    <li class="flex items-center gap-1">
                        <svg class="size-5 text-emerald-700 dark:text-emerald-500" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                        </svg>

                        <span class="text-zinc-700 dark:text-zinc-200">Custom features</span>
                    </li>
                </ul>

                <a class="mt-8 block rounded-full border border-emerald-600 px-12 py-3 text-center text-sm font-medium text-emerald-600 hover:ring-1 hover:ring-emerald-600"
                    href="https://wa.me/{{ config('app.whatsapp') }}?text=Hello%20Fathul,%20I%20want%20to%20discuss%20about%20Urus%20Masjid%20custom%20plan.%20What%20are%20the%20next%20steps?"
                    target="_blank" rel="noopener noreferrer">
                    Contact us
                </a>
            </div>
        </div>
    </div>

    {{-- FAQ --}}
    <div class="mx-auto mb-8 mt-16 max-w-lg text-center" id="faq">
        <h2 class="text-3xl/tight font-semibold text-zinc-900 sm:text-4xl dark:text-white">FAQ</h2>
    </div>

    <div class="mx-auto max-w-7xl space-y-4 px-4 py-8 sm:px-6 sm:py-12 lg:px-8">
        <details class="[&amp;_summary::-webkit-details-marker]:hidden group" open="">
            <summary
                class="flex items-center justify-between gap-1.5 rounded-md bg-zinc-50 p-4 text-zinc-900 dark:bg-zinc-800 dark:text-white">
                <h2 class="text-lg font-medium">
                    What is Urus Masjid?
                </h2>

                <svg class="size-5 shrink-0 transition-transform duration-300 group-open:-rotate-180"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </summary>

            <p class="px-4 pt-4 text-zinc-900 dark:text-white">
                It is a digital platform to manage mosque digital displays, cash flow, and inventory tracking. It helps
                mosque committee automate operations and keep the community informed.
            </p>
        </details>

        <details class="[&amp;_summary::-webkit-details-marker]:hidden group">
            <summary
                class="flex items-center justify-between gap-1.5 rounded-md bg-zinc-50 p-4 text-zinc-900 dark:bg-zinc-800 dark:text-white">
                <h2 class="text-lg font-medium">
                    Is Smart TV required?
                </h2>

                <svg class="size-5 shrink-0 transition-transform duration-300 group-open:-rotate-180"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </summary>

            <p class="px-4 pt-4 text-zinc-900 dark:text-white">
                Any digital display with a web browser can be used. We also offer a hardware for RM400 with free setup
                and installation to convert any digital display to smart display.
            </p>
        </details>

        <details class="[&amp;_summary::-webkit-details-marker]:hidden group">
            <summary
                class="flex items-center justify-between gap-1.5 rounded-md bg-zinc-50 p-4 text-zinc-900 dark:bg-zinc-800 dark:text-white">
                <h2 class="text-lg font-medium">
                    Is it a monthly subscription?
                </h2>

                <svg class="size-5 shrink-0 transition-transform duration-300 group-open:-rotate-180"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </summary>

            <p class="px-4 pt-4 text-zinc-900 dark:text-white">
                It is a one-time payment model. You only pay once for hardware installation, cloud deployment, and
                user training. Flat fee RM150 covers server cost, support, and maintenance.
            </p>
        </details>

        <details class="[&amp;_summary::-webkit-details-marker]:hidden group">
            <summary
                class="flex items-center justify-between gap-1.5 rounded-md bg-zinc-50 p-4 text-zinc-900 dark:bg-zinc-800 dark:text-white">
                <h2 class="text-lg font-medium">
                    How does Urus Masjid Digital Display work?
                </h2>

                <svg class="size-5 shrink-0 transition-transform duration-300 group-open:-rotate-180"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </summary>

            <p class="px-4 pt-4 text-zinc-900 dark:text-white">
                It displays infographics, prayer times, iqamat countdowns, and a zen pray screen during prayer. Content
                can be updated through the admin panel.
            </p>
        </details>

        <details class="[&amp;_summary::-webkit-details-marker]:hidden group">
            <summary
                class="flex items-center justify-between gap-1.5 rounded-md bg-zinc-50 p-4 text-zinc-900 dark:bg-zinc-800 dark:text-white">
                <h2 class="text-lg font-medium">
                    How does Urus Masjid Report improve transparency?
                </h2>

                <svg class="size-5 shrink-0 transition-transform duration-300 group-open:-rotate-180"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </summary>

            <p class="px-4 pt-4 text-zinc-900 dark:text-white">
                It is publicly accessible, providing real-time donation and spending cash flow, appliances service
                history records, and supply stock level records to build trust within the community.
            </p>
        </details>

        <details class="[&amp;_summary::-webkit-details-marker]:hidden group">
            <summary
                class="flex items-center justify-between gap-1.5 rounded-md bg-zinc-50 p-4 text-zinc-900 dark:bg-zinc-800 dark:text-white">
                <h2 class="text-lg font-medium">
                    What is included in Cloud and Enterprise plan?
                </h2>

                <svg class="size-5 shrink-0 transition-transform duration-300 group-open:-rotate-180"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </summary>

            <p class="px-4 pt-4 text-zinc-900 dark:text-white">
                Software and hardware installation and maintainance is included. On-site training will also be provided
                for the mosque committee.
            </p>
        </details>
    </div>


    {{-- CTA --}}
    <section
        class="mx-auto max-w-7xl overflow-hidden rounded-2xl bg-zinc-50 px-4 py-8 sm:grid sm:grid-cols-2 sm:px-6 sm:py-12 lg:px-8 dark:bg-zinc-800">
        <div class="p-8 md:p-12 lg:px-16 lg:py-24">
            <div class="mx-auto max-w-xl text-center ltr:sm:text-left rtl:sm:text-right">
                <h2 class="text-2xl font-semibold text-zinc-900 md:text-3xl dark:text-white">
                    Ready to Urus Masjid?
                </h2>

                <p class="hidden text-zinc-700 md:mt-4 md:block dark:text-zinc-300">
                    Join the mosques enhancing their workflows and building trust with their community.
                </p>

                <div class="mt-4 md:mt-8">
                    <a class="focus:outline-hidden inline-block rounded-full bg-emerald-600 px-12 py-3 text-sm font-medium text-white transition hover:bg-emerald-700 focus:ring-2 focus:ring-yellow-400"
                        href="https://wa.me/{{ config('app.whatsapp') }}?text=Hello%20Fathul,%20I%20want%20to%20start%20Urus%20Masjid%20free%20trial.%20What%20are%20the%20next%20steps?"
                        target="_blank" rel="noopener noreferrer">
                        Start free trial
                    </a>
                </div>
            </div>
        </div>

        <img class="h-56 w-full rounded-md object-cover sm:h-full" src="{{ asset('images/mosque.jpg') }}"
            alt="">
    </section>

    {{-- FOOTER --}}
    <footer class="">
        <div class="mx-auto max-w-7xl space-y-8 px-4 pt-16 sm:px-6 lg:space-y-16 lg:px-8">
            <div
                class="grid grid-cols-1 gap-8 border-t border-zinc-100 pt-8 sm:grid-cols-2 lg:grid-cols-3 lg:pt-16 dark:border-zinc-800">
                <div>
                    <p class="font-medium text-zinc-900 dark:text-white">Sitemap</p>

                    <ul class="mt-6 space-y-4 text-sm">
                        <li>
                            <a class="text-zinc-700 transition hover:opacity-75 dark:text-zinc-200" href="#features">
                                Features
                            </a>
                        </li>

                        <li>
                            <a class="text-zinc-700 transition hover:opacity-75 dark:text-zinc-200" href="#pricing">
                                Pricing
                            </a>
                        </li>

                        <li>
                            <a class="text-zinc-700 transition hover:opacity-75 dark:text-zinc-200" href="#faq">
                                FAQ
                            </a>
                        </li>
                    </ul>
                </div>

                <div>
                    <p class="font-medium text-zinc-900 dark:text-white">Demo</p>

                    <ul class="mt-6 space-y-4 text-sm">
                        <li>
                            <a class="text-zinc-700 transition hover:opacity-75 dark:text-zinc-200" href="/display"
                                target="_blank" rel="noopener noreferrer">
                                Digital Display
                            </a>
                        </li>

                        <li>
                            <a class="text-zinc-700 transition hover:opacity-75 dark:text-zinc-200" href="/report"
                                target="_blank" rel="noopener noreferrer">
                                Report
                            </a>
                        </li>

                        <li>
                            <a class="text-zinc-700 transition hover:opacity-75 dark:text-zinc-200" href="/admin"
                                target="_blank" rel="noopener noreferrer">
                                Admin
                            </a>
                        </li>
                    </ul>
                </div>

                <div>
                    <p class="font-medium text-zinc-900 dark:text-white">Contact</p>

                    <ul class="mt-6 space-y-4 text-sm">
                        <li>
                            <p class="text-zinc-700 transition hover:opacity-75 dark:text-zinc-200">
                                fathulfahmy@protonmail.com
                            </p>
                        </li>

                        <li>
                            <a class="text-zinc-700 transition hover:opacity-75 dark:text-zinc-200"
                                href="https://linkedin.com/in/fathulfahmy" target="_blank" rel="noopener noreferrer">
                                LinkedIn
                            </a>
                        </li>

                        <li>
                            <a class="text-zinc-700 transition hover:opacity-75 dark:text-zinc-200"
                                href="https://github.com/fathulfahmy" target="_blank" rel="noopener noreferrer">
                                GitHub
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <p class="text-xs text-zinc-700 dark:text-zinc-200">
                © {{ now()->year }}. Fathul Fahmy. Apache License 2.0.
            </p>


            <div class="flex items-center justify-center">
                <div>
                    <p class="lg:9xl text-5xl font-semibold text-zinc-900 sm:text-8xl dark:text-white">Urus Masjid</p>
                </div>
            </div>
        </div>
    </footer>
</div>
