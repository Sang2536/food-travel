<div class="px-4">
    <div class="grid grid-cols-2 divide-x-2">
        <p class="my-4 text-2xl font-semibold">
            LOGS <br/><small>(3 most recent activities)</small>
        </p>
        <div class="w-full my-4">
            <button type="button" class="flex float-right items-center justify-center w-28 h-8 p-2 text-sm font-medium text-white rounded-lg bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">
                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-clear-all">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 6h12" /><path d="M6 12h12" /><path d="M4 18h12" />
                </svg>
                Clear logs
            </button>
        </div>
    </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">Time</th>
                <th scope="col" class="px-6 py-3">Action</th>
                <th scope="col" class="px-6 py-3">Model</th>
            </tr>
        </thead>
        <tbody>
            @foreach($user->logs as $item)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4">{{ $item['date'] }}</td>
                    <td class="px-6 py-4">{{ $item['action'] }}</td>
                    <td class="px-6 py-4">{{ $item['model'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal toggle -->
    <a href="#" type="button" data-modal-target="table-modal" data-modal-toggle="table-modal" class="mt-4 float-right font-medium px-2 text-cyan-600 dark:text-cyan-500 hover:underline">
        Detail
    </a>

    <!-- Main modal -->
    <div id="table-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-lg max-h-full">
            <!-- Main content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                        Log Details
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="medium-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">Time</th>
                                <th scope="col" class="px-6 py-3">Action</th>
                                <th scope="col" class="px-6 py-3">Model</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user->logs as $item)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="px-6 py-4">{{ $item['date'] }}</td>
                                    <td class="px-6 py-4">{{ $item['action'] }}</td>
                                    <td class="px-6 py-4">{{ $item['model'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
