<div class="flex items-center rounded bg-gray-50 text-gray-900 whitespace-nowrap dark:text-white">
    <img id="img-avatar" class="w-48 h-48 object-fill rounded-full" src="https://i.pinimg.com/564x/f9/8d/80/f98d8070d4214bad1d13ede632b82563.jpg" alt="Jese image">
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
            <span data-tooltip-target="tooltip-user-role" data-tooltip-placement="right" class="ml-2 h-1/2 text-xs font-medium me-2 px-2.5 py-0.5 rounded {{ $color }}">{{ $user->roles['name'] }}</span>
            <div id="tooltip-user-role" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                <p>Permissions</p>
                @foreach ($user->roles['permissions'] as $item)
                    <p class="pl-4 text-sm">- {{ $item }}</p>
                @endforeach
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
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
