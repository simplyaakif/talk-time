@extends('layouts.frontend')
@section('content')
    <div id="app" class="container mt-5">
        <h2>TalkTime Room</h2>
        <hr>
        <agora-chat :allusers="{{ $users }}" authuserid="{{ auth()->id() }}" authuser="{{ auth()->user()->name }}"
                    agora_id="{{ env('AGORA_APP_ID') }}"/>
{{--        <div class="row mt-2">--}}
{{--            @foreach($talents as $k =>$talent)--}}
{{--                <div class="col-sm-3 col-md-2">--}}
{{--                    <div class="card">--}}
{{--                        <img class="card-img-top" src="holder.js/100x180/" alt="">--}}
{{--                        <div class="card-body">--}}
{{--                            <h6 class="card-title">{{$talent->name}}</h6>--}}
{{--                            <span class="btn btn-sm btn-primary">--}}
{{--                            Online--}}
{{--                        </span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
    </div>
@endsection

@section('scripts')
    <script src="{{asset('js/app.js')}}"></script>
    <script src="https://cdn.agora.io/sdk/release/AgoraRTCSDK-3.3.1.js"></script>

@endsection
