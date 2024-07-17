<div class="my-8 rounded bg-gray-50 text-gray-900 dark:text-white">
    <div class="grid grid-cols-3 divide-x-2">
        @foreach ($userStatistical as $item)
            <div class="m-2 p-2 text-center max-w-sm {{ $item['style'] }} border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class="flex items-center text-gray-900 whitespace-nowrap dark:text-white">
                    <div class="flex w-1/6 h-full items-center justify-center text-sm font-medium text-white focus:ring-4 focus:outline-none dark:focus:ring-green-800">
                        {!! $item['icon'] !!}
                    </div>
                    <div class="ps-3">
                        <div class="font-normal text-gray-500">{{ $item['title'] }}</div>
                        <div class="text-2xl text-start font-semibold text-gray-700 dark:text-gray-400">{{ $item['quantity'] }}</div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
