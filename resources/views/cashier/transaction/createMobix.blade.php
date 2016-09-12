
<div class="pages">
  <div data-page="projects" class="page no-toolbar no-navbar">
    <div class="page-content">

     <div class="navbarpages">
       <!-- <div class="nav_left_logo"><a href="index.html"><img src="mobix/images/logo.png" alt="" title="" /></a></div> -->
       <div class="nav_right_button"><a href="{{ url('home') }}"><img src="mobix/images/icons/white/menu.png" alt="" title="" /></a></div>
     </div>
     <div id="pages_maincontent">

              <h2 class="page_title">Buat Transaksi</h2>

              <div class="page_content">

                <div class="contactform">

                  <div class="alert alert-danger info" style="display:none;">
                    <ul>
                    </ul>
                  </div>

                <form action="{{ route('cashier.store') }}" method="POST">
                  {{ csrf_field() }}

                    <label>Customer</label>
                    @if(Session::has('customer_id'))
                      <input type="hidden" name="customer_id" value="{{ Session::get('customer_id') }}" class="form_input" id="customer_id" autocomplete="off">
                    @else
                    <input type="hidden" name="customer_id" value="" class="form_input" id="customer_id" autocomplete="off">
                    @endif

                    @if(Session::has('customer_name'))
                      <input type="text" name="customer_name" value="{{ Session::get('customer_name') }}" class="form_input" id="customer_name" autocomplete="off" disabled>
                    @else
                    <input type="text" name="customer_name" value="" class="form_input" id="customer_name" autocomplete="off">
                    @endif

                    <label>Product Search</label>
                    {!! Form::hidden('itemid', null, ['id' => 'item-id']) !!}
                    {!! Form::text('name', null, ['class' => 'form_input form-control form-filter input-sm', 'id' => 'item-name', 'autocomplete' => 'off']) !!}

                    <label>Qty</label>
                    {!! Form::text('qty', null, ['class' => 'form_input orm-control form-filter input-sm', 'id' => 'qty', 'onkeyup' => 'sub_total()']) !!}

                    <label>Price</label>
                    {!! Form::text('price', null, ['class' => 'form_input form-control form-filter input-sm', 'id' => 'price', 'readonly' => '1']) !!}

                    <label>Amount</label>
                    {!! Form::text('amount', null, ['class' => 'form_input form-control form-filter input-sm', 'id' => 'amount', 'readonly' => '1']) !!}

                    <label>Action</label>
                    {!! Form::button('Add', ['class' => 'button button-fill color-green add', 'name' => 'action'])!!}

                    <div class="content-block-title">Keranjang</div>
                    <div class="list-block media-list">
                      <ul id="item-list">
                        @if(Session::has('items'))
                          @foreach(Session::get('items') as $item)
                        <li id="item{{ $item['id'] }}">
                          <div class="item-content">
                            <!-- <div class="item-media"><img src="..." width="80"></div> -->
                            <div class="item-inner">
                              <div class="item-title-row">
                                <div class="item-title">{{ $item['name'] }}</div>
                                <div class="item-after">{{ $item['price'] }}</div>
                              </div>
                              <div class="item-subtitle">{{ $item['qty'] }}</div>
                              <div class="item-text">
                                <label>Sub Total :</label>
                                <p class="amount">{{ $item['amount'] }}</p>

                                <a href="#" onclick="deleteitem({{ $item['id'] }}, '{{ $item['name'] }}')" class="button button-fill color-red">
                                  <i class="fa fa-trash"></i>  Delete
                                </a>
                              </div>
                            </div>
                          </div>
                        </li>
                          @endforeach
                        @endif
                      </ul>
                    </div>

                    <label>Total yang harus dibayar</label>
                    <p class="grand-total">
                      @if(Session::has('grandTotal'))
                      <b>{{ Session::get('grandTotal') }}</b>
                      @else
                      <b>0</b>
                      @endif
                    </p>

                <a href="#" onclick="clearitems()" class="button button-fill color-red"><i class="fa fa-trash"></i> Clear</a>
                <br />
                <input type="submit" name="pay" class="pay form_submit" id="submit" value="Bayar" />
                </form>
                </div>



              </div>

      </div>


    </div>
  </div>
</div>
