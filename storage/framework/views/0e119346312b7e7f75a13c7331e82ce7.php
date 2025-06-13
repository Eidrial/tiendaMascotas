

<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/estilosFormularios.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('css/tienda.css')); ?>">

<div class="modal-container">
    <img src="<?php echo e(asset('img/paw.svg')); ?>" alt="Logo Tienda de Mascotas" class="logo">
    <h2>¿Estás seguro de que quieres eliminar este producto?</h2>
    <p class="warning-text">Esta acción no se puede deshacer.</p>

    <form action="<?php echo e(route('productos.destroy', $producto->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('DELETE'); ?>
        <input type="submit" value="SÍ" class="danger-button">
    </form>

    <a href="<?php echo e(route('user.admin')); ?>" class="back-button">NO</a>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Azahara\Desktop\tiendaMascotas\resources\views/productos/confirmar-eliminacion.blade.php ENDPATH**/ ?>