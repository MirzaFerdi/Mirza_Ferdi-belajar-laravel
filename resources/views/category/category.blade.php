@extends('layouts.main')

@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Kategori CRUD</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Kategori CRUD</li>
        </ol>
      </div>
    </div>
  </div>
</section>


<!-- Main content -->
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="d-flex justify-content-between">
                <form action="#" >
                    <div class="input-group">
                        <input type="text" name="kata_kunci"  class="form-control form-control-md" placeholder="Cari...">
                        <div class="input-group-append">
                            <button type="submit" name="cari" class="btn btn-md btn-default">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <a class="btn bg-primary" href="{{route('category.create')}}" role="button"> Tambah Kategori</a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="" class="table table-bordered table-hover text-center">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Kategori</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($category as $row)

                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$row->category_name}}</td>
                  <td>
                    <div class="container">
                      <div class="row ">
                        <div class="col">
                            <a href="/category/delete/{{$row->id}}" class="btn btn-sm btn-danger" name="btn-hapus" >
                            <i class="fas fa-trash-alt"></i>
                            </a>
                            <a href="{{route('category.edit', ['id' => $row->id])}}" class="btn btn-sm bg-teal" name="btn-edit" >
                            <i class="fas fa-edit"></i>
                            </a>
                        </div>
                      </div>
                    </div>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
@endsection
