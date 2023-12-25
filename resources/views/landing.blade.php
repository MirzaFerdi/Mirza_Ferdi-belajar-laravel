<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Product Home</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="landing.css" />
  </head>
  <body>
    <!-- NAVBAR -->
    <nav class="navbar fixed-top navbar-expand-lg fw-bold p-4 px-5" style="background-color: #f0f0f0;">
      <div class="container-fluid">
        <a class="navbar-brand fs-4" href="#">CShop</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div
          class="collapse navbar-collapse justify-content-end"
          id="navbarNav"
        >
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="#produk">Produk</a>
            </li>
            <div class="d-flex align-self-center">
              <div class="vr" style="width: 2px; height: 25px"></div>
            </div>
            <li class="nav-item">
              <a class="nav-link" href="{{route('login')}}">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- CONTENT -->
    <div class="carousel">
      <img
        src="https://images.unsplash.com/photo-1629934266257-69467879efa7?q=80&w=1931&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
        class="img-fluid mb-5"
        style="
          height: 100vh;
          width: 100vw;
          object-fit: cover;
          filter: brightness(0.4);
        "
        alt="..."
      />
      <div
        class="position-absolute top-50 start-50 translate-middle carousel-caption"
      >
        <h1 class="display-1 fw-bold">Computer Shop</h1>
        <p class="fs-4">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam,
          voluptatum.
        </p>
      </div>
    </div>



    <div class="container-lg p-5" id="produk">
      <div class="position-relative pb-5">
        <h2 class="fw-bold text-center" >Produk</h2>
        <div
          class="position-absolute rounded start-50 translate-middle-x"
          style="bottom: 2.9rem; height: 0.3rem; width: 5rem; background: #000"
        ></div>
      </div>

      <div class="row row-cols-1 row-cols-md-4 g-4">
        @foreach ($product as $data)

        <div class="col">
          <div class="card h-100 shadow border border-0">
              <div class="card-header border border-0 d-flex justify-content-between ">
                <small class="text-body-secondary fw-medium align-self-center">{{$data->category->category_name}}</small>
              </div>
            <img
              src="{{asset('storage/image/'. $data->image)}}"
              class="card-img-top"
              alt="..."
            />
            <div class="card-body">

              <h6 class="card-title">{{$data->product_name}}</h6>
              <p class="card-text">
                {{$data->description}}
              </p>
            </div>
            <div class="card-footer d-flex justify-content-between ">
              <small class="text-body-secondary align-self-center">Rp. {{$data->price}}</small>
              <button type="button" class="btn btn-dark btn-sm">Add To Chart</button>
            </div>
          </div>
        </div>
        @endforeach
        {{-- <div class="col">
          <div class="card h-100 shadow border border-0">
            <img
              src="http://mirza_ferdi-belajar-laravel.test/storage/image/1702911380.png"
              class="card-img-top"
              alt="..."
            />
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">
                This is a longer card with supporting text below as a natural
                lead-in to additional content. This content is a little bit
                longer.
              </p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100 shadow border border-0">
            <img
              src="http://mirza_ferdi-belajar-laravel.test/storage/image/1702911678.png"
              class="card-img-top"
              alt="..."
            />
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">
                This is a longer card with supporting text below as a natural
                lead-in to additional content. This content is a little bit
                longer.
              </p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100 shadow border border-0">
            <img
              src="http://mirza_ferdi-belajar-laravel.test/storage/image/1702911918.png"
              class="card-img-top"
              alt="..."
            />
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">
                This is a longer card with supporting text below as a natural
                lead-in to additional content. This content is a little bit
                longer.
              </p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100 shadow border border-0">
            <img
              src="http://mirza_ferdi-belajar-laravel.test/storage/image/1702911975.png"
              class="card-img-top"
              alt="..."
            />
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">
                This is a longer card with supporting text below as a natural
                lead-in to additional content. This content is a little bit
                longer.
              </p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100 shadow border border-0">
            <img
              src="http://mirza_ferdi-belajar-laravel.test/storage/image/1702912013.png"
              class="card-img-top"
              alt="..."
            />
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">
                This is a longer card with supporting text below as a natural
                lead-in to additional content. This content is a little bit
                longer.
              </p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100 shadow border border-0">
            <img src="..." class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">
                This is a longer card with supporting text below as a natural
                lead-in to additional content. This content is a little bit
                longer.
              </p>
            </div>
          </div>
        </div> --}}
      </div>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
