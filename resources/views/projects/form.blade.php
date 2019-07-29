<div class="form-group">
    <label for="name">Name</label>
    <input type="text" id="name" name="name"
            class="form-control @if($errors->has('name')) is-invalid @endif"
            value="{{ old('name', $project->name) }}"
    >
    @foreach($errors->get('name') as $error)
        <div class="invalid-feedback">
            <strong> {{ $error }} </strong>
        </div>

    @endforeach
</div>

<div class="form-group">
    <label for="description">Description</label>
    <textarea id="description" name="description" rows=7
            class="form-control @if($errors->has('description')) is-invalid @endif"
    
    >{{ old('description', $project->description) }}</textarea>
    @foreach($errors->get('description') as $error)
        <div class="invalid-feedback">
            <strong> {{ $error }} </strong>
        </div>

    @endforeach
</div>
    