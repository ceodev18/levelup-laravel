@extends('layouts.app')

@section('content')
    <div>
        
    </div>
    <h1>Search Articles</h1>

    <form action="{{ route('articles.search') }}" method="GET">
        @csrf
        <input type="text" name="search" placeholder="Search articles..." value="{{ old('search') }}">
        <button type="submit">Search</button>
    </form>

    @if(isset($articles))
        <h2>Search Results</h2>
        @if($articles->isEmpty())
            <p>No articles found.</p>
        @else
            <ul>
                @foreach($articles as $article)
                    <li>{{ $article->title }}</li>
                    <li>{{ $article->content }}</li>
                @endforeach
            </ul>
        @endif
    @endif

@endsection