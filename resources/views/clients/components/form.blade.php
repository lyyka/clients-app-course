@php
    /** @var \App\Models\Client $client */
    /** @var \App\Models\Product $product */
@endphp

<div class="mb-3">
    <label for="first_name" class="form-label">First name</label>
    <input type="text" autocomplete="username"
           name="first_name"
           value="{{ old('first_name', $client?->first_name) }}"
           class="form-control" id="first_name" placeholder="Jane">
    @error('first_name')
    <p class="text-danger">{{ $message }}</p>
    @enderror
</div>

<div class="mb-3">
    <label for="last_name" class="form-label">Last name</label>
    <input type="text" autocomplete="username"
           name="last_name"
           value="{{ old('last_name', $client?->last_name) }}"
           class="form-control" id="last_name" placeholder="Doe">
    @error('last_name')
    <p class="text-danger">{{ $message }}</p>
    @enderror
</div>

<div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" autocomplete="username"
           name="email"
           value="{{ old('email', $client?->email) }}"
           class="form-control" id="email" placeholder="jane@doe.com">
    @error('email')
    <p class="text-danger">{{ $message }}</p>
    @enderror
</div>

<div class="mb-3">
    <label for="phone" class="form-label">Phone</label>
    <input type="text" autocomplete="username"
           name="phone"
           value="{{ old('phone', $client?->phone) }}"
           class="form-control" id="phone" placeholder="+1 123 123 ...">
    @error('phone')
    <p class="text-danger">{{ $message }}</p>
    @enderror
</div>

<div class="mb-3">
    <label for="phone" class="form-label">Products</label>
    @foreach($products as $product)
        <div class="form-check">
            <input class="form-check-input" type="checkbox"
                    name="product_ids[]"
                   @if(in_array($product->id, $selectedProductIds)) checked @endif
                   value="{{ $product->id }}" id="product-{{ $product->id }}">
            <label class="form-check-label" for="product-{{ $product->id }}">
                {{ $product->name }}
            </label>
        </div>
    @endforeach
</div>
