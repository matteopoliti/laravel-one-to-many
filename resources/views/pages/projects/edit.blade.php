@extends('layouts.app')

@section('content')
    <main class="container py-3">
        <h1 class="text-success">Edit Project</h1>
        <form action="{{ route('dashboard.projects.update', $project->slug) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text"
                    class="form-control @error('title')
                    is-invalid
                    @enderror"
                    id="title" name="title" required value="{{ old('title') ?? $project->title }}">
                @error('title')
                    <div class="alert alert-danger mt-1">

                        {{ $message }}

                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <div>
                    @if ($project->cover_image)
                        <img src="{{ asset('/storage/' . $project->cover_image) }}" alt="{{ $project->title }}">
                    @endif
                </div>
                <label for="cover_image" class="form-label">Upload cover</label>
                <input type="file"
                    class="form-control @error('cover_image')
                   is-invalid
                   @enderror"
                    id="cover_image" name="cover_image">
                @error('cover_image')
                    <div class="alert alert-danger mt-1">

                        {{ $message }}

                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="type_id" class="form-label">Types</label>
                <select class="form-select @error('type_id')
                    is-invalid
                    @enderror"
                    name="type_id" id="type_id">
                    <option>Select One</option>
                    @foreach ($types as $item)
                        <option value="{{ $item->id }}"
                            {{ $item->id == old('type_id', $project->type ? $project->type->id : '') ? 'selected' : '' }}>
                            {{ $item->type }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') ?? $project->description }}</textarea>
            </div>

            <div class="mb-3">
                <label for="project_start_date" class="form-label">Project start date</label>
                <input type="date" class="form-control" id="project_start_date" name="project_start_date"
                    value="{{ old('project_start_date') ?? $project->project_start_date }}">
            </div>


            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </main>
@endsection
