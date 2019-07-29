@extends('layouts.app')

@section('content')
    
    <div class="row">
        <div class="col-md-9">
            <h3> {{ $project->name }} </h3>
            <p> {{ $project->description }} </p>
            <small class="text-muted font-weight-bold">
                created {{ $project->date_for_humans }}
            </small>
        </div>

        <div class="col-md-3">
            <h5> Actions </h5>
            <a href="{{ route('projects.edit', $project->id) }}"> Edit </a>
            <br>
            <a href="#"> Delete </a>
            <hr>
            <form method="POST" action="{{ route('projects.addUser', $project->id) }}">
                @csrf
                <div class="row">
                    

                        <div class="col-10">
                            <div class="form-group">
                                <select name="user" id="">
                                    <option value="" style="width: 100%"> add user to this project </option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}"> {{ $user->name }} </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="col-2">
                            <button class="btn btn-primary btn-sm"> add </button>
                        </div>

                
                </div>
            </form>
            <hr>
            <h3> Users in this project </h3>
            @foreach($members as $member)
                <p>
                    {{ $member->name }}
                    <a href="{{ route('projects.removeUser', [$project->id, $member->id]) }}"> remove </a>
                 </p>
            @endforeach

        </div>
    </div>


@endsection