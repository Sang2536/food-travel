@extends('app')
@section('title', 'Account')

@section('content')
<div class="w-full">
    @include('accounts.partials.index_table', ['accounts' => $accounts])
</div>

</div>
@endsection

@push('script')
@endpush
