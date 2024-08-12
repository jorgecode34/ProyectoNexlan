<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Page</title>
    <meta name="description" content="">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <!-- <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap');

        body {
            font-family: "Outfit", sans-serif !important;
            background-color: #e6e6e6;
            height: 100vh;
            margin: 0;
            display: block;
            padding-top: 0;
        }

        section {
            font-family: "Outfit", sans-serif !important;
            display: flex;
            align-items: center;
            height: 75vh;
            justify-content: center;
        }

        .login-container {
            max-width: 463px;
            width: 100%;
            height: auto;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            text-align: center;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .login-container img {
            max-width: 116px;
            margin-bottom: 90px;
            display: block;
            margin: 0 auto;
        }

        .login-container h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .login-container input[type="email"],
        .login-container input[type="password"] {
            width: 100%;
            height: 30px;
            padding: 10px;
            margin: 5px 0 10px 0;
            border: 3px solid #000;
            border-radius: 5px;
            text-align: left;
        }

        .login-container h2 {
            font-size: 16px;
            font-family: "Outfit", sans-serif !important;
            text-align: left !important;
            margin-left: 20px;
            margin-bottom: 5px;
            margin-top: 20px;
        }

        .login-container h1 {
            font-size: 16px;
            font-family: "Outfit", sans-serif;
            text-align: left !important;
            margin-left: 20px;
            color: #283AA4;
            position: relative;
        }

        .login-container h1::after {
            content: "";
            display: block;
            width: 100px;
            height: 2px;
            background-color: #283AA4;
            position: absolute;
            bottom: -5px;
            left: 0;
        }

        .divider {
            width: 100%;
            height: 1px;
            background-color: #C3C3C3;
            border: none;
            margin: 10px 0;
        }

        .header-web {
            background-color: #01082F;
            color: #fff;
            height: 45px;
        }

        .navbar-color {
            background-color: #01082F;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
        }

        .nav-link {
            color: #fff !important;
        }

        .navbar .bi {
            fill: #fff !important;
        }





        
        .form-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .remember-me {
            display: flex;
            margin-left: 20px;
        }

        .remember-me label {
            margin-left: 5px;
        }

        .login-container button {
            width: 100%;
            max-width: 255px;
            height: 32px;
            background-color: #253FD4;
            border: none;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 40px;
            font-family: "Outfit", sans-serif;
            font-size: 16px;
            font-weight: 600;
        }

        .login-container button:hover {
            background-color: #01082F;
        }

        .forgot-password {
            text-align: center;
            margin-top: 20px;
        }

        .forgot-password a {
            font-size: 16px;
            font-family: "Outfit", sans-serif;
            font-weight: light;
            text-decoration: none;
            color: #253FD4;
        }

        .forgot-password a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .login-container {
                max-width: 90%;
                height: auto;
                padding: 15px;
            }

            .login-container h1 {
                font-size: 14px;
                margin-left: 10px;
            }

            .login-container h2 {
                font-size: 14px;
                margin-left: 10px;
                margin-top: 10px;
            }

            .login-container input[type="email"],
            .login-container input[type="password"] {
                width: 100%;
                height: 30px;
                padding: 8px;
                font-size: 14px;
            }

            .login-container button {
                width: 100%;
                max-width: 100%;
                font-size: 14px;
                height: 35px;
            }

            .remember-me {
                margin-left: 10px;
            }
        }

        @media (max-width: 576px) {
            .login-container {
                max-width: 90%;
                height: auto;
                padding: 10px;
            }

            .login-container h1 {
                font-size: 12px;
                margin-left: 5px;
            }

            .login-container h2 {
                font-size: 12px;
                margin-left: 5px;
                margin-top: 5px;
            }

            .login-container input[type="email"],
            .login-container input[type="password"] {
                width: 100%;
                height: 28px;
                padding: 6px;
                font-size: 12px;
            }

            .login-container button {
                width: 100%;
                max-width: 100%;
                font-size: 12px;
                height: 30px;
            }

            .remember-me {
                margin-left: 5px;
            }
        }
    </style> -->
</head>

