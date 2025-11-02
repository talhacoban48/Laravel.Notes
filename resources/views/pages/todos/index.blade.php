@extends('layouts.app')

@section('content')
    <h1>Todos</h1>
    <a href="{{ route('todos.create') }}" class="btn btn-primary">Add Todo</a>

    <table class="table table-stripped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Category</th>
                <th scope="col">Status</th>
                <th scope="col">Priority</th>
                <th scope="col">Due Date</th>
                <th scope="col">Completed At</th>
                <th scope="col">Is Starred</th>
                <th scope="col">Check</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($todos as $todo)
                <tr>
                    <td scope="col">{{ $todo->id }}</td>
                    <td scope="col">
                        <a href="{{ route('todos.show', $todo->id) }}">
                            {{ $todo->title }}
                        </a>
                    </td>
                    <td scope="col">{{ $todo->category->name ?? 'No Category' }}</td>
                    <td scope="col">{{ \App\Enums\TodoStatusEnum::from($todo->status)->label() }}</td>
                    <td scope="col">{{ \App\Enums\TodoPriorityEnum::from($todo->priority)->label() }}</td>
                    <td scope="col">{{ $todo->due_date }}</td>
                    <td scope="col">{{ $todo->completed_at }}</td>
                    <td scope="col">{{ $todo->is_starred ? 'Yes' : 'No' }}</td>
                    <td scope="col">
                        <form action="{{ route('todos.check', $todo->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="checkbox" name='check' {{ $todo->completed_at ? 'checked' : '' }}
                                onchange="this.form.submit()">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $todos->appends(request()->query())->links('pagination::bootstrap-5') }}
@endsection
