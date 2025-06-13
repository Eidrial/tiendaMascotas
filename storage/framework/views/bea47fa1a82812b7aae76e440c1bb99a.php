

<?php $__env->startSection('content'); ?>

    <link rel="stylesheet" href="<?php echo e(asset('css/tienda.css')); ?>">
    <div class="bienvenida-wrapper">
        <div class="bienvenida">
            <h1>Bienvenido a la página de <span class="nombre"><b>Mascotitas</b></span>, la tienda para los amantes de los
                animales</h1>
            <a href="<?php echo e(route('login')); ?>">LOGUEARSE</a>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Azahara\Desktop\tiendaMascotas\resources\views/home.blade.php ENDPATH**/ ?>