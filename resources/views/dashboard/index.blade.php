@extends('dashboard.layouts.main')

@section('container')

    <div class="row text-center" style="color: #15adcc">
        <div class="col">
            <h2>Welcome {{ auth()->user()->name }}</h2>
        </div>
    </div>

@endsection