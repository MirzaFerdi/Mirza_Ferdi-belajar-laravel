@extends('layouts.main')

@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Product CRUD</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Product CRUD</li>
        </ol>
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
          <div class="d-flex justify-content-between">
            <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
                <div class="input-group">
                    <?php
                    $kata_kunci="";
                    if (isset($_POST['kata_kunci'])) {
                        $kata_kunci=$_POST['kata_kunci'];
                    }
                    ?>
                    <input type="text" name="kata_kunci" value="<?php echo $kata_kunci;?>" class="form-control form-control-md" placeholder="Cari...">
                    <div class="input-group-append">
                        <button type="submit" name="cari" class="btn btn-md btn-default">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
            <a class="btn bg-primary" href="{{route('product.create')}}" role="button"> Tambah Produk</a>
            {{-- <button type="button" class="btn btn-primary btn-tambah"  data-toggle="modal" data-target="#modal-tambah">
                Tambah Produk
            </button> --}}
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="" class="table table-bordered table-hover text-center">
            <thead>
            <tr>
              <th>No</th>
              <th>Kategori</th>
              <th>Kode Produk</th>
              <th>Nama Produk</th>
              <th>Deskripsi</th>
              <th>Harga</th>
              <th>Satuan</th>
              <th>Diskon</th>
              <th>Stok</th>
              <th>Foto</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($product as $row)

            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$row->category_id}}</td>
              <td>{{$row->product_code}}</td>
              <td>{{$row->product_name}}</td>
              <td>{{$row->description}}</td>
              <td>{{$row->price}}</td>
              <td>{{$row->unit}}</td>
              <td>{{$row->discount_amount}}</td>
              <td>{{$row->stock}}</td>

              @if ($row->image)
                <td>
                    <img src="{{asset('produk/'. $row->image)}}" alt="{{$row->image}}" width="75px" height="auto">
                </td>
                @else
                <td>Not Found</td>
              @endif
              <td>
                <div class="container">
                  <div class="row  justify-content-center">
                    <div class="col-6">
                      <a href="/product/delete/{{$row->id}}" class="btn btn-danger btn-sm " name="btn-hapus" >
                        <i class="fas fa-trash-alt"></i>
                      </a>
                    </div>
                    <div class="col-6">
                      <a href="{{route('product.edit', ['id' => $row->id])}}" class="btn btn-sm bg-teal" name="btn-edit" >
                        <i class="fas fa-edit"></i>
                      </a>
                    </div>
                  </div>
                </div>
                  <!-- <div class="text-center">
                  </div> -->
              </td>
            </tr>
            @endforeach

            </tbody>
            </tfoot>
          </table>
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


<!-- MODAL TAMBAH -->
<div class="modal fade" id="modal-tambah" tabindex="-1" aria-labelledby="modal-tambahLabel" aria-hidden="true">
<div class="modal-dialog ">
  <div class="modal-content">
    <div class="modal-header">
      <h3 class="modal-title fs-5" id="modal-tambahLabel">Tambah Produk</h3>
    </div>
    <form id="form" action="action-tambah.php" method="post" enctype="multipart/form-data">
      <div class="modal-body ">
        <div class="mb-2">
          <label for="namaProduk" class="form-label">Nama Produk<span style="color: red;">*</span></label>
          <input type="text" class="form-control" id="namaProduk" name="product_name" required>
        </div>

        <div class="mb-2 dropdown">
          <label for="namaProduk" class="form-label">Kategori<span style="color: red;">*</span></label>
          <select class="form-select" id="category_id" name="category_id">
            <option value="1">Keyboard</option>
            <option value="2">Headset</option>
            <option value="3">Monitor</option>
          </select>
        </div>

        <div class="mb-2">
          <label for="kodeProduk" class="form-label">Kode Produk</label>
          <input type="text" class="form-control" id="kodeProduk" name="product_code">
        </div>


        <div class="mb-2">
          <label for="deskripsi" class="form-label">Deskripsi</label>
          <textarea class="form-control" id="deskripsi" rows="3" name="description"></textarea>
        </div>

        <div class="mb-2">
          <label for="harga" class="form-label">Harga<span style="color: red;">*</span></label>
          <input type="number" class="form-control" id="harga" name="price" required>
        </div>

        <div class="mb-2">
          <label for="satuan" class="form-label">Satuan<span style="color: red;">*</span></label>
          <input type="text" class="form-control" id="satuan" name="unit" required>
        </div>

        <div class="mb-2">
          <label for="diskon" class="form-label">Diskon<span style="color: red;">*</span></label>
          <input type="number" class="form-control" id="diskon" name="discount_amount" required>
        </div>

        <div class="mb-2">
          <label for="stok" class="form-label">Stok<span style="color: red;">*</span></label>
          <input type="number" class="form-control" id="stok" name="stock" required>
        </div>

        <div class="mb-2">
          <label for="gambar" class="form-label">Foto Produk</label>
          <input type="file" class="form-control" id="gambar" name="image[]" multiple>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
      </div>
    </form>
  </div>
