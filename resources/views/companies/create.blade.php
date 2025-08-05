<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Add Company</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap 5 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-8">

        <div class="card shadow rounded">
          <div class="card-header bg-success text-white">
            <h4 class="mb-0">Add New Company</h4>
          </div>

          <div class="card-body">
            <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
              @csrf

              <div class="mb-3">
                <label for="name" class="form-label">Company Name <span class="text-danger">*</span></label>
                <input type="text" name="name" id="name" class="form-control" required>
              </div>

              <div class="mb-3">
                <label for="location" class="form-label">Company Location</label>
                <input type="text" name="location" id="location" class="form-control">
              </div>

              <div class="mb-3">
                <label for="email" class="form-label">Company Email</label>
                <input type="email" name="email" id="email" class="form-control">
              </div>


              <div class="mb-3">
                <label for="phone" class="form-label">Company phone</label>
                <input type="phone" name="phone" id="website" class="form-control">
              </div>
              <div class="mb-3">
                <label for="website" class="form-label">Company Website</label>
                <input type="url" name="website" id="website" class="form-control">
              </div>



              <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-success">Submit</button>
                <a href="{{ route('companies.index') }}" class="btn btn-secondary">Back</a>
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- Optional Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>