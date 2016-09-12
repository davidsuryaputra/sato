
<div class="pages">
  <div data-page="projects" class="page no-toolbar no-navbar">
    <div class="page-content">

     <div class="navbarpages">
       <!-- <div class="nav_left_logo"><a href="index.html"><img src="mobix/images/logo.png" alt="" title="" /></a></div> -->
       <div class="nav_right_button"><a href="{{ url('home') }}"><img src="mobix/images/icons/white/menu.png" alt="" title="" /></a></div>
     </div>
     <div id="pages_maincontent">

              <h2 class="page_title">Keterangan Transaksi</h2>

              <div class="page_content">

                <div class="contactform">

                <label>Invoice</label>
                <p>#{{ $transaction->id }}</p>

                <label>Customer</label>
                <p>{{ $transaction->customer->name }}</p>

                <label>Operator</label>
                <p>{{ $transaction->operator->name }}</p>

                <div class="accordion-item">
                  <div class="accordion-item-toggle">
                    <i class="icon icon-plus">+</i>
                    <i class="icon icon-minus">-</i>
                    <span>Detail Item</span>
                  </div>
                  <div class="accordion-item-content">
                    @foreach($transactionDetails as $item)
                    <label>Nama</label>
                    <p>{{ $item->item->name }}</p>

                    <label>Jumlah</label>
                    <p>{{ $item['quantity'] }}</p>

                    <label>Harga</label>
                    <p>{{ $item->item->value }}</p>

                    <label>Sub Total</label>
                    <p>{{ $item['sub_total'] }}</p>
                    @endforeach
                  </div>
                </div>

                <label>Total</label>
                <p>{{ $transaction->total }}</p>

                <label>Pilihan</label>
                <a href="{{ route('cashier.transaction.export', $transaction->id ) }}" target="_blank" class="external button button-fill color-green"><i class="fa fa-print"></i> Export & Print</a>
                <br />
                <a href="{{ url('transactions') }}" class="button button-fill color-green"><i class="fa fa-trash"></i> Kembali</a>
                </div>

              </div>

      </div>


    </div>
  </div>
</div>
