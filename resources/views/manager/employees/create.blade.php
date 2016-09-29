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
    <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title">Tambah Pegawai Baru</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <form role="form" action="{{ route('manager.employees.store') }}" method="POST">
              {{ csrf_field() }}
              <!-- text input -->
              <div class="form-group {{ $errors->has('email') ? 'has-error' : ''  }}">
                <label>Email</label>
                <input class="form-control" placeholder="kika@mail.com" name="email" type="text">

                @if($errors->has('email'))
                <label class="control-label">
                <i class="fa fa-times-circle-o"></i>
                {{ $errors->first('email') }}
                </label>
                @endif

              </div>

              <div class="form-group {{ $errors->has('password') ? 'has-error' : ''  }}">
                <label>Password</label>
                <input class="form-control" name="password" type="password">

                <label>Password Confirmation</label>
                <input class="form-control" name="password_confirmation" type="password">


                @if($errors->has('password'))
                <label class="control-label">
                <i class="fa fa-times-circle-o"></i>
                {{ $errors->first('password') }}
                </label>
                @endif

              </div>

              <div class="form-group {{ $errors->has('name') ? 'has-error' : ''  }}">
                <label>Nama</label>
                <input class="form-control" placeholder="Mr. Kika" name="name" type="text">

                @if($errors->has('name'))
                <label class="control-label">
                <i class="fa fa-times-circle-o"></i>
                {{ $errors->first('name') }}
                </label>
                @endif

              </div>

              <div class="form-group {{ $errors->has('address') ? 'has-error' : ''  }}">
                <label>Alamat</label>
                <input class="form-control" placeholder="JL. Ngagel" name="address" type="text">

                @if($errors->has('address'))
                <label class="control-label">
                <i class="fa fa-times-circle-o"></i>
                {{ $errors->first('address') }}
                </label>
                @endif

              </div>

              <div class="form-group {{ $errors->has('city') ? 'has-error' : ''  }}">
                <label>Kota</label>
                <input class="form-control" placeholder="Surabaya" name="city" type="text">

                @if($errors->has('city'))
                <label class="control-label">
                <i class="fa fa-times-circle-o"></i>
                {{ $errors->first('city') }}
                </label>
                @endif

              </div>

              <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''  }}">
                <label>Telepon</label>
                <input class="form-control" placeholder="03153264" name="phone" type="text">

                @if($errors->has('phone'))
                <label class="control-label">
                <i class="fa fa-times-circle-o"></i>
                {{ $errors->first('phone') }}
                </label>
                @endif

              </div>

              <div class="form-group {{ $errors->has('balance') ? 'has-error' : ''  }}">
                <label>Gaji</label>
                <input class="form-control" placeholder="5000000" name="balance" type="text">

                @if($errors->has('balance'))
                <label class="control-label">
                <i class="fa fa-times-circle-o"></i>
                {{ $errors->first('balance') }}
                </label>
                @endif

              </div>

              <!-- select -->
              <div class="form-group">
                <label>Jabatan</label>
                <select name="role" class="form-control">
                  <option>Pilih Jabatan</option>
                    <option value="3">Akunting</option>
                    <option value="4">Operator Toko</option>
                </select>
              </div>

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Tambah</button>
              </div>

            </form>
          </div>
          <!-- /.box-body -->
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
