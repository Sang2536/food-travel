@extends('app')
@section('title', 'User')

@section('content')
<div class="w-full">
    <div class="px-6 py-4 my-2">
        <a href="{{ route('user.index') }}" id="back" class="font-medium px-2 text-cyan-600 dark:text-cyan-500 hover:underline">Back</a>

        <!-- if not admin and owner -->
        @if ($userLogin->roles['name'] == $user->roles['name'])
            <!--    None    -->
        @elseif ($userLogin->roles['name'] == 'admin' || $userLogin->uid == $user->uid)
            <a href="{{ route('user.destroy', ['uid' => $user->uid]) }}" class="font-medium px-2 text-red-600 dark:text-red-500 hover:underline">Delete</a>
        @endif
    </div>
    <div class="flex items-center rounded bg-gray-50 text-gray-900 whitespace-nowrap dark:text-white">
        <img class="w-48 h-48 object-fill rounded-full" src="https://i.pinimg.com/564x/f9/8d/80/f98d8070d4214bad1d13ede632b82563.jpg" alt="Jese image">
        <div class="ml-6 py-2">
            <div class="flex">
                <div class="text-3xl font-semibold">{{ $user->name }}</div>

                @php
                    $color = 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300';
                    if ($user->roles['name'] == 'admin')
                        $color = 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300';
                    else if ($user->roles['name'] == 'tester')
                        $color = 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300';
                @endphp
                <span class="ml-2 h-1/2 text-xs font-medium me-2 px-2.5 py-0.5 rounded {{ $color }}">{{ $user->roles['name'] }}</span>
            </div>
            <div class="text-xl text-gray-500">{{ $user->email }}</div>
            <div class="mt-2 flex items-center">
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
        </div>
    </div>

    <div class="mt-8 rounded bg-gray-50 text-gray-900 whitespace-nowrap dark:text-white">
        <div class="grid grid-cols-2 divide-x-2">
            <div class="px-4">
                <p class="my-4 text-2xl font-semibold">
                    LOGS <small>(3 most recent activities)</small>
                </p>
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
            <div class="px-4">
                <p class="my-4 text-2xl font-semibold">SETTINGS</p>
                <form class="mx-4 space-y-4 md:space-y-6" action="#">
                    <div>
                        <label for="display-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Display name</label>
                        <input type="text" name="name" value="{{ $user->name }}" id="display-name" placeholder="Your display name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                    </div>
                    <div>
                        <label for="avatar" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Avatar</label>
                        <input type="file" name="avatar" id="avatar" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update user</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script type="text/javascript">
    $(document).ready(function () {

    });
</script>
@endsection
