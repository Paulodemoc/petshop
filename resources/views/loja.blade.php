@extends('layouts.app')

@section('content')

@if (count($produtos) > 0)
@foreach ($produtos as $produto)

@endforeach
@endif
@endsection
