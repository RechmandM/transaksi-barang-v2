<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rechmand M | Web Developer</title>

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />

    {{-- bootstrap --}}
    <link href="{{ route('home') }}/assets/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="{{ route('home') }}/assets/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

    {{-- jquery --}}
    <script src="{{ route('home') }}/assets/json/jquery/jquery.min.js"></script>

    {{-- Lazy --}}
    <script src="{{ route('home') }}/assets/js/lazysizes.min.js" async=""></script>

    <link rel="icon" href="{{ route('home') }}/assets/ico/logoku.png" type="image/png">

    <script src="https://unpkg.com/feather-icons"></script>
</head>
<style>
    .bgku {

        /* background-color: aqua; */
        /* background-color: rgba(48, 241, 241, 0.24); */
        background-color: rgba(0, 0, 0, .25);
        color: white;
        padding: 100px;
    }

    .bgkubawah {
        background-color: rgb(255, 255, 255);
    }

    .nav-item:hover {
        background-color: rgba(0, 4, 255, 0.582);
        border-radius: 10px;
    }

    .skill:hover {
        opacity: 0.7;
    }
</style>
<div id="pintu" class="card bg-black position-fixed w-100 py-5 fixed-top rounded-0" style="height: 100%">
    <div class="text-center pt-5 text-white">
        <h1 id="pintu-text-1" class="display-4"></h1>
        <h1 id="pintu-text-2" class="display-4"></h1>
        <br>
        <h1 id="pintu-text-3" class="display-4 fw-medium"></h1>
    </div>
    <div hidden id="pintu-text-4" class="text-center pt-5">
        <button onclick="$('#bodyGuard').attr('hidden', false);$('#pintu').slideUp();$('#navbar-example2').attr('hidden',false);ketik4home();"
            class="btn btn-outline-info w-25 py-2 border-2">MULAI</button>
    </div>
    <div id="pintu-text-0" class="pt-5">
        <div class="display-2 pt-5 text-center">LOADING</div>
        <p class="placeholder-glow text-info text-center">
            <span class="placeholder col-3"></span>
        </p>
    </div>

</div>
<script>
    function first() {
        $('#pintu-text-0').slideUp();
        setTimeout(() => {
            ketik();
        }, 1000);
    }

    var i=0,text;
    var i = 0;
    text1 = "Di era yang serba cepat saat ini"
    text2 = "Bukan kecepatanlah yang terpenting"
    text3 = "Melainkan sebuah Proses"

    function ketik() {
            if (i < text1.length) {
                document.getElementById("pintu-text-1").innerHTML += text1.charAt(i);
                i++;
                setTimeout(ketik, 80);
            } else {
                setTimeout(() => {
                    i = 0;
                    ketik2();
                }, 500);
            }
    }

    function ketik2() {
        if (i < text2.length) {
            document.getElementById("pintu-text-2").innerHTML += text2.charAt(i);
            i++;
            setTimeout(ketik2, 80);
        } else {
            setTimeout(() => {
                i = 0;
                ketik3();
            }, 1500);
        }
    }

    function ketik3() {
        if (i < text3.length) {
            document.getElementById("pintu-text-3").innerHTML += text3.charAt(i);
            i++;
            setTimeout(ketik3, 80);
        } else {
            setTimeout(() => {
                i = 0;
                $('#pintu-text-4').attr('hidden', false);
            }, 2000);
        }
    }

    // untuk home
    var i = 0;
    text4 = "Assalamualaikum"
    text5 = "Perkenalkan, nama saya Rahman"
    text6 = "Saya seorang Mahasiswa di salah satu kampus di Kota Tangerang"

    function ketik4home() {
        setTimeout(() => {
            ketik4();
        }, 1000);

    }

    function ketik4() {
                if (i < text4.length) {
                    document.getElementById("assalamualakum").innerHTML += text4.charAt(i);
                    // document.getElementById("assalamualakum2").innerHTML += text4.charAt(i);
                    i++;
                    setTimeout(ketik4, 80);
                } else {
                    setTimeout(() => {
                        i = 0;
                        ketik5();
                    }, 500);
                }
            }

    function ketik5() {
        if (i < text5.length) {
            document.getElementById("perkenalan").innerHTML += text5.charAt(i);
            i++;
            setTimeout(ketik5, 50);
        } else {
            setTimeout(() => {
                i = 0;
                ketik6();
            }, 500);
        }
    }

    function ketik6() {
        if (i < text6.length) {
            document.getElementById("perkenalan2").innerHTML += text6.charAt(i);
            i++;
            setTimeout(ketik6, 40);
        } else {
            setTimeout(() => {
                i = 0;
                // ketik3();
            }, 1500);
        }
    }

