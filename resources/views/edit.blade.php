@extends('layout')

@section('content')
<style>
    .uper {
        margin-top: 40px;
    }
</style>
<div class="card uper">
    <div class="card-header">
        Edit Datas
    </div>
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
        @endif
        <form method="post" action="{{ route('users.update', $users->id ) }}" enctype="multipart/form-data">
            <div class="form-group">
                @csrf
                @method('PATCH')
                <label for="country_name">Name:</label>
                <input type="text" class="form-control" name="name" value="{{ $users->name }}"/>
            </div>
            <div class="form-group">
                <label for="cases">Surname:</label>
                <input type="text" class="form-control" name="surname" value="{{ $users->surname }}"/>
            </div>
            <div class="form-group">
                <label for="cases">Picture:</label>
                <input type="file" class="form-control" name="file" value="{{ 'public/uploads/' . $users->file }}"/>
            </div>
            <button type="submit" class="btn btn-primary">Update Datas</button>
        </form>
    </div>
</div>
@endsection