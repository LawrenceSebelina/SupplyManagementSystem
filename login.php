<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once('assets/components/head.php'); ?>
    <title>Login</title>
</head>
<body>
    <header class="header fixed-top" style="background-color: var(--dark-blue);">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark"> <!-- bg-body-tertiary  -->
                <div class="container-fluid px-0">
                    <!-- <a class="navbar-brand" href="#">Navbar</a> -->
                    <img src="assets/images/logo.png" width="80px" alt="logo">
                    <a href="index.html" class="navbar-brand">J.F RUBBER</a>
                    
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarIconMenu" aria-controls="navbarIconMenu" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        <!-- <i class="fa-solid fa-bars"></i> -->
                    </button>

                    <div class="collapse navbar-collapse" id="navbarIconMenu">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="index">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index#product-section">Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index#history-section">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index#contact-section">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <div class="login-form-wrapper">
        <main>
            <section class="form-section">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card">
                                <div class="card-header"><h2 class="headline-md">Login</h2></div>
                                <div class="card-body">
                                    <div class="alert alert-danger" id="alertMessage"></div>
                                    <form method="post" id="loginForm" class="needs-validation" novalidate>
                                        <div class="alert alert-danger alert-message"></div>
                                        <div class="form-floating">
                                            <input class="form-control" id="userEmail" name="userEmail" type="email" placeholder="name@example.com" required />
                                            <label class="label-blue" for="userEmail"><i class="fa-solid fa-envelope"></i>Email address</label>

                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                            <div class="invalid-feedback">
                                                Please select a valid state.
                                            </div>
                                        </div>
                                        <div class="form-floating">
                                            <input class="form-control" id="userPassword" name="userPassword" type="password" placeholder="Password" required />
                                            <label class="label-blue" for="userPassword"><i class="fa-solid fa-lock"></i>Password</label>

                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                            <div class="invalid-feedback">
                                                Please select a valid state.
                                            </div>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                            <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                        </div>
                                        <div class="btn-section">
                                            <a class="small" href="password.html">Forgot Password?</a>

                                            <button type="submit" class="btn btn-blue btn-block" id="btnLoginAccount" name="btnLoginAccount">Login</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="register.html">Need an account? Sign up!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    
        <?php include_once('assets/components/footer.php'); ?>

    </div>

    <!-- Back to top -->

    <a href="#" class="back-top-btn" aria-label="Back to top">
        <i class="fa fa-solid fa-arrow-up"></i>
    </a>

    <!-- Bootstrap JS -->
    <script src="assets/vendors/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>

    <!-- Load library from the CDN -->
    <script src="assets/vendors/typed/typed.js"></script>

    <script>
        $(document).ready(function() {
            const loginAccountForm = document.querySelector("#loginForm");
            const loginAccountBtn = document.querySelector("#btnLoginAccount");
            const alertMessage = document.querySelector("#alertMessage");

            loginAccountForm.onsubmit = (e)=> {
                e.preventDefault();
            }

            loginAccountBtn.onclick = ()=> {
                let xhr = new XMLHttpRequest();
                xhr.open("POST", "includes/phpFunction/login.php", true);
                xhr.onload = ()=> {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            let data = xhr.response;
                            if (data === "success") {
                                alertMessage.style.display = "block";
                                alertMessage.textContent = data;
                                // window.location = "index.html"

                                window.location.href = "admin/index.php";
                            } else {
                                alertMessage.style.display = "block";
                                alertMessage.textContent = data;
                            }
                        }
                    }
                }
                let formData = new FormData(loginAccountForm);
                xhr.send(formData);
            }
        });

        // Input fields validation
        const forms = document.querySelectorAll('.needs-validation');

        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }

                form.classList.add('was-validated');
            }, false);
        });

        // Preloader
        const preloader = document.querySelector(".preloader");

        window.addEventListener("load", function() {
            preloader.classList.add("loaded");
            document.body.classList.add("loaded");
        });
    </script>
</body>
</html>
