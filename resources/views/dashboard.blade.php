@extends('layouts.app')

@section('content')
    Haloo... {{ Auth::User()->name }}
@endsection
