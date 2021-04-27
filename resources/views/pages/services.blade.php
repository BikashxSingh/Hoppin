@extends('layouts.app')

@section('content')
    <div class="home-inner2">
        <div class="container bg-white text-dark">
            <h1>{{ $title }}</h1>
            @if (count($services) > 0)
                <ul>
                    @foreach ($services as $service)
                        {{-- <li class="list-group-item text-dark">{{ $service }}</li> --}}
                        <div class="row">
                            <div class="col">
                                <div class="d-flex flex-row">
                                    <div class="p-4 align-self-start">
                                        <i class="fa fa-list"></i>
                                    </div>
                                    <div class="p-4 align-self-end">{{ $service }}</div>
                                </div>
                            </div>
                        </div>   
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
@endsection
