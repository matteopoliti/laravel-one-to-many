@extends('layouts.app')

@section('content')
    <main class="container py-3">
        <h1 class=" text-uppercase ">
            {{ $project->title }}
        </h1>

        @if ($project->cover_image)
            <img src="{{ asset('/storage/' . $project->cover_image) }}" alt="{{ $project->title }}" class=" img-fluid ">
        @endif

        <p>{{ $project->description }}</p>

        @if ($project->type)
            <p>Type: {{ $project->type->type }}</p>
        @else
            <p>Type: No type </p>
        @endif

        @if ($project->project_start_date)
            <p>Progetto iniziato il: {{ $project->project_start_date }}</p>
        @endif

    </main>
@endsection
