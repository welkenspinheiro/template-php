<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WBPSoft Template</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="./assets/css/global.css">

    <script src="https://unpkg.com/feather-icons"></script>
</head>

<body>
    <main class="container">
        <section class="container-left">
            <article class="logo-img">
                <img src="./assets/image/logo_login.png" alt="">
            </article>
            <article class="logo-text">
                <h3>Seja bem vindo ao</h3>
                <h1>WBPSoft</h1>
            </article>
        </section>
        <section class="container-right">
            <h1>Faca seu login</h1>
            <form action="/login" method="post" class="form-login">
                <div>
                    <label for="">Usuario</label>
                    <input type="text" name="username" class="input input-dark" placeholder="Usuario">
                </div>
                <div class="passwordContainer">
                    <label for="">Senha</label>
                    <input type="password" name="password" class="input input-dark" placeholder="Senha">
                    <i data-feather="eye-off" class="icoFeather"></i>
                </div>
                <button class="btn btn-login">Entrar</button>
            </form>
        </section>
    </main>

    <!-- <script src="./assets/js/scriptlogin.js"></script> -->
</body>

</html>