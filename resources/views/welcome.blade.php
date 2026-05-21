<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil Profesional | Carlos Hernández López</title>
    
    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        /* Design System: Premium Formal Minimalist Light Theme */
        :root {
            --bg-light: #f1f5f9;
            --card-bg: #ffffff;
            --card-bg-hover: #f8fafc;
            --border-color: rgba(15, 23, 42, 0.18);
            --border-focus: rgba(15, 23, 42, 0.4);
            --text-primary: #0f172a; /* Navy / Slate Black */
            --text-muted: #64748b; /* Gray Blue */
            --accent: #0f172a; /* Navy Accent */
            --accent-hover: #1e293b;
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
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            overflow-x: hidden;
            line-height: 1.6;
        }

        /* Navigation Bar */
        .nav-bar {
            width: 100%;
            border-bottom: 1px solid var(--border-color);
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(12px);
            position: sticky;
            top: 0;
            z-index: 100;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.25rem 3rem;
        }

        .nav-brand {
            font-size: 0.9rem;
            font-weight: 800;
            letter-spacing: 0.25em;
            text-transform: uppercase;
            text-decoration: none;
            color: var(--text-primary);
        }

        .nav-center {
            display: flex;
            gap: 2rem;
        }

        .nav-link {
            color: var(--text-muted);
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 600;
            transition: var(--transition);
            padding: 0.5rem 0.25rem;
            border-bottom: 2px solid transparent;
        }

        .nav-link:hover, .nav-link.active {
            color: var(--text-primary);
        }

        .nav-link.active {
            border-bottom-color: var(--accent);
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .user-badge {
            font-size: 0.75rem;
            background: rgba(15, 23, 42, 0.04);
            border: 1px solid var(--border-color);
            padding: 0.35rem 0.75rem;
            border-radius: 2rem;
            color: var(--text-muted);
            font-weight: 500;
        }

        .logout-link {
            color: #ef4444;
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 600;
            transition: var(--transition);
        }

        .logout-link:hover {
            color: #f87171;
        }

        /* Content Container */
        .container {
            width: 100%;
            max-width: 1000px;
            padding: 4rem 2rem;
            animation: fadeIn 0.5s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .main-section {
            display: none;
        }

        .main-section.active {
            display: block;
        }

        /* Typography & Layout */
        .dashboard-header {
            margin-bottom: 3rem;
            border-bottom: 1px solid var(--border-color);
            padding-bottom: 1.5rem;
        }

        .dashboard-header h1 {
            font-size: 2.5rem;
            font-weight: 800;
            letter-spacing: -0.03em;
            margin-bottom: 0.5rem;
            color: var(--text-primary);
        }

        .dashboard-header p.subtitle {
            color: var(--text-muted);
            font-size: 1rem;
        }

        .section-title {
            font-size: 1.8rem;
            font-weight: 800;
            letter-spacing: -0.02em;
            margin-bottom: 0.75rem;
            color: var(--text-primary);
        }

        .section-desc {
            color: var(--text-muted);
            font-size: 0.95rem;
            margin-bottom: 2.5rem;
            max-width: 600px;
        }

        /* Profile Layout */
        .profile-grid {
            display: grid;
            grid-template-columns: 1.5fr 1fr;
            gap: 3rem;
            align-items: start;
        }

        .profile-bio {
            display: flex;
            flex-direction: column;
            gap: 1.25rem;
        }

        .profile-bio p {
            font-size: 1.05rem;
            color: var(--text-muted);
            line-height: 1.7;
        }

        .profile-bio p strong {
            color: var(--text-primary);
            font-weight: 600;
        }

        .profile-sidebar-card {
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 1rem;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.08);
        }

        .profile-sidebar-card h3 {
            font-size: 1rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 1.5rem;
            border-bottom: 1px solid var(--border-color);
            padding-bottom: 0.75rem;
        }

        .list-unstyled {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 0.85rem;
        }

        .list-unstyled li {
            font-size: 0.95rem;
            color: var(--text-muted);
        }

        .list-unstyled li strong {
            color: var(--text-primary);
        }

        .badge-custom {
            font-size: 0.75rem;
            background: rgba(15, 23, 42, 0.04);
            border: 1px solid var(--border-color);
            padding: 0.35rem 0.75rem;
            border-radius: 2rem;
            color: var(--text-muted);
            font-weight: 500;
            display: inline-block;
            margin: 0.25rem;
            transition: var(--transition);
        }

        .badge-custom:hover {
            border-color: var(--border-focus);
            color: var(--text-primary);
        }

        /* Projects Layout */
        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2rem;
        }

        .project-card {
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 1rem;
            padding: 2.25rem;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 280px;
            transition: var(--transition);
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.08);
        }

        .project-card:hover {
            transform: translateY(-4px);
            border-color: var(--border-focus);
            background: var(--card-bg-hover);
        }

        .project-meta {
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.05em;
            color: var(--text-muted);
            margin-bottom: 1rem;
        }

        .project-card h3 {
            font-size: 1.25rem;
            font-weight: 700;
            letter-spacing: -0.02em;
            color: var(--text-primary);
            margin-bottom: 0.75rem;
        }

        .project-card p {
            font-size: 0.9rem;
            color: var(--text-muted);
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        .project-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 0.4rem;
        }

        .project-tag {
            font-size: 0.7rem;
            background: rgba(15, 23, 42, 0.04);
            border: 1px solid var(--border-color);
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            color: var(--text-muted);
        }

        /* Contact Layout */
        .contact-grid {
            display: grid;
            grid-template-columns: 1fr 1.5fr;
            gap: 4rem;
        }

        .contact-info {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        .contact-details {
            display: flex;
            flex-direction: column;
            gap: 1.25rem;
        }

        .contact-detail-item {
            display: flex;
            flex-direction: column;
            gap: 0.25rem;
        }

        .contact-detail-item .label {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--text-muted);
            font-weight: 700;
        }

        .contact-detail-item .val {
            font-size: 1rem;
            color: var(--text-primary);
            font-weight: 500;
        }

        .contact-form-card {
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 1rem;
            padding: 2.5rem;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.08);
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

        input, textarea {
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

        textarea {
            resize: none;
            min-height: 120px;
        }

        input:focus, textarea:focus {
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

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(12px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 768px) {
            .nav-bar {
                padding: 1.25rem 1.5rem;
                flex-direction: column;
                gap: 1rem;
            }
            .nav-center {
                gap: 1rem;
            }
            .profile-grid, .contact-grid {
                grid-template-columns: 1fr;
                gap: 2rem;
            }
        }
    </style>
</head>
<body>

    <!-- Barra de inicio formal y minimalista -->
    <nav class="nav-bar">
        <div class="nav-left">
            <a href="#" class="nav-brand" onclick="switchMainSection('sobre-mi')">PORTAFOLIO</a>
        </div>
        <div class="nav-center">
            <a href="#" id="link-sobre-mi" class="nav-link active" onclick="switchMainSection('sobre-mi')">Sobre Mí</a>
            <a href="#" id="link-proyectos" class="nav-link" onclick="switchMainSection('proyectos')">Proyectos</a>
            <a href="#" id="link-contacto" class="nav-link" onclick="switchMainSection('contacto')">Contacto</a>
        </div>
        <div class="nav-right">
            <span class="user-badge">{{ session('user_name') }}</span>
            <a href="{{ url('/logout') }}" class="logout-link">Cerrar Sesión</a>
        </div>
    </nav>

    <!-- Contenedor Principal -->
    <div class="container">
        
        <!-- SECCIÓN 1: SOBRE MÍ -->
        <section id="section-sobre-mi" class="main-section active">
            <header class="dashboard-header">
                <h1>Hola, {{ session('user_name') }}</h1>
                <p class="subtitle">Bienvenido al perfil profesional de Carlos Hernández López.</p>
            </header>

            <div class="profile-grid">
                <div class="profile-bio">
                    <h2 class="section-title">Carlos Hernández López</h2>
                    <p class="section-desc" style="margin-bottom: 1rem;">Ingeniero en Sistemas Computacionales en formación.</p>
                    
                    <p>Actualmente tengo <strong>22 años</strong> de edad y resido en <strong>Tecámac, Estado de México</strong> (Villa del Real). Me encuentro cursando de manera activa el <strong>octavo semestre</strong> de la ingeniería en sistemas en la <strong>UPEM Tecámac</strong>.</p>
                    
                    <p>Mi enfoque se centra en el desarrollo backend estructurado, el modelado formal de bases de datos relacionales y la auditoría de código para sistemas empresariales y de control. Me apasiona optimizar procesos a través de soluciones de programación elegantes, minimalistas y altamente seguras.</p>
                    
                    <div style="margin-top: 1rem;">
                        <h4 style="font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.05em; color: var(--text-primary); margin-bottom: 0.5rem;">Temas y Preferencias</h4>
                        <span class="badge-custom">Jujutsu Kaisen</span>
                        <span class="badge-custom">Dandadan</span>
                        <span class="badge-custom">Cyberpunk</span>
                    </div>
                </div>

                <div class="profile-sidebar-card">
                    <h3>Detalles y Hobbies</h3>
                    
                    <div style="margin-bottom: 1.5rem;">
                        <ul class="list-unstyled">
                            <li>⚽ <strong>Fútbol:</strong> Apasionado del juego y el análisis táctico.</li>
                            <li>✒️ <strong>Tatuajes:</strong> Aficionado al arte corporal y su diseño.</li>
                            <li>🃏 <strong>Coleccionismo:</strong> Compra, venta y colección activa de cartas Pokémon TCG.</li>
                        </ul>
                    </div>

                    <div style="border-top: 1px solid var(--border-color); padding-top: 1.5rem;">
                        <h4 style="font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.05em; color: var(--text-primary); margin-bottom: 0.5rem;">Favoritos</h4>
                        <p style="font-size: 0.85rem; color: var(--text-muted); margin-bottom: 0.35rem;">🍔 <strong>Comida:</strong> Hamburguesas, pizza y chilaquiles verdes.</p>
                        <p style="font-size: 0.85rem; color: var(--text-muted);">📺 <strong>Series:</strong> The Boys, Daredevil y Peaky Blinders.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECCIÓN 2: PROYECTOS -->
        <section id="section-proyectos" class="main-section">
            <h2 class="section-title">Mis Proyectos</h2>
            <p class="section-desc">Colección de sistemas desarrollados a nivel académico y profesional enfocados en el backend.</p>
            
            <div class="projects-grid">
                <!-- Proyecto 1 -->
                <div class="project-card">
                    <div>
                        <div class="project-meta">PROYECTO 01 / ECOMMERCE</div>
                        <h3>Sistema Carrito de Compras</h3>
                        <p>Desarrollo formal de una plataforma de comercio electrónico con Laravel. Implementa persistencia relacional con tablas de pedidos, productos, categorías y control de inventarios mediante transacciones SQL.</p>
                    </div>
                    <div class="project-tags">
                        <span class="project-tag">Laravel</span>
                        <span class="project-tag">MySQL</span>
                        <span class="project-tag">Eloquent ORM</span>
                        <span class="project-tag">Bootstrap</span>
                    </div>
                </div>

                <!-- Proyecto 2 -->
                <div class="project-card">
                    <div>
                        <div class="project-meta">PROYECTO 02 / CONTROL DE ACCESO</div>
                        <h3>Módulo de Autenticación Segura</h3>
                        <p>Implementación de un sistema de control de accesos formal con BCrypt, soporte de sesiones persistentes y registro automático de perfiles académicos, optimizado para altos estándares de seguridad.</p>
                    </div>
                    <div class="project-tags">
                        <span class="project-tag">PHP</span>
                        <span class="project-tag">Bcrypt Hashing</span>
                        <span class="project-tag">Session Guard</span>
                    </div>
                </div>

                <!-- Proyecto 3 -->
                <div class="project-card">
                    <div>
                        <div class="project-meta">PROYECTO 03 / DATABASE DESIGN</div>
                        <h3>Esquema Relacional Comercial</h3>
                        <p>Diseño y auditoría física de base de datos relacional para control de transacciones de compra/venta, implementando triggers para validación de stocks y vistas analíticas de rendimiento.</p>
                    </div>
                    <div class="project-tags">
                        <span class="project-tag">MySQL DB</span>
                        <span class="project-tag">Triggers</span>
                        <span class="project-tag">Normalización</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECCIÓN 3: CONTACTO -->
        <section id="section-contacto" class="main-section">
            <h2 class="section-title">Contacto</h2>
            <p class="section-desc">Póngase en contacto formal para colaboraciones académicas o proyectos de desarrollo backend.</p>
            
            <div class="contact-grid">
                <div class="contact-info">
                    <p class="subtitle" style="text-align: left; color: var(--text-muted);">Si estás buscando un programador enfocado en ingeniería de sistemas, optimización de base de datos o desarrollo estructurado con Laravel, no dudes en contactarme.</p>
                    
                    <div class="contact-details">
                        <div class="contact-detail-item">
                            <span class="label">Correo Electrónico</span>
                            <span class="val">carlos.hdez@universidad.edu</span>
                        </div>
                        <div class="contact-detail-item">
                            <span class="label">Ubicación Actual</span>
                            <span class="val">Tecámac, Estado de México, MX</span>
                        </div>
                        <div class="contact-detail-item">
                            <span class="label">Institución Académica</span>
                            <span class="val">UPEM Tecámac (8vo Semestre)</span>
                        </div>
                    </div>
                </div>
                
                <div class="contact-form-card">
                    <form onsubmit="event.preventDefault(); alert('Mensaje enviado de manera formal. A la brevedad me pondré en contacto.'); this.reset();">
                        <div class="form-group">
                            <label for="contact-name">Nombre Completo</label>
                            <input type="text" id="contact-name" required placeholder="Ej. Carlos Hernández">
                        </div>
                        <div class="form-group">
                            <label for="contact-email">Correo Electrónico</label>
                            <input type="email" id="contact-email" required placeholder="carlos@ejemplo.com">
                        </div>
                        <div class="form-group">
                            <label for="contact-msg">Mensaje</label>
                            <textarea id="contact-msg" required placeholder="Escriba brevemente su mensaje o propuesta de proyecto..."></textarea>
                        </div>
                        <button type="submit" class="btn-primary">Enviar Mensaje</button>
                    </form>
                </div>
            </div>
        </section>
        
    </div>

    <!-- Scripts JavaScript para cambio fluido de secciones -->
    <script>
        function switchMainSection(sectionId) {
            // Ocultar todas las secciones principales
            document.querySelectorAll('.main-section').forEach(section => {
                section.classList.remove('active');
            });
            // Remover estado activo de los links de navegación
            document.querySelectorAll('.nav-link').forEach(link => {
                link.classList.remove('active');
            });

            // Mostrar sección seleccionada e indicar link activo
            document.getElementById('section-' + sectionId).classList.add('active');
            document.getElementById('link-' + sectionId).classList.add('active');

            // Volver al tope de la página suavemente
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    </script>
</body>
</html>