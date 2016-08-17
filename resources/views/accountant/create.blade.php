@extends('layouts.app')

@section('title', 'Accountant')

@section('name', Auth::user()->name)

@section('role', 'Accountant')

@section('autocomplete-accountant-style')
.ui-autocomplete {
    max-height: 100px;
    overflow-y: auto;
    /* prevent horizontal scrollbar */
    overflow-x: hidden;
  }
  /* IE 6 doesn't support max-height
   * we use height instead, but this forces the menu to always be this tall
   */
  * html .ui-autocomplete {
    height: 100px;
  }
@endsection

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

      <li>
      <a href="{{ url('transactions/create') }}">
        <i class="fa fa-circle-o"></i> <span>Buat Transaksi</span>
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
    <?php
      $encrypter = app('Illuminate\Encryption\Encrypter');
      $encrypted_token = $encrypter->encrypt(csrf_token());
     ?>

    {!! Form::open(['route' => 'accountant.store', 'class' => 'horizontal-form', 'role' => 'form', 'method' => 'post']) !!}
    <input id="token" type="hidden" value="{{ $encrypted_token }}">
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
                    <th>Customer</th>
                    <th>Product Search</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Amount</th>
                    <th>Action</th>
                  </tr>
                  <tr role="row" class="filter">
                    <td width="10%">
                      {{-- Form::hidden('customer_id', Session::get('customer_id'), ['id' => 'customer_id']) --}}
                      {{-- Form::text('customer_name', Session::has('customer_name') ? Session::get('customer_name') : null , ['class' => 'form-control form-filter input-sm', 'id' => 'customer_name', 'autocomplete' => 'off']) --}}
                      @if(Session::has('customer_id'))
                        <input type="hidden" name="customer_id" value="{{ Session::get('customer_id') }}" class="form-control form-filter input-sm" id="customer_id" autocomplete="off">
                      @else
                      <input type="hidden" name="customer_id" value="" class="form-control form-filter input-sm" id="customer_id" autocomplete="off">
                      @endif

                      @if(Session::has('customer_name'))
                        <input type="text" name="customer_name" value="{{ Session::get('customer_name') }}" class="form-control form-filter input-sm" id="customer_name" autocomplete="off">
                      @else
                      <input type="text" name="customer_name" value="" class="form-control form-filter input-sm" id="customer_name" autocomplete="off">
                      @endif
                    </td>
                    <td width="40%">
                      {!! Form::hidden('itemid', null, ['id' => 'item-id']) !!}
                      {!! Form::text('name', null, ['class' => 'form-control form-filter input-sm', 'id' => 'item-name', 'autocomplete' => 'off']) !!}
                    </td>
                    <td width="10%">
                      {!! Form::text('qty', null, ['class' => 'form-control form-filter input-sm', 'id' => 'qty', 'onkeyup' => 'sub_total()']) !!}
                    </td>
                    <td width="10%">
                      {!! Form::text('price', null, ['class' => 'form-control form-filter input-sm', 'id' => 'price', 'readonly' => '1']) !!}
                    </td>
                    <td width="10%">
                      {!! Form::text('amount', null, ['class' => 'form-control form-filter input-sm', 'id' => 'amount', 'readonly' => '1']) !!}
                    </td>
                    <td width="5%" style="text-align:center;">
                      {!! Form::button('Add', ['class' => 'btn btn-primary btn-sm add', 'name' => 'action'])!!}
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
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="item-list" name="item-list">
                  @if(Session::has('items'))
                    @foreach(Session::get('items') as $item)
                    <tr id="item{{ $item['id'] }}">
                      <td>{{ $item['name'] }}</td>
                      <td style="text-align:right;">{{ $item['qty'] }}</td>
                      <td style="text-align:right;">{{ $item['price'] }}</td>
                      <td style="text-align:right;" class="amount">{{ $item['amount'] }}</td>
                      <td style="text-align:center;">
                        {{--
                        <a href="{{ url('transactions/deleteitem', $item['id']) }}" onclick="deleteitem({{ $item['id'] }})" class="btn btn-xs btn-danger">
                          <i class="fa fa-trash"></i>  Delete
                        </a>
                        --}}

                        <a href="#" onclick="deleteitem({{ $item['id'] }}, '{{ $item['name'] }}')" class="btn btn-xs btn-danger">
                          <i class="fa fa-trash"></i>  Delete
                        </a>

                      </td>
                    </tr>
                    @endforeach
                  @endif
                </tbody>
              </table>
            </div>
            <div class="table-container-footer">
              <table class="table table-striped table-bordered table-hover">
                <tbody>
                  <tr>
                    <td colspan="4" align="right"><b>Total yang harus dibayar</b></td>
                    <td align="center" class="grand-total"><b>0</b></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="pull-right">
              <button type="submit" name="pay" class="pay btn btn-md btn-success">
                <i class="fa fa-money"></i> Bayar
              </button>
              <a href="#" onclick="clearitems()" class="btn btn-danger btn-md"><i class="fa fa-trash"></i> Clear</a>
            </div>
          </div>
        </div>
      </div>
    </div>


    {!! Form::close() !!}

  </section>
  <!-- /.content -->
</div>

@endsection

@section('autocomplete')
<script type="text/javascript">

function store()
{

}

function deleteitem(id, name)
{

  var deleteUrl = "{{ route('accountant.deleteitem', ':id') }}";
  deleteUrl = deleteUrl.replace(':id', id);
  if(confirm("Yakin hapus " + name + "?")){
    $.ajax({
      url : deleteUrl,
      type : "GET",
      dataType : "JSON",
      success : function (data)
      {
        if(data.success == true)
        {
          var trId = "item" + data.removedItem;
          $('#'+trId).remove();

          var grandTotal = 0;
          $('#item-list .amount').each(function (){
            grandTotal = grandTotal + Number($(this).html());
          });
          $('.grand-total').html('<b>' + grandTotal + '</b>');
          // alert('hitung grand total');
          //remove tr item
          //hitung grand total
        }
      },
      error  : function (data)
      {

      }
    });

  }
}

