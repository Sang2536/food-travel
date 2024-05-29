<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laracoding.com - Including jQuery with Vite</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="p-12">
        <!-- Modal toggle -->
        <button data-modal-target="form-modal" data-modal-toggle="form-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
            Toggle modal
        </button>

        <!-- Main modal -->
        <x-modal type="form" id="form-modal" />

        {{-- <x-modal type="popup"/>
        <x-modal type="default"/> --}}

        <hr class="m-8" />

        <form class="space-y-4 md:space-y-6 w-1/3" action="#">
            <x-form
                labelClass="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                labelTitle="Display name"
                inputType="text"
                inputName="display-name"
                inputValue=""
                inputId="display-name"
                inputClass="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                inputPlaceholder="Your display name"
                inputOptionsHasValue=[]
                inputOptionsNoneValue="[required]"
            />
            <x-form
                labelClass="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                labelTitle="Your email"
                inputType="email"
                inputName="email"
                inputValue=""
                inputId="email"
                inputClass="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                inputPlaceholder="Your email"
                inputOptionsHasValue=[]
                inputOptionsNoneValue=[required]
            />
        </form>

        <hr class="m-8" />

        <x-table.table id="table-test" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <x-table.thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <x-table.tr scope="" class="">
                    <x-table.th scope="col" value="" class="">
                        <div class="flex items-center">
                            <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-all-search" class="sr-only">checkbox</label>
                        </div>
                    </x-table.th>
                    <x-table.th scope="col" value="Name" class="px-6 py-3" />
                    <x-table.th scope="col" value="Position" class="px-6 py-3" />
                    <x-table.th scope="col" value="Status" class="px-6 py-3" />
                    <x-table.th scope="col" value="Options" class="px-6 py-3" />
                </x-table.tr>
            </x-table.thead>
            <x-table.tbody class="">
                <x-table.tr scope="" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <x-table.td value="" class="">
                        <div class="flex items-center">
                            <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                        </div>
                    </x-table.td>
                    <x-table.td value="" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                        <img class="w-10 h-10 rounded-full" src="/docs/images/people/profile-picture-1.jpg" alt="Jese image">
                        <div class="ps-3">
                            <div class="text-base font-semibold">Neil Sims</div>
                            <div class="font-normal text-gray-500">neil.sims@flowbite.com</div>
                        </div>
                    </x-table.td>
                    <x-table.td value="React Developer" class="px-6 py-4" />
                    <x-table.td value="" class="px-6 py-4">
                        <div class="flex items-center">
                            <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> Online
                        </div>
                    </x-table.td>
                    <x-table.td value="" class="px-6 py-4">
                        <a href="#" class="font-medium px-2 text-cyan-600 dark:text-cyan-500 hover:underline">Show</a>
                        <a href="#" class="font-medium px-2 text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        <a href="#" class="font-medium px-2 text-red-600 dark:text-red-500 hover:underline">Delete</a>
                    </x-table.td>
                </x-table.tr>
            </x-table.tbody>
        </x-table.table>

        <hr class="m-8" />



<div class="mb-4 border-b border-gray-200 dark:border-gray-700">
    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
        <li class="me-2" role="presentation">
            <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
        </li>
        <li class="me-2" role="presentation">
            <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false">Dashboard</button>
        </li>
        <li class="me-2" role="presentation">
            <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="settings-tab" data-tabs-target="#settings" type="button" role="tab" aria-controls="settings" aria-selected="false">Settings</button>
        </li>
        <li role="presentation">
            <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="contacts-tab" data-tabs-target="#contacts" type="button" role="tab" aria-controls="contacts" aria-selected="false">Contacts</button>
        </li>
    </ul>
</div>
<div id="default-tab-content">
    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Profile tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
    </div>
    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
        <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Dashboard tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
    </div>
    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="settings" role="tabpanel" aria-labelledby="settings-tab">
        <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Settings tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
    </div>
    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="contacts" role="tabpanel" aria-labelledby="contacts-tab">
        <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Contacts tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
    </div>
</div>


        <hr class="m-8" />

        <h1 class="text-red-600 bg-gray-300 my-4">
            Test tailwindcss
        </h1>

        <hr class="m-8" />

        <p class="zoomable">
            Click me to zoom
        </p>
        <script type="text/javascript">
            $(document).ready(function(){
                $("button[data-modal-toggle=form-modal]").click(function() {
                    $("div#form-modal").toggleClass('hidden');
                });

                alert("Thanks");

                $(".zoomable").click(function(){
                    $(this).animate({
                        fontSize: "40px"
                    }, 1000);
                });
            });
        </script>
    </body>
</html>
