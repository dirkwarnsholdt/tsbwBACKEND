@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <ul class="nav nav-tabs">
                    @if ($activetab == "info")
                    <li class="active"><a data-toggle="tab" href="#info">Zentrale/Info</a></li>
                    @else
                    <li><a data-toggle="tab" href="#info">Zentrale/Info</a></li>
                    @endif

                    @if ($activetab == "news")
                    <li class="active"><a data-toggle="tab" href="#news">Neuigkeiten</a></li>
                    @else
                    <li><a data-toggle="tab" href="#news">Neuigkeiten</a></li>
                    @endif

                    @if ($activetab == "offer")
                    <li class="active"><a data-toggle="tab" href="#offer">Angebots-Überschriften</a></li>
                    @else
                    <li><a data-toggle="tab" href="#offer">Angebots-Überschriften</a></li>
                    @endif

                    @if ($activetab == "offer_detail")
                    <li class="active"><a data-toggle="tab" href="#offer_detail">Angebote</a></li>
                    @else
                    <li><a data-toggle="tab" href="#offer_detail">Angebote</a></li>
                    @endif

                    @if ($activetab == "person")
                    <li class="active"><a data-toggle="tab" href="#person">Ansprechpartner</a></li>
                    @else
                    <li><a data-toggle="tab" href="#person">Ansprechpartner</a></li>
                    @endif

                    @if ($activetab == "time")
                    <li class="active"><a data-toggle="tab" href="#time">Öffnungszeiten</a></li>
                    @else
                    <li><a data-toggle="tab" href="#time">Öffnungszeiten</a></li>
                    @endif


                    @if ($activetab == "menu")
                    <li class="active"><a data-toggle="tab" href="#menu">Speiseplan</a></li>
                    @else
                    <li><a data-toggle="tab" href="#menu">Speiseplan</a></li>
                    @endif

                </ul>
                <div class="tab-content">

                    @if ($activetab == "info")
                    <div id="info" class="tab-pane fade in active">
                    @else
                    <div id="info" class="tab-pane fade">
                    @endif
                        @include('layouts.tables.info')
                    </div>

                    @if ($activetab == "news")
                    <div id="news" class="tab-pane fade in active">
                    @else
                    <div id="news" class="tab-pane fade">
                    @endif
                        @include('layouts.tables.news')
                    </div>

                    @if ($activetab == "offer")
                    <div id="offer" class="tab-pane fade in active">
                    @else
                    <div id="offer" class="tab-pane fade">
                    @endif
                        @include('layouts.tables.offer')
                    </div>

                    @if ($activetab == "offer_detail")
                    <div id="offer_detail" class="tab-pane fade in active">
                    @else
                    <div id="offer_detail" class="tab-pane fade">
                    @endif
                        @include('layouts.tables.offer_detail')
                    </div>

                    @if ($activetab == "person")
                    <div id="person" class="tab-pane fade in active">
                    @else
                    <div id="person" class="tab-pane fade">
                    @endif
                        @include('layouts.tables.person')
                    </div>

                    @if ($activetab == "time")
                    <div id="time" class="tab-pane fade in active">
                    @else
                    <div id="time" class="tab-pane fade">
                    @endif
                        @include('layouts.tables.time')
                    </div>

                    @if ($activetab == "menu")
                    <div id="menu" class="tab-pane fade in active">
                    @else
                    <div id="menu" class="tab-pane fade">
                    @endif
                        @include('layouts.tables.menu')
                    </div>

                    @if ($activetab == "gallery")
                    <div id="gallery" class="tab-pane fade in active">
                    @else
                    <div id="gallery" class="tab-pane fade">
                    @endif
                    @include('layouts.tables.gallery')
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection
