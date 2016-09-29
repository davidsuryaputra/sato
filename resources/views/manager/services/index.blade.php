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
    $('#services').DataTable({
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
                <h3 class="box-title">Semua Layanan</h3>
                <a class="btn btn-primary" href="{{ route('manager.services.create') }}" role="button">Add New</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">

                <table id="services" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Stok</th>
                    <th>Harga</th>
                    <th>Pilihan</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($services as $service)
                  <tr>
                    <td>{{ $service->name }}</td>
                    @if($service->stockable != 0)
                    <td>{{ $service->stock }}</td>
                    @else
                    <td>Item Non Stok</td>
                    @endif
                    <td>{{ $service->value }}</td>
                    @if($service->stockable != 0)
                    <td>
                      <a href="{{ route('manager.services.stock', $service->id) }}" role="button" class="btn btn-warning">Tambah Stok</a>
                      <a href="{{ route('manager.services.edit', $service->id) }}" role="button" class="btn btn-info">Edit</a>
                      <a href="{{ route('manager.services.destroy', $service->id) }}" role="button" class="btn btn-danger">Delete</a>
                    </td>
                    @else
                    <td>
                      <a href="{{ route('manager.services.edit', $service->id) }}" role="button" class="btn btn-info">Edit</a>
                      <a href="{{ route('manager.services.destroy', $service->id) }}" role="button" class="btn btn-danger">Delete</a>
                    </td>
                    @endif
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Nama</th>
                    <th>Stok</th>
                    <th>Harga</th>
                    <th>Pilihan</th>
                  </tr>
                  </tfoot>
                </table>

              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
        </div>
  </section>

  <!-- /.content -->
  @else
  <section class="content">
    Silahkan Hubungi Owner
  </section>
  @endif

</div>

@endsection
