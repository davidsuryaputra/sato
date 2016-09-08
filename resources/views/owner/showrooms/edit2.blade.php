@extends('layouts.app')

@section('title', 'Owner')

@section('name', Auth::user()->name)

@section('role', 'Owner')

@section('sidebar-menu')
<ul class="sidebar-menu">
  <li class="header">MENU UTAMA</li>
  <li class="active treeview">
    <a href="{{ url('home') }}">
      <i class="fa fa-dashboard"></i> <span>Beranda</span> <!--<i class="fa fa-angle-left pull-right"></i>-->
    </a>
  </li>

  <li class="treeview">
    <a href="#">
      <i class="fa fa-home"></i> <span>Outlet</span> <i class="fa fa-angle-left pull-right"></i>
    </a>

    <ul class="treeview-menu">
      <li><a href="{{ url('owner/showrooms') }}"><i class="fa fa-circle-o"></i> Semua Outlet</a></li>
      <li><a href="{{ url('owner/showrooms/create') }}"><i class="fa fa-circle-o"></i> Tambah Baru</a></li>
    </ul>

  </li>

  <li class="treeview">
    <a href="#">
      <i class="fa fa-edit"></i> <span>Manajer</span>
      <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li><a href="{{ url('owner/managers') }}"><i class="fa fa-circle-o"></i> Semua Manajer</a></li>
      <li><a href="{{ url('owner/managers/create') }}"><i class="fa fa-circle-o"></i> Tambah Baru</a></li>
    </ul>
  </li>

  {{--
  <li class="treeview">
    <a href="#">
      <i class="fa fa-envelope"></i> <span>Pesan</span>
      <small class="label pull-right bg-yellow">12</small>
    </a>
    <ul class="treeview-menu">
      <li><a href="{{ url('owner/messages') }}"><i class="fa fa-circle-o"></i> Semua Pesan</a></li>
      <li><a href="{{ url('owner/messages/create') }}"><i class="fa fa-circle-o"></i> Tulis Pesan</a></li>
    </ul>
  </li>
  --}}
</ul>

@endsection


@section('content')
<!-- Content Wrapper. Contains page content -->
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
    <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title">Ubah Outlet</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">

              {!! Form::model($showroom, ['method' => 'patch', 'action' => ['OwnerController@updateShowroom', $showroom->id]]) !!}

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
                <label>Saldo</label>
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
              @if(count($managers) > 0)
              <div class="form-group {{ $errors->has('manager') ? 'has-error' : ''  }}">
                <label>Pilih Manager</label>
                <select class="form-control" name="manager">
                  <option>Pilih Manajer</option>
                  @foreach($managers as $manager)
                  <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                  @endforeach
                </select>

                @if($errors->has('manager'))
                <label class="control-label">
                <i class="fa fa-times-circle-o"></i>
                {{ $errors->first('manager') }}
                </label>
                @endif
              </div>
              @endif

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
</div>
<!-- /.content-wrapper -->
@endsection
