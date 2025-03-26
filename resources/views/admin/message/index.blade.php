@extends('layouts.adminbase')
@section('content-title', 'Messages')
@section('head_extra')

    <link rel="stylesheet" href="{{asset('assets')}}/css/pagination.css">

@endsection

@section('content')
    <div class="card">

        <div class="card-header">
            <h3 class="card-title">List of Messages</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                <tr>
                    <th style="width: 3%">#</th>
                    <th style="width: 15%">Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th style="width: 25%">Subject</th>
                    <th style="width: 25%">Status</th>
                    <th style="width: 15%">Timestamp</th>
                    <th style="width: 1%"></th>
                    <th style="width: 1%"></th>
                </tr>
                </thead>
                <tbody id="table" data-current-page="1" aria-live="polite">
                @foreach($MsgData as $msg)
                    <tr class="table-item">
                        <td class="item_num"></td>
                        <td>{{$msg->name}}</td>
                        <td>{{$msg->email}}</td>
                        <td>{{$msg->phone}}</td>
                        <td>{{Str::of($msg->subject)->limit(30)}}</td>
                        <td>
                            @if($msg->status == "New")
                                <button type="button"style="width: 100px"
                                        class="btn btn-block btn-primary btn-sm">{{$msg->status}}</button>
                            @elseif($msg->status == "Seen")
                                <button type="button"style="width: 100px"
                                        class="btn btn-block btn-danger btn-sm">{{$msg->status}}</button>
                            @elseif($msg->status == "Ignore")
                                <button type="button"style="width: 100px"
                                        class="btn btn-block btn-secondary btn-sm disabled">{{$msg->status}}</button>
                            @endif

                        </td>
                        <td style="display: flex; align-items: center;"><i
                                class="far fa-clock mr-1"></i> {{ $msg->created_at->diffForHumans()}}</td>
                        <td>
                            <a onclick="openIframe('{{route('admin_message_show',['id'=>$msg->id])}}', 100, 100, 1000, 800,'Message Detail')"
                               class="btn btn-block btn-info btn-sm">
                                Detail
                            </a>
                        </td>
                        <td>
                            <a href="{{route('admin_message_destroy',['id'=>$msg->id])}}"
                               class="btn btn-block btn-danger btn-sm">
                                Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right">
                <li class="page-item">
                    <button class="page-link pagination-button" id="prev-button" aria-label="Previous page"
                            title="Previous page" href="#">«
                    </button>
                </li>

                <div id="pagination-numbers" style="display:contents;">

                </div>
                <li class="page-item">
                    <button class="page-link pagination-button" id="next-button" aria-label="Next page"
                            title="Next page">»
                    </button>
                </li>
            </ul>
        </div>
    </div>

    <script src="{{asset('assets')}}/js/pagination_simple.js"></script>

    <script>
        var listItems111 = document.getElementsByClassName('item_num');
        var num = 1;
        for (const child of listItems111) {
            child.innerHTML = num;
            num += 1;
        }
    </script>
@endsection
