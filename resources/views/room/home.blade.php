@extends('layouts.app')

@section('content')
    <!-- @TODO: Blade templates -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">

                        <a class="home-buttons" href="{{ route("foods") }}"><span>Show Foods</span></a>
                        <a class="home-buttons" href="{{ route("roomOptions") }}"><span>Room options</span></a>
                        <a class="home-buttons" href="{{ route("reservation") }}"><span>Reservation info</span></a>
                        <a class="home-buttons" href="{{ route("events") }}"><span>Events</span></a>
                        <a class="home-buttons" href="{{ route("events") }}"><span>FAQ</span></a>

                        <select name="userCurrentLangucurrentLanguageage" id="userCurrentLanguage">
                            <option value="EN" {{ $currentLanguage === "EN" ? "selected" : "" }} >EN</option>
                            <option value="BG" {{ $currentLanguage === "BG" ? "selected" : "" }}>BG</option>
                            <option value="TR" {{ $currentLanguage === "TR" ? "selected" : "" }}>TR</option>
                            <option value="RU" {{ $currentLanguage === "RU" ? "selected" : "" }} >RU</option>
                        </select>

                        <hr>
                        {{ $userInfo['names'] }} - {{ $userInfo['totalAmount'] }}
                        <hr>
                        <table width="100%">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Items</th>
                                <th>TotalPrice</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($userCart as $item)
                                <tr style="border-top:2px solid rgba(0, 0, 0, 0.125);">
                                    <td>{{ $item->id }}</td>
                                    <td>
                                        @foreach ($item->getItems as $item)
                                            {{ $item->name }} - {{ $item->qty }} / {{ $item->price }}, Total - {{ $item->price }}
                                            <br>
                                        @endforeach
                                    </td>
                                    <td>{{ $item->totalPrice }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tbody>
                            <tr style="border-top:2px solid rgba(0, 0, 0, 0.125);">
                                <td colspan="2" style="font-weight: bold;">Total for pay</td>
                                <td style="font-weight: bold;">{{ $totals['totalPrice'] }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
