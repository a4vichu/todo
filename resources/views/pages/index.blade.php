@extends('layouts.app')

@section('content')
    <div class="bg-white rounded shadow p-6 m-4 w-full lg:w-3/4 lg:max-w-lg">
        {{-- Alert Component --}}
        @include('partials.alert')
        <div class="mb-4">
            <h1 class="text-grey-darkest">Todo List</h1>
            <form action="{{ route('tasks.store') }}" method="POST" class="flex mt-4">
                @csrf
                <input name="title" class="shadow appearance-none border rounded w-full py-2 px-3 mr-4 text-grey-darker"
                    placeholder="Add Todo" required>
                    <input name="description" class="shadow appearance-none border rounded w-full py-2 px-3 mr-4 text-grey-darker"
                    placeholder="Description" required>
                <button type="submit"
                    class="flex-no-shrink p-2 border-2 rounded text-teal border-teal hover:text-white hover:bg-teal">Add</button>
            </form>
        </div>

        <div>
            @foreach ($tasks as $task)
                <div class="flex mb-4 items-center">
                    <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="flex w-full">
                        @csrf
                        @method('PUT')
                        <input type="text" name="title" value="{{ $task->title }}"
                            class="w-full {{ $task->status ? 'line-through text-green' : 'text-grey-darkest' }}" required>
                            <input type="text" name="description" value="{{ $task->description }}"
                            class="w-full {{ $task->status ? 'line-through text-green' : 'text-grey-darkest' }}" required>
                        <input type="hidden" name="status" value="{{ $task->status ? 0 : 1 }}">
                        <button type="submit"
                            class="flex-no-shrink p-2 ml-4 mr-2 border-2 rounded hover:text-white {{ $task->status ? 'text-grey border-grey hover:bg-grey' : 'text-green border-green hover:bg-green' }}">
                            {{ $task->status ? 'Not Done' : 'Done' }}
                        </button>
                    </form>
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="flex-no-shrink">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="flex-no-shrink p-2 ml-2 border-2 rounded text-red border-red hover:text-white hover:bg-red">Remove</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
@endsection
