@vite(['resources/sass/app.scss','resources/js/app.js'])

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Add New Student</h1>
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Back to List</a>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('students.store') }}" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                   id="first_name" name="first_name" value="{{ old('first_name') }}" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                                   id="last_name" name="last_name" value="{{ old('last_name') }}" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                   id="email" name="email" value="{{ old('email') }}" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="tel" class="form-control @error('phone') is-invalid @enderror"
                                   id="phone" name="phone" value="{{ old('phone') }}" required>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control @error('address') is-invalid @enderror"
                                      id="address" name="address" rows="3" required>{{ old('address') }}</textarea>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="date_of_birth" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror"
                                   id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-select @error('gender') is-invalid @enderror"
                                    id="gender" name="gender" required>
                                <option value="">Select Gender</option>
                                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-success">Add Student</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
