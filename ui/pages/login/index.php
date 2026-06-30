<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>AuthFlow UI - Login 03</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="icon" type="image/png" href="../assets/images/favicon.png">

</head>

<body>

    <div class="aurora aurora-1"></div>
    <div class="aurora aurora-2"></div>

    <div class="mouse-glow"></div>

    <div class="container">

        <div class="left">

            <div class="logo">

                <span>⚡</span>

                AuthFlow

            </div>

            <h1>

                Secure Authentication
                For Modern Applications.

            </h1>

            <p>

                Build beautiful authentication experiences with a premium UI Kit designed for developers, startups and
                SaaS products.

            </p>
            <div class="features">

                <div class="feature">

                    <div class="icon">✓</div>

                    <span>Modern Design</span>

                </div>

                <div class="feature">

                    <div class="icon">✓</div>

                    <span>Responsive Layout</span>

                </div>

                <div class="feature">

                    <div class="icon">✓</div>

                    <span>Fast & Lightweight</span>

                </div>
                <div class="hero-image">

                    <div class="floating circle1"></div>
                    <div class="floating circle2"></div>
                    <div class="floating square"></div>

                    <div class="mockup">

                        <div class="mockup-header">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>

                        <div class="mockup-sidebar"></div>

                        <div class="mockup-content">

                            <div class="line w80"></div>
                            <div class="line w60"></div>

                            <div class="card-grid">
                                <div class="mini-card"></div>
                                <div class="mini-card"></div>
                            </div>

                            <div class="chart">
                                <div class="bar h1"></div>
                                <div class="bar h2"></div>
                                <div class="bar h3"></div>
                                <div class="bar h4"></div>
                                <div class="bar h5"></div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div> <!-- END LEFT -->
        <div class="right">

            <div class="card">

                <h2>Welcome Back 👋</h2>

                <p>Login to continue.</p>

                <form id="loginForm"   action="../../php/login.php" method="POST" >

                    <div class="input-box">

                        <input type="email" id="email" placeholder=" " autocomplete="email" name="email" required>

                        <label for="email">
                            Email Address
                        </label>
                        <small class="error" id="emailError"></small>

                    </div>

                    <div class="input-box">

                        <div class="password">

                            <input type="password" id="password" name="password" placeholder=" " autocomplete="current-password"
                                required>

                            <label for="password">
                                Password
                            </label>

                            <button type="button" id="togglePassword">

                                👁

                            </button>

                        </div>
                        <small class="error" id="passwordError"></small>
                        <div class="strength">

    <div id="strengthBar"></div>

</div>

<small id="strengthText"></small>

                    </div>

                    <div class="row">

                        <label>

                            <input type="checkbox">

                            Remember me

                        </label>

                        <a href="#">
                            Forgot Password?
                        </a>

                    </div>

                    <button type="submit" class="login-btn" id="loginBtn">

                        Sign In

                    </button>

                </form>
                <div class="divider">

                    <span>OR CONTINUE WITH</span>

                </div>

                <div class="social-login">

                    <button class="social google" type="button">

                        <svg width="20" height="20" viewBox="0 0 48 48">
                            <path fill="#FFC107"
                                d="M43.6 20.5H42V20H24v8h11.3C33.7 32.7 29.3 36 24 36c-6.6 0-12-5.4-12-12S17.4 12 24 12c3 0 5.7 1.1 7.8 3l5.7-5.7C34.1 6.1 29.3 4 24 4C13 4 4 13 4 24s9 20 20 20 20-9 20-20c0-1.3-.1-2.3-.4-3.5z" />
                            <path fill="#FF3D00"
                                d="M6.3 14.7l6.6 4.8C14.7 15.3 19 12 24 12c3 0 5.7 1.1 7.8 3l5.7-5.7C34.1 6.1 29.3 4 24 4 16.3 4 9.6 8.3 6.3 14.7z" />
                            <path fill="#4CAF50"
                                d="M24 44c5.2 0 10-2 13.4-5.2l-6.2-5.2c-2 1.5-4.5 2.4-7.2 2.4-5.2 0-9.7-3.3-11.3-8l-6.5 5C9.5 39.5 16.2 44 24 44z" />
                            <path fill="#1976D2"
                                d="M43.6 20.5H42V20H24v8h11.3c-1.1 3.1-3.3 5.5-6.1 7l6.2 5.2C39.2 36.6 44 31 44 24c0-1.3-.1-2.3-.4-3.5z" />
                        </svg>

                        Google

                    </button>

                    <button class="social github" type="button">

                        <svg width="20" height="20" viewBox="0 0 24 24" fill="white">
                            <path
                                d="M12 .5C5.6.5.5 5.7.5 12.1c0 5.1 3.3 9.4 7.9 10.9.6.1.8-.3.8-.6v-2.2c-3.2.7-3.9-1.5-3.9-1.5-.5-1.4-1.3-1.8-1.3-1.8-1.1-.8.1-.8.1-.8 1.2.1 1.9 1.3 1.9 1.3 1.1 1.8 2.8 1.3 3.5 1 .1-.8.4-1.3.7-1.6-2.6-.3-5.3-1.3-5.3-5.8 0-1.3.5-2.4 1.3-3.3-.1-.3-.6-1.5.1-3.2 0 0 1.1-.4 3.5 1.3 1-.3 2-.4 3.1-.4s2.1.1 3.1.4c2.4-1.7 3.5-1.3 3.5-1.3.7 1.7.2 2.9.1 3.2.8.9 1.3 2 1.3 3.3 0 4.5-2.7 5.5-5.3 5.8.4.3.8 1 .8 2v3c0 .3.2.7.8.6 4.6-1.5 7.9-5.8 7.9-10.9C23.5 5.7 18.4.5 12 .5z" />
                        </svg>

                        GitHub

                    </button>

                </div>

                <div class="signup" >

                    Don't have an account?

                    <a href="../register/index.php">Create account</a>

                </div>

            </div> <!-- END CARD -->

        </div> <!-- END RIGHT -->

    </div> <!-- END CONTAINER -->

    <div id="toast" class="toast">

    Login Successful ✅

</div>
    <script src="../../assets/js/main.js"></script>

</body>

</html>