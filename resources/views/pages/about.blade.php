@extends('layouts.app')

@section('content')
    <div class="home-inner2">
    <div class="container p-2 bg-white text-dark">
       <h1>{{ $title }}</h1>
       <div class="row"></div>
       <p></p>
       <a href="{{ route('services')  }}" class="btn btn-primary" role="button">Our Other Services</a>
       
    </div>
    </div>
@endsection

