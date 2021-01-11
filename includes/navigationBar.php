<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container col-9">
        <a class="navbar-brand" href="/">Shop App</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <?php if(!isset($_SESSION['user'])): ?>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/cart.php">Cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/register.php">Sign Up <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
        <?php else: ?>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/cart.php">Cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/favorites.php">Favorites</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/profile.php">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/logout.php">Logout</a>
                </li>
            </ul>
        </div>
        <?php endif; ?>
    </div>
</nav>