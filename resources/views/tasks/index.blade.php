@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        All Tasks
                        <a class="btn btn-sm btn-success float-right" href="{{route('tasks.create')}}">Add Task</a>
                    </div>

                    {{-- session status --}}
                    <div class="card-body">
                        @if (Session('status'))
                            {{session('status')}}
                    </div>
                    @endif
                </div>


                {{-- tables --}}
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Description</th>
                        <th scope="col">Last Run</th>
                        <th scope="col">Average Runtime</th>
                        <th scope="col">Next Run</th>
                        <th scope="col">Active</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>

                    @forelse ($tasks as $task)
                        <tr class="table-{{$task->is_active ? 'success' : 'danger'}}">
                            <th><a href="{{route('tasks.edit',$task->id)}}">{{$task->description}}</a></th>
                            <td>{{$task->last_run}}</td>
                            <td>{{$task->average_runtime}} seconds</td>
                            <td>{{$task->next_run}}</td>
                            <td>
                                <form id="task-id-{{$task->id}}" action="{{route('tasks.toggle',$task->id)}}"
                                      method="post">
                                    @csrf
                                    @method('put')
                                    <input type="checkbox" {{$task->is_active ? 'checked' : ''}}
                                    onChange="getElementById('task-id-{{$task->id}}').submit(); ">
                                </form>
                            </td>

                            <td>
                                <form action="{{route('tasks.destroy',$task->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <th>No Values availaible</th>
                        </tr>
                    @endforelse

                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
