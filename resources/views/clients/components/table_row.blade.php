@php
    /** @var \App\Models\Client $client */
@endphp

<tr>
    <td>
        {{ $client->getKey() }}
    </td>
    <td>
        {{ $client->first_name }} {{ $client->last_name }}
    </td>
    <td>
        {{ $client->email }}
    </td>
    <td>
        {{ $client->phone }}
    </td>
    <td class="d-flex justify-content-end">
        <a
            href="{{ route('clients.edit', ['client' => $client]) }}"
            type="button"
            class="btn btn-dark me-4 d-inline-block"
        >Edit</a>

        <form method="POST" action="{{ route('clients.delete', ['client' => $client]) }}">
            @csrf
            @method('DELETE')
            <button
                type="submit"
                class="btn btn-danger"
            >Delete</button>
        </form>
    </td>
</tr>
