<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header text-center">
                        <h1 class="h4">Register</h1>
                    </div>
                    <div class="card-body">
                        
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        
                        <form method="POST" action="{{ url('/register') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name:</label>
                                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required autofocus>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password:</label>
                                <input type="password" id="password" name="password" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirm Password:</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender:</label>
                                <select id="gender" name="gender" class="form-select" required>
                                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                    <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="instagram_username" class="form-label">instagram Username:</label>
                                <input type="text" id="instagram_username" name="instagram_username" class="form-control" value="{{ old('instagram_username') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="hobby" class="form-label">Fields of Work:</label>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="hobby[]" value="Music" id="field-music">
                                    <label class="form-check-label" for="field-tech">Music</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="hobby[]" value="Painting" id="field-painting">
                                    <label class="form-check-label" for="field-health">Painting</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="hobby[]" value="Dance" id="field-dance">
                                    <label class="form-check-label" for="field-education">Dance</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="hobby[]" value="Sport" id="field-sport">
                                    <label class="form-check-label" for="field-finance">Sport</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="hobby[]" value="Code" id="field-code">
                                    <label class="form-check-label" for="field-art">Code</label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="mobile_number" class="form-label">Mobile Number:</label>
                                <input type="text" id="mobile_number" name="mobile_number" class="form-control" value="{{ old('mobile_number') }}" required>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <small>Already have an account? <a href="{{ url('/login') }}">Login</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
