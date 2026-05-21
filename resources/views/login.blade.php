<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso Formal | Sistema de Control</title>
    
    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        /* Design System: Premium Formal Minimalist Light Theme */
        :root {
            --bg-light: #f1f5f9;
            --card-bg: #ffffff;
            --border-color: rgba(15, 23, 42, 0.18);
            --border-focus: rgba(15, 23, 42, 0.4);
            --text-primary: #0f172a; /* Navy / Slate Black */
            --text-muted: #64748b; /* Gray Blue */
            --accent: #0f172a; /* Navy Accent */
            --accent-hover: #1e293b;
            --error: #ef4444;
            --transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        }

        body {
            background-color: var(--bg-light);
            color: var(--text-primary);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem;
            line-height: 1.6;
        }

        .auth-container {
            width: 100%;
            max-width: 420px;
            animation: fadeIn 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .auth-header {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .auth-brand {
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.25em;
            text-transform: uppercase;
            color: var(--text-muted);
            margin-bottom: 0.75rem;
            display: inline-block;
        }

        .auth-header h1 {
            font-size: 1.8rem;
            font-weight: 800;
            letter-spacing: -0.03em;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
        }

        .auth-header p {
            color: var(--text-muted);
            font-size: 0.85rem;
        }

        /* Card container */
        .auth-card {
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 1rem;
            padding: 2.5rem;
            box-shadow: 0 15px 35px rgba(15, 23, 42, 0.12);
        }

        /* Tabs */
        .auth-tabs {
            display: grid;
            grid-template-columns: 1fr 1fr;
            border-bottom: 1px solid var(--border-color);
            margin-bottom: 2rem;
            padding-bottom: 0.5rem;
        }

        .auth-tab-btn {
            background: none;
            border: none;
            color: var(--text-muted);
            font-size: 0.9rem;
            font-weight: 600;
            padding: 0.75rem 0;
            cursor: pointer;
            text-align: center;
            transition: var(--transition);
            border-bottom: 2px solid transparent;
        }

        .auth-tab-btn.active {
            color: var(--text-primary);
            border-bottom-color: var(--accent);
        }

        /* Forms display logic */
        .auth-form {
            display: none;
            animation: fadeIn 0.4s ease-out;
        }

        .auth-form.active {
            display: block;
        }

        .form-group {
            margin-bottom: 1.25rem;
            text-align: left;
        }

        .form-group label {
            display: block;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--text-muted);
            margin-bottom: 0.5rem;
        }

        input {
            width: 100%;
            background: #ffffff;
            border: 1px solid var(--border-color);
            padding: 0.8rem 1rem;
            border-radius: 0.5rem;
            color: var(--text-primary);
            font-size: 0.95rem;
            outline: none;
            transition: var(--transition);
        }

        input:focus {
            border-color: var(--border-focus);
            box-shadow: 0 0 0 2px rgba(15, 23, 42, 0.06);
        }

        button.btn-primary {
            width: 100%;
            background: var(--accent);
            color: #ffffff;
            border: none;
            padding: 0.85rem;
            border-radius: 0.5rem;
            font-size: 0.95rem;
            font-weight: 700;
            cursor: pointer;
            transition: var(--transition);
            margin-top: 1rem;
        }

        button.btn-primary:hover {
            background: var(--accent-hover);
        }

        button.btn-primary:active {
            transform: scale(0.98);
        }

        /* Alerts */
        .alert {
            background: rgba(239, 68, 68, 0.08);
            border: 1px solid rgba(239, 68, 68, 0.2);
            color: var(--error);
            padding: 0.8rem 1rem;
            border-radius: 0.5rem;
            margin-bottom: 1.5rem;
            font-size: 0.85rem;
            text-align: center;
        }

        .alert-success {
            background: rgba(34, 197, 94, 0.08);
            border: 1px solid rgba(34, 197, 94, 0.2);
            color: #15803d;
        }

        .footer-text {
            text-align: center;
            font-size: 0.75rem;
            color: var(--text-muted);
            margin-top: 2rem;
            letter-spacing: 0.05em;
            text-transform: uppercase;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(8px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>

    <div class="auth-container">
        <div class="auth-header">
            <span class="auth-brand">Área de Ingeniería</span>
            <h1>Portal de Acceso</h1>
            <p>Inicie sesión en su perfil o cree una nueva cuenta académica.</p>
        </div>

        <!-- Manejo de Alertas de Laravel -->
        @if(session('error'))
            <div class="alert">{{ session('error') }}</div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="auth-card">
            <div class="auth-tabs">
                <button class="auth-tab-btn active" id="tab-login" onclick="switchTab('login')">Iniciar Sesión</button>
                <button class="auth-tab-btn" id="tab-register" onclick="switchTab('register')">Registrarse</button>
            </div>

            <!-- Formulario de Iniciar Sesión (Laravel POST) -->
            <form id="form-login" class="auth-form active" method="POST" action="{{ url('/login') }}">
                @csrf
                <div class="form-group">
                    <label for="login-email">Correo Electrónico</label>
                    <input type="email" id="login-email" name="email" required placeholder="correo@ejemplo.com" value="{{ old('email') }}">
                </div>

                <div class="form-group">
                    <label for="login-password">Contraseña</label>
                    <input type="password" id="login-password" name="password" required placeholder="••••••••">
                </div>

                <button type="submit" class="btn-primary">Entrar al Portal</button>
            </form>

            <!-- Formulario de Registro (Laravel POST) -->
            <form id="form-register" class="auth-form" method="POST" action="{{ url('/register') }}">
                @csrf
                <div class="form-group">
                    <label for="reg-nombre">Nombre Completo</label>
                    <input type="text" id="reg-nombre" name="nombre" required placeholder="Carlos Hernández" value="{{ old('nombre') }}">
                </div>

                <div class="form-group">
                    <label for="reg-email">Correo Electrónico</label>
                    <input type="email" id="reg-email" name="email" required placeholder="correo@ejemplo.com" value="{{ old('email') }}">
                </div>

                <div class="form-group">
                    <label for="reg-password">Contraseña</label>
                    <input type="password" id="reg-password" name="password" required placeholder="Mínimo 4 caracteres">
                </div>

                <button type="submit" class="btn-primary">Registrar Cuenta</button>
            </form>
        </div>

        <div class="footer-text">
            Ingeniería en Sistemas — UPEM Tecámac
        </div>
    </div>

    <script>
        function switchTab(tab) {
            document.querySelectorAll('.auth-tab-btn').forEach(btn => btn.classList.remove('active'));
            document.querySelectorAll('.auth-form').forEach(form => form.classList.remove('active'));

            if (tab === 'login') {
                document.getElementById('tab-login').classList.add('active');
                document.getElementById('form-login').classList.add('active');
            } else {
                document.getElementById('tab-register').classList.add('active');
                document.getElementById('form-register').classList.add('active');
            }
        }
    </script>
</body>
</html>