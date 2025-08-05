


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>All Companies</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container py-5">
  <h2>Company List</h2>

  {{-- Success Message --}}
  @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  {{-- Add Button --}}
  <div class="d-flex justify-content-end mb-3">
    <a href="{{ route('companies.create') }}" class="btn btn-primary">Add New Company</a>
  </div>

  {{-- Table --}}
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Location</th>
        <th>Website</th>
        <th>Phone</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($companies as $company)
        <tr>
          <td>{{ $company->name }}</td>
          <td>{{ $company->email }}</td>
          <td>{{ $company->location }}</td>
          <td>{{ $company->website }}</td>
          <td>{{ $company->phone }}</td>
          <td class="d-flex gap-2">
            <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-sm btn-warning">Edit</a>

            <form action="{{ route('companies.destroy', $company->id) }}" method="POST" onsubmit="return confirm('Are you sure to delete?')">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="6" class="text-center">No companies found.</td>
        </tr>
      @endforelse
    </tbody>
  </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
