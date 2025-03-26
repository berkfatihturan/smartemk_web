<ul style="padding:0;list-style: none; color: white;">
    @if($barcode_list)
        @foreach($barcode_list as $barcode)
            <li>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                     style="fill: white;padding: 1px; width: 20px;">
                    <path
                        d="M24 32C10.7 32 0 42.7 0 56L0 456c0 13.3 10.7 24 24 24l16 0c13.3 0 24-10.7 24-24L64 56c0-13.3-10.7-24-24-24L24 32zm88 0c-8.8 0-16 7.2-16 16l0 416c0 8.8 7.2 16 16 16s16-7.2 16-16l0-416c0-8.8-7.2-16-16-16zm72 0c-13.3 0-24 10.7-24 24l0 400c0 13.3 10.7 24 24 24l16 0c13.3 0 24-10.7 24-24l0-400c0-13.3-10.7-24-24-24l-16 0zm96 0c-13.3 0-24 10.7-24 24l0 400c0 13.3 10.7 24 24 24l16 0c13.3 0 24-10.7 24-24l0-400c0-13.3-10.7-24-24-24l-16 0zM448 56l0 400c0 13.3 10.7 24 24 24l16 0c13.3 0 24-10.7 24-24l0-400c0-13.3-10.7-24-24-24l-16 0c-13.3 0-24 10.7-24 24zm-64-8l0 416c0 8.8 7.2 16 16 16s16-7.2 16-16l0-416c0-8.8-7.2-16-16-16s-16 7.2-16 16z"></path>
                </svg>
                <span style="vertical-align: middle; font-size: 16px">{{$barcode->barcode}}</span>
            </li>
        @endforeach
        <hr style="border-color: white"/>
    @else
        <div style="margin: 10px 0;border-radius: 9px;padding: 10px;display: inline-block;background: red;color: white;font-weight: 900;">
            Warning: No barcode found for this product. You may proceed with the order, but it is not recommended due to the missing barcode.
        </div>
    @endif

</ul>
