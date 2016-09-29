@extends('manager.menu')

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
                    <th>Email</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Kota</th>
                    <th>Telepon</th>
                    <th>Gaji</th>
                    <th>Jabatan</th>
                    <th>Pilihan</th>
                  </tr>
                  @foreach($employees as $employee)
                  <tr>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->address }}</td>
                    <td>{{ $employee->city }}</td>
                    <td>{{ $employee->phone }}</td>
                    <td>{{ $employee->balance }}</td>
                    <td>
                      @if($employee->role->name == 'accountant')
                        Akunting
                      @elseif($employee->role->name == 'operator')
                        Operator Toko
                      @endif
                    </td>
                    <td>
                      <a href="{{ route('manager.employees.destroy', $employee->id) }}" role="button" class="btn btn-danger">Delete</a>
                      <a href="{{ route('manager.employees.edit', $employee->id) }}" role="button" class="btn btn-warning">Edit</a>
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
  @else
  <section class="content">
    Silahkan Hubungi Owner
  </section>
  @endif

</div>

@endsection
