@extends('layouts.app')

@section('content')
    @component('components.header')
        @slot('active', 'clients')
    @endcomponent

    <div class="d-flex justify-content-end">
        <a
        href="{{ route('clients.create') }}"
        class="btn btn-info mb-3"
        >Create +</a>
    </div>

    @if($clients->count() === 0)
        <p>No clients found!</p>
    @else
        <table class="table">
            <thead class="table-light">
                <th>ID#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th></th>
            </thead>
            <tbody>
                @foreach($clients as $client)
                    @component('clients.components.table_row')
                        @slot('client', $client)
                    @endcomponent
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
