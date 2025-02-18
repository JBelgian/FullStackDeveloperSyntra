<?php
include 'assets/common.php';
include 'assets/header.php';

// If user is already logged in, redirect to dashboard
if (isset($_SESSION['token'])) {
    header("Location: dashboard.php");
    exit();
}
?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <?php if(isset($_GET['success']) && $_GET['success'] == 1): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Operation successful! Thank you.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            
            <?php if(isset($_GET['error'])): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php 
                    echo match($_GET['error']) {
                        'invalid_password' => 'Invalid password, please try again.',
                        'email_not_found' => 'Email not found, please register first.',
                        default => 'An error occurred, please try again.'
                    };
                    ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <h1 class="text-center mb-4">Welcome</h1>
            <p class="text-center mb-4">Welcome to our application</p>

            <div class="login-section card p-4 shadow-sm">
                <h2 class="text-center mb-4">Login</h2>
                <form action="login.php" method="post">
                    <div class="mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
                <p class="text-center mt-3">Need an account? <a href="#" onclick="toggleRegister(event)">Register here</a></p>
            </div>

            <div class="register-section card p-4 shadow-sm" style="display: none;">
                <h2 class="text-center mb-4">Register</h2>
                <form action="register.php" method="post">
                    <div class="mb-3">
                        <input type="text" name="name" class="form-control" placeholder="Name">
                    </div>
                    <div class="mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Register</button>
                </form>
                <p class="text-center mt-3">Already have an account? <a href="#" onclick="toggleRegister(event)">Login here</a></p>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleRegister(event) {
        event.preventDefault();
        const loginSection = document.querySelector('.login-section');
        const registerSection = document.querySelector('.register-section');
        
        if (loginSection.style.display !== 'none') {
            loginSection.style.display = 'none';
            registerSection.style.display = 'block';
        } else {
            loginSection.style.display = 'block';
            registerSection.style.display = 'none';
        }
    }
</script>
<?php include 'assets/footer.php'; ?>