<?= $this->extend('layouts/master') ?>

<?= $this->section('titulo') ?>Inicio<?= $this->endSection() ?>

<?= $this->section('contenido') ?>
<div class="nexo-welcome">
    <div>
        <span class="nexo-eyebrow"><i class="fas fa-chart-line"></i> Resumen operativo</span>
        <h1>Todo tu inventario, en orden.</h1>
        <p>Consulta el estado del negocio y actúa antes de que falte producto.</p>
    </div>
    <a class="btn btn-primary btn-lg nexo-action" href="<?= base_url('vender') ?>"><i class="fas fa-cash-register mr-2"></i>Nueva venta</a>
</div>

<div class="nexo-stat-grid">
    <div class="nexo-stat nexo-stat-sales"><i class="fas fa-coins"></i><div><span>Ventas del mes</span><strong id="ventas">$0</strong><small>Ingresos registrados</small></div></div>
    <div class="nexo-stat nexo-stat-client"><i class="fas fa-user-check"></i><div><span>Clientes activos</span><strong id="clientes">0</strong><small>Personas registradas</small></div></div>
    <div class="nexo-stat nexo-stat-provider"><i class="fas fa-truck"></i><div><span>Proveedores</span><strong id="provedores">0</strong><small>Aliados comerciales</small></div></div>
    <div class="nexo-stat nexo-stat-cost"><i class="fas fa-box-open"></i><div><span>Abastecimiento</span><strong id="gastos">$0</strong><small>Gastos del mes</small></div></div>
    <div class="nexo-stat nexo-stat-catalog"><i class="fas fa-cubes"></i><div><span>Productos en catálogo</span><strong id="total-productos">0</strong><small>Referencias activas</small></div></div>
    <div class="nexo-stat nexo-stat-units"><i class="fas fa-layer-group"></i><div><span>Unidades disponibles</span><strong id="unidades-disponibles">0</strong><small>Existencias actuales</small></div></div>
    <div class="nexo-stat nexo-stat-alert"><i class="fas fa-exclamation-triangle"></i><div><span>Alertas de stock</span><strong id="alertas-stock">0</strong><small>Requieren revisión</small></div></div>
</div>

<div class="row">
    <div class="col-lg-7 mb-4">
        <div class="nexo-panel h-100">
            <div class="nexo-panel-heading"><div><span class="nexo-eyebrow">Atención prioritaria</span><h2>Productos con stock crítico</h2></div><a href="<?= base_url('producto') ?>">Ver catálogo <i class="fas fa-arrow-right"></i></a></div>
            <div class="table-responsive"><table class="table nexo-table mb-0"><thead><tr><th>Producto</th><th class="text-center">Existencias</th><th class="text-center">Mínimo</th><th></th></tr></thead><tbody id="productos-criticos"><tr><td colspan="4" class="text-center">Cargando información...</td></tr></tbody></table></div>
        </div>
    </div>
    <div class="col-lg-5 mb-4">
        <div class="nexo-panel nexo-guide h-100"><span class="nexo-eyebrow">Accesos rápidos</span><h2>¿Qué necesitas hacer?</h2>
            <a href="<?= base_url('producto') ?>"><i class="fas fa-boxes"></i><span><strong>Gestionar productos</strong><small>Actualiza precios y existencias</small></span><i class="fas fa-chevron-right"></i></a>
            <a href="<?= base_url('persona') ?>"><i class="fas fa-address-book"></i><span><strong>Ver clientes y proveedores</strong><small>Mantén tus contactos al día</small></span><i class="fas fa-chevron-right"></i></a>
            <a href="<?= base_url('venta') ?>"><i class="fas fa-receipt"></i><span><strong>Consultar ventas</strong><small>Revisa tus operaciones recientes</small></span><i class="fas fa-chevron-right"></i></a>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?><script src="<?= base_url('js/Home/home.js') ?>"></script><?= $this->endSection() ?>
<?= $this->section('modals') ?><div class="viewmodal"></div><?= $this->endSection() ?>
