<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Company Management</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    main {
      flex: 1;
    }





  </style>
</head>

<body>

  <!-- 🔵 Header Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand fw-bold" href="#">Office Manager(ACE360)</a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
        <ul class="navbar-nav gap-2">
          <li class="nav-item">
            <a class="btn btn-outline-light" href="{{ route('companies.index') }}"> Company</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-outline-light" href="{{ route('employees.index') }}">Employees</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <main class="container py-5 text-center">
  <h2 class="fw-bold mb-3">Welcome to Company Management</h2>
  <p class="text-muted mb-4">Manage your companies and employees efficiently.</p>

  <img  alt="" class="full-width-img">
</main>

  <!-- 🔴 Footer -->
  <footer class="bg-dark text-white text-center py-3">
    <div>&copy; {{ date('Y') }} Office Management System</div>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
