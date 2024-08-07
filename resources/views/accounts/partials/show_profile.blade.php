<div class="flex relative items-center rounded py-4 text-gray-900 whitespace-nowrap dark:text-white">
    <div class="absolute">
        <img class="w-64 h-64 z-20 object-fill rounded-full bg-gradient-to-r from-gray-200 to-gray-300" src="{{ url($account->avatar_url) }}" alt="{{ $account->display_name }}">
    </div>
    <div class="w-full ml-32 pl-40 py-2 h-64 bg-gray-100 rounded-r-full border border-gray-300 float-right">
        <div class="flex">
            <div class="text-2xl font-semibold">{{ $account->display_name }}</div>
            <div class="flex items-center ml-2 h-1/2 px-2 border rounded-full bg-white">
                {!! $accountStatus['html'] !!}
            </div>
            <div class="items-center ml-2 h-1/2 px-1 border rounded-full bg-cyan-200">
                <button class="text-center">
                    {!! $accountStatus['htmlIcon'] !!}
                </button>
            </div>
        </div>
        <div class="text-xl text-gray-500">{{ $account->email }}</div>
        <br />
        <div class="flex">
            <div class="text-sm pr-8 border-r-2 border-e-gray-700 text-gray-500">{{ $account->phone }}</div>
            <div class="text-sm pl-8 text-gray-500">{{ $account->address }}</div>
        </div>
        <hr class="w-10/12 h-1 mx-auto my-4 bg-gray-300 border-0 rounded dark:bg-gray-700">
        <p class="w-auto text-wrap">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum temporibus, amet voluptatibus ipsa consectetur velit officiis soluta ullam numquam? Enim et consequuntur odit expedita iste temporibus amet voluptatibus? Corrupti, porro.
        </p>
    </div>
</div>
