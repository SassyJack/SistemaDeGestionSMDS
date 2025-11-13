<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iniciar Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/js/app.js'])
</head>
<body class="auth-page">
    <div class="auth-wrap">
        <div class="promo fade-in">
            <h1>Sistema de Gestión</h1>
            <p>Bienvenido al panel de gestión. Accede con tus credenciales para administrar proyectos, contratos y seguimiento.</p>
            <div style="margin-top:18px;display:flex;gap:10px">
                <div style="background:rgba(255,255,255,0.06);padding:10px 14px;border-radius:8px;color:#fff">✅ Seguro</div>
                <div style="background:rgba(255,255,255,0.06);padding:10px 14px;border-radius:8px;color:#fff">⚡ Rápido</div>
            </div>
        </div>

        <div class="login-card fade-in">
            <div class="brand">
                <div class="logo">SM</div>
                <div>
                    <div style="font-weight:700">Iniciar Sesión</div>
                    <div class="small-muted">Introduce tus credenciales para continuar</div>
                </div>
            </div>

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form method="POST" action="{{ route('login.authenticate') }}">
                @csrf
                <div class="mb-3 input-icon">
                    <label for="username" class="form-label">Usuario</label>
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden>
                        <path d="M12 12c2.761 0 5-2.239 5-5s-2.239-5-5-5-5 2.239-5 5 2.239 5 5 5z" stroke="#0b1220" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M3 21a9 9 0 0118 0" stroke="#0b1220" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <input type="text" class="form-control" id="username" name="username" required autocomplete="username">
                </div>

                <div class="mb-3 input-icon" style="position:relative">
                    <label for="contrasena" class="form-label">Contraseña</label>
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden>
                        <rect x="3" y="11" width="18" height="10" rx="2" stroke="#0b1220" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M7 11V8a5 5 0 0110 0v3" stroke="#0b1220" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <input type="password" class="form-control" id="contrasena" name="contrasena" required autocomplete="current-password">
                    <button type="button" class="show-pass" aria-label="Mostrar contraseña" onclick="togglePass()">👁️</button>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="remember" name="remember">
                        <label class="form-check-label small-muted" for="remember">Recuérdame</label>
                    </div>
                    <a href="#" class="small-muted">¿Olvidaste la contraseña?</a>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                </div>
            </form>

            <div style="margin-top:14px;text-align:center;color:#6b7280;font-size:.9rem">¿No tienes cuenta? <a href="#">Contacta al administrador</a></div>
        </div>
    </div>

    <script>
        function togglePass(){
            const p = document.getElementById('contrasena');
            if(!p) return;
            p.type = p.type === 'password' ? 'text' : 'password';
        }
    </script>
    <script src="//code.jivosite.com/widget/2qDcjzSrqX" async></script>
</body>
</html>
