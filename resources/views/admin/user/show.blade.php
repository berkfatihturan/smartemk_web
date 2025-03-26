@extends('layouts.adminwindows')
@section('content-title', 'User Detail')
@section('head_extra')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sockjs-client/1.6.1/sockjs.min.js"
            integrity="sha512-1QvjE7BtotQjkq8PxLeF6P46gEpBRXuskzIVgjFpekzFVF4yjRgrQvTG1MTOJ3yQgvTteKAcO7DSZI92+u/yZw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/stomp.js/2.3.3/stomp.min.js"></script>

@endsection
@section('content')
    <a onclick="sendMessage()"></a>
    <div class="card">
        <div class="card-header" style="position:relative;">
            <h3 class="card-title">{{$userData->name}}</h3>
            <div style="position: absolute; right: 10px; top:7px; ">
                @if($userData->last_seen >= now()->subMinute(2))
                    <button type="button" class="btn btn-block btn-success btn-sm p-1" style="font-weight: 700;
    letter-spacing: 1px;">
                        Online
                    </button>
                @else
                    <button type="button" class="btn btn-block btn-danger btn-sm" style="font-weight: 700;
    letter-spacing: 1px;">Offline
                    </button>
                @endif
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <table class="table table-head-fixed text-nowrap">
                <tr>
                    <th style="width: 17%;min-width: 120px">ID</th>
                    <td>{{$userData->id}}</td>
                </tr>
                <tr>
                    <th>UserName</th>
                    <td>{{$userData->name}}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{$userData->email}}</td>
                </tr>
                <tr>
                    <th>Last Seen</th>
                    <td>{{$userData->last_seen}}</td>
                </tr>
                <!--
                <tr>
                    <th>Status</th>
                    <td>
                        @if($userData->status)
                    <button type="button" class="btn btn-block btn-success">Success</button>

                @else
                    <button type="button" class="btn btn-block btn-danger">Danger</button>

                @endif
                </td>
            </tr>
            -->
                <tr>
                    <th>Created At</th>
                    <td>{{$userData->created_at}}</td>
                </tr>
                <tr>
                    <th>Updated At</th>
                    <td>{{$userData->updated_at}}</td>
                </tr>
            </table>

        </div>
        <!-- /.card-body -->
    </div>

    <script>
        var stompClient = null;

        function connect() {
            var socket = new SockJS('http://127.0.0.1:8080/ws-example');
            stompClient = Stomp.over(socket);
            stompClient.connect({}, function (frame) {
                console.log('Connected: ' + frame);
            });
        }


        function sendMessage(url) {
            window.location.replace(url);

        }

        $(function () {
            connect();
        });

    </script>

@endsection
