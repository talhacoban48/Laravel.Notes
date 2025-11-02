@extends('layouts.app')

@section('content')
    <h1>Todo</h1>
    <a href="{{ route('todos.index') }}" class="btn btn-secondary">Back</a>
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{ $todo->title }}</h5>
            <p class="card-text">{{ $todo->description }}</p>
            <p class="card-text">{{ $todo->category->name ?? 'No Category' }}</p>
            <div>
                <a href="{{ route('todos.edit', $todo->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('todos.destroy', $todo->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection
