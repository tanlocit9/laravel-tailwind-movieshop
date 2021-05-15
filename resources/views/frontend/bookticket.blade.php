@extends('layouts.main')

@section('content')
@livewire('frontend.book-ticket', ['movie' => $movie])
@endsection
