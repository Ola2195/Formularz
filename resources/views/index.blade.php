@extends('layout')

@section('content')
    <style>
        .container { 
            margin-top: 40px;
            height:100vh; }
        .uper {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        a.btn {
            width: 100%;
            margin: 5px;            
        }
    </style>

    @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}  
        </div><br />
    @endif
    <div class="uper">
        <a href="{{ route('form.create') }}" class="btn btn-primary">Go to form</a>
        <a href="{{ route('login') }}" class="btn btn-secondary">Go to table</a>
        <!-- <a href="{{ route('admin') }}" class="btn btn-secondary">New Admin</a> -->
    <div>
@endsection