@extends('layouts.adminwindows')
@section('content-title', 'Message Detail')
@section('head-extra')
    <style>
        .delete_button {

        }
    </style>
@endsection
@section('content')
    <div class="card">
        <div class="card-header" style="position:relative;">
            <h3 class="card-title">Message Detail</h3>
            <div style="position: absolute; right: 10px; top:4px; ">
                <p>{{ $MsgdData->created_at->diffForHumans()}}</p>

            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <table class="table table-head-fixed text-nowrap">
                <tr>
                    <th style="width: 17%;min-width: 120px">ID</th>
                    <td>{{$MsgdData->id}}</td>
                </tr>
                <tr>
                    <th>Full Name</th>
                    <td>{{$MsgdData->name}}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{$MsgdData->email}}</td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>{{$MsgdData->phone}}</td>
                </tr>
                <tr>
                    <th>Subject</th>
                    <td>{{$MsgdData->subject}}</td>
                </tr>
                <tr>
                    <th>Message</th>
                    <td>{{$MsgdData->message}}</td>
                </tr>
                <form action="{{route("admin_message_update",['id'=>$MsgdData->id])}}" method="post">
                    @csrf
                <tr>
                    <th>Note</th>
                    <td>
                        <div style="display:flex; flex-wrap: wrap;justify-content: flex-end">
                            <textarea class="form-control"  name="note" rows="4" cols="110">
                                {{$MsgdData->note}}
                            </textarea>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th style="padding-top: 20px">Status</th>
                    <td style="padding-top: 5px">
                        <div style="display:flex;align-items: flex-end;">
                            <select id="status" class="form-control" name="status">
                                <option value="New" @if($MsgdData->status=='New') selected @endif>New</option>
                                <option value="Seen" @if($MsgdData->status=='Seen') selected @endif>Seen</option>
                                <option value="Ignore" @if($MsgdData->status=='Ignore') selected @endif>Ignore</option>
                            </select>
                            <button type="submit" class="btn btn-primary ml-2" style="margin-top:10px;">Update</button>
                        </div>
                    </td>
                </tr>
                </form>
                <tr>
                    <th>Ip</th>
                    <td>{{$MsgdData->ip}}</td>
                </tr>
                <tr>
                    <th>Created At</th>
                    <td>{{$MsgdData->created_at}}</td>
                </tr>
                <tr>
                    <th>Updated At</th>
                    <td>{{$MsgdData->updated_at}}</td>
                </tr>
            </table>

        </div>
        <!-- /.card-body -->
    </div>

@endsection
