@extends('layouts.app')

@section('content')
    
    <div class="row">
        <div class="col">
            <p> Edit <b> {{ $project->name }} </b> </p>
            <form action="{{ route('projects.update', $project->id) }}" method="post">
                @csrf
                @method('PUT')

                @include('projects.form')

                <button class="btn btn-primary"> Update </button>
            </form>
        </div>
    </div>


@endsection