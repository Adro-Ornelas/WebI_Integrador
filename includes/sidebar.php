<header>
    <div class="izquierda">
        <div class="menu-container">
            <div class="menu" id="menu">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>

    <div class="brand">
        <h1 class="nombre">AoRent</h1>
    </div>

    <div class="derecha">
        <?php       

        if (!isset($_SESSION["admin"])) {
            echo '<a href="login.html">Iniciar Sesión</a>';
            
        } else {
            echo '<a href="logout.php">Cerrar sesión</a>';
            
        }
        ?>
    </div>
</header>

<div class="sidebar" id="sidebar">
    <nav>
        <ul>
            <li>
                <a href="index.php" class="selected">
                    <i class="bxr  bxs-home-alt-2"></i>
                    <span>Inicio</span>
                </a>
            </li>

            <li>
                <a href="index.php#catalogo">
                    <i class="bxr  bxs-book-bookmark"></i>
                    <span>Catálogo</span>
                </a>
            </li>
            <li>
                <a href="faq.php">
                    <i class="bxr  bxs-message-question-mark"></i>
                    <span>FAQ</span>
                </a>
            </li>

        <?php       

        if (isset($_SESSION["admin"])) {
            echo 
            '
            <li>
                <a href="admin_dashboard.php">
                    <i class="bxr  bxs-home-alt-2"></i>
                    <span>Inicio - ADIN</span>
                </a>
            </li>

            <li>
                <a href="flota.php">
                    <i class="bxr  bxs-book-bookmark"></i>
                    <span>Catálogo - ADMIN</span>
                </a>
            </li>

            <li>
                <a href="solicitud_admin_lista.php">
                    <i class="bxr  bxs-book-bookmark"></i>
                    <span>Solicitudes - ADMIN</span>
                </a>
            </li>
            <li>
                <a href="faq_admin.php">
                    <i class="bxr  bxs-message-question-mark"></i>
                    <span>FAQ - ADMIN</span>
                </a>
            </li>';
        }
        ?>
            
        </ul>
    </nav>
</div>
<script src="js/sidebar.js" async defer></script>