@extends('layouts.app')

@section('content')
    <h3>Name:{{ $task->name }}</h3>
   <p>Description:{{ $task->description }}</p>

@endsection

