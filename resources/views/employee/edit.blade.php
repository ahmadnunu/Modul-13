<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $pageTitle }}</title>
    @vite('resources/sass/app.scss')
</head>

<body>
    <header class="navbar navbar-expand-md navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="bi-hexagon-fill me-2"></i> Data Master
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('employees.index') }}">Employee List</a>
                    </li>
                </ul>
                <a class="btn btn-outline-light" href="{{ route('profile') }}">
                    <i class="bi-person-circle me-1"></i> My Profile
                </a>
            </div>
        </div>
    </header>

    <main class="container mt-4">
        <h4 class="mb-3">{{ $pageTitle }}</h4>
        <form action="{{ route('employees.update', ['employee' => $employee->employee_id]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="firstName">First Name</label>
                <input type="text" id="firstName" name="firstName" class="form-control" value="{{ old('firstName', $employee->firstname) }}">
                @error('firstName')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="lastName">Last Name</label>
                <input type="text" id="lastName" name="lastName" class="form-control" value="{{ old('lastName', $employee->lastname) }}">
                @error('lastName')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $employee->email) }}">
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="age">Age</label>
                <input type="number" id="age" name="age" class="form-control" value="{{ old('age', $employee->age) }}">
                @error('age')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="position">Position</label>
                <select id="position" name="position" class="form-control">
                    @foreach ($positions as $position)
                        <option value="{{ $position->id }}" {{ $position->id == $employee->position_id ? 'selected' : '' }}>
                            {{ $position->name }}
                        </option>
                    @endforeach
                </select>
                @error('position')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <a href="{{ route('employees.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </main>

    @vite('resources/js/app.js')
</body>

</html>
