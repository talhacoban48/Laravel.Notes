@extends('layouts.app')

@section('content')
    <h1>Edit Todo</h1>
    <a href="{{ route('todos.index') }}" class="btn btn-secondary">Back</a>

    <hr>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('todos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                value="{{ $todo->title }}" required>
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea type="text" class="form-control @error('description') is-invalid @enderror" id="description"
                value="{{ $todo->description }}" name="description" required></textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id"
                required>
                <option value="">Select a Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $todo->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                @foreach ($statuses as $status)
                    <option value="{{ $status->value }}" {{ $todo->status == $status->value ? 'selected' : '' }}>
                        {{ $status->label() }}</option>
                @endforeach
            </select>
            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="priority" class="form-label">Priority</label>
            <select class="form-select @error('status') is-invalid @enderror" id="priority" name="priority" required>
                @foreach ($priorities as $priority)
                    <option value="{{ $priority->value }}" {{ $todo->priority == $priority->value ? 'selected' : '' }}>
                        {{ $priority->label() }}</option>
                @endforeach
            </select>
            @error('priority')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="due_date" class="form-label">Due Date</label>
            <input type="date" class="form-control @error('due_date') is-invalid @enderror" id="due_date"
                name="due_date" value="{{ $todo->due_date }}" required>
            @error('due_date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="is_starred" class="form-label">Star</label>
            <input type="checkbox" class="form-check-input @error('is_starred') is-invalid @enderror" id="is_starred"
                {{ $todo->is_starred ? 'checked' : '' }} name="is_starred">
            @error('is_starred')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
@endsection
