@extends('layouts.app')

@section('title', 'Movies Dashboard')

@section('content')

<div class="page-header">

    <h1 class="page-title">
        Movies Dashboard
    </h1>

</div>


<div class="movies-grid">

    @foreach ($movies as $movie)

        <div class="movie-card">

            @if ($movie->image)

                <img
                    src="{{ asset('storage/' . (str_starts_with($movie->image, 'movies/')
                        ? $movie->image
                        : 'movies/' . $movie->image)) }}"
                    alt="{{ $movie->title }}"
                    class="movie-image"
                >

            @endif


            <div class="movie-content">

                <h2 class="movie-title">
                    {{ $movie->title }}
                </h2>

                <p class="movie-description">
                    {{ $movie->description }}
                </p>

                <p class="movie-info">
                    Release Year: {{ $movie->release_year }}
                </p>

                <p class="rating">
                    ⭐ {{ $movie->rating }}/10
                </p>


                <div class="actions">

                    <a
                        href="{{ route('movies.edit', $movie) }}"
                        class="edit-btn"
                    >
                        Edit
                    </a>


                    <form
                        action="{{ route('movies.destroy', $movie) }}"
                        method="POST"
                        class="delete-form"
                    >

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="delete-btn"
                            onclick="return confirm('Are you sure you want to delete this movie?')"
                        >
                            Delete
                        </button>

                    </form>

                </div>

            </div>

        </div>

    @endforeach

</div>

@endsection