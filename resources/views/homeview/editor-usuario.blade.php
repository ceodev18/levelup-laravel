@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Welcome, Editor!</h1>
        <p>This is your custom home page for users with the "editor" role.</p>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Log Out</button>
        </form>
    </div>
@endsection
