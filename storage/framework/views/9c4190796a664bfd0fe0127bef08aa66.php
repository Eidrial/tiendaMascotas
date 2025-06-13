

<link rel="stylesheet" href="<?php echo e(asset('css/tienda.css')); ?>">

<?php $__env->startSection('content'); ?>

    <div class="product-detail-container">
        <h1><?php echo e($producto->nombre); ?></h1>
        <img src="<?php echo e(asset('storage/productos/' . $producto->imagen)); ?>" alt="<?php echo e($producto->nombre); ?>"
            class="product-image">
        <p class="product-description"><?php echo e($producto->descripcion); ?></p>
        <p class="product-price"><b>Precio:</b> €<?php echo e($producto->precio); ?></p>
        <p class="product-stock"><b>Stock disponible:</b> <?php echo e($producto->stock); ?></p>
        <a href="<?php echo e(route('productos.index')); ?>" class="back-button">Volver a la lista</a>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Azahara\Desktop\tiendaMascotas\resources\views/productos/show.blade.php ENDPATH**/ ?>