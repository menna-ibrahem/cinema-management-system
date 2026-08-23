<div class="form-group">
    <label for="title">Movie Title</label>

    <input
        type="text"
        id="title"
        name="title"
        value="{{ old('title', $movie->title ?? '') }}"
        placeholder="Enter movie title"
        class="form-input"
    >

    @error('title')
        <span class="form-error">{{ $message }}</span>
    @enderror
</div>


<div class="form-group">
    <label for="description">Description</label>

    <textarea
        id="description"
        name="description"
        rows="5"
        placeholder="Enter movie description"
        class="form-input"
    >{{ old('description', $movie->description ?? '') }}</textarea>

    @error('description')
        <span class="form-error">{{ $message }}</span>
    @enderror
</div>


<div class="form-row">

    <div class="form-group">
        <label for="release_year">Release Year</label>

        <input
            type="number"
            id="release_year"
            name="release_year"
            value="{{ old('release_year', $movie->release_year ?? '') }}"
            placeholder="2026"
            class="form-input"
        >

        @error('release_year')
            <span class="form-error">{{ $message }}</span>
        @enderror
    </div>


    <div class="form-group">
        <label for="rating">Rating</label>

        <input
            type="number"
            id="rating"
            name="rating"
            value="{{ old('rating', $movie->rating ?? '') }}"
            placeholder="8.5"
            step="0.1"
            min="0"
            max="10"
            class="form-input"
        >

        @error('rating')
            <span class="form-error">{{ $message }}</span>
        @enderror
    </div>

</div>


<div class="form-group">

    <label for="image">
        {{ isset($movie) ? 'New Movie Image' : 'Movie Image' }}
    </label>

    <input
        type="file"
        id="image"
        name="image"
        class="form-input file-input"
    >

    @error('image')
        <span class="form-error">{{ $message }}</span>
    @enderror

</div>


@if(isset($movie) && $movie->image)

    <div class="current-image">

        <p>Current Image</p>

        <img
    src="{{ asset('storage/' . (str_starts_with($movie->image, 'movies/')
        ? $movie->image
        : 'movies/' . $movie->image)) }}"
    alt="{{ $movie->title }}"
>

    </div>

@endif