@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">

                        <a href="{{ route("home") }}">Back</a>
test

                        <table width="100%">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Value</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($roomOptions as $option)
                                <tr>
                                    <td>{{ $option->name }}</td>
                                    <td class="toggle-switch">

                                        <label class="switch">
                                            <input type="checkbox" data-id="{{ $option->id }}" class="roomOptionsCheck"
                                                   @if ($option->value == 1)
                                                   checked
                                                   @endif
                                            >
                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
