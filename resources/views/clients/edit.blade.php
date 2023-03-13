@extends('layouts.app')

@section('content')
    <a
        href="{{ route('clients.index') }}"
        class="text-dark d-inline-block mb-4"
    >< Go back</a>

    <h1>Edit client</h1>

    <form action="{{ route('clients.update', ['client' => $client]) }}" method="POST">
        @csrf
        @method('PUT')

        @component('clients.components.form')
            @slot('client', $client)
            @slot('products', $products)
            @slot('selectedProductIds', $selectedProductIds)
        @endcomponent

        <button
            type="submit"
            class="btn btn-dark"
        >Update</button>
    </form>
@endsection
