<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title><?= $title ?></title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">



    <!-- Bootstrap core CSS -->
    <link href="<?= $base ?>assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="<?= $base ?>assets/css/signin.css" rel="stylesheet">
</head>

<body class="text-center" style="background-image:url('https://pix10.agoda.net/hotelImages/22216845/-1/120fb147308b06f160d119d0dbf636d8.jpg') ;background-repeat:no-repeat ;background-size:cover ;background-position-y:bottom ;">

    <!-- <main class="form-signin bg-light rounded-end rounded-start"> -->
    <main class=" p-3 offset-8 col-3 bg-light rounded-end rounded-start">

        <form action="" method="POST">
            <img class="mb-4" src="<?= $base ?>assets/brand/logo.png" alt="" height="90">
            <!-- ============== form login =============-->
            <div id="formlogin">
                <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
                <div class="card p-3">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                        <label for="floatingInput">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="password" name="password" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary mb-3" type="submit" id="login">Login</button>
                    <button class="w-100 btn btn-lg btn-success mb-3" type="button" id="register">Register</button>
                    <p class="mb-3 text-muted">Rechmand M &copy; 2022-2024</p>

                    <?php

                    // $cekmust = $this->session->userdata('must_login');
                    // if ($cekmust) {
                    //     $this->session->sess_destroy();
                    //     $hidden = 'n';
                    // }
                    ?>
                    <div id="info" class="alert alert-danger d-none<?= isset($hidden) ? $hidden : null ?>" role="alert">
                        <?= isset($cekmust) ? $cekmust : null ?>
                    </div>

                </div>
            </div>

            <!-- ============== form Register =============-->
            <div id="formregister" class="d-none">
                <h1 class="h3 mb-3 fw-normal">Please Register</h1>
                <div class="card p-3">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="user" name="user" placeholder="Username">
                        <label for="floatingInput">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="pass" name="pass" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Password">
                        <label for="floatingPassword">Nama</label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary mb-3" type="submit" id="registerpost">Register</button>
                    <button class="w-100 btn btn-lg btn-danger mb-3" type="button" id="cancel">Cancel</button>
                    <p class="mb-3 text-muted">Rechmand M &copy; 2022-2024</p>

                    <?php

                    // $cekmust = $this->session->userdata('must_login');
                    // if ($cekmust) {
                    //     $this->session->sess_destroy();
                    //     $hidden = 'n';
                    // }
                    ?>
                    <div id="info" class="alert alert-danger d-none<?= isset($hidden) ? $hidden : null ?>" role="alert">
                        <?= isset($cekmust) ? $cekmust : null ?>
                    </div>

                </div>
            </div>

        </form>

        <script src="<?= $base ?>assets/js/jquery/jquery.min.js"></script>
        <script type="text/javascript">
            url_post;
            var url_post = '<?= $base ?>index.php/login/validationlogin';
            // var url_post = '<?= $base ?>login/validationlogin';
            // setting url post, variable di dapat dari controller
            $(document).ready(function() {
                $('#login').click(
                    function() {
                        $.ajax({
                            type: "POST",
                            url: url_post,
                            dataType: "json",
                            data: {
                                user: $("#username").val(), // ambil dari id input
                                pass: $("#password").val() // ambil dari id input
                            },
                            cache: false,
                            success: function(dat, text) {
                                if (dat.hasil == true) {
                                    // alert(data.msg);
                                    $("#info").removeClass('alert-danger');
                                    $("#info").removeClass('d-none');
                                    $("#info").addClass('alert-success');
                                    $("#info").html(dat.msg);
                                    setTimeout(function() {
                                        window.location = dat.redirecto;
                                    }, 1500);
                                } else {
                                    // alert(data.msg);
                                    $("#info").removeClass('d-none');
                                    $("#info").html(dat.msg);
                                    $("#username").val('');
                                    $("#password").val('');
                                    // setTimeout(function() {
                                    //     window.location = data.redirecto;
                                    // }, 1000)
                                }
                            },
                            error: function(request, status, error) {
                                alert(request.responseText + " " + status + " " + error);
                            }
                        });
                        return false;
                    }
                );

                ////////////// REGISTER /////////////
                // $('#register').click(
                //     function() {
                //         $.ajax({
                //             type: "POST",
                //             url: url_post,
                //             dataType: "json",
                //             data: {
                //                 user: $("#username").val(), // ambil dari id input
                //                 pass: $("#password").val() // ambil dari id input
                //             },
                //             cache: false,
                //             success: function(dat, text) {
                //                 if (dat.hasil == true) {
                //                     // alert(data.msg);
                //                     $("#info").removeClass('alert-danger');
                //                     $("#info").removeClass('d-none');
                //                     $("#info").addClass('alert-success');
                //                     $("#info").html(dat.msg);
                //                     setTimeout(function() {
                //                         window.location = dat.redirecto;
                //                     }, 1500);
                //                 } else {
                //                     // alert(data.msg);
                //                     $("#info").removeClass('d-none');
                //                     $("#info").html(dat.msg);
                //                     $("#username").val('');
                //                     $("#password").val('');
                //                     // setTimeout(function() {
                //                     //     window.location = data.redirecto;
                //                     // }, 1000)
                //                 }
                //             },
                //             error: function(request, status, error) {
                //                 alert(request.responseText + " " + status + " " + error);
                //             }
                //         });
                //         return false;
                //     }
                // );

            })
        </script>


        <!-- Testing -->
        <script type="text/javascript">
            var url_postregister = '<?= $base ?>index.php/login/register';
            $(document).ready(function() {
                $('#register').click(function() {
                    $("#formregister").removeClass("d-none");
                    $("#formlogin").addClass("d-none");
                })

                $('#cancel').click(function() {
                    $("#formlogin").removeClass("d-none");
                    $("#formregister").addClass("d-none");
                })

                $('#registerpost').click(
                    function() {
                        $.ajax({
                                type: "POST",
                                url: url_postregister,
                                dataType: "json",
                                data: {
                                    user: $('#user').val(),
                                    pass: $('#pass').val(),
                                    nama: $('#nama').val(),
                                },
                                cache: false,
                                success: function(data, text) {
                                    if (data.hasil == true) {
                                        // alert(data.msg);
                                        // $("#info").removeClass('alert-danger');
                                        // $("#info").removeClass('d-none');
                                        // $("#info").addClass('alert-success');
                                        // $("#info").html(dat.msg);
                                        setTimeout(function() {
                                            window.location = data.redirecto;
                                        }, 1500);
                                    } else {
                                        alert(data.msg);
                                        // $("#info").removeClass('d-none');
                                        // $("#info").html(dat.msg);
                                        // $("#username").val('');
                                        // $("#password").val('');
                                        setTimeout(function() {
                                            window.location = data.redirecto;
                                        }, 1000)
                                    }
                                },
                                error: function(request, status, error) {
                                    alert(request.responseText + " " + status + " " + error);
                                }
                            }

                        );
                        return false;

                    })

            })
        </script>

    </main>



</body>

</html>