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

<body class="text-center">

    <main class="form-signin">
        <form action="" method="POST">
            <img class="mb-4" src="<?= $base ?>assets/brand/logo.png" alt="" height="100">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

            <div class="form-floating">
                <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" id="password" name="password" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit" id="login">Login</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>
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
                                username: $("#username").val(),
                                password: $("#password").val()
                            },
                            cache: false,
                            success: function(data, text) {
                                if (data.hasil == true) {
                                    alert(data.msg);
                                    setTimeout(function() {
                                        window.location = data.redirecto;
                                    }, 200);
                                } else {
                                    alert(data.msg);
                                    setTimeout(function() {
                                        window.location = data.redirecto;
                                    }, 200)
                                }
                            },
                            error: function(request, status, error) {
                                alert(request.responseText + " " + status + " " + error);
                            }
                        });
                        return false;
                    }
                )
            })
        </script>

    </main>



</body>

</html>