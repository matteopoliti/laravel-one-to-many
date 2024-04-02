@extends('layouts.app')

@section('content')
    <main class="container py-3">
        <h1 class="text-success">Projects List</h1>

        <a href="{{ route('dashboard.projects.create') }}" class="btn btn-primary">+ Create new project</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Images</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>

                        <td><a href="{{ route('dashboard.projects.show', $item->slug) }}">{{ $item->title }}</a></td>

                        <td>{{ $item->description }}</td>
                        <td>{{ $item->cover_image }}</td>
                        <td class="d-flex gap-2 ">
                            <a href="{{ route('dashboard.projects.edit', $item->slug) }}" class="btn btn-primary">Edit</a>

                            <form action="{{ route('dashboard.projects.destroy', $item->slug) }}" method="POST">
                                @csrf

                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
@endsection
