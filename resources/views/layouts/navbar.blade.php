<div class="w-full fixed top-0 left-0 z-50">
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="w-full flex flex-wrap items-center justify-between mx-auto p-4">
            <!-- Logo -->
            <div class="w-2/12">
                @include('layouts.navbar_partials.logo')
            </div>

            <!-- Menu -->
            <div class="w-5.5/12 max-lg:collapse">
                @include('layouts.navbar_partials.menu')
            </div>

            <!-- Language & Theme -->
            <div class="flex w-3/12 justify-end items-center max-lg:collapse md:order-2 space-x-1 md:space-x-0 rtl:space-x-reverse">
                {{-- language --}}
                @include('layouts.navbar_partials.language')

                {{-- language --}}
                @include('layouts.navbar_partials.theme')
            </div>

            <!-- Account -->
            <div class="flex w-1.5/12 justify-start items-center md:order-2 space-x-1 md:space-x-0 rtl:space-x-reverse">
                <button type="button" class="inline-flex items-center font-medium justify-center px-4 py-2 text-sm text-gray-900 dark:text-white rounded-lg cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white" aria-controls="user-dropdown-menu" data-collapse-toggle="user-dropdown-menu">
                    <svg class="w-5 h-5 rounded-full me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 3900 3900"><path fill="#b22234" d="M0 0h7410v3900H0z"/><path d="M0 450h7410m0 600H0m0 600h7410m0 600H0m0 600h7410m0 600H0" stroke="#fff" stroke-width="300"/><path fill="#3c3b6e" d="M0 0h2964v2100H0z"/><g fill="#fff"><g id="d"><g id="c"><g id="e"><g id="b"><path id="a" d="M247 90l70.534 217.082-184.66-134.164h228.253L176.466 307.082z"/><use xlink:href="#a" y="420"/><use xlink:href="#a" y="840"/><use xlink:href="#a" y="1260"/></g><use xlink:href="#a" y="1680"/></g><use xlink:href="#b" x="247" y="210"/></g><use xlink:href="#c" x="494"/></g><use xlink:href="#d" x="988"/><use xlink:href="#c" x="1976"/><use xlink:href="#e" x="2470"/></g></svg>
                    <span class="flex-1 me-1 whitespace-nowrap">Administrator</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                <ul id="user-dropdown-menu" class="hidden py-2 space-y-2">
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Accounts</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Products</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Transactions</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
