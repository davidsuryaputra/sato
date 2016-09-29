@extends('manager.menu')

@section('style')
  @parent
  <!-- DataTables -->
 <link rel="stylesheet" href="{{ url('plugins/datatables/dataTables.bootstrap.css') }}">
@stop

@section('script')
  @parent
  <!-- DataTables -->
  <script src="{{ url('plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ url('plugins/datatables/dataTables.bootstrap.min.js') }}"></script>

  <script>
  $(function () {
    $('#assets').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
  });
</script>
@stop

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      {{ $showroomName }}
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Beranda</li>
    </ol>
  </section>

  @if($showroomName != "Belum Ada Izin")
  <!-- Main content -->
  <section class="content">
    <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Semua Aktiva Tetap</h3>
                <a class="btn btn-primary" href="{{ route('manager.assets.create') }}" role="button">Add New</a>
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


                <table id="assets" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Harga Pembelian</th>
                    <th>Jumlah</th>
                    <th>Pilihan</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($assets as $asset)
                  <tr>
                    <td>{{ $asset->name }}</td>
                    <td>{{ $asset->value }}</td>
                    <td>{{ $asset->stock }}</td>
                    <td>
                      <a href="{{ route('manager.assets.edit', $asset->id) }}" role="button" class="btn btn-info">Edit</a>
                      <a href="{{ route('manager.assets.stock', $asset->id) }}" role="button" class="btn btn-warning">Tambah</a>
                      <a href="{{ route('manager.assets.destroy', $asset->id) }}" role="button" class="btn btn-danger">Delete</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                </table>

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
  @else
  <section class="content">
    Silahkan Hubungi Manager
  </section>
  @endif

</div>

@endsection
