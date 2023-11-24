<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= base_url("/"); ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= base_url("/about"); ?>">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url("/login"); ?>">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url("/login/signup"); ?>">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url("/pertemuan5"); ?>">Pertemuan5</a>
        </li>
      </ul>
    </div>
  </div>
</nav>