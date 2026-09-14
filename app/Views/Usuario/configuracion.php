<?= $this->extend('layouts/master') ?>
<?= $this->section('titulo') ?>Configuración<?= $this->endSection() ?>
<?= $this->section('contenido') ?>
<div class="app-page-title">
    <div class="page-title-wrapper"><div class="page-title-heading"><div class="page-title-icon"><i class="pe-7s-config icon-gradient bg-mean-fruit"></i></div><div>Configuración de cuenta<div class="page-title-subheading">Administra tus datos de acceso y perfil</div></div></div></div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-8"><div class="nexo-panel nexo-settings-panel">
        <div class="nexo-settings-hero"><img src="<?= base_url('images/nexo-avatar.svg') ?>" alt="Avatar de usuario" class="nexo-settings-avatar"><div><span class="nexo-eyebrow">Perfil personal</span><h2><?= esc($usuario['nombre'] . ' ' . $usuario['apellido']) ?></h2><p>Actualiza la información que utilizas para entrar al sistema.</p></div></div>
        <form id="configuracion-form" class="p-4">
            <?= csrf_field() ?>
            <div class="row"><div class="col-md-6 form-group"><label for="username">Nombre de usuario</label><input class="form-control" id="username" name="username" value="<?= esc($usuario['username']) ?>" required></div><div class="col-md-6 form-group"><label for="email">Correo electrónico</label><input class="form-control" id="email" name="email" type="email" value="<?= esc($usuario['email'] ?? '') ?>"></div></div>
            <div class="row"><div class="col-md-6 form-group"><label for="nombre">Nombre</label><input class="form-control" id="nombre" name="nombre" value="<?= esc($usuario['nombre']) ?>"></div><div class="col-md-6 form-group"><label for="apellido">Apellido</label><input class="form-control" id="apellido" name="apellido" value="<?= esc($usuario['apellido']) ?>"></div></div>
            <hr><h5 class="mb-3"><i class="fas fa-lock mr-2"></i>Cambiar contraseña</h5><p class="text-muted small">Deja estos campos vacíos si no deseas cambiarla.</p>
            <div class="row"><div class="col-md-4 form-group"><label for="password_actual">Contraseña actual</label><input class="form-control" id="password_actual" name="password_actual" type="password"></div><div class="col-md-4 form-group"><label for="password_nueva">Nueva contraseña</label><input class="form-control" id="password_nueva" name="password_nueva" type="password" minlength="8"></div><div class="col-md-4 form-group"><label for="password_confirmacion">Confirmar contraseña</label><input class="form-control" id="password_confirmacion" name="password_confirmacion" type="password"></div></div>
            <div id="configuracion-mensaje" class="alert d-none"></div><div class="text-right"><button class="btn btn-primary" type="submit"><i class="fas fa-save mr-2"></i>Guardar cambios</button></div>
        </form>
    </div></div>
</div>
<?= $this->endSection() ?>
<?= $this->section('scripts') ?><script>
$('#configuracion-form').on('submit', function (event) { event.preventDefault(); var form = $(this); var mensaje = $('#configuracion-mensaje'); $.ajax({ type: 'POST', url: '<?= base_url('configuracion/actualizar') ?>', data: form.serialize(), dataType: 'json', success: function (respuesta) { mensaje.removeClass('d-none alert-danger alert-success').addClass(respuesta.error ? 'alert-danger' : 'alert-success').text(respuesta.error ? Object.values(respuesta.error).join(' ') : respuesta.success); if (!respuesta.error) { $('#password_actual, #password_nueva, #password_confirmacion').val(''); } } }); });
</script><?= $this->endSection() ?>