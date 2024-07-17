@extends('app')
@section('title', 'User')

@section('content')
<div class="w-full">
    <div class="flex px-6 py-4 my-2">
        <a href="{{ route('user.index') }}" id="back" class="flex mx-2 py-1 border-2 border-cyan-500 font-medium px-2 text-cyan-600 dark:text-cyan-500 hover:underline">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="20"  height="20"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-back-up">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 14l-4 -4l4 -4" /><path d="M5 10h11a4 4 0 1 1 0 8h-1" />
            </svg>
            Back
        </a>

        <!-- if not admin and owner -->
        @if ($userLogin->roles['name'] == $user->roles['name'])
            <a href="#" data-url="{{ route('user.destroy', ['uid' => $user->uid]) }}" data-tooltip-target="tooltip-user-destroy" data-tooltip-placement="bottom" class="destroy-user flex mx-2 py-1 border-2 border-red-500 font-medium px-2 text-red-600 dark:text-red-500 hover:underline">
                <svg  xmlns="http://www.w3.org/2000/svg"  width="20"  height="20"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                </svg>
                Destroy User
            </a>
        @elseif ($userLogin->roles['name'] == 'admin' || $userLogin->uid == $user->uid)
            <a href="#" data-url="{{ route('user.destroy', ['uid' => $user->uid]) }}" data-tooltip-target="tooltip-user-destroy" data-tooltip-placement="bottom" class="destroy-user flex mx-2 py-1 border-2 border-red-500 font-medium px-2 text-red-600 dark:text-red-500 hover:underline">
                <svg  xmlns="http://www.w3.org/2000/svg"  width="20"  height="20"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                </svg>
                Destroy
            </a>

            <div id="tooltip-user-destroy" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                <p class="text-sm">Please consider before using</p>
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
        @endif
    </div>

    @include('users.partials.profile_header', ['user' => $user])

    <div class="mt-8 rounded bg-gray-50 text-gray-900 whitespace-nowrap dark:text-white">
        <div class="grid grid-cols-2 divide-x-2">
            @include('users.partials.logs', ['logs' => $user->logs, 'uid' => $user->uid])
            @include('users.edit', ['user' => $user])
        </div>
    </div>
</div>

<div>
    @include('users.partials.modal_destroy')
</div>
@endsection

@push('script')
    <script type="text/javascript">
    </script>
@endpush
