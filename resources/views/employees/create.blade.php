<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Office Management</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="{{ route('companies.index') }}">Companies</a></li>
        <li class="nav-item"><a class="nav-link active" href="{{ route('employees.index') }}">Employees</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-5">
    <div class="card shadow rounded">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Add New Employee</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('employees.store') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Full Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Phone</label>
                        <input type="text" name="phone" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Position</label>
                        <input type="text" name="position" class="form-control">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Country</label>
                        <select id="country" class="form-select" name="country" required>
                            <option value="">Select Country</option>
                        </select>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">State</label>
                        <select id="state" class="form-select" name="state" required>
                            <option value="">Select State</option>
                        </select>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">City</label>
                        <select id="city" class="form-select" name="city" required>
                            <option value="">Select City</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Company</label>
                        <select name="company_id" class="form-select" required>
                            <option value="">Select Company</option>
                            @foreach ($companies as $company)
                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                            @endforeach
                        </select>
                    </div>

                   <div class="col-md-6 mb-3">
                        <label class="form-label">Manager</label>
                        <select name="manager_id" class="form-select">
                            <option value="">None</option>
                            @foreach ($managers as $manager)
                                <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('employees.index') }}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    loadCountries();

    document.getElementById('country').addEventListener('change', function () {
        const country = this.value;
        loadStates(country);
    });

    document.getElementById('state').addEventListener('change', function () {
        const country = document.getElementById('country').value;
        const state = this.value;
        loadCities(country, state);
    });

    function loadCountries() {
        fetch('https://countriesnow.space/api/v0.1/countries')
            .then(res => res.json())
            .then(data => {
                const countryDropdown = document.getElementById('country');
                data.data.forEach(item => {
                    const option = document.createElement('option');
                    option.value = item.country;
                    option.textContent = item.country;
                    countryDropdown.appendChild(option);
                });
            });
    }

    function loadStates(country) {
        const stateDropdown = document.getElementById('state');
        const cityDropdown = document.getElementById('city');
        stateDropdown.innerHTML = '<option value="">Select State</option>';
        cityDropdown.innerHTML = '<option value="">Select City</option>';

        fetch('https://countriesnow.space/api/v0.1/countries/states', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ country: country })
        })
        .then(res => res.json())
        .then(data => {
            data.data.states.forEach(state => {
                const option = document.createElement('option');
                option.value = state.name;
                option.textContent = state.name;
                stateDropdown.appendChild(option);
            });
        });
    }

    function loadCities(country, state) {
        const cityDropdown = document.getElementById('city');
        cityDropdown.innerHTML = '<option value="">Select City</option>';

        fetch('https://countriesnow.space/api/v0.1/countries/state/cities', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ country: country, state: state })
        })
        .then(res => res.json())
        .then(data => {
            data.data.forEach(city => {
                const option = document.createElement('option');
                option.value = city;
                option.textContent = city;
                cityDropdown.appendChild(option);
            });
        });
    }
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
