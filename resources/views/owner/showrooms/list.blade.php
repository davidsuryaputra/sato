@extends('owner.menu')

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
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Semua Outlet</h3>

                <div class="box-tools">
                  {{--
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input name="table_search" class="form-control pull-right" placeholder="Search" type="text">

                    <div class="input-group-btn">
                      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                  --}}
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body table-responsive no-padding">


                <table class="table table-hover">
                  <tbody><tr>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Kota</th>
                    <th>Telepon</th>
                    <th>Tanggal Buka</th>
                    <th>Saldo</th>
                    <th>Manajer</th>
                    <th>Pilihan</th>
                  </tr>

                  @foreach($showrooms as $showroom)
                  <tr>
                    <td>{{ $showroom->name }}</td>
                    <td>{{ $showroom->address }}</td>
                    <td>{{ $showroom->city }}</td>
                    <td>{{ $showroom->phone }}</td>
                    <td>{{ $showroom->created_at }}</td>
                    <td>{{ $showroom->balance }}</td>
                    <td>{{ $showroom->manager->name or 'Belum Ada' }}</td>
                    <td>
                      <a href="{{ route('owner.showrooms.destroy', $showroom->id) }}" role="button" class="btn btn-danger">Delete</a>
                      <a href="{{ route('owner.showrooms.edit', $showroom->id) }}" role="button" class="btn btn-warning">Edit</a>
                      <a href="{{ route('owner.showrooms.pendapatan', $showroom->id) }}" role="button" class="btn btn-info">Pendapatan</a>
                      <a href="{{ route('owner.showrooms.pengeluaran', $showroom->id) }}" role="button" class="btn btn-info">Pengeluaran</a>
                    </td>
                  </tr>
                  @endforeach

                </tbody></table>

              </div>
              <!-- /.box-body -->
              {{--
              <div class="box-footer clearfix">
                <ul class="pagination pagination-sm no-margin pull-right">
                  <li><a href="#">«</a></li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">»</a></li>
                </ul>
              </div>
              --}}
            </div>
            <!-- /.box -->
          </div>
        </div>
  </section>
  <!-- /.content -->
</div>

@endsection
