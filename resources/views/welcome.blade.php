<select name="category_id">
    @foreach($kategorije as $kategorija)
        <option value="{{ $kategorija->id }}">
            {{ $kategorija->nazivKategorije }}
        </option>
    @endforeach
</select>
