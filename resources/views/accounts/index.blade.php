@extends('app')
@section('title', 'Account')

@section('content')
<div class="w-full py-4">
    @include('accounts.partials.index_statistical', ['accountStatistical' => $accountStatistical])

    @include('accounts.partials.index_table')
</div>

<div>
    {{-- @include('accounts.partials.modal_destroy') --}}
</div>
@endsection

@push('script')
@endpush
