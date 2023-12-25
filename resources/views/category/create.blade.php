@extends('layouts.main')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Kategori</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <form id="form" action="{{ route('category.store') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-2">
                                <label for="namaKategori" class="form-label">Nama Kategori<span
                                        style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="namaKategori" name="category_name"
                                    required>
                                @if ($errors->has('category_name'))
                                    <p class="text-red">*{{ $errors->first('category_name') }}</p>
                                @endif
                                <div class="modal-footer">
                                    <a class="btn bg-secondary" href="{{ route('category') }}">Batal</a>
                                    <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
@endsection
