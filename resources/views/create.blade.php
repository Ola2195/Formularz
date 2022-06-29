@extends('layout')

@section('content')
<style>
    .uper {
        margin-top: 40px;
    }
    .btn {
        margin-top: 5px;
    }
</style>
<div class="card uper">
    <div class="card-header">
        Form
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
        <form method="post" action="{{ route('form.store') }}" enctype="multipart/form-data">
            <div class="form-group">
                @csrf
                <label for="country_name">Name:</label>
                <input type="text" class="form-control" name="name"/>
            </div>
            <div class="form-group">
                <label for="cases">Surname:</label>
                <input type="text" class="form-control" name="surname"/>
            </div>
            <div class="form-group">
                <label for="cases">Picture:</label>
                <input type="file" class="form-control" name="file"/>
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>
</div>
@endsection