

<link rel="stylesheet" href="<?php echo e(asset('css/estilosFormularios.css')); ?>">

<?php $__env->startSection('content'); ?>

<div class="login-container">

    <img src="<?php echo e(asset('img/paw.svg')); ?>" alt="Logo Tienda de Mascotas" class="logo">

    <h1>Editar usuario</h1>

    <form action="<?php echo e(route('admin.usuarios.update', $usuario->id)); ?>" method="POST" class="formulario-editar-usuario">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <label for="name">Nombre</label>
        <input id="name" type="text" name="name" value="<?php echo e(old('name', $usuario->name)); ?>" required>

        <label for="email">Correo electrónico</label>
        <input id="email" type="email" name="email" value="<?php echo e(old('email', $usuario->email)); ?>" required>

        <label for="role">Rol</label>
        <select id="role" name="role" required>
            <option value="user" <?php echo e($usuario->role == 'user' ? 'selected' : ''); ?>>Usuario</option>
            <option value="admin" <?php echo e($usuario->role == 'admin' ? 'selected' : ''); ?>>Administrador</option>
        </select>

        <input class="btn-comprar" type="submit" value="Guardar cambios">
        <a href="<?php echo e(route('admin.usuarios')); ?>" class="back-button">Volver atrás</a>
    </form>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Azahara\Desktop\tiendaMascotas\resources\views/admin/users/edit.blade.php ENDPATH**/ ?>