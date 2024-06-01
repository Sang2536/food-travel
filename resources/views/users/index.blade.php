@extends('app')
@section('title', 'User')

@section('content')
<div class="w-full py-4">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-white dark:bg-gray-900">
            <div class="relative">
                <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input type="text" id="table-search-users" class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for users">
            </div>
            <div class="flex flex-col flex-shrink-0 space-y-3 md:flex-row md:items-center lg:justify-end md:space-y-0 md:space-x-3">
                <button type="button" class="flex px-3 py-2 items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    <svg class="mr-2"  xmlns="http://www.w3.org/2000/svg"  width="20"  height="20"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-chart-histogram">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 3v18h18" /><path d="M20 18v3" /><path d="M16 16v5" /><path d="M12 13v8" /><path d="M8 16v5" /><path d="M3 11c6 0 5 -5 9 -5s3 5 9 5" />
                    </svg>
                    Statistical
                </button>
                <button type="button" class="flex px-3 py-2 items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">
                    <svg class="mr-2"  xmlns="http://www.w3.org/2000/svg"  width="20"  height="20"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-download">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" /><path d="M7 11l5 5l5 -5" /><path d="M12 4l0 12" />
                    </svg>
                    Import
                </button>
                <button type="button" class="flex px-3 py-2 items-center justify-center flex-shrink-0 text-sm font-medium text-gray-900 bg-cyan-500 border border-gray-200 rounded-lg focus:outline-none hover:bg-cyan-600 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-cyan-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-cyan-700">
                    <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                    </svg>
                    Export
                </button>
            </div>
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="p-4">
                        <div class="flex items-center">
                            <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-all-search" class="sr-only">checkbox</label>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">Name</th>
                    <th scope="col" class="px-6 py-3">Position</th>
                    <th scope="col" class="px-6 py-3">Status</th>
                    <th scope="col" class="px-6 py-3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="w-4 p-4">
                        <div class="flex items-center">
                            <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                        </div>
                    </td>
                    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                        <img class="w-10 h-10 rounded-full" src="{{ $user->avatar }}" alt="Jese image">
                        <div class="ps-3">
                            <div class="text-base font-semibold">{{ $user->name }}</div>
                            <div class="font-normal text-gray-500">{{ $user->email }}</div>
                        </div>
                    </th>
                    <td class="px-6 py-4">
                        @php
                            $color = 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300';
                            if ($user->roles['name'] == 'admin')
                                $color = 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300';
                            else if ($user->roles['name'] == 'tester')
                                $color = 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300';
                        @endphp
                        <span class="ml-2 h-1/2 text-xs font-medium me-2 px-2.5 py-0.5 rounded {{ $color }}">{{ $user->roles['name'] }}</span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            @php
                                $statusColor = 'bg-gray-500';
                                $statusText = 'Offline';
                                if ($user->status == 'online') {
                                    $statusColor = 'bg-green-500';
                                    $statusText = 'Online';
                                }
                                else if ($user->status == 'locked') {
                                    $statusColor = 'bg-red-500';
                                    $statusText = 'Locked';
                                }
                            @endphp
                            <div class="h-2.5 w-2.5 rounded-full me-2 {{ $statusColor }}"></div> {{ $statusText }}
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{ route('user.show', ['uid' => $user->uid]) }}" class="font-medium px-2 text-cyan-600 dark:text-cyan-500 hover:underline">Detail</a>
                        <a href="{{ route('user.destroy', ['uid' => $user->uid]) }}" class="font-medium px-2 text-red-600 dark:text-red-500 hover:underline">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

</div>
@endsection

@section('javascript')
<script type="text/javascript">
    // alert("hello");
</script>
@endsection
