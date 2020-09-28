@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Task</div>

                <div class="card-body">


                    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                        @csrf
                        @method('put')

                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" id="description" name="description" value="{{$task->description}}">
                        </div>

                        <div class="form-group">
                            <label for="command">Command</label>
                            <input type="text" class="form-control" id="command" name="command" value="{{$task->command}}">
                        </div>

                        <div class="form-group">
                            <label for="notification_email">Notification Email</label>
                            <input type="text" class="form-control" id="notification_email" name="notification_email" value="{{$task->notification_email}}">
                        </div>

                        <div class="form-group">
                            <label for="expression">Cron Expression</label>
                            <input type="text" class="form-control" id="expression" name="expression" value="* * * * *" value="{{$task->expression ?: '* * * * *'}}">
                        </div>

                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="dont_overlap" name="dont_overlap"
                                value="1" value="{{$task->dont_overlap ? 'checked' : ''}}">
                            <label class="form-check-label" for="dont_overlap">Don't Overlap</label>
                        </div>

                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="run_in_maintenance"
                                name="run_in_maintenance" value="1" value="{{$task->run_in_maintenance ? 'checked' : ''}}">
                            <label class="form-check-label" for="run_in_maintenance">Run in Maintenance</label>
                        </div>

                        <div class="float-right">
                            <button type="submit" class="btn btn-sm btn-outline-dark">Edit</button>
                            <a href="{{ route('tasks.index') }}" class="btn btn-sm btn-outline-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection