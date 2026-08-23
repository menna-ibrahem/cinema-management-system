@extends('layouts.app')

@section('title', 'Edit Movie')

@section('content')

<div class="page-header">

    <h1 class="page-title">
        Edit Movie
    </h1>

</div>

<div class="form-container">

    <form
        action="{{ route('movies.update', $movie) }}"
        method="POST"
        enctype="multipart/form-data"
    >

        @csrf
        @method('PUT')

        @include('movies.partials._form')

        <div class="form-actions">

            <button type="submit" class="primary-btn">
                Update Movie
            </button>

            <a
                href="{{ route('movies.index') }}"
                class="secondary-btn"
            >
                Cancel
            </a>

        </div>

    </form>

</div>

@endsection