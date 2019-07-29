@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-9">
            @forelse($projects as $project)
                <div class="card mb-2">
                    <div class="card-body">
                        <h4 class="card-title">
                            {{ $project->name }}
                        </h4>
                        <p class="card-text lead">
                            {{ $project->description }}

                        </p>
                        <small class="text-muted font-weight-bold"> created {{ $project->date_for_humans }} </small>
                    </div>
                </div>
            @empty
                <p class="font-weight-bold text-muted">
                    No projects created yet you can go
                    <a href="{{ route('projects.create') }}"> here </a> to create a new one.
                </p>
            @endforelse
            {{ $projects->links() }}
        </div>
        <div class="col-md-3">
            <p>
                <small class="font-weight-bold text-muted">
                    you created {{ $project_count }} {{ str_plural('project', $project_count) }}
                </small>
            </p>
            <p>
                <a href="{{ route('projects.create') }}" class="btn btn-sm btn-primary"> create new project </a>
            </p>
        </div>
    </div>
    
@endsection