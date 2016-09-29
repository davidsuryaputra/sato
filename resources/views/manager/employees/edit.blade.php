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
            <h3 class="box-title">Ubah Pegawai</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">

              {!! Form::model($employee, ['method' => 'patch', 'action' => ['ManagerController@updateEmployee', $employee->id]]) !!}

              <div class="form-group {{ $errors->has('password') ? 'has-error' : ''  }}">
                <label>Password</label>
                {!! Form::password('password', ['class' => 'form-control']) !!}

                <label>Password Confirmation</label>
                {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}

                @if($errors->has('password'))
                <label class="control-label">
                <i class="fa fa-times-circle-o"></i>
                {{ $errors->first('password') }}
                </label>
                @endif

              </div>

              <!-- text input -->
              <div class="form-group {{ $errors->has('name') ? 'has-error' : ''  }}">
                <label>Nama</label>
                <!-- <input class="form-control" placeholder="Sato 1 Klampis Jaya" name="name" type="text" value=> -->
                {!! Form::text('name', null, ['class' => 'form-control']) !!}

                @if($errors->has('name'))
                <label class="control-label">
                <i class="fa fa-times-circle-o"></i>
                {{ $errors->first('name') }}
                </label>
                @endif

              </div>

              <div class="form-group {{ $errors->has('address') ? 'has-error' : ''  }}">
                <label>Alamat</label>
                {!! Form::text('address', null, ['class' => 'form-control']) !!}
                <!-- <input class="form-control" placeholder="JL. Klampis" name="address" type="text"> -->

                @if($errors->has('address'))
                <label class="control-label">
                <i class="fa fa-times-circle-o"></i>
                {{ $errors->first('address') }}
                </label>
                @endif

              </div>

              <div class="form-group {{ $errors->has('city') ? 'has-error' : ''  }}">
                <label>Kota</label>
                {!! Form::text('city', null, ['class' => 'form-control']) !!}
                <!-- <input class="form-control" placeholder="Surabaya" name="city" type="text"> -->

                @if($errors->has('city'))
                <label class="control-label">
                <i class="fa fa-times-circle-o"></i>
                {{ $errors->first('city') }}
                </label>
                @endif
              </div>

              <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''  }}">
                <label>Telepon</label>
                <!-- <input class="form-control" placeholder="03153264" name="phone" type="text"> -->
                {!! Form::text('phone', null, ['class' => 'form-control']) !!}

                @if($errors->has('phone'))
                <label class="control-label">
                <i class="fa fa-times-circle-o"></i>
                {{ $errors->first('phone') }}
                </label>
                @endif
              </div>

              <div class="form-group {{ $errors->has('balance') ? 'has-error' : ''  }}">
                <label>Gaji</label>
                {!! Form::text('balance', null, ['class' => 'form-control']) !!}
                <!-- <input class="form-control" placeholder="5000000" name="balance" type="text"> -->

                @if($errors->has('balance'))
                <label class="control-label">
                <i class="fa fa-times-circle-o"></i>
                {{ $errors->first('balance') }}
                </label>
                @endif
              </div>

              <!-- select -->
              <div class="form-group {{ $errors->has('role') ? 'has-error' : ''  }}">
                <label>Jabatan</label>
                <select class="form-control" name="role">
                  <option>Pilih Jabatan</option>
                  <option value="3">Akunting</option>
                  <option value="4">Operator Toko</option>
                </select>

                @if($errors->has('role'))
                <label class="control-label">
                <i class="fa fa-times-circle-o"></i>
                {{ $errors->first('role') }}
                </label>
                @endif
              </div>

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Perbarui</button>
                <!-- <button type="submit" class="btn btn-success">Perbarui</button> -->
              </div>

            <!-- </form> -->
            {!! Form::close() !!}

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
