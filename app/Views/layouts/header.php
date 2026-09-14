<div class="app-header header-shadow">
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
    <div class="app-header__content">
        <div class="app-header-right">
            <div class="header-btn-lg pr-0">
                <div class="widget-content p-0">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <?= session('username') ?>
                            <div class="btn-group">
                                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn dropdown-toggle">
                                    <img width="42" height="42" class="rounded-circle nexo-avatar" src="<?= base_url('images/nexo-avatar.svg') ?>" alt="Avatar de usuario">
                                </a>
                                <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                    <a href="<?= base_url('configuracion') ?>" tabindex="0" class="dropdown-item"><i class="fas fa-cog mr-2"></i>Configuración de cuenta</a>
                                    <div tabindex="-1" class="dropdown-divider"></div>
                                    <a href="<?= route_to("logout") ?>" tabindex="0" class="dropdown-item">Cerrar Sesión</a>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content-left  ml-3 header-user-info">
                            <div class="widget-heading">
                                <?= session()->get('nombre') . " " . session()->get('apellido') ?>
                            </div>
                            <div class="widget-subheading">
                                <?= session()->get('admin') == '1' ? "Administrador" : "" ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>