@extends('layouts.main')

@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Tambah Produk</h1>
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
            <div class="pb-8">
              {{-- @if ($errors->any())
                  <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                      Something wrong!
                  </div>
                  <ul class="border border-t-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                      @foreach ($errors->all() as $error)
                          <li>{{$error}}</li>
                      @endforeach
                  </ul>
              @endif --}}
            </div>
            <div class="card-header">
                <form id="form" action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-2">
                      <label for="namaProduk" class="form-label">Nama Produk<span style="color: red;">*</span></label>
                      <input type="text" class="form-control" id="namaProduk" name="product_name" required>
                      @if ($errors->has('product_name'))
                          <p class="text-red">*{{$errors->first('product_name')}}</p>
                      @endif
                    </div>

                    <div class="mb-2 form-group">
                        <label for="namaProduk" class="form-label">Kategori<span style="color: red;">*</span></label>
                        <select class="form-control" id="category_id" name="category_id">
                            @foreach ($category as $ct)
                            <option value="{{$ct->id}}">{{$ct->category_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-2">
                      <label for="kodeProduk" class="form-label">Kode Produk</label>
                      <input type="text" class="form-control" id="kodeProduk" name="product_code">
                    </div>


                    <div class="mb-2">
                      <label for="deskripsi" class="form-label">Deskripsi</label>
                      <textarea class="form-control" id="deskripsi" rows="3" name="description"></textarea>
                      @if ($errors->has('description'))
                            <p class="text-red">*{{ $errors->first('description') }}</p>
                      @endif
                    </div>

                    <div class="mb-2">
                      <label for="harga" class="form-label">Harga<span style="color: red;">*</span></label>
                      <input type="number" class="form-control" id="harga" name="price" required>
                      @if ($errors->has('price'))
                            <p class="text-red">*{{ $errors->first('price') }}</p>
                      @endif
                    </div>

                    <div class="mb-2">
                      <label for="satuan" class="form-label">Satuan<span style="color: red;">*</span></label>
                      <input type="text" class="form-control" id="satuan" name="unit" required>
                      @if ($errors->has('unit'))
                        <p class="text-red">*{{ $errors->first('unit')}}</p>
                      @endif
                    </div>

                    <div class="mb-2">
                      <label for="diskon" class="form-label">Diskon<span style="color: red;">*</span></label>
                      <input type="number" class="form-control" id="diskon" name="discount_amount" required>
                    </div>

                    <div class="mb-2">
                      <label for="stok" class="form-label">Stok<span style="color: red;">*</span></label>
                      <input type="number" class="form-control" id="stok" name="stock" required>
                      @if ($errors->has('stock'))
                        <p class="text-red">*{{ $errors->first('stock')}}</p>
                      @endif
                    </div>

                    {{-- <div class="form-group">
                        <label for="gambar" class="form-label">Foto Produk</label>
                        <div class="mb-2 custom-file">
                            <input type="file" class="custom-file-input" id="gambar" name="image" multiple>
                            <label class="custom-file-label" for="gambar">Choose file</label>
                        </div>
                    </div> --}}

                    <div class="mb-2">
                        <label for="gambar" class="form-label">Foto Produk</label>
                        <input type="file" class="form-control" id="gambar" name="image" multiple>
                    </div>
                  <div class="modal-footer">
                    <a class="btn bg-secondary" href="{{route('product')}}">Batal</a>
                    {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button> --}}
                    <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
                  </div>
                </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection
