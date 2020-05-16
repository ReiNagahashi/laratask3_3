@extends('welcome')
@section('page')
<div class="container">
        @if(count($errors) > 0)
            <ul class="list-group">
                @foreach($errors->all() as $errors)
                     <li class="list-group-item text-danger">{{$errors}}</li>
                @endforeach
            </ul>
        @endif
        <form action="{{route('task.create')}}" method="POST">
          @csrf
            <div class="form-group">
                <input type="text" name="title" class="form-control">
            </div>
            <input type="submit" value="Submit" class="btn btn-primary">
        </form>
        <div class="card">
            @if(count($tasks) > 0)
                <table class="table">
                    <thead> 
                        <th>Id</th>
                        <th>タイトル</th>
                        <th>状態</th>
                        <th>Action</th>
                    </thead> 
                    <tbody>
                        @foreach($tasks as $task)
                            <tr>
                                <td>{{$task->id}}</td>
                                <td>{{$task->title}}</td>
                                <td>
                                <form action="/updateCompleted" method="post">
                                    @csrf
                                    <input type="hidden" name="task_id" value="{{$task->id}}">
                                      @if($task->completed != 0)
                                        <input class="btn btn-success" type="submit" value="達成済み">
                                      @else
                                        <input class="btn btn-info" type="submit" value="未達成">
                                      @endif
                                </form>
                                </td>
                                <td><button class="btn btn-danger">削除</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
    </div>
</div>
@endsection