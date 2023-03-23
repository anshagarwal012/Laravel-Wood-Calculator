   <!DOCTYPE html>
   <html lang="en">

   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <meta http-equiv="X-UA-Compatible" content="ie=edge">
       <title>Invoice Print</title>
       <!-- StyleSheets  -->
       <link id="skin-default" rel="stylesheet" href="/css/theme.css">
       <link rel="stylesheet" href="/css/ansh.min.css">
       <link href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css" rel="stylesheet">
   </head>

   <body class="bg-white" onload="printPromot()">
       <div class="loading">Loading&#8230;</div>
       <div class="nk-block">
           <div class="invoice invoice-print">
               <div class="invoice-wrap">
                   <div class="invoice-brand text-center">
                       <img src="/img/logo.png" alt="">
                   </div>
                   <div class="invoice-head">
                       <div class="invoice-contact"><span class="overline-title">Invoice To</span>
                           <div class="invoice-contact-info">
                               <h4 class="title">{{ $data['CompanyName'] }}</h4>
                               <ul class="list-plain">
                                   <li><em class="icon ni ni-map-pin-fill fs-18px"></em><span
                                           style="width:300px">{{ $data['Address'] }}</span>
                                   </li>
                                   <li><em
                                           class="icon ni ni-call-fill fs-14px"></em><span>+{{ $data['MobileNumber'] }}</span>
                                   </li>
                               </ul>
                           </div>
                       </div>
                       <div class="invoice-desc">
                           <h3 class="title">Invoice</h3>
                           <ul class="list-plain">
                               <li class="invoice-id"><span>Invoice ID</span>:<span>{{ $data['id'] }}</span></li>
                               <li class="invoice-date">
                                   <span>Date</span>:<span>{{ explode('T', $data['created_at'])[0] }}</span>
                               </li>
                           </ul>
                       </div>
                   </div>
                   <div class="invoice-head">
                       <div class="invoice-desc">
                           <ul class="list-plain">
                               <li class="invoice-id"><span>Driver Name</span>:<span>{{ $data['DriverName'] }}</span>
                               </li>
                               <li class="invoice-id"><span>Residences</span>:<span>{{ $data['Residences'] }}</span>
                               </li>
                               <li class="invoice-id"><span>Vehicle
                                       Number</span>:<span>{{ $data['VehicleNumber'] }}</span>
                               </li>
                           </ul>
                       </div>
                       <div class="invoice-desc">
                           <ul class="list-plain">
                               <li class="invoice-id"><span>License
                                       Number</span>:<span>{{ $data['LicenseNumber'] }}</span></li>
                               <li class="invoice-id"><span>RTO</span>:<span>{{ $data['RTO'] }}</span></li>
                               <li class="invoice-id">
                                   <span>Vehicle Name</span>:<span>{{ $data['VehicleName'] }}</span>
                               </li>
                           </ul>
                       </div>
                   </div>
                   <div class="invoice-bills">
                       <div class="table-responsive">
                           <table class="table table-striped">
                               <thead>
                                   <tr>{!! $data['type'] == 'cut_size'
                                       ? '<th>Sr. No.</th><th>Width</th><th>Thick</th><th>Length</th><th>Quantity</th><th>Cuft</th>'
                                       : '<th>Sr. No.</th><th>Length</th><th>Perimeter</th><th>Quantity</th><th>Cuft</th>' !!}
                                   </tr>
                               </thead>
                               <tbody>
                                   @php($l = 0)
                                   @php($q = 0)
                                   @foreach (json_decode($data['data'], true) as $key => $val)
                                       <tr>
                                           <td>{{ $key + 1 }}</td>
                                           @php($l += end($val))
                                           @php($q += prev($val))
                                           @foreach ($val as $e)
                                               {!! "<td>$e</td>" !!}
                                           @endforeach
                                       </tr>
                                   @endforeach
                               </tbody>
                               <tfoot>
                                   <tr>
                                       <td {!! $data['type'] == 'cut_size' ? "colspan='4'" : "colspan='3'" !!}></td>
                                       <td class="text-right">Total Quantity</td>
                                       <td>{{ $q }}</td>
                                   </tr>
                                   <tr>
                                       <td {!! $data['type'] == 'cut_size' ? "colspan='4'" : "colspan='3'" !!}></td>
                                       <td class="text-right">Grand Total</td>
                                       <td>{{ $l }}</td>
                                   </tr>
                               </tfoot>
                           </table>
                       </div>
                   </div>
                   <div class="row mt-2 footer justify-content-end">
                       <div class="col-4 text-center">
                           <p>Authorised Signatory</p>
                           <br>
                           <p>(Viral Sawmill)</p>
                       </div>
                   </div>

               </div>
           </div>
       </div>
       <div class="nk-footer bg-white">
           <div class="container-fluid">
               <div class="nk-footer-wrap">
                   <div class="row text-center w-75 mx-auto justify-content-between">
                       <p>Address: </p>
                       <p>Malanpada, Dharampur, Valsad Gujarat 396050 &nbsp; | &nbsp; </p>
                       <p>Email: </p>
                       <p>wood@viralsawmill.in &nbsp; | &nbsp; </p>
                       <p>Website: </p>
                       <p>www.viralsawmill.in</p>
                   </div>
               </div>
           </div>
       </div>
       <!-- JavaScript -->
       <script src="/js/bundle.js"></script>
       <script src="/js/main.js"></script>
   </body>

   </html>
