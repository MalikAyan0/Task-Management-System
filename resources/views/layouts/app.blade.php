<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Task Management System')</title>
    {{-- <link rel="stylesheet" href="{{ asset('css/toastr.css') }}"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #1a1a2e;
            color: #eaeaea;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .header {
            background-color: #16213e;
            color: #eaeaea;
            padding: 1rem;
            text-align: center;
            font-size: 1.5rem;
            font-weight: bold;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .layout {
            display: flex;
            flex-grow: 1;
        }

        .sidebar {
            background-color: #0f3460;
            color: white;
            width: 250px;
            transition: width 0.3s ease-in-out;
            overflow: hidden;
        }

        .sidebar.closed {
            width: 55px;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 1rem;
        }

        .sidebar ul li {
            margin: 1rem 0;
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.8rem;
            padding: 0.7rem;
            border-radius: 5px;
        }

        .sidebar ul li a:hover {
            background-color: #16213e;
        }

        .toggle-btn {
            background-color: #16213e;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            cursor: pointer;
            border-radius: 5px;
            margin: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .content {
            flex-grow: 1;
            padding: 2rem;
            overflow-y: auto;
        }

        .add-task-btn {
            background-color: #21c8d7;
            color: white;
            border: none;
            padding: 0.7rem 1.5rem;
            font-size: 1rem;
            border-radius: 5px;
            cursor: pointer;
            margin-bottom: 1rem;
        }

        .add-task-btn:hover {
            background-color: #17a2b8;
        }

        .task-list {
            background-color: #16213e;
            padding: 1rem;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }

        .task {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #0f3460;
            padding: 1.5rem;
            border-radius: 10px;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease-in-out;
        }

        .task:hover {
            transform: scale(1.02);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.4);
        }

        .task-info {
            flex: 1;
            padding-right: 1rem;
        }

        .task-info p {
            margin-bottom: 0.5rem;
            font-size: 1.1rem;
        }

        .task-actions {
            display: flex;
            gap: 0.5rem;
        }

        .task-actions button {
            background-color: #f05454;
            color: white;
            border: none;
            padding: 0.7rem 1.2rem;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .task-actions button:hover {
            background-color: #d63031;
        }

        @media (max-width: 768px) {
            .layout {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                flex-shrink: 0;
            }

            .content {
                padding: 1rem;
            }

            .task {
                flex-direction: column;
                align-items: flex-start;
            }

            .task-actions {
                margin-top: 1rem;
            }
        }

        .content {
            padding: 2rem;
            overflow-y: auto;
        }

        .add-task-btn {
            background-color: #21c8d7;
            color: white;
            border: none;
            padding: 0.7rem 1.5rem;
            font-size: 1rem;
            border-radius: 5px;
            cursor: pointer;
            margin-bottom: 1rem;
        }

        .add-task-btn:hover {
            background-color: #17a2b8;
        }

        .task-list {
            background-color: #16213e;
            padding: 1rem;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }

        .task {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #0f3460;
            padding: 1.5rem;
            border-radius: 10px;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease-in-out;
        }

        .task:hover {
            transform: scale(1.02);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.4);
        }

        .task-info {
            flex: 1;
            padding-right: 1rem;
        }

        .task-info label {
            color: white;
            font-weight: bold;
        }

        .task-info input,
        .task-info select,
        .task-info textarea {
            width: 100%;
            padding: 0.8rem;
            margin-bottom: 1rem;
            border-radius: 5px;
            border: none;
            background-color: #1a1a2e;
            color: white;
        }

        .task-info input[type="date"] {
            background-color: #1a1a2e;
        }

        .task-info button {
            background-color: #21c8d7;
            color: white;
            border: none;
            padding: 0.7rem 1.5rem;
            font-size: 1rem;
            border-radius: 5px;
            cursor: pointer;
        }

        .task-info button:hover {
            background-color: #17a2b8;
        }

        @media (max-width: 768px) {
            .task {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>
</head>

<body>
    <div class="header">
        @yield('header', 'Task Management System')
    </div>
    <div class="layout">
        <aside class="sidebar" id="sidebar">
            <button class="toggle-btn" onclick="toggleSidebar()">
                <i class="fas fa-bars"></i>
            </button>
            <ul>
                <li>
                    <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('tasks.index') }}"
                        class="{{ request()->routeIs('tasks.index') ? 'active' : '' }}">
                        <i class="fas fa-tasks"></i> Tasks
                    </a>
                </li>
                <li>
                    <a href="{{ route('password.change') }}"
                        class="{{ request()->routeIs('password.change') ? 'active' : '' }}">
                        <i class="fas fa-cogs"></i> Settings
                    </a>
                </li>
                <li id="logoutButton">
                    <a href="{{ route('logout') }}" class="{{ request()->routeIs('logout') ? 'active' : '' }}">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </li>
            </ul>
        </aside>


        <main class="content">
            @yield('content')
        </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "showDuration": "500",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };

        @if (session('success'))
            toastr.success('{{ session('success') }}');
        @endif

        @if (session('error'))
            toastr.error('{{ session('error') }}');
        @endif

        @if (session('info'))
            toastr.info('{{ session('info') }}');
        @endif

        @if (session('warning'))
            toastr.warning('{{ session('warning') }}');
        @endif
    </script>
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('closed');
        }
    </script>
    @yield('scripts')

</body>

</html>
