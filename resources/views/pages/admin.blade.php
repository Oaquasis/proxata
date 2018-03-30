@extends('layouts.master')

@section('content')
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="button">Logout</button>
    </form>
@endsection