</div>
</div>

<!-- MODAL EDIT -->
<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="modal-editLabel" aria-hidden="true">
<div class="modal-dialog ">
  <div class="modal-content">
    <div class="modal-header">
      <h3 class="modal-title fs-5" id="modal-editLabel">Edit Produk</h3>
    </div>
    <form action="action-edit.php" method="post" >
    <div class="modal-body">
        <div class="mb-2">
          <label for="idProduk" class="form-label">id<span style="color: red;">*</span></label>
          <input type="text" class="form-control" id="idProduk" value="" name="id" readonly>
        </div>

        <div class="mb-2">
          <label for="namaProduk" class="form-label">Nama Produk<span style="color: red;">*</span></label>
          <input type="text" class="form-control" id="namaProduk" name="product_name">
        </div>

        <div class="mb-2">
          <label for="namaProduk" class="form-label">Kategori<span style="color: red;">*</span></label>
          <select class="form-select category_id" id="category_id_edit" name="category_id">
            <option value="1">Keyboard</option>
            <option value="2">Headset</option>
            <option value="3">Monitor</option>
          </select>
        </div>

        <div class="mb-2">
          <label for="kodeProduk" class="form-label">Kode Produk</label>
          <input type="text" class="form-control" id="kodeProduk" name="product_code">
        </div>


        <div class="mb-2">
          <label for="deskripsi" class="form-label">Deskripsi</label>
          <textarea class="form-control" id="deskripsi" rows="3" name="description"></textarea>
        </div>

        <div class="mb-2">
          <label for="harga" class="form-label">Harga<span style="color: red;">*</span></label>
          <input type="number" class="form-control" id="harga" name="price">
        </div>

        <div class="mb-2">
          <label for="satuan" class="form-label">Satuan<span style="color: red;">*</span></label>
          <input type="text" class="form-control" id="satuan" name="unit">
        </div>

        <div class="mb-2">
          <label for="diskon" class="form-label">Diskon<span style="color: red;">*</span></label>
          <input type="number" class="form-control" id="diskon" name="discount_amount">
        </div>

        <div class="mb-2">
          <label for="stok" class="form-label">Stok<span style="color: red;">*</span></label>
          <input type="number" class="form-control" id="stok" name="stock">
        </div>

        <div class="mb-2">
          <label for="gambar" class="form-label">Foto Produk</label>
          <input type="file" class="form-control" id="gambar" name="image[]" multiple>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" name="edit" class="btn btn-primary">Edit</button>
      </div>
    </form>
  </div>
</div>
</div>

<!-- MODAL HAPUS -->
<div class="modal fade" id="modal-hapus" tabindex="-1" aria-labelledby="modal-hapusLabel" aria-hidden="true">
<div class="modal-dialog ">
  <div class="modal-content">
    <div class="modal-header">
      <h3 class="modal-title fs-5" id="modal-hapusLabel">Hapus Produk</h3>
    </div>
    <form action="action-delete.php" method="post">
      <div class="modal-body">
        <input type="hidden" class="form-control idProduk" id="idProduk" name="id" value="">
        <h6>Apakah anda ingin menghapus produk ini?</h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="" name="hapus" class="btn btn-primary">Hapus</button>
      </div>
    </form>
  </div>
</div>
</div>

@endsection
