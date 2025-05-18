{{-- resources/views/layouts/app.blade.php --}}

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        #sidebar {
            width: 280px;
            position: fixed;
            top: 0;
            left: -280px;
            height: 100vh;
            z-index: 999;
            background: #f8f9fa;
            transition: all 0.3s;
            overflow-y: auto;
            box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.2);
        }

        #sidebar.active {
            left: 0;
        }

        #content {
            width: 100%;
            transition: all 0.3s;
        }

        #content.active {
            margin-left: 280px;
            width: calc(100% - 280px);
        }

        #sidebarCollapse {
            position: fixed;
            left: 20px;
            top: 20px;
            z-index: 1000;
        }

        .overlay {
            display: none;
            position: fixed;
            width: 100vw;
            height: 100vh;
            background: rgba(0, 0, 0, 0.7);
            z-index: 998;
            opacity: 0;
            transition: all 0.5s ease-in-out;
        }
        .overlay.active {
            display: block;
            opacity: 1;
        }

        .main-header {
            background: #f8f9fa;
            padding: 1rem;
            margin-bottom: 1rem;
            border-bottom: 1px solid #dee2e6;
        }

        #sidebarCollapse {
            position: relative;
            left: 0;
            top: 0;
            margin-right: 1rem;
        }

        .header-content {
            display: flex;
            align-items: center;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <nav id="sidebar">
            <div class="sidebar-header p-3">
                <h3>Menú de Gestión</h3>
            </div>
            @include('partials.menu')
        </nav>

        <!-- Overlay -->
        <div class="overlay"></div>

        <!-- Contenido Principal -->
        <div id="content">
            <div class="main-header">
                <div class="header-content">
                    <button type="button" id="sidebarCollapse" class="btn btn-primary">
                        <span>☰</span>
                    </button>
                    <h1 class="mb-0">Sistema de Gestión</h1>
                </div>
            </div>
            <div class="container-fluid p-4">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const content = document.getElementById('content');
            const sidebarCollapse = document.getElementById('sidebarCollapse');
            const overlay = document.querySelector('.overlay');

            sidebarCollapse.addEventListener('click', function() {
                sidebar.classList.toggle('active');
                content.classList.toggle('active');
                overlay.classList.toggle('active');
            });

            overlay.addEventListener('click', function() {
                sidebar.classList.remove('active');
                content.classList.remove('active');
                overlay.classList.remove('active');
            });
        });
    </script>
</body>
</html>
