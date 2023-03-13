@extends('layouts.app')

@section('content')
    <a
        href="{{ route('clients.index') }}"
        class="text-dark d-inline-block mb-4"
    >< Go back</a>

    <h1>Create client</h1>

    <form action="{{ route('clients.store') }}" method="POST">
        @csrf

        @component('clients.components.form')
            @slot('client', null)
            @slot('products', $products)
            @slot('selectedProductIds', [])
        @endcomponent

        <button
            type="submit"
            class="btn btn-dark"
        >Save</button>
    </form>
@endsection
