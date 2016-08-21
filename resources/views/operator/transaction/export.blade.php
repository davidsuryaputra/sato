<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Export Transaction</title>


</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <div class="content-wrapper">

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
            <!-- <a href="{{ route('client.transaction.index') }}" class="btn btn-success btn-md"><i class="fa fa-trash"></i> Kembali</a> -->
          </div>
        </div>
      </div>
    </div>
  </div>

  </section>

  </div>


</div>
</body>
</html>
