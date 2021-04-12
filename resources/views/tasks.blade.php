@extends('layouts.app')

@section('content')
<div class="panel-body">
    <!-- Display Validation Errors -->
    @include('common.errors')

    <!-- New Task Form -->
    <form action="/task" method="POST">
        {{ csrf_field() }}

        <!-- Task Name -->
        <div>
            <label for="task">Task</label>

            <div>
                <input type="text" name="name" id="task-name">
            </div>
        </div>

        <!-- Add Task Button -->
        <div>
            <div>
                <button type="submit">
                    <i></i> Add Task
                </button>
            </div>
        </div>
    </form>

    <!-- Current Tasks -->
    @if(count($tasks) > 0)
    <div>
        <div>
            Current Tasks
        </div>

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

                                <button>Delete Task</button>
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