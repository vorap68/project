@extends('layouts.app')

@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                        <div class="container-fluid">
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav mx-auto  mb-2 mb-lg-0 ">

                                    @foreach ($categories as $category)
                                        <li class="nav-item dropdown mx-5 border border-3">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                {{ $category->name }}
                                            </a>

                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                @guest
                                                    <li class="border"><a class="dropdown-item bg-info"
                                                            href="{{ route('login') }}">Bitte {{ __('Login') }}</a>
                                                    </li>
                                                @endguest
                                                @auth
                                                    @foreach ($category->tasks as $task)
                                                        {{-- <div class="border"> --}}
                                                        @include('card.task')

                                                        {{-- </div> --}}
                                                    @endforeach


                                                    <li class="border"><a class="dropdown-item bg-info"
                                                            href="{{ route('task.manage', $category->id) }}">Manage tasks</a>
                                                    </li>

                                                    <li><a class="dropdown-item bg-info"
                                                            href="{{ route('task.create', $category->id) }}">Add task</a></li>
                                                @endauth
                                            </ul>
                                        </li>
                                    @endforeach


                                </ul>

                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
