@extends('layouts.app')

@section('content')
    <h1 class="mb-3">Photographers</h1>
    @if (count($photographers) > 0)
        @foreach ($photographers as $photographer)
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-2">
                            <img class="w-100" src="/{{$photographer->profile_picture}}" />
                        </div>
                        <div class="col-10">
                            <h3><a href="/api/photographers/{{$photographer->id}}">{{$photographer->name}}</a></h3>
                            <p>{{$photographer->bio}}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="alert alert-danger">No photographers found.</p>
    @endif
@endsection
