@extends('layouts.app')

@section('content')
<div class="panel-body">
    <!-- Display Validation Errors -->
    @include('common.errors')

    <!-- New Task Form -->
    <form action="/task" method="POST">
        {{ csrf_field() }}

        <!-- Task Name -->

        <h1>
            <label for="task">Tasks</label>
        </h1>
        <input type="text" name="name" placeholder="Add Task" id="task-name" class="border focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">

        <!-- Add Task Button -->
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Add Task
        </button>

    </form>
    <br>

    <!-- Current Tasks -->
    @if(count($tasks) > 0)
    <div>
        <h1>
            Current Tasks
        </h1>

        <div>
            <table>

                <!-- Table Headings -->
                <thead>
                    <th>Task</th>
                    <th>&nbsp;</th>
                </thead>

                <!-- Table Body -->
                <tbody>
                    @foreach ($tasks as $task)
                    <tr>
                        <!-- Task Name -->
                        <td>
                            <div>{{ $task->name }}</div>
                        </td>

                        <!-- Delete Button -->
                        <td>
                            <form action="/task/{{ $task->id }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete Task</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
</div>
@endsection