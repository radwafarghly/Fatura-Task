<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>{{ $code }}</title>
        <style>
            * {
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
            }

            h1,h2,h3,h4,h5,h6,p,span,div { 
                font-family:"Times New Roman", Times, serif; 
                font-size:10px;
                font-weight: normal;
            }

            th,td { 
                font-family: "Times New Roman", Times, serif; 
                font-size:10px;
            }

            .panel {
                margin-bottom: 20px;
                background-color: #fff;
                border: 1px solid transparent;
                border-radius: 4px;
                -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
                box-shadow: 0 1px 1px rgba(0,0,0,.05);
            }

            .panel-default {
                border-color: #ddd;
            }

            .panel-body {
                padding: 15px;
            }

            table {
                width: 100%;
                max-width: 100%;
                margin-bottom: 0px;
                border-spacing: 0;
                border-collapse: collapse;
                background-color: transparent;

            }

            thead  {
                text-align: left;
                display: table-header-group;
                vertical-align: middle;
            }

            th, td  {
                border: 1px solid #ddd;
                padding: 6px;
            }

            .well {
                min-height: 20px;
                padding: 19px;
                margin-bottom: 20px;
                background-color: #f5f5f5;
                border: 1px solid #e3e3e3;
                border-radius: 4px;
                -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
                box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
            }
        </style>
        
    </head>
    <body >
        <header>
            <div style="position:absolute; left:0pt; width:250pt;">
            <img src="http://athar.start-it.online/assets/img/logo.png" alt="Logo" class="img-thumbnail">
            </div>
            <div style="margin-left:300pt;">
                <b>Date: </b> {{Carbon\Carbon::parse($created_at)->format('l m-d-Y')  }}<br />
                @if ($code)
                    <b>Invoice #: </b> {{ $code }}
                @endif
                <br />
            </div>
            <br />
            <br /><br /><br />
        </header>
        <main>
            <div style="clear:both; position:relative;">
                <div style="position:absolute; left:0pt; width:250pt;">
                    <h4>Business Details:</h4>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            
                            Athar<br />
                            Email: 123456789 <br />
                            Phone:⁦0545956681⁩<br />
                            Address:  kdn<br />
                            City: Riyadh<br />
                            Country: Kingdom Saudi Arabia<br />
                        </div>
                    </div>
                </div>
                <div style="margin-left: 300pt;">
                    <h4>Customer Details:</h4>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            
                           Name: {{ $client['firstname'] }}  {{ $client['lastname'] }} <br />
                           Email: {{ $client['email'] }}<br />
                           Phone: {{ $client['phone'] }}<br />
                           Address:  {{ $client['address'] }}<br />
                           City: {{ $client['city']['name_english'] }}<br\>
                           Country:{{ $client['country']['name_english']}}<br />
                        </div>
                    </div>
                </div>
            </div>
            <h4>Items:</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Session Name</th>
                        <th >Date</th>
                        <th >Day</th>
                        <th>Time from</th>
                        <th >Time To</th>
                        <th >Doctor</th>
                        <th >Type</th>
                        <th >Session Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($times as $time)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $session['name_english'] }}</td>
                            <td >{{$time['date']}}</td>
                            <td>  {{Carbon\Carbon::parse($time['date'])->format('l') }}</td>
                            <td >{{$time['time_from']}}</td>
                            <td >{{$time['time_to']}}</td>
                            <td>{{ $doctor['firstname'] }}  {{ $doctor['lastname'] }}</td>
                            <td >{{$type}}</td>
                            <td >{{$session_price}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="clear:both; position:relative;">
                <div style="margin-left: 300pt;">
                    <h4>Total:</h4>
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td><b>Subtotal</b></td>
                                <td>{{$session_price * $no_of_class}}</td>
                            </tr>
                            <tr>
                                 <td><b> VAT (15%)</b></td>
                                 <td>{{$vat}}</td>
                            </tr>
                            <tr>
                                <td><b>TOTAL</b></td>
                                <td><b>{{$total_amount}}</b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>

        

        <!-- Page count -->
        <script type="text/php">
            if (isset($pdf) && $GLOBALS['with_pagination'] && $PAGE_COUNT > 1) {
                $pageText = "{PAGE_NUM} of {PAGE_COUNT}";
                $pdf->page_text(($pdf->get_width()/2) - (strlen($pageText) / 2), $pdf->get_height()-20, $pageText, $fontMetrics->get_font("DejaVu Sans, Arial, Helvetica, sans-serif", "normal"), 7, array(0,0,0));
            }
        </script>
    </body>
</html>
