@extends('layouts.main')

@section('content')
@livewire('book-ticket', ['movie' => $movie])
@endsection