<body>
    <!-- Header -->

    <nav class="navbar header-web">

        <div class="container-fluid">

            <div class="d-flex ms-auto align-items-center ">

                <!-- Icono de Teléfono & Número -->
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-telephone" viewBox="0 0 16 16">
                    <path
                        d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
                </svg>
                <a class="nav-link ms-2 font-weight-header" href="#">2854 5212</a>

                <!-- Icono de Correo y Correo -->
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-envelope ms-3" viewBox="0 0 16 16">
                    <path
                        d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z" />
                </svg>
                <a class="nav-link ms-2 font-weight-header" href="#">nexlan.oficial@gmail.com</a>

                <!-- Icono Instagram -->
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-instagram ms-3" viewBox="0 0 16 16">
                    <path
                        d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334" />
                </svg>

            </div>
        </div>
    </nav>

    <section>
        <div class="login-container">


            <!-- <img src="img/union.png" alt="logo">
            <h1>Iniciar sesión</h1> -->

            <div class="py-3 py-md-4">
                <div class="container">
                    <div class="row justify-content-md-center">
                        <div class="col-12 col-md-11 col-lg-8 col-xl-6 col-xxl-6">

                            <div class="bg-white p-4 p-md-3 rounded shadow">

                                <div class="row">
                                    <div class="col-12">
                                        <div class="text-center mb-3">

                                            <a href="#!">
                                                <img src="img/union.png" alt="logo" class="img-fluid"
                                                    style="max-width: 120px;">
                                            </a>

                                        </div>
                                    </div>
                                </div>

                                <form action="login.php" method="post">
                                <div class="row gy-3 gy-md-4 overflow-hidden">

                                    <div class="col-12">
                                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                                                </svg>
                                            </span>
                                            <input type="email" class="form-control" name="email" id="email"
                                                value="<?php echo isset($_COOKIE['email']) ? htmlspecialchars($_COOKIE['email']) : ''; ?>" required>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="password" class="form-label">Contraseña <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key" viewBox="0 0 16 16">
                                                    <path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z" />
                                                    <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                                </svg>
                                            </span>
                                            <input type="password" class="form-control" name="password" id="password"
                                                value="<?php echo isset($_COOKIE['password']) ? htmlspecialchars($_COOKIE['password']) : ''; ?>" required>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="mb-3 form-check">
                                            <label for="remember">Recuérdame:</label>
                                            <input type="checkbox" id="remember" name="remember" <?php echo isset($_COOKIE['email']) ? 'checked' : ''; ?>>
                                        </div>
                                    </div>

                                    <div class="d-grid gap-2 col-6 mx-auto">
                                        <button class="btn btn-primary" type="submit">Iniciar sesión</button>
                                    </div>

                                </div>
                            </form>

                                <div class="row">
                                    <div class="col-12 text-center">
                                        <hr class="mt-4 mb-4 border-secondary-subtle">
                                        <div
                                            class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-center">
                                            <a href="#!" class="link-secondary text-decoration-none">¿Olvidaste tu contraseña?</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


          


            <!-- 
            <form action="login.php" method="post">
            <div>
                <h2>Usuario</h2>
                <input type="email" name="email">
            </div>

            <div>
                <h2>Contraseña</h2>
                <input type="password" name="password">
            </div>

            <div class="form-footer">
                <div class="remember-me">
                    <input type="checkbox" id="rememberMe">
                    <label for="rememberMe">Recordarme</label>
                </div>
            </div>

            <button type="submit">Iniciar sesión</button>

            <div class="forgot-password">
                <a href="#">¿olvidaste tu contraseña? </a>
                <br>   
                <a href="inicio.php">Admin</a>
            </div>
            
            </form>
             -->


             
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz4fnFO9gybBogGzOgPHnKtiVyPrO9GfX3zP0I1VLjF6txg2Q0XHjAK/lE" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-ho+pP0+4Njg08PH9YTpgaze1IFfyd3yC7EwpQF6PfSMNhB4bAlurPmqX8G7PaCmJ" crossorigin="anonymous">
    </script>
</body>

</html>