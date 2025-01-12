@extends('layouts.app')

@section('content')
    hai {{ Auth::User()->name }} tes
@endsection
