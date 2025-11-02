@extends('layouts.app')

@section('content')
    <h1>Categories</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-primary">Add Category</a>

    <table class="table table-stripped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Color</th>
                <th scope="col">Description</th>
                <th scope="col">#</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td scope="col">{{ $category->id }}</td>
                    <td scope="col">
                        <a href="{{ route('categories.show', $category->id) }}">
                            {{ $category->name }}
                        </a>
                    </td>
                    <td scope="col">{{ $category->color }}</td>
                    <td scope="col">{{ $category->description }}</td>
                    <td scope="col">
                        <a href="{{ route('categories.edit', $category->id) }}">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $categories->links('pagination::bootstrap-5') }}
@endsection