function clearitems()
{
  var $_token = $('#token').val();
  if(confirm('Yakin ingin hapus transaksi ini?'))
  {
    // alert('ekse tombol clear');

    $.ajax({
      url : "{{ route('accountant.clearitems') }}",
      type : "POST",
      dataType  : "JSON",
      headers: { 'X-XSRF-TOKEN' : $_token },
      success : function (data)
      {
        console.log(data);
        $('#item-id').val('');
        $('#item-name').val('');
        $('#qty').val('');
        $('#price').val('');
        $('#amount').val('');
        $('#item-list').empty();
        $('.grand-total').html('<b>0</b>')
      },
      error: function (clearItemsError){}
    });

  }
}

function sub_total() {
  // alert('hitung');
  var qty = $("#qty").val();
  var price = $("#price").val();
  if(isNaN(qty)){
    $("#qty").val(1);
    var qty = $("#qty").val();
    $("#amount").val(qty * price);
  }else if(!qty){
    // $("#qty").val(1);
    // var qty = $("#qty").val();
    $("#amount").val(0);
  }else{
    $("#amount").val(qty * price);
  }


}

$( document ).ready(function() {

  //grandTotal
  var grandTotal = 0;
  $('#item-list .amount').each(function (){
    grandTotal = grandTotal + Number($(this).html());
  });
  $('.grand-total').html('<b>' + grandTotal + '</b>');


  $("#item-name").autocomplete({
    source: "{{ route('accountant.autocomplete') }}",
    minLength: 1,
    select: function( event, ui ) {
      // alert('hello');
      $("#item-id").val(ui.item.id);
      $("#item-name").val(ui.item.value);
      $("#qty").val(1);
      $("#price").val(ui.item.price);
      var qty = $("#qty").val();
      var price = $("#price").val();
      $("#amount").val(qty * price);
    }
  });

  $("#customer_name").autocomplete({
    source: "{{ route('accountant.autocompleteCustomer') }}",
    minLength: 1,
    select: function (event, ui) {
      $("#customer_id").val(ui.item.id);
      $("#customer_name").val(ui.item.name);
      }
  });



  $(".add").click(function (e) {
    e.preventDefault();

    var url = 'additem';
    var info = $('.info');
    var $_token = $("#token").val();
    var formData = {
      'customer_id' : $('#customer_id').val(),
      // 'customer_id' : 'asu',
      'id'     : $('#item-id').val(),
      'qty'    : $('#qty').val(),
    }
    // alert(JSON.stringify(formData));


    $.ajax({
      type      : 'POST',
      url       : url,
      data      : formData,
      dataType  : 'json',
      headers   : { 'X-XSRF-TOKEN' : $_token },
      success   : function (data) {
        console.log(data);
        info.hide().find('ul').empty();

        if(data.success == false && data.is_rules == 0)
        {
          // alert(JSON.stringify(data.errors));
          // alert('success false bro');

          $.each(data.errors, function(index, error) {
            // info.find('ul').append('<li>' + error + '</li>');
            alert(error);
          });

          info.slideDown('fast')
          info.delay(3000).slideUp('slow', function () {
            info.find('ul').empty();
          });

        }
        else if(data.success == undefined)
        {
          // alert(JSON.stringify(data.errors));
          // alert('undefined bro');

          $.each(data, function(index, error) {
            info.find('ul').append('<li>' + error + '</li>');
            // alert(error);
          });


          info.slideDown('fast')
          info.delay(3000).slideUp('slow', function () {
            info.find('ul').empty();
          });
          // info.fadeTo(2000, 500).slideUp(500, function (){
          // });

          // alert('undefined end');
        }
        else
        {
          var parameter = "" + data.data.id + ", '" + data.data.name + "'";
          // alert(parameter);
          var item = '<tr id="item' + data.data.id + '">';
              item += '<td>' + data.data.name + '</td>';
              item += '<td style="text-align:right;" class="quantity">' + data.data.qty + '</td>';
              item += '<td style="text-align:right;">' + data.data.price + '</td>';
              item += '<td style="text-align:right;" class="amount">' + data.data.amount + '</td>';
              item += '<td style="text-align:center;">';
              item += '<a href="#" onclick="deleteitem(' + parameter + ')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</a>';
              item += '</td></tr>';

          $('#item-list').append(item);
          /*
          var grandTotal = 0;
          $('#item-list .amount').each(function (){
            grandTotal = grandTotal + Number($(this).html());
          });
          */
          $('.grand-total').html('<b>' + data.grandTotal + '</b>');
          $('#item-id').val('');
          $('#item-name').val('');
          $('#qty').val('');
          $('#price').val('');
          $('#amount').val('');

        }

      },
      error: function (data) {
      }
    });


  });

  $(".pay").click(function (e){
    e.preventDefault();

    var url = "{{ route('accountant.store') }}";

    $.ajax({
      type : 'GET',
      url  : url,
      success : function (data){
        $('#customer_id').val('');
        $('#customer_name').val('');
        $('#item-id').val('');
        $('#item-name').val('');
        $('#qty').val('');
        $('#price').val('');
        $('#amount').val('');
        $('#item-list').empty();
        $('.grand-total').html('<b>0</b>')
        alert('Transaksi berhasil');
      },
      error : function (data){

      }
    })

  });

});
</script>
@endsection
