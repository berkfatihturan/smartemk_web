@extends('layouts.adminbase')
@section('content-title', 'Units')
@section('head_extra')
    @php $settingDataFromLayout=\App\Models\Settings::getSettingValue(); @endphp
    <link rel="stylesheet" href="{{asset('assets')}}/css/pagination.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/stock.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/stock_list.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/filter.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/vertical_filter.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/buttons.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/main.css">
    <style>
        #add_stock_box {
            top: -61px;
        }
    </style>
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="container-header">
                <div class="container-description">
                    This webpage simplifies your business's inventory management by providing a stock list including
                    vital information like product name, code, features, and production date. Here, you can update,
                    delete, or add new stocks. Keeping your stocks up-to-date enhances your business's efficiency.
                </div>
            </div>
            <div class="flex-container mt-3" style="display: flex">

                @include("admin.components.verticalFilter",[
                    'filter_header'=>"<strong>".$blogList->count()."</strong> blogs listed",
                    'target_class_list'=>["value_name","value_description"],
                    'search_item_header'=>["Name","description"],
                    'filter_enable'=>false,
                    'filter_byMinMax_enable'=>false,
                    'filter_byDate_enable'=> false,
                ])

                <div class="table_with_filter ">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap" id="stockTable">
                                <thead>
                                <tr>
                                    <th style="width: 1%">ID</th>
                                    <th style="width: 10%; position: relative">Title
                                    </th>
                                    <th style="width: 10%">Description
                                    </th>
                                    <th style="width: 5%">Created Date</th>
                                    <th style="width: 1%"></th>
                                    <th style="width: .05%"></th>
                                    <th style="width: .05%"></th>
                                </tr>
                                </thead>
                                <tbody class="table" id="table">
                                <div class="table-container" id="table-container">

                                    @foreach($blogList as $blog)
                                        <tr class="table-item" id="{{$blog->id}}">
                                            <td>{{$blog->id}}</td>
                                            <td class="value_name">@isset($blog->title)
                                                    {{$blog->title}}
                                                @else
                                                    ---
                                                @endisset</td>
                                            <td class="value_description">@isset($blog->description)
                                                    {{Str::of($blog->description)->limit(30)}}
                                                @else
                                                    ---
                                                @endisset</td>
                                            <td class="value_created_date">@isset($blog->created_at)
                                                    {{\Carbon\Carbon::parse($blog->created_at)}}
                                                @else
                                                    ---
                                                @endisset</td>
                                            <td>
                                                <a class="btn btn-block btn-primary pb-1 pt-1 pr-2 pl-2">
                                                    <i class="fas fa-search"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{route('admin_blogs_edit',['id'=>$blog->id])}}"
                                                   class="btn btn-block btn-info pb-1 pt-1 pr-2 pl-2">
                                                    <svg
                                                        style="height: 18px; fill: white; position: relative;bottom:1px"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                        <path
                                                            d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/>
                                                    </svg>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{route('admin_blogs_destroy',['id'=>$blog->id])}}"
                                                   onclick="if (confirm('Delete selected item?')){return true;}else{event.stopPropagation(); event.preventDefault();};"
                                                   class="btn btn-block btn-danger pb-1 pt-1 pr-2 pl-2">
                                                    <svg
                                                        style="height: 18px; fill: white; position: relative;bottom:1px"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                        <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                        <path
                                                            d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/>
                                                    </svg>
                                                </a>
                                            </td>
                                        </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">

                            @include('admin.components.card-add-button',[
                            'openDirectly' => [true],
                            'card_item' => ['New Blog'],
                            'card_item_url' => [route('admin_blogs_create')]
                        ])
                            @include('admin.components.pagination-list')
                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>
            </div>
        </div>
    </section>


    <script src="{{asset('assets')}}/js/main.js"></script>
    <script src="{{asset('assets')}}/js/searchbar.js"></script>
    <script src="{{asset('assets')}}/js/pagination_extra.js"></script>

    <script>
        changePaginationLimit(10)
        changeCurrentPage(1)
    </script>
@endsection