</script>

<body onload="first();">

    {{-- <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" style="justify-content: center">
                <img style="margin-bottom: -45%;margin-top: -20%" class="d-block w-100"
                    src="{{ route('home') }}/assets/4done.jpg" alt="First slide">
                <div class="d-none d-md-block">
                    <h1>Assalamualakum</h1>
                    <h5>Perkenalkan, nama saya Rahman</h5>
                </div>
            </div>
        </div> --}}
        {{-- <nav id="navbar-example2" class="navbar navbar-light bg-light px-3 position-relative"> --}}
            <nav hidden id="navbar-example2" class="navbar bg-transparent px-3 fixed-top">
                {{-- navbar-brand --}}
                <a id="logoku" class=" fw-medium text-white display-6 text-decoration-none" href="#">Rechmand M</a>
                {{-- <ul class="nav nav-pills"> --}}
                    <div class="d-none d-md-block">
                        <ul class="nav">
                            <li id="home" class="nav-item">
                                <a id="hometext" class="nav-link text-white" href="#scrollspyHeading1">Home</a>
                            </li>
                            <li class="nav-item">
                                <a id="abouttext" class="nav-link text-white" href="#scrollspyHeading2">About</a>
                            </li>
                            <li class="nav-item">
                                <a id="serttext" class="nav-link text-white" href="#scrollspyHeading3">Certificate</a>
                            </li>
                            <li class="nav-item">
                                <a id="skilltext" class="nav-link text-white" href="#scrollspyHeading4">Skill</a>
                            </li>
                            <li class="nav-item">
                                <a id="projecttext" class="nav-link text-white" href="#scrollspyHeading5">Project</a>
                            </li>
                            <li id="contact" class="nav-item">
                                <a id="contacttext" class="nav-link text-white" href="#scrollspyHeading6">Contact</a>
                            </li>
                        </ul>
                    </div>
                    <div class="d-block d-md-none">
                        <button type="button" class="btn" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                            <i data-feather="menu"></i></button>
                        <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1"
                            id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Menu
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                                <ul class="nav list-group display-6" style="font-size: 18px" onclick="closeMobile()">
                                    <hr style="margin-bottom: -1px">
                                    <li style="margin-bottom: -12px" id="home" class="nav-item">
                                        <a id="hometext2" class="nav-link text-dark"
                                            href="#scrollspyHeading1-2">Home</a>
                                    </li>
                                    <hr style="margin-bottom: -1px">
                                    <li style="margin-bottom: -12px" class="nav-item">
                                        <a id="abouttext2" class="nav-link text-dark"
                                            href="#scrollspyHeading2">About</a>
                                    </li>
                                    <hr style="margin-bottom: -1px">
                                    <li style="margin-bottom: -12px" class="nav-item">
                                        <a id="serttext2" class="nav-link text-dark"
                                            href="#scrollspyHeading3">Certificate</a>
                                    </li>
                                    <hr style="margin-bottom: -1px">
                                    <li style="margin-bottom: -12px" class="nav-item">
                                        <a id="skilltext2" class="nav-link text-dark"
                                            href="#scrollspyHeading4">Skill</a>
                                    </li>
                                    <hr style="margin-bottom: -1px">
                                    <li style="margin-bottom: -12px" class="nav-item">
                                        <a id="projecttext2" class="nav-link text-dark"
                                            href="#scrollspyHeading5">Project</a>
                                    </li>
                                    <hr style="margin-bottom: -1px">
                                    <li style="margin-bottom: -12px" id="contact" class="nav-item">
                                        <a id="contacttext2" class="nav-link text-dark"
                                            href="#scrollspyHeading6">Contact</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
            </nav>
            {{-- <div class="carousel-inner" id="scrollspyHeading1">
                <div class="carousel-item active" style="height: 750px">
                    <img style="margin-bottom: -45%;margin-top: -20%" class="w-100 position-absolute"
                        src="{{ route('home') }}/assets/4done.jpg" alt="First slide">
                    <div class="d-none d-md-block position-absolute text-white" style="padding: 25% 5%">
                        <h1 class="display-2 fw-bolder">Assalamualaikum</h1>
                        <div style="" class="card p-2 bgku">
                            <h4 class="" style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">
                                Perkenalkan,
                                nama saya Rahman<br>
                                Saya seorang Mahasiswa di salah satu kampus di Kota Tangerang</h4>
                        </div>
                    </div>
                    <div class=" d-block d-md-none position-absolute text-white" style="padding: 50% 5%">
                        <h1 class="display-3 fw-bolder">Assalamualakum</h1>
                        <div style="" class="card p-2 bgku">
                            <h6 style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">
                                Perkenalkan,
                                nama saya Rahman<br>
                                Saya seorang Mahasiswa di salah satu kampus di Kota Tangerang</h6>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div hidden id="bodyGuard">
                <div class="carousel-inner d-none d-md-block" id="scrollspyHeading1">
                    <div class="carousel-item active" style="height: 750px">
                        <img style="margin-bottom: -45%;margin-top: -20%" class="w-100 position-absolute"
                            src="{{ route('home') }}/assets/4done.jpg" alt="First slide">
                        <div class="position-absolute text-white" style="padding: 25% 5%">
                            <h1 id="assalamualakum" class="display-2 fw-bolder"></h1>
                            <div style="" class="card p-2 bg-transparent border-0">
                                <h4 id="perkenalan" class=""
                                    style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif"></h4>
                                <h4 id="perkenalan2"
                                    style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">
                                </h4>
                            </div>
                        </div>

                    </div>
                </div>
                {{-- ////////////////////////////////// --}}
                <div style="margin-bottom: -50px" class="d-block d-md-none mb-1" id="scrollspyHeading1-2">
                    <img class="w-100 position-absolute" src="{{ route('home') }}/assets/4done.jpg" alt="First slide">
                    <div class=" text-white" style="padding: 50% 5%">
                        <div class="card bg-transparent border-0">
                            <h1 id="assalamualakum2" class="display-3 fw-bolder">Assalamualaikum</h1>
                        </div>
                        <div style="" class="card p-2 bgku">
                            <h6 id="perkenalan2"
                                style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">
                                Perkenalkan,
                                nama saya Rahman<br>
                                Saya seorang Mahasiswa di salah satu kampus di Kota Tangerang</h6>
                        </div>
                    </div>
                </div>
                {{-- <div style="" class="card p-2 bgku">
                    <h5 class="" style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">
                        Perkenalkan,
                        nama saya Rahman<br>
                        Saya seorang Mahasiswa di salah satu kampus di Kota Tangerang<br>
                        Dan saya mengambil kelas karyawan untuk studi ini<br>
                        Selain kuliah saya juga menyempatkan diri untuk mempelajari hal-hal baru<br>
                        khususnya untuk pengembangan web developer, termasuk membuat beberapa project</h5>
                </div> --}}

                {{-- <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="0"
                    class="scrollspy-example" tabindex="0"> --}}
                    <div class="scrollspy-example">
                        <div class="container mb-4">
                            <div class="row" style="padding-top: 100px" id="scrollspyHeading2">
                                <div class="col-md-6">
                                    <h1 class="display-3 mb-4 d-none d-md-block"><b>Tentang</b>
                                        Saya<br>
                                        <hr class="w-25 border-3 text-info">
                                    </h1>
                                    {{-- =====================mobile --}}
                                    <h1 class="display-5 mb-4 d-block d-md-none"><b>Tentang</b>
                                        Saya<br>
                                        <hr class="w-25 border-3 text-info">
                                    </h1>
                                    <p class="justify-content-between mb-5 d-none d-md-block"
                                        style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-size:20px">
                                        Saya seorang mahasiswa di salah satu kampus di Kota Tangerang.
                                        Saya sendiri mengambil kelas karyawan untuk menunjang studi ini.<br><br>
                                        Selain kuliah saya juga menyempatkan diri untuk mempelajari hal-hal baru
                                        khususnya untuk pengembangan web developer backend maupun frontend,
                                        termasuk membuat beberapa project karena permintaan maupun untuk pribadi.
                                    </p>
                                    <p class="justify-content-between mb-5 d-block d-md-none"
                                        style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">
                                        Saya seorang mahasiswa di salah satu kampus di Kota Tangerang.
                                        Saya sendiri mengambil kelas karyawan untuk untuk menunjang studi ini.<br><br>
                                        Selain kuliah saya juga menyempatkan diri untuk mempelajari hal-hal baru
                                        khususnya untuk pengembangan web developer backend maupun frontend,
                                        termasuk membuat beberapa project karena permintaan maupun untuk pribadi.
                                    </p>

                                </div>
                                <div class="col-md-6">
                                    <div class="">
                                        <div class="">
                                            <div class="card border-primary mb-3 w-75">
                                                <div class="card-header text-center">Curiculum Vitae</div>
                                                <div class="card-body text-primary">
                                                    <img class="img-thumbnail" src="{{ route('home') }}/assets/sert.png"
                                                        alt="" style="max-width:100%">
                                                    <button class="btn btn-info w-100 mt-3 text-center">Lihat</button>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-light pb-5" id="scrollspyHeading3">
                            <div class="container">
                                <h1 class="display-3 d-none d-md-block" style="padding-top: 100px"><b>Sertifikat</b>
                                    Kompetensi<br>
                                    <hr class="w-25 border-3 text-info">
                                </h1>
                                {{-- ============== mobile --}}
                                <h1 class="display-5 mb-4 d-block d-md-none" style="padding-top: 100px">
                                    <b>Sertifikat</b>
                                    Kompetensi<br>
                                    <hr class="w-25 border-3 text-info">
                                </h1>
                                <div class="row g-2">
                                    <div class="col">
                                        <div class="card">
                                            <img src="{{ route('home') }}/assets/sert.png" class="card-img-top"
                                                alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">Card title</h5>
                                                <p class="card-text">This card has supporting text below as a natural
                                                    lead-in to
                                                    additional content.</p>
                                                {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins
                                                        ago</small>
                                                </p>
                                                --}}
                                            </div>
                                            <div class="card-footer text-center">
                                                <button class="btn btn-primary w-50">Lihat</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card">
                                            <img src="{{ route('home') }}/assets/sert.png" class="card-img-top"
                                                alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">Card title</h5>
                                                <p class="card-text">This card has supporting text below as a natural
                                                    lead-in to
                                                    additional content.</p>
                                            </div>
                                            <div class="card-footer text-center">
                                                <button class="btn btn-primary w-50">Lihat</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card">
                                            <img src="{{ route('home') }}/assets/sert.png" class="card-img-top"
                                                alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">Card title</h5>
                                                <p class="card-text">This card has supporting text below as a natural
                                                    lead-in to
                                                    additional content.</p>
                                            </div>
                                            <div class="card-footer text-center">
                                                <button class="btn btn-primary w-50">Lihat</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="container" id="scrollspyHeading4">
                            <h1 class="display-3 mb-4 d-none d-md-block" style="padding-top: 100px"><b>Keahlian</b>
                                Saya<br>
                                <hr class="w-25 border-3 text-info">
                            </h1>
                            {{-- ============== mobile --}}
                            <h1 class="display-5 mb-4 d-block d-md-none" style="padding-top: 100px"><b>Keahlian</b>
                                Saya<br>
                                <hr class="w-25 border-3 text-info">
                            </h1>
                            <div class="row g-2">
                                <div class="col-4 col-md-4 col-lg-2">
                                    <img src="{{ route('home') }}/assets/ico/lang/html.jpg"
                                        class="skill img-thumbnail border-0" height="50" alt="" srcset="">
                                    <img src="{{ route('home') }}/assets/ico/lang/css.jpg" style="display: none"
                                        class="skill2 img-thumbnail border-0" height="50" alt="" srcset="">
                                    <p class="fw-bold" style="color:darkblue" align="center">HTML</p>
                                </div>
                                <div class="col-4 col-md-4 col-lg-2">
                                    <img src="{{ route('home') }}/assets/ico/lang/css.jpg"
                                        class="skill img-thumbnail border-0" height="50" alt="" srcset="">
                                    <p class="fw-bold" style="color:darkblue" align="center">CSS</p>
                                </div>
                                <div class="col-4 col-md-4 col-lg-2">
                                    <img src="{{ route('home') }}/assets/ico/lang/js.jpg"
                                        class="skill img-thumbnail border-0" height="50" alt="" srcset="">
                                    <p class="fw-bold" style="color:darkblue" align="center">JavaScript Basic</p>
                                </div>
                                <div class="col-4 col-md-4 col-lg-2">
                                    <img src="{{ route('home') }}/assets/ico/lang/jq.jpg"
                                        class="skill img-thumbnail border-0" height="50" alt="" srcset="">
                                    <p class="fw-bold" style="color:darkblue" align="center">Jquery DOM & AJAX</p>
                                </div>
                                <div class="col-4 col-md-4 col-lg-2">
                                    <img src="{{ route('home') }}/assets/ico/lang/php.jpg"
                                        class="skill img-thumbnail border-0" height="50" alt="" srcset="">
                                    <p class="fw-bold" style="color:darkblue" align="center">PHP Native</p>
                                </div>
                                <div class="col-4 col-md-4 col-lg-2">
                                    <img src="{{ route('home') }}/assets/ico/lang/api.jpg"
                                        class="skill img-thumbnail border-0" height="50" alt="" srcset="">
                                    <p class="fw-bold" style="color:darkblue" align="center">Rest API</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row g-2">
                                <div class="col-4 col-md-4 col-lg-2">
                                    <img src="{{ route('home') }}/assets/ico/frame/laravel.jpg"
                                        class=" img-thumbnail border-0" height="" alt="" srcset="">
                                    <p class="fw-bold" style="color:darkblue" align="center">Laravel</p>
                                </div>
                                <div class="col-4 col-md-4 col-lg-2">
                                    <img src="{{ route('home') }}/assets/ico/frame/ci.jpg"
                                        class="skill img-thumbnail border-0" height="50" alt="" srcset="">
                                    <p class="fw-bold" style="color:darkblue" align="center">CodeIgniter</p>
                                </div>
                                <div class="col-4 col-md-4 col-lg-2">
                                    <img src="{{ route('home') }}/assets/ico/frame/boot.jpg"
                                        class="skill img-thumbnail border-0" height="50" alt="" srcset="">
                                    <p class="fw-bold" style="color:darkblue" align="center">Bootstrap</p>
                                </div>
                                <div class="col-4 col-md-4 col-lg-2">
                                    <img src="{{ route('home') }}/assets/ico/frame/git.jpg"
                                        class="skill img-thumbnail border-0" height="50" alt="" srcset="">
                                    <p class="fw-bold" style="color:darkblue" align="center">GIT</p>
                                </div>
                                <div class="col-4 col-md-4 col-lg-2">
                                    <img src="{{ route('home') }}/assets/ico/frame/github.jpg"
                                        class="skill img-thumbnail border-0" height="50" alt="" srcset="">
                                    <p class="fw-bold" style="color:darkblue" align="center">GitHub</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row g-2">
                                <div class="col-4 col-md-4 col-lg-2">
                                    <img src="{{ route('home') }}/assets/ico/db/mysql.jpg"
                                        class="skill img-thumbnail border-0" height="" alt="" srcset="">
                                    <p class="fw-bold" style="color:darkblue" align="center">MySQL</p>
                                </div>
                                <div class="col-4 col-md-4 col-lg-2">
                                    <img src="{{ route('home') }}/assets/ico/db/pgsql.jpg"
                                        class="skill img-thumbnail border-0" height="50" alt="" srcset="">
                                    <p class="fw-bold" style="color:darkblue" align="center">PostgreSQL</p>
                                </div>
                                <div class="col-4 col-md-4 col-lg-2">
                                    <img src="{{ route('home') }}/assets/ico/db/mgdb.jpg"
                                        class="skill img-thumbnail border-0" height="50" alt="" srcset="">
                                    <p class="fw-bold" style="color:darkblue" align="center">MongoDB</p>
                                </div>
                                <div class="col-4 col-md-4 col-lg-2">
                                    <img src="{{ route('home') }}/assets/ico/db/redis.jpg"
                                        class="skill img-thumbnail border-0" height="50" alt="" srcset="">
                                    <p class="fw-bold" style="color:darkblue" align="center">Redis</p>
                                </div>
                                <div class="col-4 col-md-4 col-lg-2">
                                        <img src="{{ route('home') }}/assets/ico/db/cloud.jpg"
                                            class=" img-thumbnail border-0" height="50" alt="" srcset="">
                                        <p class="fw-bold" style="color:darkblue" align="center">Cloud Hosting</p>
                                    </div>
                            </div>
                            <hr>
                            <div class="row g-2">
                                <div class="col-4 col-md-4 col-lg-2 p-4">
                                    <img src="{{ route('home') }}/assets/ico/msds/ps.jpg"
                                        class="skill img-thumbnail border-0" height="" alt="" srcset="">
                                    <p class="fw-bold" style="color:darkblue" align="center">PhotoShop</p>
                                </div>
                                <div class="col-4 col-md-4 col-lg-2 p-4">
                                    <img src="{{ route('home') }}/assets/ico/msds/fm.jpg"
                                        class="skill img-thumbnail border-0" height="50" alt="" srcset="">
                                    <p class="fw-bold" style="color:darkblue" align="center">Figma</p>
                                </div>
                                <div class="col-4 col-md-4 col-lg-2 p-4">
                                    <img src="{{ route('home') }}/assets/ico/msds/word.jpg"
                                        class="skill img-thumbnail border-0" height="50" alt="" srcset="">
                                    <p class="fw-bold" style="color:darkblue" align="center">Ms Word</p>
                                </div>
                                <div class="col-4 col-md-4 col-lg-2 p-4">
                                    <img src="{{ route('home') }}/assets/ico/msds/excel.jpg"
                                        class="skill img-thumbnail border-0" height="50" alt="" srcset="">
                                    <p class="fw-bold" style="color:darkblue" align="center">Ms Excel</p>
                                </div>
                                <div class="col-4 col-md-4 col-lg-2 p-4">
                                    <img src="{{ route('home') }}/assets/ico/msds/pp.jpg"
                                        class="skill img-thumbnail border-0" height="50" alt="" srcset="">
                                    <p class="fw-bold" style="color:darkblue" align="center">Ms PowerPoint</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-light" id="scrollspyHeading5">
                            <div class="container">
                                <h1 class="display-3 mb-4 d-none d-md-block" style="padding-top: 100px"><b>Project</b>
                                    Saya<br>
                                    <hr class="w-25 border-3 text-info">
                                </h1>
                                {{-- ============== mobile --}}
                                <h1 class="display-5 mb-4 d-block d-md-none" style="padding-top: 100px"><b>Project</b>
                                    Saya<br>
                                    <hr class="w-25 border-3 text-info">
                                </h1>
                                <div class="row g-2">
                                    <div class="col-4 col-md-4 col-lg-2">
                                        <img src="{{ route('home') }}/assets/ico/lang/html.jpg"
                                            class=" img-thumbnail border-0" height="50" alt="" srcset="">
                                        <p class="fw-bold" style="color:darkblue" align="center">HTML</p>
                                    </div>
                                    <div class="col-4 col-md-4 col-lg-2">
                                        <img src="{{ route('home') }}/assets/ico/lang/css.jpg"
                                            class=" img-thumbnail border-0" height="50" alt="" srcset="">
                                        <p class="fw-bold" style="color:darkblue" align="center">CSS</p>
                                    </div>
                                    <div class="col-4 col-md-4 col-lg-2">
                                        <img src="{{ route('home') }}/assets/ico/lang/js.jpg"
                                            class=" img-thumbnail border-0" height="50" alt="" srcset="">
                                        <p class="fw-bold" style="color:darkblue" align="center">JavaScript Basic</p>
                                    </div>
                                    <div class="col-4 col-md-4 col-lg-2">
                                        <img src="{{ route('home') }}/assets/ico/lang/jq.jpg"
                                            class=" img-thumbnail border-0" height="50" alt="" srcset="">
                                        <p class="fw-bold" style="color:darkblue" align="center">Jquery DOM & AJAX</p>
                                    </div>
                                    <div class="col-4 col-md-4 col-lg-2">
                                        <img src="{{ route('home') }}/assets/ico/lang/php.jpg"
                                            class=" img-thumbnail border-0" height="50" alt="" srcset="">
                                        <p class="fw-bold" style="color:darkblue" align="center">PHP Native</p>
                                    </div>
                                    <div class="col-4 col-md-4 col-lg-2">
                                        <img src="{{ route('home') }}/assets/ico/lang/api.jpg"
                                            class=" img-thumbnail border-0" height="50" alt="" srcset="">
                                        <p class="fw-bold" style="color:darkblue" align="center">Rest API</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row g-2">
                                    <div class="col-4 col-md-4 col-lg-2">
                                        <img src="{{ route('home') }}/assets/ico/frame/laravel.jpg"
                                            class=" img-thumbnail border-0" height="" alt="" srcset="">
                                        <p class="fw-bold" style="color:darkblue" align="center">Laravel</p>
                                    </div>
                                    <div class="col-4 col-md-4 col-lg-2">
                                        <img src="{{ route('home') }}/assets/ico/frame/ci.jpg"
                                            class=" img-thumbnail border-0" height="50" alt="" srcset="">
                                        <p class="fw-bold" style="color:darkblue" align="center">CodeIgniter</p>
                                    </div>
                                    <div class="col-4 col-md-4 col-lg-2">
                                        <img src="{{ route('home') }}/assets/ico/frame/boot.jpg"
                                            class=" img-thumbnail border-0" height="50" alt="" srcset="">
                                        <p class="fw-bold" style="color:darkblue" align="center">Bootstrap</p>
                                    </div>
                                    <div class="col-4 col-md-4 col-lg-2">
                                        <img src="{{ route('home') }}/assets/ico/frame/git.jpg"
                                            class=" img-thumbnail border-0" height="50" alt="" srcset="">
                                        <p class="fw-bold" style="color:darkblue" align="center">GIT</p>
                                    </div>
                                    <div class="col-4 col-md-4 col-lg-2">
                                        <img src="{{ route('home') }}/assets/ico/frame/github.jpg"
                                            class=" img-thumbnail border-0" height="50" alt="" srcset="">
                                        <p class="fw-bold" style="color:darkblue" align="center">GitHub</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row g-2">
                                    <div class="col-4 col-md-4 col-lg-2">
                                        <img src="{{ route('home') }}/assets/ico/db/mysql.jpg"
                                            class=" img-thumbnail border-0" height="" alt="" srcset="">
                                        <p class="fw-bold" style="color:darkblue" align="center">MySQL</p>
                                    </div>
                                    <div class="col-4 col-md-4 col-lg-2">
                                        <img src="{{ route('home') }}/assets/ico/db/pgsql.jpg"
                                            class=" img-thumbnail border-0" height="50" alt="" srcset="">
                                        <p class="fw-bold" style="color:darkblue" align="center">PostgreSQL</p>
                                    </div>
                                    <div class="col-4 col-md-4 col-lg-2">
                                        <img src="{{ route('home') }}/assets/ico/db/mgdb.jpg"
                                            class=" img-thumbnail border-0" height="50" alt="" srcset="">
                                        <p class="fw-bold" style="color:darkblue" align="center">MongoDB</p>
                                    </div>
                                    <div class="col-4 col-md-4 col-lg-2">
                                        <img src="{{ route('home') }}/assets/ico/db/redis.jpg"
                                            class=" img-thumbnail border-0" height="50" alt="" srcset="">
                                        <p class="fw-bold" style="color:darkblue" align="center">Redis</p>
                                    </div>
                                    <div class="col-4 col-md-4 col-lg-2">
                                        <img src="{{ route('home') }}/assets/ico/db/cloud.jpg"
                                            class=" img-thumbnail border-0" height="50" alt="" srcset="">
                                        <p class="fw-bold" style="color:darkblue" align="center">Cloud</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row g-2">
                                    <div class="col-4 col-md-4 col-lg-2">
                                        <img src="{{ route('home') }}/assets/ico/msds/ps.jpg"
                                            class=" img-thumbnail border-0" height="" alt="" srcset="">
                                        <p class="fw-bold" style="color:darkblue" align="center">PhotoShop</p>
                                    </div>
                                    <div class="col-4 col-md-4 col-lg-2">
                                        <img src="{{ route('home') }}/assets/ico/msds/fm.jpg"
                                            class=" img-thumbnail border-0" height="50" alt="" srcset="">
                                        <p class="fw-bold" style="color:darkblue" align="center">Figma</p>
                                    </div>
                                    <div class="col-4 col-md-4 col-lg-2">
                                        <img src="{{ route('home') }}/assets/ico/msds/word.jpg"
                                            class=" img-thumbnail border-0" height="50" alt="" srcset="">
                                        <p class="fw-bold" style="color:darkblue" align="center">Ms Word</p>
                                    </div>
                                    <div class="col-4 col-md-4 col-lg-2">
                                        <img src="{{ route('home') }}/assets/ico/msds/excel.jpg"
                                            class=" img-thumbnail border-0" height="50" alt="" srcset="">
                                        <p class="fw-bold" style="color:darkblue" align="center">Ms Excel</p>
                                    </div>
                                    <div class="col-4 col-md-4 col-lg-2">
                                        <img src="{{ route('home') }}/assets/ico/msds/pp.jpg"
                                            class=" img-thumbnail border-0" height="50" alt="" srcset="">
                                        <p class="fw-bold" style="color:darkblue" align="center">Ms PowerPoint</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="scrollspy-example mb-5 container">
                            <div style="padding-top: 100px" id="scrollspyHeading6">
                                <h1 class="display-3 mb-4 d-none d-md-block"><b>Kontak</b>
                                    Saya<br>
                                </h1>
                                {{-- ============= mobile --}}
                                <h1 class="display-5 mb-4 d-block d-md-none"><b>Kontak</b>
                                    Saya<br>
                                </h1>
                                <hr class="w-25 border-3 mb-5 text-info">
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="nav">
                                        <i data-feather="mail"></i>
                                        <div class="px-1"></div>
                                        <p>rachmand777@gmail.com</p>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="nav">
                                        <i data-feather="phone"></i>
                                        <div class="px-1"></div>
                                        <p>+62821 1363 7521</p>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="nav">
                                        <i data-feather="linkedin"></i>
                                        <div class="px-1"></div>
                                        <p>Rechmand M</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="">
                        <div class="card text-center bg-dark rounded-0 py-2">
                            <h6 class="text-white"><b>Created By Rechmand M</h6>
                            <h6 class="text-white"><b>Copyright @ 2023</h6>
                        </div>
                    </div>
                    <script>
                        feather.replace()

                    </script>
                </div>
</body>

</html>

<script>
    // var lastScrollTop = 0;
    // $(window).scroll(function(event){
    //    var st = $(this).scrollTop();
    //    if (st > lastScrollTop){
    //        $('#navbar-example2').hide();
    //    } else {
    //    }
    //    lastScrollTop = st;
    // });
    // $("#home").click(function () {
    //     $("html, body").animate({
    //         scrollTop: $(document).height()
    //     }, "slow");
    // });

    // $("#contact").click(function () {
    //     $("html, body").animate({
    //         scrollTop: $(document).height()
    //     }, "slow");
    // });
    // $('#contact').slideUp('slow');
    // $('#contact').slideDown('slow');
    $(function () {
        $(window).scroll(function () {
            if ($(this).scrollTop() > 700) {
                $('#navbar-example2').removeClass('bg-transparent');
                // $('#navbar-example2').addClass('bg-white');
                $('#navbar-example2').addClass('bgkubawah');
                $('#navbar-example2').addClass('shadow');

                // logoku
                $('#logoku').removeClass('text-white');
                $('#logoku').addClass('text-info');


                // menu
                $('#hometext').removeClass('text-white');
                $('#hometext').addClass('text-dark');

                $('#abouttext').removeClass('text-white');
                $('#abouttext').addClass('text-dark');

                $('#serttext').removeClass('text-white');
                $('#serttext').addClass('text-dark');

                $('#skilltext').removeClass('text-white');
                $('#skilltext').addClass('text-dark');

                $('#projecttext').removeClass('text-white');
                $('#projecttext').addClass('text-dark');

                $('#contacttext').removeClass('text-white');
                $('#contacttext').addClass('text-dark');
            } else {
                $('#navbar-example2').removeClass('bg-white');
                $('#navbar-example2').addClass('bg-transparent');
                $('#navbar-example2').removeClass('shadow');

                // logoku
                $('#logoku').removeClass('text-info');
                $('#logoku').addClass('text-white');

                // menu
                $('#hometext').removeClass('text-dark');
                $('#hometext').addClass('text-white');

                $('#abouttext').removeClass('text-dark');
                $('#abouttext').addClass('text-white');

                $('#serttext').removeClass('text-dark');
                $('#serttext').addClass('text-white');

                $('#skilltext').removeClass('text-dark');
                $('#skilltext').addClass('text-white');

                $('#projecttext').removeClass('text-dark');
                $('#projecttext').addClass('text-white');

                $('#contacttext').removeClass('text-dark');
                $('#contacttext').addClass('text-white');
            }
        });


    });

    $(window).scroll(function () {
        if ($(this).scrollTop() < 20) {
            $('#hometext').removeClass('alert-link');
        }

        if ($(this).scrollTop() > 20) {
            $('#hometext').addClass('alert-link');
            $('#abouttext').removeClass('alert-link');
            $('#projecttext').removeClass('alert-link');
            $('#contacttext').removeClass('alert-link');
        }
        if ($(this).scrollTop() > 700) {
            $('#abouttext').addClass('alert-link');
            $('#hometext').removeClass('alert-link');
            $('#serttext').removeClass('alert-link');
        }
        if ($(this).scrollTop() > 1350) {
            $('#serttext').addClass('alert-link');
            $('#abouttext').removeClass('alert-link');
            $('#skilltext').removeClass('alert-link');
        }
        if ($(this).scrollTop() > 2200) {
            $('#skilltext').addClass('alert-link');
            $('#serttext').removeClass('alert-link');
        }
        if ($(this).scrollTop() > 3500) {
            $('#projecttext').addClass('alert-link');
            $('#skilltext').removeClass('alert-link');
        }

    });

    function closeMobile() {
        $('#offcanvasWithBothOptions').hide();
        setTimeout(() => {
            $('.btn-close').click();
            $('#offcanvasWithBothOptions').show();
        }, 1000);
    }

</script>