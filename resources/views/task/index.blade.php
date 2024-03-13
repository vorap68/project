@extends('layouts.app')


@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">All tasks</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body p-0 col-md-8"">
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th style="width: 5%">
                                    ID
                                </th>
                                <th>
                                    Name
                                </th>
                                <th style="width: 50%">
                                    Aaction
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)

                                    <tr>
                                        <td>
                                            {{ $task['id'] }}
                                        </td>
                                        <td>
                                            {{ $task['name'] }}
                                        </td>

                                        <td class="project-actions text-right">
                                            <a class="btn btn-info btn-sm " href="{{ route('task.share', $task->id) }}">Share this
                                                                    task</a>
                                            <a class="btn btn-info btn-sm " href="{{ route('task.edit', $task->id) }}">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </a>
                                            <form action="{{ route('task.destroy', $task['id']) }}" method="get"
                                                style="display: inline-block">
                                                @csrf
                                                <input formaction="{{ route('task.destroy', $task['id']) }}" formmethod="get"
                                                class="btn btn-danger btn-sm delete-btn" type="submit" value="Delete"  />
                                                @if ($task->done ==0)
                                                <input formaction="{{ route('task.closed', $task['id']) }}" formmethod="get"
                                                class="btn btn-danger btn-sm delete-btn" type="submit" value="Done and closed"  />
                                                @endif

                                               </form>
                                        </td>
                                    </tr>

                            @endforeach


                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
    </section>
@endsection
