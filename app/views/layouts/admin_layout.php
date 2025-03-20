<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titulo ?></title>
    <link rel="stylesheet" href="/css/styles_admin_layout.css">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
    <div class="container">
        <aside class="sidebar">
            <div class="sidebar-content">
                <div class="logo">
                    <img src="" alt="">
                    <span class="logo-text">SENNOVABAL</span>
                </div>
                <nav class="menu">
                    <ul>
                        <li><a href="/proyecto/view"><i class="fas fa-project-diagram"></i> <span>Proyectos</span></a></li>
                        <li><a href="/actividad/view"><i class="circle"></i> <span>...</span></a></li>
                        <?php if (isset($_SESSION["nombre"])) { ?>
                            <li>
                                <a href="/login/logout">
                                    <i class="fas fa-users"></i>
                                    <span>Cerrar sesión <?php echo $_SESSION["nombre"]; ?></span>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </nav>
            </div>
        </aside>
        <main class="main-content">
            <header class="header">
                <div class="header-container">
                    <button class="menu-toggle" id="menu-toggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <h1><?php echo $titulo; ?></h1>
                    <div class="search-container">
                        <input placeholder="buscar..." type="text">
                    </div>
                    <div class="header-icons">
                        <a href="#" class="theme-toggle" title="Cambiar tema">
                            <i class="fas fa-moon"></i>
                        </a>
                        <a href="#" title="Notificaciones">
                            <i class="fas fa-bell"></i>
                        </a>
                        <a href="#" title="Perfil de usuario">
                            <i class="fas fa-user-circle"></i>
                        </a>
                    </div>
                </div>
            </header>
            <div class="data-container">
                <div class="content">
                    <?php include_once $content; ?>
                </div>
            </div>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Seleccionar elementos correctamente
            const menuToggle = document.getElementById('menu-toggle');
            const sidebar = document.querySelector('.sidebar'); // Usar querySelector en lugar de getElementById
            const mainContent = document.querySelector('.main-content');

            // Comprobar si el menú debe estar colapsado basado en el almacenamiento local
            const menuState = localStorage.getItem('menuState');
            if (menuState === 'collapsed' || window.innerWidth <= 768) {
                sidebar.classList.add('collapsed');
                mainContent.classList.add('expanded');
            }

            menuToggle.addEventListener('click', function() {
                sidebar.classList.toggle('collapsed');
                mainContent.classList.toggle('expanded');

                // Guardar el estado del menú
                if (sidebar.classList.contains('collapsed')) {
                    localStorage.setItem('menuState', 'collapsed');
                } else {
                    localStorage.setItem('menuState', 'expanded');
                }
            });

            // Cerrar menú al hacer clic fuera
            document.addEventListener('click', function(event) {
                // Verificar si el menú está expandido y el clic no fue en el sidebar ni en el botón de menú
                if (!sidebar.contains(event.target) &&
                    !menuToggle.contains(event.target) &&
                    !sidebar.classList.contains('collapsed') &&
                    window.innerWidth <= 768) { // Solo en dispositivos móviles

                    sidebar.classList.add('collapsed');
                    mainContent.classList.add('expanded');
                    localStorage.setItem('menuState', 'collapsed');
                }
            });

            // Alternar tema claro/oscuro
            const themeToggle = document.querySelector('.theme-toggle');
            const htmlElement = document.documentElement;

            themeToggle.addEventListener('click', function(e) {
                e.preventDefault(); // Evitar comportamiento de enlace
                if (htmlElement.getAttribute('data-theme') === 'dark') {
                    htmlElement.setAttribute('data-theme', 'light');
                    localStorage.setItem('theme', 'light');
                    themeToggle.querySelector('i').classList.replace('fa-sun', 'fa-moon');
                } else {
                    htmlElement.setAttribute('data-theme', 'dark');
                    localStorage.setItem('theme', 'dark');
                    themeToggle.querySelector('i').classList.replace('fa-moon', 'fa-sun');
                }
            });

            // Cargar tema guardado
            const savedTheme = localStorage.getItem('theme') || 'light';
            htmlElement.setAttribute('data-theme', savedTheme);

            // Actualizar el icono del toggle según el tema
            if (savedTheme === 'dark') {
                themeToggle.querySelector('i').classList.replace('fa-moon', 'fa-sun');
            }

            // Ajustar responsive
            window.addEventListener('resize', function() {
                if (window.innerWidth <= 768 && !sidebar.classList.contains('collapsed')) {
                    sidebar.classList.add('collapsed');
                    mainContent.classList.add('expanded');
                }
            });
        });
    </script>
</body>

</html>