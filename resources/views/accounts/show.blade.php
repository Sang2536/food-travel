@extends('app')
@section('title', 'Detail account')

@section('content')
<div class="w-full">
    <div class="px-6 py-4 my-2">
        <a href="{{ route('account.index') }}" class="font-medium px-2 text-cyan-600 dark:text-cyan-500 hover:underline">Back</a>
    </div>
    <div class="flex relative items-center rounded pr-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
        <div class="absolute">
            <img class="w-64 h-64 object-fill rounded-full z-20" src="https://i.pinimg.com/564x/f9/8d/80/f98d8070d4214bad1d13ede632b82563.jpg" alt="Jese image">
        </div>
        <div class="w-full ml-32 pl-40 py-2 h-64 bg-gray-50 rounded-r-full float-right">
            <div class="flex">
                <div class="text-2xl font-semibold">{{ $account->display_name }}</div>
                <div class="flex items-center ml-2 h-1/2 px-2 border rounded-full bg-white">
                    @if ($account->status == 'active')
                        <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> {{ $account->status }}
                    @elseif ($account->status == 'inactive')
                        <div class="h-2.5 w-2.5 rounded-full bg-gray-500 me-2"></div> {{ $account->status }}
                    @elseif ($account->status == 'locked')
                        <div class="h-2.5 w-2.5 rounded-full bg-red-500 me-2"></div> {{ $account->status }}
                    @endif
                </div>
            </div>
            <div class="text-xl text-gray-500">{{ $account->email }}</div>
            <hr class="w-10/12 h-1 mx-auto my-4 bg-gray-300 border-0 rounded md:my-10 dark:bg-gray-700">
            <p class="w-auto text-wrap">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum temporibus, amet voluptatibus ipsa consectetur velit officiis soluta ullam numquam? Enim et consequuntur odit expedita iste temporibus amet voluptatibus? Corrupti, porro.
            </p>
        </div>
    </div>

    <div class="mt-8 rounded bg-gray-50 text-gray-900 whitespace-nowrap dark:text-white">
        <!-- info tab + logs tab + settings tab -->
        <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="account-styled-tab" data-tabs-toggle="#account-styled-tab-content" data-tabs-active-classes="text-purple-600 hover:text-purple-600 dark:text-purple-500 dark:hover:text-purple-500 border-purple-600 dark:border-purple-500" data-tabs-inactive-classes="dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300" role="tablist">
                <li class="me-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 rounded-t-lg" id="account-profile-tab" data-tabs-target="#account-profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
                </li>
                <li class="me-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="account-logs-tab" data-tabs-target="#account-logs" type="button" role="tab" aria-controls="logs" aria-selected="false">Logs</button>
                </li>
                <li role="presentation">
                    <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="account-update-tab" data-tabs-target="#account-update" type="button" role="tab" aria-controls="update" aria-selected="false">Update</button>
                </li>
                <li class="me-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="account-settings-tab" data-tabs-target="#account-settings" type="button" role="tab" aria-controls="settings" aria-selected="false">Settings</button>
                </li>
            </ul>
        </div>
        <div id="account-styled-tab-content">
            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="account-profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="flex w-full grid gap-4 grid-cols-3">
                    <div class="flex items-center mb-4">
                        <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                        </svg>
                        name
                    </div>
                    <div class="flex items-center mb-4">
                        <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                        </svg>
                        phone
                    </div>
                    <div class="flex items-center mb-4">
                        <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                        </svg>
                        email
                    </div>
                    <div class="flex items-center mb-4">
                        <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                        </svg>
                        address
                    </div>
                </div>
            </div>
            <div class="hidden p-4 mx-32 rounded-lg bg-gray-50 dark:bg-gray-800" id="account-logs" role="tabpanel" aria-labelledby="logs-tab">
                <button type="button" class="flex items-center justify-center flex-shrink-0 px-3 py-2 text-sm font-medium text-gray-900 bg-red-500 border border-gray-200 rounded-lg focus:outline-none hover:bg-red-600 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-red-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-red-700">
                    <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                    </svg>
                    Delete logs
                </button>
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">Time</th>
                            <th scope="col" class="px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($account->logs as $item)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4">{{ $item['date'] }}</td>
                                <td class="px-6 py-4">{{ $item['action'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="account-update" role="tabpanel" aria-labelledby="update-tab">
                @include('accounts.edit')
            </div>
            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="account-settings" role="tabpanel" aria-labelledby="settings-tab">
                @include('accounts.setting')
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
    <script type="text/javascript">
    </script>
@endpush

