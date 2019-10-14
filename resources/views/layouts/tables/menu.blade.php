<!-- Table News-->
<div class="container col-md-12">
    <br>
    <script src="{{ url('/js/jquery.pajinate.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#paging_container1').pajinate(
            {
                nav_label_first: '<<',
                nav_label_last: '>>',
                nav_label_prev: '<',
                nav_label_next: '>',
                nav_show_dots: false,
                start_page: 3,
                num_page_links_to_display: 0,
                show_first_last: false,
            }
            );
        });
    </script>
    <div id="wrapper">
        <div id="paging_container1" class="container col-md-12">
            <div class="pajinate_page_navigation container col-md-12 text-center"></div>

            <ul class="pajinate_content">
                @for ($i = 22; $i < 8 * 24; $i++)
                <!-- 86400 => 24h   |   604800 => 7d -->
                {{--*/ $date = date("d.m.Y",$today + (86400 * ($i - 1)) + (604800 * 0) ) /*--}}
                {{--*/ $date_long = date("Y-m-d H:i:s",$today + (86400 * ($i - 1)) + (604800 * 0) ) /*--}}
                <li>
                    <p>
                        <strong>
                            @if ($i % 7 == 1)
                            Montag,
                            @elseif ($i % 7 == 2)
                            Dienstag,
                            @elseif ($i % 7 == 3)
                            Mittwoch,
                            @elseif ($i % 7 == 4)
                            Donnerstag,
                            @elseif ($i % 7 == 5)
                            Freitag,
                            @elseif ($i % 7 == 6)
                            Samstag,
                            @elseif ($i % 7 == 0)
                            Sonntag,
                            @else
                            Hier ist was falsch gelaufen...
                            @endif
                            der {{ $date }}
                        </strong>
                    </p>
                    <table class="table table-body-hover table-bordered">
                        <col style="width:150px">
                        <col style="width:*">
                        @if (isset($menu[$date_long]))
                        <tbody data-toggle="modal" data-id="{{$date_long}}" class="tbody"
                        id="{{$menu[$date_long]->date}}" data-target=" #menu_Modal">
                        <tr>
                            <td>Vollkost</td>
                            <td id="{{$menu[$date_long]->date}}-vollkost">{{$menu[$date_long]->vollkost}}</td>
                        </tr>
                        <tr>
                            <td>Vegetarisch</td>
                            <td class="{{$menu[$date_long]->date}}-vegetarisch">{{$menu[$date_long]->vegetarisch}}</td>
                        </tr>
                        <tr>
                            <td>Fitness</td>
                            <td class="{{$menu[$date_long]->date}}-fitness">{{$menu[$date_long]->fitness}}</td>
                        </tr>
                        <tr>
                            <td>Nachspeise</td>
                            <td class="{{$menu[$date_long]->date}}-nachtisch">{{$menu[$date_long]->nachtisch}}</td>
                        </tr>
                    </tbody>
                    @else
                    <tbody data-toggle="modal" data-target="#menu_Modal_new" class="tbody"
                    id="{{$date_long}}">
                    <tr>
                        <td>Vollkost</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Vegetarisch</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Fitness</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Nachspeise</td>
                        <td></td>
                    </tr>
                </tbody>
                @endif
            </table>
            <hr>
        </li>
        @endfor
    </ul>
</div>
</div>

<form method="POST" action="menu/" id="create_menu" files=true enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    <div class="modal fade" id="menu_Modal" tabindex="" role="dialog"
    aria-labelledby="orderModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Eintrag bearbeiten</h4>
            </div>
            <div class="modal-body">
                <div class="form-group orderDetails">
                    <label for="vollkost">Vollkost:</label>
                    <input type="text" class="form-control" id="vollkost-input" name="vollkost" value=""
                    maxlength="250" required>
                    <br>
                    <label for="vegetarisch">Vegetarisch:</label>
                    <input type="text" class="form-control" id="vegetarisch-input" name="vegetarisch"
                    maxlength="250" required>
                    <br>
                    <label for="fitness">Fitness:</label>
                    <input type="text" class="form-control" id="fitness-input" name="fitness"
                    maxlength="250" required>
                    <br>
                    <label for="nachtisch">Nachtisch:</label>
                    <input type="text" class="form-control" id="nachtisch-input" name="nachtisch"
                    maxlength="250" required>
                </div>

                <div>
                    <p>
                        Bitte Deklarations- & Inhaltsstoffe Kürzel in Klammern mit angeben => z.B. '(1,2,6,8,a,d,f,g)'
                    </p>

                    <hr>

                    <h2>
                        Deklaration-Zusatzstoffe:
                    </h2>
                    <ol style="list-style: none;">
                        <li><strong>1.</strong> Farbstoffe </li>
                        <li><strong>2.</strong> Konservierungsstoffe </li>
                        <li><strong>3.</strong> Antioxidationsmittel </li>
                        <li><strong>4.</strong> Geschmacksverstärker </li>
                        <li><strong>5.</strong> geschwefelt </li>
                        <li><strong>6.</strong> geschwärzt </li>
                        <li><strong>7.</strong> mit Nitrat </li>
                        <li><strong>8.</strong> mit Süßungsmittel </li>
                        <li><strong>9.</strong> mit einer Zuckerart u. Süßungsmittel </li>
                        <li><strong>10.</strong> Coffeinhaltig </li>
                        <li><strong>11.</strong> Chininhaltig </li>
                        <li><strong>12.</strong> mit Phosphat </li>
                        <li><strong>13.</strong> gewachst </li>
                        <li><strong>14.</strong> enthält eine Phenylalaninquelle </li>
                        <li><strong>15.</strong> mit Milcheiweiß (Fleischerzeugnis) </li>
                    </ol>

                    <h2>
                        Deklaration Allergene:
                    </h2>

                     <ul style="list-style: none;">
                        <li><strong>a.</strong> Gluten</li>
                        <li><strong>b.</strong> Krebstiere</li>
                        <li><strong>c.</strong> Eier</li>
                        <li><strong>d.</strong> Fisch</li>
                        <li><strong>e.</strong> Erdnüsse</li>
                        <li><strong>f.</strong> Soja</li>
                        <li><strong>g.</strong> Milch</li>
                        <li><strong>h.</strong> Schalenfrüchte</li>
                        <li><strong>i.</strong> Sellerie</li>
                        <li><strong>j.</strong> Senf</li>
                        <li><strong>k.</strong> Sesam</li>
                        <li><strong>l.</strong> Schwefeldioxid und Sulfate >10 mg/kg</li>
                        <li><strong>m.</strong> Lupine</li>
                        <li><strong>n.</strong> Weichtiere</li>
                    </ul>

                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i>&ensp;Speichern
                </button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
</form>
<form method="POST" action="menu" id="create_menu_new" files=true enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="modal fade" id="menu_Modal_new" tabindex="" role="dialog"
    aria-labelledby="orderModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Eintrag bearbeiten</h4>
            </div>
            <div class="modal-body">
                <div class="form-group orderDetails">
                    <label for="vollkost">Vollkost:</label>
                    <input type="text" class="form-control" id="vollkost-input" name="vollkost" value=""
                    maxlength="250" required>
                    <br>
                    <label for="vegetarisch">Vegetarisch:</label>
                    <input type="text" class="form-control" id="vegetarisch-input" name="vegetarisch"
                    maxlength="250">
                    <br>
                    <label for="fitness">Fitness:</label>
                    <input type="text" class="form-control" id="fitness-input" name="fitness"
                    maxlength="250">
                    <br>
                    <label for="nachtisch">Nachtisch:</label>
                    <input type="text" class="form-control" id="nachtisch-input" name="nachtisch"
                    maxlength="250">
                    <input type="hidden" value="" name="date" id="date_hidden"/>
                </div>

                <div>
                    <p>
                        Bitte Deklarations- & Inhaltsstoffe Kürzel in Klammern mit angeben => z.B. '(1,2,6,8,a,d,f,g)'
                    </p>

                    <hr>

                    <h2>
                        Deklaration-Zusatzstoffe:
                    </h2>
                    <ol style="list-style: none;">
                        <li><strong>1.</strong> Farbstoffe </li>
                        <li><strong>2.</strong> Konservierungsstoffe </li>
                        <li><strong>3.</strong> Antioxidationsmittel </li>
                        <li><strong>4.</strong> Geschmacksverstärker </li>
                        <li><strong>5.</strong> geschwefelt </li>
                        <li><strong>6.</strong> geschwärzt </li>
                        <li><strong>7.</strong> mit Nitrat </li>
                        <li><strong>8.</strong> mit Süßungsmittel </li>
                        <li><strong>9.</strong> mit einer Zuckerart u. Süßungsmittel </li>
                        <li><strong>10.</strong> Coffeinhaltig </li>
                        <li><strong>11.</strong> Chininhaltig </li>
                        <li><strong>12.</strong> mit Phosphat </li>
                        <li><strong>13.</strong> gewachst </li>
                        <li><strong>14.</strong> enthält eine Phenylalaninquelle </li>
                        <li><strong>15.</strong> mit Milcheiweiß (Fleischerzeugnis) </li>
                    </ol>

                    <h2>
                        Deklaration Allergene:
                    </h2>

                     <ul style="list-style: none;">
                        <li><strong>a.</strong> Gluten</li>
                        <li><strong>b.</strong> Krebstiere</li>
                        <li><strong>c.</strong> Eier</li>
                        <li><strong>d.</strong> Fisch</li>
                        <li><strong>e.</strong> Erdnüsse</li>
                        <li><strong>f.</strong> Soja</li>
                        <li><strong>g.</strong> Milch</li>
                        <li><strong>h.</strong> Schalenfrüchte</li>
                        <li><strong>i.</strong> Sellerie</li>
                        <li><strong>j.</strong> Senf</li>
                        <li><strong>k.</strong> Sesam</li>
                        <li><strong>l.</strong> Schwefeldioxid und Sulfate >10 mg/kg</li>
                        <li><strong>m.</strong> Lupine</li>
                        <li><strong>n.</strong> Weichtiere</li>
                    </ul>

                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i>&ensp;Speichern
                </button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
</form>
</div>
