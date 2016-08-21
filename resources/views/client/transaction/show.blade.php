@extends('layouts.app')

@section('title', 'Client')

@section('name', Auth::user()->name)

@section('role', 'Client')

@section('sidebar-menu')
<ul class="sidebar-menu">
  <li class="header">MENU UTAMA</li>
  <li class="active treeview">
    <a href="{{ url('home') }}">
      <i class="fa fa-dashboard"></i> <span>Beranda</span> <!--<i class="fa fa-angle-left pull-right"></i>-->
    </a>
  </li>

  @if($showroomName != "Belum Ada Izin")
  <li class="treeview">
    <a href="#">
      <i class="fa fa-home"></i> <span>Transaksi</span> <i class="fa fa-angle-left pull-right"></i>
    </a>

    <ul class="treeview-menu">
      <li>
      <a href="{{ url('transactions') }}">
        <i class="fa fa-home"></i> <span>Semua Transaksi</span>
      </a>
      </li>

    </ul>

  </li>

  @endif

</ul>

@endsection

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Beranda
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Beranda</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">
      <div class="col-md-12">
        <div class="alert alert-danger info" style="display:none;">
          <ul>
          </ul>
        </div>
        <div class="portlet">
          <div class="portlet-body">
            <div class="table-container">
              <table class="table table-striped table-bordered table-hover" id="datatable-ajax">
                <thead>
                  <tr role="row" class="heading">
                    <th>Invoice</th>
                    <th>Customer</th>
                    <th>Operator</th>
                  </tr>
                  <tr role="row" class="filter">
                    <td width="10%">
                        <input type="text" name="invoice_id" value="#{{ $transaction->id }}" class="form-control form-filter input-sm" id="invoice_id" disabled>
                    </td>
                    <td width="10%">
                      <input type="text" name="customer_name" value="{{ $transaction->customer->name }}" class="form-control form-filter input-sm" id="customer_name" disabled>
                    </td>
                    <td width="40%">
                      {!! Form::text('operator_name', $transaction->operator->name, ['class' => 'form-control form-filter input-sm', 'id' => 'operator_name', 'disabled' => '1']) !!}
                    </td>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="row">
      <div class="col-md-12">
        <div class="portlet">
          <div class="portlet-body">
            <div class="table-container">
              <table class="table table-striped table-bordered table-hover" id="table">
                <thead>
                  <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Amount</th>
                  </tr>
                </thead>
                <tbody id="item-list" name="item-list">
                    @foreach($transactionDetails as $item)
                    <tr id="item{{ $item['item_id'] }}">
                      <td>{{ $item->item->name }}</td>
                      <td style="text-align:center;">{{ $item['quantity'] }}</td>
                      <td style="text-align:center;">{{ $item->item->value }}</td>
                      <td style="text-align:center;" class="amount">{{ $item['sub_total'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>

            <div class="table-container-footer">
              <table class="table table-striped table-bordered table-hover">
                <tbody>
                  <tr>
                    <td colspan="4" align="right"><b>Total</b></td>
                    <td align="center" class="grand-total"><b>{{ $transaction->total }}</b></td>
                  </tr>
                </tbody>
              </table>
            </div>

            <div class="pull-right">
              <!-- <button type="submit" name="pay" class="pay btn btn-md btn-success">
                <i class="fa fa-money"></i> Print
              </button> -->
              <a href="{{ route('client.transaction.export', $transaction->id ) }}" target="_blank" class="btn btn-success btn-md"><i class="fa fa-print"></i> Export & Print</a>
              <a href="{{ route('client.transaction.index') }}" class="btn btn-success btn-md"><i class="fa fa-trash"></i> Kembali</a>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>
  <!-- /.content -->
</div>

@endsection
