<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Export</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- <link rel="stylesheet" href="{{ url('bootstrap/css/bootstrap.min.css') }}"> -->
  <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  {{--
  <!-- Bootstrap 3.3.6 -->
  --}}
  <style>
  .height {
      min-height: 200px;
  }

  .icon {
      font-size: 47px;
      color: #5CB85C;
  }

  .iconbig {
      font-size: 77px;
      color: #5CB85C;
  }

  .table > tbody > tr > .emptyrow {
      border-top: none;
  }

  .table > thead > tr > .emptyrow {
      border-bottom: none;
  }

  .table > tbody > tr > .highrow {
      border-top: 3px solid;
  }
  </style>


</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="container">
      <div class="row">
          <div class="col-xs-12">
              <div class="text-center">
                  <i class="fa fa-search-plus pull-left icon"></i>
                  <h2>Invoice #{{ $transaction->id }}</h2>
              </div>
              <hr>
              <div class="row">
                <div class="col-xs-6 col-md-6 col-lg-6">
                  <div class="panel panel-default">
                    <img src="{{ url($showroom->logo) }}" width="200" height="100">
                    <!-- <img src="http://www.freeiconspng.com/uploads/free-png-0.png" width="200" height="100"> -->
                    <br /><br />
                    {{ $showroom->name }}<br />
                    {{ $showroom->address }}<br />
                    {{ $showroom->city }}<br />
                    {{ $showroom->phone }}<br />
                  </div>
                </div>
                <div class="col-xs-6 col-md-6 col-lg-6">
                  <div class="panel panel-default center">
                    <img src="{{ url('mobix/images/logo.png') }}" width="200" height="100">
                    <!-- <img src="http://www.freeiconspng.com/uploads/free-png-0.png" width="200" height="100"> -->
                    <br />
                    <br />
                    <h3>Faktur Layanan Cuci Mobil</h3>
                  </div>
                </div>
              </div>
              <div class="row">
                  <div class="col-xs-6 col-md-6 col-lg-6">
                      <div class="panel panel-default">
                        <!--
                          <div class="panel-heading">Billing Details</div>
                          <div class="panel-body">
                              <strong>David Peere:</strong><br>
                              1111 Army Navy Drive<br>
                              Arlington<br>
                              VA<br>
                              <strong>22 203</strong><br>
                          </div>
                        -->
                        <table class="table">
                          <tr>
                            <td>Nomor Faktur</td>
                            <td>:</td>
                            <td>{{ $transaction->id }}</td>
                          </tr>
                          <tr>
                            <td>Nomor Polisi</td>
                            <td>:</td>
                            <td>{{ $transaction->description }}</td>
                          </tr>
                          <tr>
                            <td>Nama Pelanggan</td>
                            <td>:</td>
                            <td>{{ $transaction->customer->name }}</td>
                          </tr>
                        </table>
                      </div>
                  </div>
                  <!--
                  <div class="col-xs-12 col-md-3 col-lg-3">
                      <div class="panel panel-default height">
                          <div class="panel-heading">Payment Information</div>
                          <div class="panel-body">
                              <strong>Card Name:</strong> Visa<br>
                              <strong>Card Number:</strong> ***** 332<br>
                              <strong>Exp Date:</strong> 09/2020<br>
                          </div>
                      </div>
                  </div>
                  <div class="col-xs-12 col-md-3 col-lg-3">
                      <div class="panel panel-default height">
                          <div class="panel-heading">Order Preferences</div>
                          <div class="panel-body">
                              <strong>Gift:</strong> No<br>
                              <strong>Express Delivery:</strong> Yes<br>
                              <strong>Insurance:</strong> No<br>
                              <strong>Coupon:</strong> No<br>
                          </div>
                      </div>
                  </div>
                -->
                  <div class="col-xs-6 col-md-6 col-lg-6">
                      <div class="panel panel-default">
                        <table class="table">
                          <tr>
                            <td>Tanggal</td>
                            <td>:</td>
                            <td>{{ $transaction->created_at->format('d-M-Y') }}</td>
                          </tr>
                          <tr>
                            <td>Jam</td>
                            <td>:</td>
                            <td>{{ $transaction->created_at->format('H:i:s') }}</td>
                          </tr>
                          <tr>
                            <td>Nama Kasir</td>
                            <td>:</td>
                            <td>{{ $transaction->operator->name }}</td>
                          </tr>
                        </table>
                        <!--
                          <div class="panel-heading">Shipping Address</div>
                          <div class="panel-body">
                              <strong>David Peere:</strong><br>
                              1111 Army Navy Drive<br>
                              Arlington<br>
                              VA<br>
                              <strong>22 203</strong><br>
                          </div>
                        -->
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="row">
          <div class="col-md-12">
              <div class="panel panel-default">
                  <div class="panel-heading">
                      <h3 class="text-center"><strong>Order summary</strong></h3>
                  </div>
                  <div class="panel-body">
                      <div class="table-responsive">
                          <table class="table table-condensed">
                              <thead>
                                  <tr>
                                      <td><strong>No</strong></td>
                                      <td class="text-center"><strong>Rincian</strong></td>
                                      <td class="text-center"><strong>Jumlah</strong></td>
                                      <td class="text-center"><strong>Harga</strong></td>
                                      <td class="text-right"><strong>Sub Total</strong></td>
                                  </tr>
                              </thead>
                              <tbody>
                                @foreach($transactionDetails as $index => $item)
                                  <tr>
                                      <td>{{ $index+1 }}</td>
                                      <td>{{ $item->item->name}}</td>
                                      <td class="text-center">{{ $item['quantity'] }}</td>
                                      <td class="text-center">{{ $item->item->value }}</td>
                                      <td class="text-right">{{ $item['sub_total'] }}</td>
                                  </tr>
                                @endforeach
                                  <tr>
                                      <td class="emptyrow"><i class="fa fa-barcode iconbig"></i></td>
                                      <td class="emptyrow"></td>
                                      <td class="emptyrow"></td>
                                      <td class="emptyrow text-center"><strong>Grand Total</strong></td>
                                      <td class="emptyrow text-right">{{ $transaction->total }}</td>
                                  </tr>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->
</body>
</html>
