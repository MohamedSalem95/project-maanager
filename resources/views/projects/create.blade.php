@extends('layouts.app')

@section('content')
    
    <div class="row">
        <div class="col">
            <p> <b> Create a new project </b> </p>
            <form action="{{ route('projects.store') }}" method="post">
                @csrf

               @include('projects.form')

                <button class="btn btn-primary"> Save </button>
            </form>
        </div>
    </div>


@endsection