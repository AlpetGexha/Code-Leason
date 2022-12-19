<x-guest-layout>

    <!--
  This example requires Tailwind CSS v2.0+

  The alpine.js code is *NOT* production ready and is included to preview
  possible interactivity
-->
    <div class="bg-white">
        <!-- Header and Page Header -->
        <div class="relative">
            <!-- Header -->
            <header class="relative z-10" x-data="Components.popover({ open: false, focus: true })" x-init="init()" @keydown.escape="onEscape"
                @close-popover-group.window="onClosePopoverGroup">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div
                        class="flex justify-between items-center border-b border-gray-200 py-6 md:justify-start md:space-x-10">
                        <div class="flex justify-start lg:w-0 lg:flex-1">
                            <a href="#">
                                <span class="sr-only">Workflow</span>
                                <img class="h-8 w-auto sm:h-10"
                                    src="https://tailwindui.com/img/logos/workflow-mark.svg?color=rose&amp;shade=500"
                                    alt="">
                            </a>
                        </div>
                        <div class="-mr-2 -my-2 md:hidden">
                            <button type="button"
                                class="rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-rose-500"
                                @click="toggle" @mousedown="if (open) $event.preventDefault()" aria-expanded="false"
                                :aria-expanded="open.toString()">
                                <span class="sr-only">Open menu</span>
                                <svg class="h-6 w-6" x-description="Heroicon name: outline/menu"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16"></path>
                                </svg>
                            </button>
                        </div>
                        <nav class="hidden md:flex space-x-10" x-data="Components.popoverGroup()" x-init="init()">
                            <div class="relative" x-data="Components.popover({ open: false, focus: false })" x-init="init()"
                                @keydown.escape="onEscape" @close-popover-group.window="onClosePopoverGroup">
                                <button type="button" x-state:on="Item active" x-state:off="Item inactive"
                                    class="text-gray-500 group bg-white rounded-md inline-flex items-center text-base font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-500"
                                    :class="{ 'text-gray-900': open, 'text-gray-500': !(open) }" @click="toggle"
                                    @mousedown="if (open) $event.preventDefault()" aria-expanded="false"
                                    :aria-expanded="open.toString()">
                                    <span>Solutions</span>
                                    <svg x-state:on="Item active" x-state:off="Item inactive"
                                        class="text-gray-400 ml-2 h-5 w-5 group-hover:text-gray-500"
                                        :class="{ 'text-gray-600': open, 'text-gray-400': !(open) }"
                                        x-description="Heroicon name: solid/chevron-down"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>


                                <div x-show="open" x-transition:enter="transition ease-out duration-200"
                                    x-transition:enter-start="opacity-0 translate-y-1"
                                    x-transition:enter-end="opacity-100 translate-y-0"
                                    x-transition:leave="transition ease-in duration-150"
                                    x-transition:leave-start="opacity-100 translate-y-0"
                                    x-transition:leave-end="opacity-0 translate-y-1"
                                    x-description="'Solutions' flyout menu, show/hide based on flyout menu state."
                                    class="absolute z-10 -ml-4 mt-3 transform px-2 w-screen max-w-md sm:px-0 lg:ml-0 lg:left-1/2 lg:-translate-x-1/2"
                                    x-ref="panel" @click.away="open = false">
                                    <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
                                        <div class="relative grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-8">

                                            <a href="#"
                                                class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
                                                <svg class="flex-shrink-0 h-6 w-6 text-rose-400"
                                                    x-description="Heroicon name: outline/chart-bar"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                                    </path>
                                                </svg>
                                                <div class="ml-4">
                                                    <p class="text-base font-medium text-gray-900">
                                                        Analytics
                                                    </p>
                                                    <p class="mt-1 text-sm text-gray-500">
                                                        Get a better understanding of where your traffic is coming from.
                                                    </p>
                                                </div>
                                            </a>

                                            <a href="#"
                                                class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
                                                <svg class="flex-shrink-0 h-6 w-6 text-rose-400"
                                                    x-description="Heroicon name: outline/cursor-click"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122">
                                                    </path>
                                                </svg>
                                                <div class="ml-4">
                                                    <p class="text-base font-medium text-gray-900">
                                                        Engagement
                                                    </p>
                                                    <p class="mt-1 text-sm text-gray-500">
                                                        Speak directly to your customers in a more meaningful way.
                                                    </p>
                                                </div>
                                            </a>

                                            <a href="#"
                                                class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
                                                <svg class="flex-shrink-0 h-6 w-6 text-rose-400"
                                                    x-description="Heroicon name: outline/shield-check"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                                    </path>
                                                </svg>
                                                <div class="ml-4">
                                                    <p class="text-base font-medium text-gray-900">
                                                        Security
                                                    </p>
                                                    <p class="mt-1 text-sm text-gray-500">
                                                        Your customers' data will be safe and secure.
                                                    </p>
                                                </div>
                                            </a>

                                            <a href="#"
                                                class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
                                                <svg class="flex-shrink-0 h-6 w-6 text-rose-400"
                                                    x-description="Heroicon name: outline/view-grid"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                                                    </path>
                                                </svg>
                                                <div class="ml-4">
                                                    <p class="text-base font-medium text-gray-900">
                                                        Integrations
                                                    </p>
                                                    <p class="mt-1 text-sm text-gray-500">
                                                        Connect with third-party tools that you're already using.
                                                    </p>
                                                </div>
                                            </a>

                                            <a href="#"
                                                class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
                                                <svg class="flex-shrink-0 h-6 w-6 text-rose-400"
                                                    x-description="Heroicon name: outline/refresh"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                                                    </path>
                                                </svg>
                                                <div class="ml-4">
                                                    <p class="text-base font-medium text-gray-900">
                                                        Automations
                                                    </p>
                                                    <p class="mt-1 text-sm text-gray-500">
                                                        Build strategic funnels that will drive your customers to
                                                        convert
                                                    </p>
                                                </div>
                                            </a>

                                        </div>
                                        <div
                                            class="px-5 py-5 bg-gray-50 space-y-6 sm:flex sm:space-y-0 sm:space-x-10 sm:px-8">

                                            <div class="flow-root">
                                                <a href="#"
                                                    class="-m-3 p-3 flex items-center rounded-md text-base font-medium text-gray-900 hover:bg-gray-100">
                                                    <svg class="flex-shrink-0 h-6 w-6 text-gray-400"
                                                        x-description="Heroicon name: outline/play"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z">
                                                        </path>
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                                        </path>
                                                    </svg>
                                                    <span class="ml-3">Watch Demo</span>
                                                </a>
                                            </div>

                                            <div class="flow-root">
                                                <a href="#"
                                                    class="-m-3 p-3 flex items-center rounded-md text-base font-medium text-gray-900 hover:bg-gray-100">
                                                    <svg class="flex-shrink-0 h-6 w-6 text-gray-400"
                                                        x-description="Heroicon name: outline/phone"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                                        </path>
                                                    </svg>
                                                    <span class="ml-3">Contact Sales</span>
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>

                            <a href="#" class="text-base font-medium text-gray-500 hover:text-gray-900">
                                Pricing
                            </a>
                            <a href="#" class="text-base font-medium text-gray-500 hover:text-gray-900">
                                Docs
                            </a>

                            <div class="relative" x-data="Components.popover({ open: false, focus: false })" x-init="init()"
                                @keydown.escape="onEscape" @close-popover-group.window="onClosePopoverGroup">
                                <button type="button" x-state:on="Item active" x-state:off="Item inactive"
                                    class="text-gray-500 group bg-white rounded-md inline-flex items-center text-base font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-500"
                                    :class="{ 'text-gray-900': open, 'text-gray-500': !(open) }" @click="toggle"
                                    @mousedown="if (open) $event.preventDefault()" aria-expanded="false"
                                    :aria-expanded="open.toString()">
                                    <span>More</span>
                                    <svg x-state:on="Item active" x-state:off="Item inactive"
                                        class="text-gray-400 ml-2 h-5 w-5 group-hover:text-gray-500"
                                        :class="{ 'text-gray-600': open, 'text-gray-400': !(open) }"
                                        x-description="Heroicon name: solid/chevron-down"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>


                                <div x-show="open" x-transition:enter="transition ease-out duration-200"
                                    x-transition:enter-start="opacity-0 translate-y-1"
                                    x-transition:enter-end="opacity-100 translate-y-0"
                                    x-transition:leave="transition ease-in duration-150"
                                    x-transition:leave-start="opacity-100 translate-y-0"
                                    x-transition:leave-end="opacity-0 translate-y-1"
                                    x-description="'More' flyout menu, show/hide based on flyout menu state."
                                    class="absolute z-10 left-1/2 transform -translate-x-1/2 mt-3 px-2 w-screen max-w-md sm:px-0"
                                    x-ref="panel" @click.away="open = false">
                                    <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
                                        <div class="relative grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-8">

                                            <a href="#"
                                                class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
                                                <svg class="flex-shrink-0 h-6 w-6 text-rose-400"
                                                    x-description="Heroicon name: outline/support"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z">
                                                    </path>
                                                </svg>
                                                <div class="ml-4">
                                                    <p class="text-base font-medium text-gray-900">
                                                        Help Center
                                                    </p>
                                                    <p class="mt-1 text-sm text-gray-500">
                                                        Get all of your questions answered in our forums or contact
                                                        support.
                                                    </p>
                                                </div>
                                            </a>

                                            <a href="#"
                                                class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
                                                <svg class="flex-shrink-0 h-6 w-6 text-rose-400"
                                                    x-description="Heroicon name: outline/bookmark-alt"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M16 4v12l-4-2-4 2V4M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                    </path>
                                                </svg>
                                                <div class="ml-4">
                                                    <p class="text-base font-medium text-gray-900">
                                                        Guides
                                                    </p>
                                                    <p class="mt-1 text-sm text-gray-500">
                                                        Learn how to maximize our platform to get the most out of it.
                                                    </p>
                                                </div>
                                            </a>

                                            <a href="#"
                                                class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
                                                <svg class="flex-shrink-0 h-6 w-6 text-rose-400"
                                                    x-description="Heroicon name: outline/calendar"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                    </path>
                                                </svg>
                                                <div class="ml-4">
                                                    <p class="text-base font-medium text-gray-900">
                                                        Events
                                                    </p>
                                                    <p class="mt-1 text-sm text-gray-500">
                                                        See what meet-ups and other events we might be planning near
                                                        you.
                                                    </p>
                                                </div>
                                            </a>

                                            <a href="#"
                                                class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
                                                <svg class="flex-shrink-0 h-6 w-6 text-rose-400"
                                                    x-description="Heroicon name: outline/shield-check"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                                    </path>
                                                </svg>
                                                <div class="ml-4">
                                                    <p class="text-base font-medium text-gray-900">
                                                        Security
                                                    </p>
                                                    <p class="mt-1 text-sm text-gray-500">
                                                        Understand how we take your privacy seriously.
                                                    </p>
                                                </div>
                                            </a>

                                        </div>
                                        <div class="px-5 py-5 bg-gray-50 sm:px-8 sm:py-8">
                                            <div>
                                                <h3 class="text-sm tracking-wide font-medium text-gray-500 uppercase">
                                                    Recent Posts
                                                </h3>
                                                <ul role="list" class="mt-4 space-y-4">

                                                    <li class="text-base truncate">
                                                        <a href="#"
                                                            class="font-medium text-gray-900 hover:text-gray-700">
                                                            Boost your conversion rate
                                                        </a>
                                                    </li>

                                                    <li class="text-base truncate">
                                                        <a href="#"
                                                            class="font-medium text-gray-900 hover:text-gray-700">
                                                            How to use search engine optimization to drive traffic to
                                                            your site
                                                        </a>
                                                    </li>

                                                    <li class="text-base truncate">
                                                        <a href="#"
                                                            class="font-medium text-gray-900 hover:text-gray-700">
                                                            Improve your customer experience
                                                        </a>
                                                    </li>

                                                </ul>
                                            </div>
                                            <div class="mt-5 text-sm">
                                                <a href="#"
                                                    class="font-medium text-rose-600 hover:text-rose-500"> View all
                                                    posts <span aria-hidden="true">→</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </nav>
                        <div class="hidden md:flex items-center justify-end md:flex-1 lg:w-0">
                            @guest
                                <a href="{{ route('login') }}"
                                    class="whitespace-nowrap text-base font-medium text-gray-500 hover:text-gray-900">
                                    Sign in
                                </a>
                                <a href="{{ route('register') }}"
                                    class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-rose-500 hover:bg-rose-600">
                                    Sign up
                                </a>
                            @else
                                <a href="{{ route('dashboard') }}"
                                    class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-rose-500 hover:bg-rose-600">
                                    Dashboard
                                </a>
                            @endguest
                        </div>
                    </div>
                </div>


                <div x-show="open" x-transition:enter="duration-200 ease-out"
                    x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="duration-100 ease-in" x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-95"
                    x-description="Mobile menu, show/hide based on mobile menu state."
                    class="absolute top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden"
                    x-ref="panel" @click.away="open = false">
                    <div
                        class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-white divide-y-2 divide-gray-50">
                        <div class="pt-5 pb-6 px-5">
                            <div class="flex items-center justify-between">
                                <div>
                                    <img class="h-8 w-auto"
                                        src="https://tailwindui.com/img/logos/workflow-mark.svg?color=rose&amp;shade=500"
                                        alt="Workflow">
                                </div>
                                <div class="-mr-2">
                                    <button type="button"
                                        class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-rose-500"
                                        @click="toggle">
                                        <span class="sr-only">Close menu</span>
                                        <svg class="h-6 w-6" x-description="Heroicon name: outline/x"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="mt-6">
                                <nav class="grid gap-y-8">

                                    <a href="#" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50">
                                        <svg class="flex-shrink-0 h-6 w-6 text-rose-400"
                                            x-description="Heroicon name: outline/chart-bar"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                            </path>
                                        </svg>
                                        <span class="ml-3 text-base font-medium text-gray-900">
                                            Analytics
                                        </span>
                                    </a>

                                    <a href="#" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50">
                                        <svg class="flex-shrink-0 h-6 w-6 text-rose-400"
                                            x-description="Heroicon name: outline/cursor-click"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122">
                                            </path>
                                        </svg>
                                        <span class="ml-3 text-base font-medium text-gray-900">
                                            Engagement
                                        </span>
                                    </a>

                                    <a href="#" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50">
                                        <svg class="flex-shrink-0 h-6 w-6 text-rose-400"
                                            x-description="Heroicon name: outline/shield-check"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                            </path>
                                        </svg>
                                        <span class="ml-3 text-base font-medium text-gray-900">
                                            Security
                                        </span>
                                    </a>

                                    <a href="#" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50">
                                        <svg class="flex-shrink-0 h-6 w-6 text-rose-400"
                                            x-description="Heroicon name: outline/view-grid"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                                            </path>
                                        </svg>
                                        <span class="ml-3 text-base font-medium text-gray-900">
                                            Integrations
                                        </span>
                                    </a>

                                    <a href="#" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50">
                                        <svg class="flex-shrink-0 h-6 w-6 text-rose-400"
                                            x-description="Heroicon name: outline/refresh"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                                            </path>
                                        </svg>
                                        <span class="ml-3 text-base font-medium text-gray-900">
                                            Automations
                                        </span>
                                    </a>

                                </nav>
                            </div>
                        </div>
                        <div class="py-6 px-5 space-y-6">
                            <div class="grid grid-cols-2 gap-y-4 gap-x-8">
                                <a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700">
                                    Pricing
                                </a>

                                <a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700">
                                    Docs
                                </a>

                                <a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700">
                                    Help Center
                                </a>

                                <a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700">
                                    Guides
                                </a>

                                <a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700">
                                    Events
                                </a>

                                <a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700">
                                    Security
                                </a>

                            </div>
                            <div>
                                <a href="#"
                                    class="w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-rose-500 hover:bg-rose-600">
                                    Sign up
                                </a>
                                <p class="mt-6 text-center text-base font-medium text-gray-500">
                                    Existing customer?
                                    <!-- space -->
                                    <a href="#" class="text-rose-600 hover:text-rose-500">
                                        Sign in
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </header>

            <!-- Page Header -->
            <div class="relative max-w-2xl mx-auto py-24 px-4 sm:px-6 lg:max-w-7xl lg:py-32 lg:px-8">
                <div class="relative">
                    <h1
                        class="text-3xl font-extrabold text-gray-900 sm:text-5xl sm:leading-none sm:tracking-tight lg:text-6xl">
                        Pricing plans for teams of all sizes</h1>
                    <p class="mt-6 max-w-2xl text-xl text-gray-500">Choose an affordable plan that's packed with the
                        best features for engaging your audience, creating customer loyalty, and driving sales.</p>
                </div>
            </div>
        </div>

        <main>
            <!-- Pricing Section -->
            <section class="relative" aria-labelledby="pricing-heading">
                <h2 id="pricing-heading" class="sr-only">Pricing</h2>

                <!-- Tiers -->
                <div
                    class="max-w-2xl mx-auto px-4 space-y-12 sm:px-6 lg:max-w-7xl lg:space-y-0 lg:px-8 lg:grid lg:grid-cols-3 lg:gap-x-8">

                    <div class="relative p-8 bg-white border border-gray-200 rounded-2xl shadow-sm flex flex-col">
                        <div class="flex-1">
                            <h3 class="text-xl font-semibold text-gray-900">Freelancer</h3>
                            <p class="mt-4 flex items-baseline text-gray-900">
                                <span class="text-5xl font-extrabold tracking-tight">$9.99</span>
                                <span class="ml-1 text-xl font-semibold">/month</span>
                            </p>
                            <p class="mt-6 text-gray-500">The essentials to provide your best work for clients.</p>

                            <!-- Feature list -->
                            <ul role="list" class="mt-6 space-y-6">

                                <li class="flex">
                                    <svg class="flex-shrink-0 w-6 h-6 text-rose-500"
                                        x-description="Heroicon name: outline/check"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="ml-3 text-gray-500">5 products</span>
                                </li>

                                <li class="flex">
                                    <svg class="flex-shrink-0 w-6 h-6 text-rose-500"
                                        x-description="Heroicon name: outline/check"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="ml-3 text-gray-500">Up to 1,000 subscribers</span>
                                </li>

                                <li class="flex">
                                    <svg class="flex-shrink-0 w-6 h-6 text-rose-500"
                                        x-description="Heroicon name: outline/check"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="ml-3 text-gray-500">Basic analytics</span>
                                </li>

                                <li class="flex">
                                    <svg class="flex-shrink-0 w-6 h-6 text-rose-500"
                                        x-description="Heroicon name: outline/check"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="ml-3 text-gray-500">48-hour support response time</span>
                                </li>

                            </ul>
                        </div>

                        <a href="{{ auth()->check() ? 'https://buy.stripe.com/test_dR6aFPb0cb4E81OdQQ' : route('register') }}"
                            class="bg-rose-50 text-rose-700 hover:bg-rose-100 mt-8 block w-full py-3 px-6 border border-transparent rounded-md text-center font-medium">
                            Monthly billing
                        </a>
                    </div>

                    <div class="relative p-8 bg-white border border-gray-200 rounded-2xl shadow-sm flex flex-col">
                        <div class="flex-1">
                            <h3 class="text-xl font-semibold text-gray-900">Startup</h3>

                            <p
                                class="absolute top-0 py-1.5 px-4 bg-rose-500 rounded-full text-xs font-semibold uppercase tracking-wide text-white transform -translate-y-1/2">
                                Most popular</p>
                            <p class="mt-4 flex items-baseline text-gray-900">
                                <span class="text-5xl font-extrabold tracking-tight">$19.99</span>
                                <span class="ml-1 text-xl font-semibold">/month</span>
                            </p>
                            <p class="mt-6 text-gray-500">A plan that scales with your rapidly growing business.</p>

                            <!-- Feature list -->
                            <ul role="list" class="mt-6 space-y-6">

                                <li class="flex">
                                    <svg class="flex-shrink-0 w-6 h-6 text-rose-500"
                                        x-description="Heroicon name: outline/check"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="ml-3 text-gray-500">25 products</span>
                                </li>

                                <li class="flex">
                                    <svg class="flex-shrink-0 w-6 h-6 text-rose-500"
                                        x-description="Heroicon name: outline/check"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="ml-3 text-gray-500">Up to 10,000 subscribers</span>
                                </li>

                                <li class="flex">
                                    <svg class="flex-shrink-0 w-6 h-6 text-rose-500"
                                        x-description="Heroicon name: outline/check"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="ml-3 text-gray-500">Advanced analytics</span>
                                </li>

                                <li class="flex">
                                    <svg class="flex-shrink-0 w-6 h-6 text-rose-500"
                                        x-description="Heroicon name: outline/check"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="ml-3 text-gray-500">24-hour support response time</span>
                                </li>

                                <li class="flex">
                                    <svg class="flex-shrink-0 w-6 h-6 text-rose-500"
                                        x-description="Heroicon name: outline/check"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="ml-3 text-gray-500">Marketing automations</span>
                                </li>

                            </ul>
                        </div>

                        <a href="{{ auth()->check() ? 'https://buy.stripe.com/test_00gbJT0ly2y84PC4gh' : route('register') }}"
                            class="bg-rose-500 text-white hover:bg-rose-600 mt-8 block w-full py-3 px-6 border border-transparent rounded-md text-center font-medium">
                            Monthly billing
                        </a>
                    </div>

                    <div class="relative p-8 bg-white border border-gray-200 rounded-2xl shadow-sm flex flex-col">
                        <div class="flex-1">
                            <h3 class="text-xl font-semibold text-gray-900">Enterprise</h3>
                            <p class="mt-4 flex items-baseline text-gray-900">
                                <span class="text-5xl font-extrabold tracking-tight">$59.99</span>
                                <span class="ml-1 text-xl font-semibold">/month</span>
                            </p>
                            <p class="mt-6 text-gray-500">Dedicated support and infrastructure for your company.</p>

                            <!-- Feature list -->
                            <ul role="list" class="mt-6 space-y-6">

                                <li class="flex">
                                    <svg class="flex-shrink-0 w-6 h-6 text-rose-500"
                                        x-description="Heroicon name: outline/check"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="ml-3 text-gray-500">Unlimited products</span>
                                </li>

                                <li class="flex">
                                    <svg class="flex-shrink-0 w-6 h-6 text-rose-500"
                                        x-description="Heroicon name: outline/check"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="ml-3 text-gray-500">Unlimited subscribers</span>
                                </li>

                                <li class="flex">
                                    <svg class="flex-shrink-0 w-6 h-6 text-rose-500"
                                        x-description="Heroicon name: outline/check"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="ml-3 text-gray-500">Advanced analytics</span>
                                </li>

                                <li class="flex">
                                    <svg class="flex-shrink-0 w-6 h-6 text-rose-500"
                                        x-description="Heroicon name: outline/check"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="ml-3 text-gray-500">1-hour, dedicated support response time</span>
                                </li>

                                <li class="flex">
                                    <svg class="flex-shrink-0 w-6 h-6 text-rose-500"
                                        x-description="Heroicon name: outline/check"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="ml-3 text-gray-500">Marketing automations</span>
                                </li>

                                <li class="flex">
                                    <svg class="flex-shrink-0 w-6 h-6 text-rose-500"
                                        x-description="Heroicon name: outline/check"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="ml-3 text-gray-500">Custom integrations</span>
                                </li>

                            </ul>
                        </div>

                        <a href="{{ auth()->check() ? 'https://buy.stripe.com/test_6oE4hrb0c1u4a9W28a' : route('register') }}"
                            class="bg-rose-50 text-rose-700 hover:bg-rose-100 mt-8 block w-full py-3 px-6 border border-transparent rounded-md text-center font-medium">
                            Monthlybilling
                        </a>
                    </div>

                </div>
            </section>

            <!-- Logo Cloud -->
            <section aria-labelledby="customer-heading"
                class="max-w-2xl mx-auto py-24 px-4 sm:px-6 lg:max-w-7xl lg:py-32 lg:px-8">
                <h2 id="customer-heading" class="sr-only">Our customers</h2>
                <div class="grid grid-cols-2 gap-8 md:grid-cols-6 lg:grid-cols-5">
                    <div class="col-span-1 flex justify-center md:col-span-2 lg:col-span-1">
                        <img class="h-12" src="https://tailwindui.com/img/logos/tuple-logo-gray-400.svg"
                            alt="Tuple">
                    </div>
                    <div class="col-span-1 flex justify-center md:col-span-2 lg:col-span-1">
                        <img class="h-12" src="https://tailwindui.com/img/logos/mirage-logo-gray-400.svg"
                            alt="Mirage">
                    </div>
                    <div class="col-span-1 flex justify-center md:col-span-2 lg:col-span-1">
                        <img class="h-12" src="https://tailwindui.com/img/logos/statickit-logo-gray-400.svg"
                            alt="StaticKit">
                    </div>
                    <div class="col-span-1 flex justify-center md:col-span-3 lg:col-span-1">
                        <img class="h-12" src="https://tailwindui.com/img/logos/transistor-logo-gray-400.svg"
                            alt="Transistor">
                    </div>
                    <div class="col-span-2 flex justify-center md:col-span-3 lg:col-span-1">
                        <img class="h-12" src="https://tailwindui.com/img/logos/workcation-logo-gray-400.svg"
                            alt="Workcation">
                    </div>
                </div>
            </section>

            <!-- Testimonial -->
            <div class="relative">
                <!-- Decorative background -->
                <div aria-hidden="true" class="absolute inset-x-0 h-1/2 bg-gradient-to-b from-white to-gray-50"></div>

                <div class="relative max-w-2xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
                    <div
                        class="relative py-24 px-8 bg-rose-500 rounded-xl shadow-2xl overflow-hidden lg:px-16 lg:grid lg:grid-cols-2 lg:gap-x-8">
                        <div class="absolute inset-0 opacity-50 filter saturate-0 mix-blend-multiply">
                            <img src="https://images.unsplash.com/photo-1601381718415-a05fb0a261f3?ixid=MXwxMjA3fDB8MHxwcm9maWxlLXBhZ2V8ODl8fHxlbnwwfHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=1216&amp;q=80"
                                alt="" class="w-full h-full object-cover">
                        </div>
                        <div class="relative lg:col-span-1">
                            <img class="h-12 w-auto" src="https://tailwindui.com/img/logos/workcation-logo-white.svg"
                                alt="">
                            <blockquote class="mt-6 text-white">
                                <p class="text-xl font-medium sm:text-2xl">Workflow has completely transformed how we
                                    interact with customers. We've seen record bookings, higher customer satisfaction,
                                    and reduced churn.</p>
                                <footer class="mt-6">
                                    <p class="flex flex-col font-medium">
                                        <span>Marie Chilvers</span>
                                        <span>CEO, Workcation</span>
                                    </p>
                                </footer>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FAQ -->
            <section aria-labelledby="faq-heading"
                class="max-w-2xl mx-auto py-24 px-4 divide-y divide-gray-200 sm:px-6 lg:max-w-7xl lg:py-32 lg:px-8">
                <h2 id="faq-heading" class="text-3xl font-extrabold text-gray-900">
                    Frequently asked questions
                </h2>
                <div class="mt-8">
                    <dl class="divide-y divide-gray-200" x-max="1">

                        <div class="pt-6 pb-8 md:grid md:grid-cols-12 md:gap-8">
                            <dt class="text-base font-medium text-gray-900 md:col-span-5">
                                What's the best thing about Switzerland?
                            </dt>
                            <dd class="mt-2 md:mt-0 md:col-span-7">
                                <p class="text-base text-gray-500">
                                    I don't know, but the flag is a big plus. Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit. Quas cupiditate laboriosam fugiat.
                                </p>
                            </dd>
                        </div>

                        <div class="pt-6 pb-8 md:grid md:grid-cols-12 md:gap-8">
                            <dt class="text-base font-medium text-gray-900 md:col-span-5">
                                How do you make holy water?
                            </dt>
                            <dd class="mt-2 md:mt-0 md:col-span-7">
                                <p class="text-base text-gray-500">
                                    You boil the hell out of it. Lorem ipsum dolor sit amet consectetur adipisicing
                                    elit. Magnam aut tempora vitae odio inventore fuga aliquam nostrum quod porro.
                                    Delectus quia facere id sequi expedita natus.
                                </p>
                            </dd>
                        </div>

                        <div class="pt-6 pb-8 md:grid md:grid-cols-12 md:gap-8">
                            <dt class="text-base font-medium text-gray-900 md:col-span-5">
                                What do you call someone with no body and no nose?
                            </dt>
                            <dd class="mt-2 md:mt-0 md:col-span-7">
                                <p class="text-base text-gray-500">
                                    Nobody knows. Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa,
                                    voluptas ipsa quia excepturi, quibusdam natus exercitationem sapiente tempore labore
                                    voluptatem.
                                </p>
                            </dd>
                        </div>

                        <div class="pt-6 pb-8 md:grid md:grid-cols-12 md:gap-8">
                            <dt class="text-base font-medium text-gray-900 md:col-span-5">
                                Why do you never see elephants hiding in trees?
                            </dt>
                            <dd class="mt-2 md:mt-0 md:col-span-7">
                                <p class="text-base text-gray-500">
                                    Because they're so good at it. Lorem ipsum dolor sit amet consectetur adipisicing
                                    elit. Quas cupiditate laboriosam fugiat.
                                </p>
                            </dd>
                        </div>

                        <div class="pt-6 pb-8 md:grid md:grid-cols-12 md:gap-8">
                            <dt class="text-base font-medium text-gray-900 md:col-span-5">
                                Why can't you hear a pterodactyl go to the bathroom?
                            </dt>
                            <dd class="mt-2 md:mt-0 md:col-span-7">
                                <p class="text-base text-gray-500">
                                    Because the pee is silent. Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Ipsam, quas voluptatibus ex culpa ipsum, aspernatur blanditiis fugiat ullam magnam
                                    suscipit deserunt illum natus facilis atque vero consequatur! Quisquam, debitis
                                    error.
                                </p>
                            </dd>
                        </div>

                        <div class="pt-6 pb-8 md:grid md:grid-cols-12 md:gap-8">
                            <dt class="text-base font-medium text-gray-900 md:col-span-5">
                                Why did the invisible man turn down the job offer?
                            </dt>
                            <dd class="mt-2 md:mt-0 md:col-span-7">
                                <p class="text-base text-gray-500">
                                    He couldn't see himself doing it. Lorem ipsum dolor sit, amet consectetur
                                    adipisicing elit. Eveniet perspiciatis officiis corrupti tenetur. Temporibus ut
                                    voluptatibus, perferendis sed unde rerum deserunt eius.
                                </p>
                            </dd>
                        </div>

                    </dl>
                </div>
            </section>
        </main>

        <!-- Footer -->
        <footer class="bg-gray-50" aria-labelledby="footer-heading">
            <h2 id="footer-heading" class="sr-only">Footer</h2>
            <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8">
                <div class="xl:grid xl:grid-cols-3 xl:gap-8">
                    <div class="space-y-8 xl:col-span-1">
                        <img class="h-10" src="https://tailwindui.com/img/logos/workflow-mark-gray-300.svg"
                            alt="Company name">
                        <p class="text-gray-500 text-base">
                            Making the world a better place through constructing elegant hierarchies.
                        </p>
                        <div class="flex space-x-6">

                            <a href="#" class="text-gray-400 hover:text-gray-500">
                                <span class="sr-only">Facebook</span>
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </a>

                            <a href="#" class="text-gray-400 hover:text-gray-500">
                                <span class="sr-only">Instagram</span>
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </a>

                            <a href="#" class="text-gray-400 hover:text-gray-500">
                                <span class="sr-only">Twitter</span>
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path
                                        d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84">
                                    </path>
                                </svg>
                            </a>

                            <a href="#" class="text-gray-400 hover:text-gray-500">
                                <span class="sr-only">GitHub</span>
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </a>

                            <a href="#" class="text-gray-400 hover:text-gray-500">
                                <span class="sr-only">Dribbble</span>
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </a>

                        </div>
                    </div>
                    <div class="mt-12 grid grid-cols-2 gap-8 xl:mt-0 xl:col-span-2">
                        <div class="md:grid md:grid-cols-2 md:gap-8">
                            <div>
                                <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">
                                    Solutions
                                </h3>
                                <ul role="list" class="mt-4 space-y-4">

                                    <li>
                                        <a href="#" class="text-base text-gray-500 hover:text-gray-900">
                                            Marketing
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="text-base text-gray-500 hover:text-gray-900">
                                            Analytics
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="text-base text-gray-500 hover:text-gray-900">
                                            Commerce
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="text-base text-gray-500 hover:text-gray-900">
                                            Insights
                                        </a>
                                    </li>

                                </ul>
                            </div>
                            <div class="mt-12 md:mt-0">
                                <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">
                                    Support
                                </h3>
                                <ul role="list" class="mt-4 space-y-4">

                                    <li>
                                        <a href="#" class="text-base text-gray-500 hover:text-gray-900">
                                            Pricing
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="text-base text-gray-500 hover:text-gray-900">
                                            Documentation
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="text-base text-gray-500 hover:text-gray-900">
                                            Guides
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="text-base text-gray-500 hover:text-gray-900">
                                            API Status
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div class="md:grid md:grid-cols-2 md:gap-8">
                            <div>
                                <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">
                                    Company
                                </h3>
                                <ul role="list" class="mt-4 space-y-4">

                                    <li>
                                        <a href="#" class="text-base text-gray-500 hover:text-gray-900">
                                            About
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="text-base text-gray-500 hover:text-gray-900">
                                            Blog
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="text-base text-gray-500 hover:text-gray-900">
                                            Jobs
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="text-base text-gray-500 hover:text-gray-900">
                                            Press
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="text-base text-gray-500 hover:text-gray-900">
                                            Partners
                                        </a>
                                    </li>

                                </ul>
                            </div>
                            <div class="mt-12 md:mt-0">
                                <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">
                                    Legal
                                </h3>
                                <ul role="list" class="mt-4 space-y-4">

                                    <li>
                                        <a href="#" class="text-base text-gray-500 hover:text-gray-900">
                                            Claim
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="text-base text-gray-500 hover:text-gray-900">
                                            Privacy
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="text-base text-gray-500 hover:text-gray-900">
                                            Terms
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-12 border-t border-gray-200 pt-8">
                    <p class="text-base text-gray-400 xl:text-center">
                        © 2020 Workflow, Inc. All rights reserved.
                    </p>
                </div>
            </div>
        </footer>
    </div>
</x-guest-layout>
