@extends('layouts.app')


@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h2 class="m-0">Allow users to edit todo:<mark>{{ $task->name }}</mark></h2>
                </div><!-- /.col -->
            </div><!-- /.row -->

        </div><!-- /.container-fluid -->
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ul class="list-group border"><h3>List of users with access</h3>
                        @foreach ($usersAccess as $userAccess)
                            <li class="list-group-item"><mark>{{ $userAccess }}</mark></li>
                        @endforeach
                    </ul>
                </div><!-- /.col -->
            </div><!-- /.row -->

        </div><!-- /.container-fluid -->
    </div>
</br>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body p-0 col-md-8">

                    <div class="row align-items-center">
                        <div class="col-2">
                            User ID
                        </div>
                        <div class="col-3">
                            User name
                        </div>
                        <div class="col-5">
                            User email
                        </div>
                        <div class="col-2">
                            Add user share
                        </div>
                    </div>
                    <form action="{{ route('task.share.store', $task->id) }}" id ="myForm" method="POST">
                        @csrf
                        @foreach ($users as $user)
                            @continue($user->id == Auth::user()->id)
                            <div class="row align-items-center">
                                <div class="col-2">
                                    {{ $user->id }}
                                </div>
                                <div class="col-3">
                                    {{ $user->name }}
                                </div>
                                <div class="col-5">
                                    {{ $user->email }}
                                </div>
                                <div class="col-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked"
                                            name="{{ $user->id }}">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Share
                                        </label>
                                    </div>
                                </div>
                                </tr>
                            </div>
                        @endforeach
                    </form>
                    <div class="card-footer">
                        <button type="submit" form="myForm" class="btn btn-primary">Change</button>
                    </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </section>
@endsection
