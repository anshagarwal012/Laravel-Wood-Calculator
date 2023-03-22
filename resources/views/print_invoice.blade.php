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
                                       ? "<th class='w-150px'>Sr. No.</th><th class='w-60'>Width</th><th>Thick</th><th>Length</th><th>Quantity</th><th>Cuft</th>"
                                       : "<th class='w-150px'>Sr. No.</th><th class='w-60'>Length</th><th>Perimeter</th><th>Quantity</th><th>Cuft</th>" !!}
                                   </tr>
                               </thead>
                               <tbody>
                                   @php($l = 0)
                                   @foreach (json_decode($data['data'], true) as $key => $val)
                                       <tr>
                                           <td>{{ $key + 1 }}</td>
                                           @php($l += end($val))
                                           @foreach ($val as $e)
                                               {!! "<td>$e</td>" !!}
                                           @endforeach
                                       </tr>
                                   @endforeach
                               </tbody>
                               <tfoot>
                                   <tr>
                                       <td colspan="2"></td>
                                       <td {!! $data['type'] == 'cut_size' ? "colspan='3'" : "colspan='2'" !!}>Grand Total</td>
                                       <td>{{ $l }}</td>
                                   </tr>
                               </tfoot>
                           </table>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <!-- JavaScript -->
       <script src="/js/bundle.js"></script>
       <script src="/js/main.js"></script>
   </body>

   </html>
