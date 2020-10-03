<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="{{ asset('css_auth/style.css') }}">
    <!------ Include the above in your HEAD tag ---------->
</head>

<body>
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Login Form -->
            <form>
                <input type="text" id="login" class="fadeIn second" name="login" placeholder="Nama Lengkap">
                <input type="text" id="login" class="fadeIn second" name="login" placeholder="Username">
                <input type="text" id="login" class="fadeIn second" name="login" placeholder="Email">
                <input type="text" id="login" class="fadeIn second" name="login" placeholder="No HP">
                <textarea name="alamat" id="alamat" class="fadeIn second" cols="10" rows="5"></textarea>
                <input type="text" id="password" class="fadeIn third" name="login" placeholder="password">

                <input type="submit" class="fadeIn fourth" value="Register">
            </form>

        </div>
    </div>

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>
