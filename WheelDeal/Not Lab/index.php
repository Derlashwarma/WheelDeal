<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/style/login.css">
    <link rel="stylesheet" href="/style/register.css">
    <title>WheelDeal Login</title>
</head>
<body>
    <div class="main-container container">
        <div class="login-container">
            <div class="input shadow-lg p-3 mb-5 bg-body rounded">    
                <form action="login.php" method="post">
                    <div class="mt-2">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
                            <label for="username" class="form-label">Username</label>
                        </div >
                        <div class="password-container form-floating">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                                <button class="mt-2 m-2 btn" id="show_pass">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                    </svg>                          
                                </button>
                                <label for="password" class="form-label">Password</label>
                            </div>
                    </div>
                    <div class="buttons d-grid pb-1 mb-2">
                        <button id="login" type="submit" class="btn btn-dark">Log in</button>
                        <a href="#">Forgot password?</a>
                    </div>
                    <div class="register-btn d-grid gap-2">
                        <button id="register" type="button" class="btn btn-lg mt-3 mb-2">Register</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="register-container shadow p-3 rounded" id="register_page">
            <div class="registration-form">
                <form action="register.php" method="POST">
                    <div class="register-input-container input shadow p-3 mb-5 bg-body rounded">
                        <div class="mb-3 d-grid gap-2">
                            <div class="close-btn-container"><button id="close_regis" class="btn-close"></button></div>
                            <div class="form-floating">
                                <input type="text" class="form-control" name="regis_firstname" id="regis_first_name" placeholder="First name" required>
                                <label for="regis_first_name" class="form-label">First name</label>
                            </div>
                            <div class="form-floating">
                                <input type="text" class="form-control" name="regis_lastname" id="regis_last_name" placeholder="Last name" required>
                                <label for="regis_last_name" class="form-label">Last name</label>
                            </div>
                            <div class="form-floating">
                                <input type="email" class="form-control" name="regis_email" id="regis_email" placeholder="Email" required>
                                <label for="regis_email" class="form-label">Email</label>
                            </div>
                            <div class="form-floating">
                                <input type="text" class="form-control" name="regis_username" id="regis_user_name" placeholder="Username" required>
                                <label for="regis_user_name" class="form-label">Username</label>
                            </div>
                            <div class="password-container form-floating">
                                <input type="password" class="form-control" name="regis_pass" id="regis_pass" placeholder="New password" required>
                                <button class="mt-2 btn" id="show_regis_pass">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                    </svg>                          
                                </button>
                                <label for="regis_pass" class="form-label">New password</label>
                            </div>
                            <div class="register-btn d-grid gap-2 mb-2">
                                <button id="submit_registration" class="sbm btn btn-lg" type="submit">Register</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="/javascript//script.js"></script>
</body>
</html>