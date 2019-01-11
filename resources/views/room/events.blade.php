@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">


                        <a href="{{ route("home") }}">Back</a>

                        <form method="post" action="{{ route('registerForEvents') }}">
                            {!! csrf_field() !!}
                            <input type="hidden" name="eventId" value="3">
                            <input type="submit" name="Register for event"  />
                        </form>

                        <div class="row">

                        @foreach ($events as $event)
                                <div class="col-4"><img style="width: 100%" src="{{ $event->image }}" alt=""> <p style="width: 100%;text-align: center;">{{ $event->name }} - {{ gmdate("H:i:s", $event->duration) }}h</p></div>
                        @endforeach

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
