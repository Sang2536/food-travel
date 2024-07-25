<div class="px-4">
    <div class="grid grid-cols-2 divide-x-2">
        <p class="my-4 text-2xl font-semibold">
            LOGS <br/><small>(There are {{ ! empty($logs) ? count($logs) : '0' }} records)</small>
        </p>
        <div class="w-full my-4">
            <button type="button" id="create-log-user" data-url="{{ route('user.create-log', ['uid' => $uid]) }}" class="flex float-right items-center justify-center w-auto h-8 px-2 mx-2 text-sm font-medium text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                <div role="status-start" class="flex text-center">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M12 5l0 14" />
                        <path d="M5 12l14 0" />
                    </svg>
                    <span class="ms-1">Create logs</span>
                </div>
                <div role="status-load" class="hidden flex text-center">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                    </svg>
                    <span class="ms-1">Loading...</span>
                </div>
            </button>
            <button type="button" id="clear-log-user" data-url="{{ route('user.clear-log', ['uid' => $uid]) }}" class="flex float-right items-center justify-center w-28 h-8 p-2 text-sm font-medium text-white rounded-lg bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">
                <div role="status-start" class="flex text-center">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-clear-all">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 6h12" /><path d="M6 12h12" /><path d="M4 18h12" />
                    </svg>
                    <span class="ms-1">Clear logs</span>
                </div>
                <div role="status-load" class="hidden flex text-center">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                    </svg>
                    <span class="ms-1">Loading...</span>
                </div>
            </button>
        </div>
    </div>

    <div id="table-logs" class="w-full my-4">
        @if ($logs)
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Time</th>
                        <th scope="col" class="px-6 py-3">Action</th>
                        <th scope="col" class="px-6 py-3">Model</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(array_slice($logs, -2, 2) as $item)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4">{{ $item['date'] }}</td>
                            <td class="px-6 py-4">{{ $item['action'] }}</td>
                            <td class="px-6 py-4">{{ $item['model'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Modal toggle -->
            <a href="#" type="button" data-modal-target="table-logs-modal" data-modal-toggle="table-logs-modal" class="mt-4 float-right font-medium px-2 text-cyan-600 dark:text-cyan-500 hover:underline">
                Detail
            </a>

            <!-- Main modal -->
            <div id="table-logs-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-3xl max-h-full">
                    <!-- Main content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                                Log Details
                            </h3>
                            <button type="button" id="btn-close-modal" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="table-logs-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- End modal header -->

                        <!-- Modal body -->
                        <div class="pb-4">
                            <div class="w-full h-96 no-scrollbar overflow-y-auto bg-gray-200">
                                <table class="w-full bg-gray-200 text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <thead class="mb-4 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="px-6 py-3">#</th>
                                            <th scope="col" class="px-6 py-3">Time</th>
                                            <th scope="col" class="px-6 py-3">Action</th>
                                            <th scope="col" class="px-6 py-3">Model</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($logs as $item)
                                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                <td class="px-6 py-4">{{ $loop->iteration }}</td>
                                                <td class="px-6 py-4">{{ $item['date'] }}</td>
                                                <td class="px-6 py-4">{{ $item['action'] }}</td>
                                                <td class="px-6 py-4">{{ $item['model'] }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- End modal body -->
                    </div>
                </div>
            </div>
        @else
            <div class="text-center text-gray-400">
                There are no logs yet!
            </div>
        @endif
    </div>
</div>
