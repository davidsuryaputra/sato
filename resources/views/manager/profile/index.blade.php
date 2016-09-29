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
    <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Logo Showroom</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" action="{{ route('manager.profile.store', Auth::user()->showroom_id) }}" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="box-body">
                    <img src="{{ Auth::user()->showroom->logo }}" width="300" height="200">
                    <br />
                    <br />
                    <div class="form-group {{ $errors->has('file') ? 'has-error' : '' }}">
                      <!-- <label for="exampleInputFile">Logo Showroom</label> -->
                      <input type="file" name="logo">

                      @if($errors->has('file'))
                      <label class="control-label">
                      <i class="fa fa-times-circle-o"></i>
                      {{ $errors->first('file') }}
                      </label>
                      @endif
                    </div>
                  </div>
                  <!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
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
