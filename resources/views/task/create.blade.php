@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->

    <!-- /.content-header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h2 class="m-0">Add task for category:{{$category->name}}</h2>
                </div><!-- /.col -->
            </div><!-- /.row -->

        </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card card-primary">
                        <form method="POST" action="{{ route('task.store',$category->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="name">name</label>

                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="name ">
                                </div>

                                <div class="form-group">
                                    <label for="description">description</label>

                                    <input type="text" name="description" class="form-control" id="description"
                                        placeholder="description ">
                                </div>

                                <div class="form-group">
                                    <label for="description"> time of completion</label>

                                    <input type="date" name="deadline" class="form-control" id="deadline"
                                        placeholder="deadline ">
                                </div>
                            </br>
                                <div class="form-check">
                                    <input class="form-check-input" name="nextTask" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                     Add next task..
                                    </label>
                                  </div>


                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
