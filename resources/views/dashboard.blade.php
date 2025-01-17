<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    @vite(['resources/sass/app.scss','resources/js/app.js'])
</head>
<body>
    <div class="dashboard">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="logo">Scholarly</div>
            <nav>
                <a href="#" class="nav-link active">Dashboard</a>
                <a href="students/index" class="nav-link">Students</a>
                <a href="#" class="nav-link">Classes</a>
                <a href="#" class="nav-link">Attendance</a>
                <a href="#" class="nav-link">Reports</a>
                <a href="#" class="nav-link">Settings</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <div class="header">
                <h1>Dashboard</h1>
                <a href="{{ route('students.create') }}" class="button">Add New Student</a>
            </div>

            <!-- Stats Grid -->
            <div class="stats-grid">
                <div class="stat-card">
                    <h3>Total Students</h3>
                    <div class="number">{{ $totalStudents ?? '1,234' }}</div>
                </div>
                <div class="stat-card">
                    <h3>Present Today</h3>
                    <div class="number">{{ $presentToday ?? '1,180' }}</div>
                </div>
                <div class="stat-card">
                    <h3>Total Classes</h3>
                    <div class="number">{{ $totalClasses ?? '32' }}</div>
                </div>
                <div class="stat-card">
                    <h3>Total Reports</h3>
                    <div class="number">{{ $totalTeachers ?? '48' }}</div>
                </div>
            </div>

            <!-- Content Grid -->
            <div class="content-grid">
                <!-- Recent Students -->
                <div class="card">
                    <h2>Recent Students</h2>
                    <ul class="student-list">
                        @forelse($recentStudents ?? [] as $student)
                            <li class="student-item">
                                <div class="student-avatar"></div>
                                <div>
                                    <div>{{ $student->name }}</div>
                                    <div class="activity-time">{{ $student->class }}</div>
                                </div>
                            </li>
                        @empty
                            @foreach(range(1, 5) as $i)
                                <li class="student-item">
                                    <div class="student-avatar"></div>
                                    <div>
                                        <div>Student Name {{ $i }}</div>
                                        <div class="activity-time">Class {{ chr(64 + $i) }}</div>
                                    </div>
                                </li>
                            @endforeach
                        @endforelse
                    </ul>
                </div>

                <!-- Recent Activities -->
                <div class="card">
                    <h2>Recent Activities</h2>
                    <ul class="activity-list">
                        @forelse($recentActivities ?? [] as $activity)
                            <li class="activity-item">
                                <div>{{ $activity->description }}</div>
                                <div class="activity-time">{{ $activity->time }}</div>
                            </li>
                        @empty
                            <li class="activity-item">
                                <div>New student registered</div>
                                <div class="activity-time">2 hours ago</div>
                            </li>
                            <li class="activity-item">
                                <div>Attendance marked for Class A</div>
                                <div class="activity-time">3 hours ago</div>
                            </li>
                            <li class="activity-item">
                                <div>Monthly report generated</div>
                                <div class="activity-time">5 hours ago</div>
                            </li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
