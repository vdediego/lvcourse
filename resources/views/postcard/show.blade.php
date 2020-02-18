@extends('layouts.app')

@section('content')
    <div class="postcard-front">

        <div class="pc-container">
        <head>
            <meta charset="UTF-8">
            <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700" rel="stylesheet"
                  type="text/css">
            <title></title>
            <style>
                *, *:before, *:after {
                    -webkit-box-sizing: border-box;
                    -moz-box-sizing: border-box;
                    box-sizing: border-box;
                    font-family: 'Source Sans Pro';
                    -webkit-font-smoothing: subpixel-antialiased;
                }

                .pc-container {
                    background-color: transparent;
                    overflow: hidden;
                }

                /* The body section defines the whole size of the postcard and some basic properties. */
                .pc-body {
                    width: 11.25in;
                    height: 6.25in;
                    margin: 0;
                    padding: 0;
                    overflow: hidden;
                }

                /* The card section defines positioning and the overall background of the postcard. */
                #card {
                    position: absolute;
                    left: 0;
                    top: 0;
                    right: 0;
                    bottom: 0;
                    background-color: white;
                    background-image: url('/storage/{{ $postcard->filename }}');
                    background-size: 100%;
                    background-repeat: no-repeat;
                    overflow: hidden;
                }

                /* The safe area defines where your content — especially text — should be contained. Note: You can let your content extend beyond this — i.e. images — but know that some of it may get cut off in the bleed. Modifying this section is not recommended.*/
                #safe-area {
                    position: fixed;
                    left: 0.1875in;
                    right: 0.1875in;
                    top: 0.1875in;
                    bottom: 0.1875in;
                    word-wrap: break-word;
                }
            </style>
        </head>
        <div class="pc-body">
            <div id="card">
                <div id="safe-area">

                </div>
            </div>
        </div>
        </div>
    </div>
@endsection
