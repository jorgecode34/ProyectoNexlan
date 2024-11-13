<?php
session_start();
?>
<!DOCTYPE html>
<html data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Page</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body style="background-color: #ebebeb;">
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

            <div class="py-5 py-md-4 py-lg-5">
                <div class="container">
                    <div class="row justify-content-md-center">
                        <div class="col-12 col-md-11 col-lg-8 col-xl-6 col-xxl-6">

                            <div class="bg-body-tertiary p-4 p-md-3 rounded shadow">

                                <div class="row">
                                    <div class="col-12">
                                        <div class="text-center mb-3">

                                            <a href="index.html">
                                                <img src="img/union.png" alt="logo" class="img-fluid" href="index.html"
                                                    style="max-width: 120px;">
                                            </a>

                                        </div>
                                    </div>
                                </div>

                                <?php
                                if (isset($_SESSION['status']) && $_SESSION['status'] == 'error') {
                                    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                            <strong>¡Oh no!</strong> {$_SESSION['error_message']}
                                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                        </div>";
                                    unset($_SESSION['status']);
                                    unset($_SESSION['error_message']);
                                }
                                ?>

                                <form action="login.php" class="row g-3 needs-validation" method="post" novalidate>

                                    <div class="col-12">

                                        <label for="email" class="form-label">Email <span class="text-danger">*</span>
                                        </label>

                                        <div class="input-group has-validation">

                                            <span class="input-group-text" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Introduce el correo electrónico que usaste al registrarte.">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                                                </svg>
                                            </span>

                                            <input type="email" class="form-control" name="email" id="email"
                                                value="<?php echo isset($_COOKIE['email']) ? htmlspecialchars($_COOKIE['email']) : ''; ?>" required>



                                            <div class="invalid-feedback">
                                                Por favor, introduce un correo electrónico válido.
                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-12">
                                        <label for="password" class="form-label">Contraseña <span class="text-danger">*</span></label>
                                        <div class="input-group has-validation">
                                            <span class="input-group-text" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Introduce la contraseña que usaste al registrarte.">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key" viewBox="0 0 16 16">
                                                    <path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z" />
                                                    <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                                </svg>
                                            </span>

                                            <input type="password" class="form-control" id="inputPassword" name="password" id="password"
                                                value="<?php echo isset($_COOKIE['password']) ? htmlspecialchars($_COOKIE['password']) : ''; ?>" required>
                                            <span class="input-group-text" id="togglePassword" style="cursor: pointer; user-select: none;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash" viewBox="0 0 16 16">
                                                    <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7 7 0 0 0-2.79.588l.77.771A6 6 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755q-.247.248-.517.486z" />
                                                    <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829" />
                                                    <path d="M3.35 5.47q-.27.24-.518.487A13 13 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7 7 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12z" />
                                                </svg>
                                            </span>

                                            <div class="invalid-feedback">
                                                Por favor, introduce tu contraseña.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="mb-3 form-check">
                                            <label class="form-check-label" for="exampleCheck1">Recuérdame</label>
                                            <input type="checkbox" id="remember" name="remember" class="form-check-input" id="exampleCheck1" <?php echo isset($_COOKIE['email']) ? 'checked' : ''; ?>>
                                        </div>
                                    </div>

                                    <div class="d-flex mx-auto text-center align-items-center justify-content-center">
                                        <div class="g-recaptcha" data-sitekey="6LeBn3sqAAAAANqHD1X-QIqxu1ZEeSuetE1Jcx-1"></div>
                                    </div>

                                    <div class="d-grid gap-2 col-6 mx-auto">
                                        <button class="btn btn-primary" type="submit">Iniciar sesión</button>
                                    </div>
                                </form>

                                <div class="row">
                                    <div class="col-12 text-center">
                                        <hr class="mt-4 mb-4 border-secondary-subtle">
                                        <div
                                            class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-center">
                                            <a href="https://wa.me/59891602159" target='_blank' class="link-secondary text-decoration-none">¿Olvidaste tu contraseña?</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>

    
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <script src="js/script.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>