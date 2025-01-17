@vite(['resources/sass/app.scss','resources/js/app.js'])
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Students</h2>
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Back to List</a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Student_ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Course</th>
                            <th>Section</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($students as $student)
                            <tr>
                                <td>{{ $student->id }}</td>
                                <td>{{ $student->student_id }}</td>
                                <td>{{ $student->first_name}}</td>
                                <td>{{ $student->last_name}}</td>
                                <td>{{ $student->Course }}</td>
                                <td>{{ $student->Section }}</td>
                                <td>{{ $student->created_at->format('Y-m-d H:i') }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('students.edit', $student->id) }}"
                                           class="btn btn-sm btn-primary">
                                            Edit
                                        </a>
                                        <form action="{{ route('students.destroy', $student->id) }}"
                                              method="POST"
                                              class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure?')">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">No applications found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $students->links() }}
            </div>
        </div>
    </div>
</div>

