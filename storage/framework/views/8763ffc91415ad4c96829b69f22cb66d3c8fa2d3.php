<?php $__env->startSection('title', 'Accountant'); ?>

<?php $__env->startSection('name', Auth::user()->name); ?>

<?php $__env->startSection('role', 'Accountant'); ?>

<?php $__env->startSection('autocomplete-accountant-style'); ?>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar-menu'); ?>
<ul class="sidebar-menu">
  <li class="header">MENU UTAMA</li>
  <li class="active treeview">
    <a href="<?php echo e(url('home')); ?>">
      <i class="fa fa-dashboard"></i> <span>Beranda</span> <!--<i class="fa fa-angle-left pull-right"></i>-->
    </a>
  </li>

  <li class="treeview">
    <a href="<?php echo e(url('transactions')); ?>">
      <i class="fa fa-home"></i> <span>Transaksi</span>
    </a>

    <li class="treeview">
      <a href="<?php echo e(url('transactions/create')); ?>"><i class="fa fa-circle-o"></i> <span>Buat Transaksi</span></a>
    </li>

  </li>

</ul>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
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
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Buat Transaksi Baru <?php echo e($showroomName); ?></h3>

                <div class="box-tools">
                  <?php /*
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input name="table_search" class="form-control pull-right" placeholder="Search" type="text">

                    <div class="input-group-btn">
                      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                  */ ?>
                </div>
              </div>
              <!-- /.box-header -->

              <div class="box-body">
                <form id="form-accountant" role="form" action="<?php echo e(route('operator.assets.store')); ?>" method="POST">
                  <?php echo e(csrf_field()); ?>

                  <!-- text input -->

                  <div class="form-group <?php echo e($errors->has('transaction') ? 'has-error' : ''); ?>">
                    <label>Transaksi</label>
                    <select name="transaction" class="form-control">
                      <option>Pilih</option>
                        <option value="1">Income</option>
                        <option value="2">Outcome</option>
                    </select>

                    <?php if($errors->has('transaction')): ?>
                    <label class="control-label">
                    <i class="fa fa-times-circle-o"></i>
                    <?php echo e($errors->first('transaction')); ?>

                    </label>
                    <?php endif; ?>

                  </div>

                  <div class="form-group">
                    <label>Pilih Produk</label>
                    <input name="product" id="autocomplete-accountant" class="form-control autocomplete" placeholder="Search" type="text">

                  </div>

                  <div class="form-group">
                    <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                      <tbody id="products">
                        <tr>
                        <th>Nama</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Sub Total</th>
                        <th>Aksi</th>
                      </tr>

                      <tr>
                        <td>sabun</td>
                        <td>2</td>
                        <td>5000</td>
                        <td>10000</td>
                        <td>Hapus</td>
                      </tr>

                      <tr>
                        <td>cuci motor besar</td>
                        <td>3</td>
                        <td>7000</td>
                        <td>21000</td>
                        <td>Hapus</td>
                      </tr>

                    </tbody></table>
                    </div>
                    <div class="box-footer clearfix">
                      Total : xyz
                    </div>


                  </div>

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Buat</button>
                  </div>

                </form>
              </div>


              <!-- /.box-body -->



            </div>
            <!-- /.box -->
          </div>
        </div>
  </section>
  <!-- /.content -->
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('autocomplete-accountant'); ?>

$(document).ready(function(){

  var availableTags = [
  {
    product_id: 1,
    label: "Sabun",
    price: 2000
  },
  {
    product_id: "2",
    label: "Cuci Motor Kecil",
    price: 5000
  },
  {
    product_id: "3",
    label: "Cuci Motor Besar",
    price: 10000
  },
  {
    product_id: "4",
    label: "Cuci Mobil Kecil",
    price: 15000
  },
];



$( "#autocomplete-accountant" ).autocomplete({
  source: availableTags,
  select: function (event, ui){
    $("#products").append("<tr><input type='hidden' name='productId' value='"+ ui.item.product_id +"'/><td>"+ ui.item.label +"</td><td><input type='text' name='quantity[" + ui.item.product_id + "]' /></td><td>"+ ui.item.price +"</td><td>20000</td><td>btn hapus</td></tr>");

    var originalEvent = event;
        while (originalEvent) {
            if (originalEvent.keyCode == 13)
                originalEvent.stopPropagation();

            if (originalEvent == event.originalEvent)
                break;

            originalEvent = event.originalEvent;
        }

        $("#form-accountant").keydown(function(event) {
          if (event.keyCode == 13){
            return false;
          }

        });
  }
});

});
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>