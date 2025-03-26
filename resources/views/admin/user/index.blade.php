@extends('layouts.adminbase')
@section('content-title', 'Users')
@section('head_extra')
@endsection

@section('content')

    <div class="card">
        <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
            <h3 class="card-title">List </h3>

        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                <tr>
                    <th style="width: 3%">ID</th>
                    <th style="width: 15%">UserName</th>
                    <th>Email</th>
                    <th style="width: 25%">Ofline/Online</th>
                    <th style="width: 15%">Last Seen</th>
                    <th style="width: 1%"></th>
                    <th style="width: 1%"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($UsersData as $user)
                    @if($user->id != 0)
                        <tr id="{{$user->id}}">
                            <td>{{$user->id}}</td>
                            <td class="username">{{$user->name}}</td>
                            <td class="email">{{$user->email}}</td>
                            <td>@if($user->last_seen >= now()->subMinute(2))
                                    <button type="button" class="btn btn-block btn-success" style="width: 120px">Online
                                    </button>
                                @else
                                    <button type="button" class="btn btn-block btn-secondary" style="width: 120px">
                                        Offline
                                    </button>
                                @endif</td>
                            <td>{{\Carbon\Carbon::parse($user->last_seen)->setTimezone('Europe/Istanbul')->toDateTimeString()}}</td>
                            <td class="@if(!\App\Models\User::is_allow_to_access(null,'admin_user_show')) not-allowed @endif">
                                <a onclick="openIframe('{{route('admin_user_show',['id'=>$user->id])}}', 100, 100, 1000, 800,'User Detail')"
                                   class="btn btn-block btn-info btn-sm">
                                    Detail
                                </a>
                            </td>
                            <td class="@if(!\App\Models\User::is_allow_to_access(null,'admin_user_destroy')) not-allowed @endif">
                                <a href="{{route('admin_user_destroy',['id'=>$user->id])}}"
                                   class="btn btn-block btn-danger btn-sm"
                                   style="@if(\Illuminate\Support\Facades\Auth::user()->id ==$user->id) pointer-events: none; @endif">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

@endsection
