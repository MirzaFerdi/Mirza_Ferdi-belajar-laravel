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
              <th>Nama Produk</th>
              <th>Kode Produk</th>
              <th>Kategori</th>
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
              <td>{{$row->product_name}}</td>
              <td>{{$row->product_code}}</td>
              <td>{{$row->category->category_name}}</td>
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
                        <a href="/product/delete/{{$row->id}}" class="btn btn-sm btn-danger mr-2" name="btn-hapus" >
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


@endsection
