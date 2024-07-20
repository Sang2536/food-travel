@extends('app')
@section('title', 'Detail account')

@section('content')
<div class="w-full">
    <div class="flex px-6 py-4 my-2">
        <a href="{{ route('account.index') }}" id="back" class="flex mx-2 py-1 border-2 border-cyan-500 font-medium px-2 text-cyan-600 dark:text-cyan-500 hover:underline">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="20"  height="20"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-back-up">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 14l-4 -4l4 -4" /><path d="M5 10h11a4 4 0 1 1 0 8h-1" />
            </svg>
            Back
        </a>

        <!-- if not admin and owner -->
        @if  ($userLogin->roles['name'] == 'admin')
            <a href="#" data-url="{{ route('account.destroy', ['account' => $account->acc_id]) }}" data-tooltip-target="tooltip-user-destroy" data-tooltip-placement="bottom" class="destroy-user flex mx-2 py-1 border-2 border-red-500 font-medium px-2 text-red-600 dark:text-red-500 hover:underline">
                <svg  xmlns="http://www.w3.org/2000/svg"  width="20"  height="20"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                </svg>
                Destroy User
            </a>

            <div id="tooltip-user-destroy" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                <p class="text-sm">Please consider before using</p>
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
        @endif
    </div>

    {{-- Profile Account --}}
    @include('accounts.partials.show_profile', ['account' => $account])

    <div class="mt-8 rounded bg-gray-50 text-gray-900 whitespace-nowrap dark:text-white">
        <!-- info tab + logs tab + settings tab -->
        <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="account-styled-tab" data-tabs-toggle="#account-styled-tab-content" data-tabs-active-classes="text-purple-600 hover:text-purple-600 dark:text-purple-500 dark:hover:text-purple-500 border-purple-600 dark:border-purple-500" data-tabs-inactive-classes="dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300" role="tablist">
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
            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="account-logs" role="tabpanel" aria-labelledby="logs-tab">
                @include('accounts.partials.show_logs_tab', ['account' => $account])
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

