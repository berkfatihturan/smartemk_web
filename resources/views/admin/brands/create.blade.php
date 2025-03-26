@extends('layouts.adminbase')

@if(Route::currentRouteName() == "admin_brands_create")
    @section('content-title', 'New Brand')
@elseif(Route::currentRouteName() =="admin_brands_edit")
    @section('content-title', 'Update Brand')
@endif

@section('head_extra')
    @php $settingDataFromLayout=\App\Models\Settings::getSettingValue(); @endphp
    <link rel="stylesheet" href="{{asset('assets')}}/css/nice_form.css">
    <script src="{{asset('assets')}}/js/main.js"></script>
    <style>
        .form_box {
            padding: 1.3rem;
        }

        h1 {
            margin-bottom: 0 !important;
        }

        .form_box p {
            margin-top: 5px;
            margin-left: 2px;
        }

        .table th {
            border-top: none;
            padding-block: 6px;
        }

        .role .btn {
            font-size: .7rem;
            letter-spacing: .7px;
            padding: 2px 5px;
        }

        body {
            position: absolute;
            top: 0;
            left: 0;
        }

        .uploaded-img{
            background-repeat: no-repeat;
            background-size: contain, cover;
            height: 50px;
        }
    </style>
@endsection

@section('content')

    <div class="form-page">
        <div class="form-page-navigation">
            <nav>
                <ul>
                    <li onclick="scrollToElement('company')">
                        <a>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                <path
                                    d="M64 48c-8.8 0-16 7.2-16 16V448c0 8.8 7.2 16 16 16h80V400c0-26.5 21.5-48 48-48s48 21.5 48 48v64h80c8.8 0 16-7.2 16-16V64c0-8.8-7.2-16-16-16H64zM0 64C0 28.7 28.7 0 64 0H320c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64zm88 40c0-8.8 7.2-16 16-16h48c8.8 0 16 7.2 16 16v48c0 8.8-7.2 16-16 16H104c-8.8 0-16-7.2-16-16V104zM232 88h48c8.8 0 16 7.2 16 16v48c0 8.8-7.2 16-16 16H232c-8.8 0-16-7.2-16-16V104c0-8.8 7.2-16 16-16zM88 232c0-8.8 7.2-16 16-16h48c8.8 0 16 7.2 16 16v48c0 8.8-7.2 16-16 16H104c-8.8 0-16-7.2-16-16V232zm144-16h48c8.8 0 16 7.2 16 16v48c0 8.8-7.2 16-16 16H232c-8.8 0-16-7.2-16-16V232c0-8.8 7.2-16 16-16z"/>
                            </svg>
                            Company</a>
                    </li>

                    <li onclick="scrollToElement('contact')">
                        <a>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path
                                    d="M384 48c8.8 0 16 7.2 16 16V448c0 8.8-7.2 16-16 16H96c-8.8 0-16-7.2-16-16V64c0-8.8 7.2-16 16-16H384zM96 0C60.7 0 32 28.7 32 64V448c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H96zM240 256a64 64 0 1 0 0-128 64 64 0 1 0 0 128zm-32 32c-44.2 0-80 35.8-80 80c0 8.8 7.2 16 16 16H336c8.8 0 16-7.2 16-16c0-44.2-35.8-80-80-80H208zM512 80c0-8.8-7.2-16-16-16s-16 7.2-16 16v64c0 8.8 7.2 16 16 16s16-7.2 16-16V80zM496 192c-8.8 0-16 7.2-16 16v64c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm16 144c0-8.8-7.2-16-16-16s-16 7.2-16 16v64c0 8.8 7.2 16 16 16s16-7.2 16-16V336z"/>
                            </svg>

                            Contact</a>
                    </li>



                    <hr style="margin-top: 0px; margin-bottom: 10px"/>

                    <li>
                        <a class="btn btn-info btn-sm btn-save"
                           style="color: white; padding: 0.45em .7em; display: flex; opacity: .8;" type="submit"
                           onclick="submitForm_withoutWarning('settings_form')">

                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="white"
                                 style="height: 1.6em !important; width: auto; margin-right: .6em; margin-left: .5em">
                                <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path
                                    d="M48 96V416c0 8.8 7.2 16 16 16H384c8.8 0 16-7.2 16-16V170.5c0-4.2-1.7-8.3-4.7-11.3l33.9-33.9c12 12 18.7 28.3 18.7 45.3V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96C0 60.7 28.7 32 64 32H309.5c17 0 33.3 6.7 45.3 18.7l74.5 74.5-33.9 33.9L320.8 84.7c-.3-.3-.5-.5-.8-.8V184c0 13.3-10.7 24-24 24H104c-13.3 0-24-10.7-24-24V80H64c-8.8 0-16 7.2-16 16zm80-16v80H272V80H128zm32 240a64 64 0 1 1 128 0 64 64 0 1 1 -128 0z"/>
                            </svg>
                            <span
                                style="font-size: 1.4em; font-weight: 500;position: relative; top: 2px">SAVE</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <script>
                function scrollToElement(elementId) {
                    const element = document.getElementById(elementId);
                    if (element) {
                        element.scrollIntoView({behavior: "smooth"});
                    }
                }
            </script>

        </div>
        <main class="form-page-content">
            <form id="settings_form" role="form"
                  action="
               @if(Route::currentRouteName() == "admin_brands_create")
               {{route("admin_brands_store")}}
               @elseif(Route::currentRouteName() =="admin_brands_edit")
               {{route("admin_brands_update",['id'=>$brandData->id])}}
               @endif"
                  method="post"
                  enctype="multipart/form-data">
                @csrf


                <div class="form_box">
                    <div class="href-target" id="company"></div>
                    <h1>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                            <path
                                d="M64 48c-8.8 0-16 7.2-16 16V448c0 8.8 7.2 16 16 16h80V400c0-26.5 21.5-48 48-48s48 21.5 48 48v64h80c8.8 0 16-7.2 16-16V64c0-8.8-7.2-16-16-16H64zM0 64C0 28.7 28.7 0 64 0H320c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64zm88 40c0-8.8 7.2-16 16-16h48c8.8 0 16 7.2 16 16v48c0 8.8-7.2 16-16 16H104c-8.8 0-16-7.2-16-16V104zM232 88h48c8.8 0 16 7.2 16 16v48c0 8.8-7.2 16-16 16H232c-8.8 0-16-7.2-16-16V104c0-8.8 7.2-16 16-16zM88 232c0-8.8 7.2-16 16-16h48c8.8 0 16 7.2 16 16v48c0 8.8-7.2 16-16 16H104c-8.8 0-16-7.2-16-16V232zm144-16h48c8.8 0 16 7.2 16 16v48c0 8.8-7.2 16-16 16H232c-8.8 0-16-7.2-16-16V232c0-8.8 7.2-16 16-16z"/>
                        </svg>
                        Info
                    </h1>
                    <p>
                        ----
                    </p>

                    <div class="nice-form-group">
                        <label>Name</label>
                        <input type="text" placeholder="Name" name="name"
                               value="@if(isset($brandData->name)){{$brandData->name}}@endif"/>
                    </div>

                    <div class="nice-form-group">
                        <label>Main Color</label>
                        <input type="color" name="main_color"
                               value="@if(isset($brandData->main_color)){{$brandData->main_color}}@endif"/>
                    </div>

                    <div class="nice-form-group">
                        <label>Second Color</label>
                        <input type="color"  name="second_color"
                               value="@if(isset($brandData->second_color)){{$brandData->second_color}}@endif"/>
                    </div>

                    <div class="nice-form-group">
                        <label>Keywords</label>
                        <input type="text" placeholder="Keywords" name="keywords"
                               value="@if(isset($brandData->keywords)){{$brandData->keywords}}@endif"/>
                    </div>

                    <div class="nice-form-group">
                        <label>Description</label>
                        @if(isset($brandData->description))
                            <textarea rows="5" placeholder="" name="description">{!! $brandData->description !!}
                            </textarea>
                        @else
                            <textarea rows="5" placeholder="" name="description">
                            </textarea>
                        @endif
                    </div>

                    <div class="nice-form-group">
                        <label>Logo</label>
                        @if(isset($brandData->logo))
                            <div class="uploaded-img" style="background-image: url('{{\Illuminate\Support\Facades\Storage::url($brandData->logo)}}')"></div>
                        @endif
                        <input type="file" name="logo"/>
                    </div>

                    <div class="nice-form-group">
                        <label>Icon</label>
                        @if(isset($brandData->icon))
                            <div class="uploaded-img" style="background-image: url('{{\Illuminate\Support\Facades\Storage::url($brandData->icon)}}')"></div>
                        @endif
                        <input type="file" name="icon"/>
                    </div>

                    <div class="nice-form-group">
                        <label>Main Image</label>
                        @if(isset($brandData->image))
                        <div class="uploaded-img" style="background-image: url('{{\Illuminate\Support\Facades\Storage::url($brandData->image)}}')"></div>
                        @endif
                        <input type="file" name="image"/>
                    </div>

                    <div class="nice-form-group">
                        <label>Backgroud Image</label>
                        @if(isset($brandData->background_image))
                            <div class="uploaded-img" style="background-image: url('{{\Illuminate\Support\Facades\Storage::url($brandData->background_image)}}')"></div>
                        @endif
                        <input type="file" name="background_image"/>
                    </div>
                </div>


                <div class="form_box">
                    <div class="href-target" id="contact"></div>
                    <h1>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path
                                d="M384 48c8.8 0 16 7.2 16 16V448c0 8.8-7.2 16-16 16H96c-8.8 0-16-7.2-16-16V64c0-8.8 7.2-16 16-16H384zM96 0C60.7 0 32 28.7 32 64V448c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H96zM240 256a64 64 0 1 0 0-128 64 64 0 1 0 0 128zm-32 32c-44.2 0-80 35.8-80 80c0 8.8 7.2 16 16 16H336c8.8 0 16-7.2 16-16c0-44.2-35.8-80-80-80H208zM512 80c0-8.8-7.2-16-16-16s-16 7.2-16 16v64c0 8.8 7.2 16 16 16s16-7.2 16-16V80zM496 192c-8.8 0-16 7.2-16 16v64c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm16 144c0-8.8-7.2-16-16-16s-16 7.2-16 16v64c0 8.8 7.2 16 16 16s16-7.2 16-16V336z"/>
                        </svg>
                        Content
                    </h1>
                    <p>--
                    </p>

                    <div class="nice-form-group">
                        <label>Content</label>
                        @if(isset($brandData->content))
                            <textarea name="content" id="editor">
                                {{$brandData->content}}
                            </textarea>
                        @else
                            <textarea name="content" id="editor">

                            </textarea>
                        @endif
                    </div>

                </div>

            </form>

            <a class="btn btn-info btn-sm btn-save_sm_screen"
               style="color: white; padding: 0.45em .7em; opacity: .8; display: none" type="submit"
               onclick="submitForm_withoutWarning('settings_form')">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="white"
                     style="height: 1.6em !important; width: auto; vertical-align:sub;">
                    <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <path
                        d="M48 96V416c0 8.8 7.2 16 16 16H384c8.8 0 16-7.2 16-16V170.5c0-4.2-1.7-8.3-4.7-11.3l33.9-33.9c12 12 18.7 28.3 18.7 45.3V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96C0 60.7 28.7 32 64 32H309.5c17 0 33.3 6.7 45.3 18.7l74.5 74.5-33.9 33.9L320.8 84.7c-.3-.3-.5-.5-.8-.8V184c0 13.3-10.7 24-24 24H104c-13.3 0-24-10.7-24-24V80H64c-8.8 0-16 7.2-16 16zm80-16v80H272V80H128zm32 240a64 64 0 1 1 128 0 64 64 0 1 1 -128 0z"/>
                </svg>
                <span style="font-size: 1.4em; font-weight: 500;position: relative; margin-left: 3px">SAVE</span>
            </a>


            <div style="height: 612px"></div>

        </main>
    </div>


    <script>
        function submitForm_withoutWarning(id) {
            document.getElementById(id).submit();
        }
    </script>
    <script src="{{asset('assets')}}/js/main.js"></script>
    <script src="{{asset('assets')}}/js/socket.js"></script>

    <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/super-build/ckeditor.js"></script>

    <script>
        // This sample still does not showcase all CKEditor&nbsp;5 features (!)
        // Visit https://ckeditor.com/docs/ckeditor5/latest/features/index.html to browse all the features.
        CKEDITOR.ClassicEditor.create(document.getElementById("editor"), {
            // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
            toolbar: {
                items: [
                    'exportPDF', 'exportWord', '|',
                    'findAndReplace', 'selectAll', '|',
                    'heading', '|',
                    'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                    'bulletedList', 'numberedList', 'todoList', '|',
                    'outdent', 'indent', '|',
                    'undo', 'redo',
                    '-',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                    'alignment', '|',
                    'link', 'uploadImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
                    'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                    'textPartLanguage', '|',
                    'sourceEditing'
                ],
                shouldNotGroupWhenFull: true
            },
            // Changing the language of the interface requires loading the language file using the <script> tag.
            // language: 'es',
            list: {
                properties: {
                    styles: true,
                    startIndex: true,
                    reversed: true
                }
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
            heading: {
                options: [
                    {model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph'},
                    {model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1'},
                    {model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2'},
                    {model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3'},
                    {model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4'},
                    {model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5'},
                    {model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6'}
                ]
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
            placeholder: 'Welcome to CKEditor 5!',
            // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
            fontFamily: {
                options: [
                    'default',
                    'Arial, Helvetica, sans-serif',
                    'Courier New, Courier, monospace',
                    'Georgia, serif',
                    'Lucida Sans Unicode, Lucida Grande, sans-serif',
                    'Tahoma, Geneva, sans-serif',
                    'Times New Roman, Times, serif',
                    'Trebuchet MS, Helvetica, sans-serif',
                    'Verdana, Geneva, sans-serif'
                ],
                supportAllValues: true
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
            fontSize: {
                options: [10, 12, 14, 'default', 18, 20, 22],
                supportAllValues: true
            },
            // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
            // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
            htmlSupport: {
                allow: [
                    {
                        name: /.*/,
                        attributes: true,
                        classes: true,
                        styles: true
                    }
                ]
            },
            // Be careful with enabling previews
            // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
            htmlEmbed: {
                showPreviews: true
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
            link: {
                decorators: {
                    addTargetToExternalLinks: true,
                    defaultProtocol: 'https://',
                    toggleDownloadable: {
                        mode: 'manual',
                        label: 'Downloadable',
                        attributes: {
                            download: 'file'
                        }
                    }
                }
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
            mention: {
                feeds: [
                    {
                        marker: '@',
                        feed: [
                            '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                            '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
                            '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
                            '@sugar', '@sweet', '@topping', '@wafer'
                        ],
                        minimumCharacters: 1
                    }
                ]
            },
            // The "superbuild" contains more premium features that require additional configuration, disable them below.
            // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
            removePlugins: [
                // These two are commercial, but you can try them out without registering to a trial.
                // 'ExportPdf',
                // 'ExportWord',
                'AIAssistant',
                'CKBox',
                'CKFinder',
                'EasyImage',
                // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
                // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
                // Storing images as Base64 is usually a very bad idea.
                // Replace it on production website with other solutions:
                // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
                // 'Base64UploadAdapter',
                'RealTimeCollaborativeComments',
                'RealTimeCollaborativeTrackChanges',
                'RealTimeCollaborativeRevisionHistory',
                'PresenceList',
                'Comments',
                'TrackChanges',
                'TrackChangesData',
                'RevisionHistory',
                'Pagination',
                'WProofreader',
                // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
                // from a local file system (file://) - load this site via HTTP server if you enable MathType.
                'MathType',
                // The following features are part of the Productivity Pack and require additional license.
                'SlashCommand',
                'Template',
                'DocumentOutline',
                'FormatPainter',
                'TableOfContents',
                'PasteFromOfficeEnhanced',
                'CaseChange'
            ]
        });
    </script>

@endsection
