@extends('layouts.app')

@section('title', 'Add Movie')

@section('content')

<div class="page-header">

    <h1 class="page-title">
        Add New Movie
    </h1>

</div>

<div class="form-container">

    <form
        action="{{ route('movies.store') }}"
        method="POST"
        enctype="multipart/form-data"
    >

        @csrf

        @include('movies.partials._form')

        <div class="form-actions">

            <button type="submit" class="primary-btn">
                Add Movie
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