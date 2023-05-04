@extends('base')

@section('title', $article->title)
@section('description', $article->description)

@section('content')
    <h1>{{ $article->title }}</h1>
    {!! $article->content !!}
@endsection
