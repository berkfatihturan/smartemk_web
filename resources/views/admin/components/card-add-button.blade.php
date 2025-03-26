<div id="add_stock_button" style=" position: relative"
     onclick="openBoxBlock('add_stock_box')">
    <a href="#">
                                <span class="btn btn-info" style="padding: 2px!important;">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                         style="fill: white; height: 32px; width: 32px; border: 2px solid white; padding: 5px; border-radius: 5px">
                                        <path
                                            d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/>
                                    </svg>
                                </span>
        <span style="color: black; font-size: 18px;margin-left: 5px">ADD</span>
    </a>

    <div id="add_stock_box" style="">
        @foreach($card_item as $key => $item)
            <div class="card card-default color-palette-box mt-1">
                <a
                    @isset($openDirectly[$key])
                        @if($openDirectly[$key])
                            href="{!! $card_item_url[$key] !!}"
                    @else
                        onclick="openIframe('{!! $card_item_url[$key] !!}', 50, 50, 1200, 900, '{{$item}}')"
                    @endif
                    @else
                        onclick="openIframe('{!! $card_item_url[$key] !!}', 50, 50, 1200, 900, '{{$item}}')"
                    @endisset
                >
                    <div class="card-body p-2">{{$item}}</div>
                </a>

            </div>
        @endforeach

    </div>

</div>
