@php
    /** @var \App\Models\Product $product */
@endphp

<div class="mb-3">
    <label for="name" class="form-label">Product name</label>
    <input type="text"
           name="name"
           value="{{ old('name', $product?->name) }}"
           class="form-control" id="name" placeholder="Bananas">
    @error('name')
    <p class="text-danger">{{ $message }}</p>
    @enderror
</div>
