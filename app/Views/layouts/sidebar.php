<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="nexo-brand"><span class="nexo-mark" aria-hidden="true"><i class="fas fa-boxes"></i></span><span>exo Inventarios</span></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Resumen</li>
                <li>
                    <a href="<?= base_url('home') ?>" <?= $vista == 'home' ? 'class="mm-active"' : '' ?>>
                        <i class="metismenu-icon pe-7s-rocket"></i>
                        Inicio
                    </a>
                </li>
                <li class="app-sidebar__heading">OPERACIÓN</li>
                <li>
                    <a href="<?= base_url('categoria') ?>" <?= $vista == 'categoria' ? 'class="mm-active"' : '' ?>>
                    <i class="metismenu-icon pe-7s-diamond"></i>
                        Categorias
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('producto') ?>" <?= $vista == 'producto' ? 'class="mm-active"' : '' ?>>
                    <i class="metismenu-icon pe-7s-ticket"></i>
                        Productos
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('venta') ?>" <?= $vista == 'venta' ? 'class="mm-active"' : '' ?>>
                    <i class="metismenu-icon pe-7s-cash"></i>
                        Ventas
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('persona') ?>" <?= $vista == 'pesona' ? 'class="mm-active"' : '' ?>>
                    <i class="metismenu-icon pe-7s-users"></i>
                        Clientes y Proveedores
                    </a>
                </li>
                <li class="app-sidebar__heading">ADMINISTRACIÓN</li>
                <li>
                    <a href="<?= base_url('usuario') ?>" <?= $vista == 'usuario' ? 'class="mm-active"' : '' ?>>
                    <i class="metismenu-icon pe-7s-user"></i>
                        Usuarios
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('configuracion') ?>" <?= $vista == 'configuracion' ? 'class="mm-active"' : '' ?>>
                    <i class="metismenu-icon pe-7s-config"></i>
                        Configuración
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>