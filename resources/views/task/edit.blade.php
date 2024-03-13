@extends('layouts.app')


@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit task {{ $task->name}}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card card-primary">
                        <!-- form start -->
                        <form action="{{ route('task.update', $task->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                           @method('PUT')
                            <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Name</label>

                                        <input type="text" value="{{ $task->name }}" name="name" class="form-control"
                                            id="name" placeholder="Enter task name" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Description</label>

                                        <input type="text" value="{{ $task->description }}" name="description" class="form-control"
                                            id="description" placeholder="Enter task description" required>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Change</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
