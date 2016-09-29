@extends('manager.menu')

@section('script')
  @parent
  <script>
  $('input[name="stockable"]').change(function(){
    $('input[name="stock"]').prop('disabled', this.value != 0 ? false:true);
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
    <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title">Tambah Layanan</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <form role="form" action="{{ route('manager.services.store') }}" method="POST">
              {{ csrf_field() }}
              <!-- text input -->
              <div class="form-group {{ $errors->has('name') ? 'has-error' : ''  }}">
                <label>Nama</label>
                <input class="form-control" placeholder="Gado-Gado" name="name" type="text" value="{{ old('name') }}">

                @if($errors->has('name'))
                <label class="control-label">
                <i class="fa fa-times-circle-o"></i>
                {{ $errors->first('name') }}
                </label>
                @endif

              </div>

              <div class="form-group {{ $errors->has('stockable') ? 'has-error' : ''  }}">
                <label>Apakah item bisa distok?</label>
                <div class="radio">
                <label><input type="radio" name="stockable" value="0">Tidak, Item tidak bisa distok</label>
                <label><input type="radio" name="stockable" value="1">Ya, Item bisa distok</label>
                </div>

                @if($errors->has('stockable'))
                <label class="control-label">
                <i class="fa fa-times-circle-o"></i>
                {{ $errors->first('stockable') }}
                </label>
                @endif

              </div>

              <div class="form-group {{ $errors->has('stock') ? 'has-error' : ''  }}">
                <label>Stok</label>
                <input class="form-control" placeholder="" name="stock" type="text" disabled>

                @if($errors->has('stock'))
                <label class="control-label">
                <i class="fa fa-times-circle-o"></i>
                {{ $errors->first('stock') }}
                </label>
                @endif

              </div>

              <div class="form-group {{ $errors->has('value') ? 'has-error' : ''  }}">
                <label>Harga</label>
                <input class="form-control" placeholder="" name="value" type="text" value="{{ old('value') }}">

                @if($errors->has('value'))
                <label class="control-label">
                <i class="fa fa-times-circle-o"></i>
                {{ $errors->first('value') }}
                </label>
                @endif

              </div>

              <!-- select -->
              <div class="form-group {{ $errors->has('serviceCategory') ? 'has-error' : '' }}">
                <label>Kategori Layanan</label>
                <select name="serviceCategory" class="form-control" required>
                  <option>Pilih Kategori</option>
                  @foreach($servicesCategory as $serviceCategory)
                    <option value="{{ $serviceCategory->id }}">{{ $serviceCategory->name }}</option>
                  @endforeach
                </select>

                @if($errors->has('serviceCategory'))
                <label class="control-label">
                <i class="fa fa-times.circle-o"></i>
                {{ $errors->first('serviceCategory') }}
                </label>
                @endif

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
