<!DOCTYPE html>
<html>

<head>
    <link rel="shortcut icon" href="images/logoranting.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PSHT Ranting Singosari</title>
    <link href="css/style.css">
    <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="images/psht.jpg" alt="PSHT Ranting Singosari" width="50" height="auto;"> PSHT Ranting
                Singosari
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Warga</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Siswa</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Rayon
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Mondoroko</a></li>
                            <li><a class="dropdown-item" href="#">Watu Gede</a></li>
                            <li><a class="dropdown-item" href="#">Saptoraya</a></li>
                            <li><a class="dropdown-item" href="#">Tumapel</a></li>
                            <li><a class="dropdown-item" href="#">Sempol</a></li>
                            <li><a class="dropdown-item" href="#">Gunung Rejo</a></li>
                            <li><a class="dropdown-item" href="#">Gunung Jati</a></li>
                            <li><a class="dropdown-item" href="#">Kendedes</a></li>
                            <li><a class="dropdown-item" href="#">Singhasari</a></li>
                            <li><a class="dropdown-item" href="#">Songsong</a></li>
                        </ul>
                    </li>
                    <li class="nav-item p-1">
                        <!-- <a class="nav-link" href="#">Login</a> -->
                        <a href="{{ route('login') }}" class="nav-link btn btn-info text-white">Login</a>
                    </li>
                    <li class="nav-item p-1">
                        <!-- <a class="nav-link" href="#">Register</a> -->
                        <a href="{{ route('register') }}" class="nav-link btn btn-success text-white">Register</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <!-- slider -->
    <section>
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" style="height:750px">
                    <img style="object-fit:cover;" src="images/slider/IMG_4776.JPG" class="d-block w-100 h-100" alt="...">
                    <div class="carousel-caption d-none d-md-block" style="text-shadow: 2px 2px #242323 !important">
                        <h2>Website Resmi PSHT Ranting Singosari Malang Kabupaten</h2>
                    </div>
                </div>
                <div class="carousel-item" style="height:750px">
                    <img style="object-fit:cover;" src="images/slider/IMG_4457.JPG" class="d-block w-100 h-100" alt="...">

                    <div class="carousel-caption d-none d-md-block" style="text-shadow: 2px 2px #242323 !important">
                        <h2>Mendidik Manusia Berbudi Luhur Tahu Benar Tahu Salah</h2>
                        <!-- <p>Some representative placeholder content for the second slide.</p> -->
                    </div>
                </div>
                <div class="carousel-item" style="height:750px">
                    <img style="object-fit:cover;" src="images/slider/IMG_4741.JPG" class="d-block w-100 h-100" alt="...">
                    <div class="carousel-caption d-none d-md-block" style="text-shadow: 2px 2px #242323 !important">
                        <h2>Pendidikan pencak silat di PSHT memiliki inti unsur pembelaan diri untuk mempertahankan
                            kehormatan, keselamatan, kebahagiaan, dan kebenaran</h2>
                        <!-- <p>Some representative placeholder content for the third slide.</p> -->
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    <!-- end of slider -->


    <!-- card title -->
    <section id="filosofi">
        <div class="container" style="padding:30px 0">
            <div class="row">
                <div class="col">
                    <h2 class="text-center">Filosofi PSHT Singosari</h2>
                </div>
            </div>

            <div class="row" style="padding:30px 0">
                <div class="col">
                    <div class="card" style="width: 100%;">
                        <i style="padding:30px 0" class="text-center fas fa-history fa-7x"></i>
                        <div class="card-body">
                            <h5 class="card-title text-center">Sejarah</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <a href="#">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card" style="width: 100%;">
                        <i style="padding:30px 0" class="text-center fas fa-book-open fa-7x"></i>
                        <div class="card-body">
                            <h5 class="card-title text-center">Pendidikan</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <a href="#">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card" style="width: 100%;">
                        <i style="padding:30px 0" class="text-center fas fa-chart-line fa-7x"></i>
                        <div class="card-body">
                            <h5 class="card-title text-center">Tingkatan</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <a href="#">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card" style="width: 100%;">
                        <i style="padding:30px 0" class="text-center fas fa-users fa-7x"></i>
                        <div class="card-body">
                            <h5 class="card-title text-center">Tokoh</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <a href="#">Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end of card title -->

    <!-- rayon and blog -->
    <section id="blog">
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <h2 class="text-center">Rayon</h2>
                    <ul class="list-group">
                        <li class="list-group-item">Mondoroko</li>
                        <li class="list-group-item">Watu Gede</li>
                        <li class="list-group-item">Saptoraya</li>
                        <li class="list-group-item">Tumapel</li>
                        <li class="list-group-item">Sempol</li>
                        <li class="list-group-item">Gunung Rejo</li>
                        <li class="list-group-item">Gunung Jati</li>
                        <li class="list-group-item">kendedes</li>
                        <li class="list-group-item">Singhasari</li>
                        <li class="list-group-item">SMK Nahyada</li>
                    </ul>
                </div>


                <div class="col-9">
                    <div class="row">
                        <h2 class="text-center">Blog</h2>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <img src="images/blog/IMG_4490.JPG" class="img-thumbnail" alt="...">
                        </div>
                        <div class="col-4">
                            <img src="images/blog/IMG_4797.JPG" class="img-thumbnail" alt="...">
                        </div>
                        <div class="col-4">
                            <img src="images/blog/IMG_4455.JPG" class="img-thumbnail" alt="...">
                        </div>
                        <div class="col-4">
                            <img src="images/blog/IMG_4435.JPG" class="img-thumbnail" alt="...">
                        </div>
                        <div class="col-4">
                            <img src="images/blog/IMG_4450.JPG" class="img-thumbnail" alt="...">
                        </div>
                        <div class="col-4">
                            <img src="images/blog/IMG_4487.JPG" class="img-thumbnail" alt="...">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end of rayon and blog -->


    <!-- Kontak Kami -->
    <section>
        <div class="container" style="padding:30px 0">
            <div class="row">
                <h2 class="text-center">Kontak kami</h2>
            </div>
            <div class="row">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="contoh@gmail.com">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Isi Pesan</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
            </div>
        </div>
    </section>
    <!-- end of kontak kami -->

    <!-- footer -->
    <footer class="bg-dark">
        <div class="container">
            <div class="py-4 d-flex justify-content-between text-warning">
                <p> ©Copyright 2021 - 2022 PHST Ranting Siongosari</p>
            </div>
        </div>
    </footer>
    <!-- end of footer -->

</body>
<script src="js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous">
</script>

<script src="js/kit.fontawesome.js" crossorigin="anonymous"></script>

</html>