
<link rel="stylesheet" href="<?php echo e(asset('css/tienda.css')); ?>">

<?php $__env->startSection('content'); ?>

    <form action="<?php echo e(route('logout')); ?>" method="POST" class="logout-form">
            <?php echo csrf_field(); ?>
            <input type="submit" value="Cerrar sesión" class="btn-simple logout">
    </form>

    <h2 class="titulo"><span class="titulo__color">MASCOTITAS</span> - TIENDA ONLINE</h2>

    <?php if(session('success')): ?>
        <div class="alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>


    <div class="grid-productos">
        <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card-producto">
                <img src="<?php echo e(asset('storage/productos/' . $producto->imagen)); ?>" alt="<?php echo e($producto->nombre); ?>">
                
                <div class="contenido">
                    <h3><?php echo e($producto->nombre); ?></h3>
                    <p><?php echo e($producto->descripcion); ?></p>
                    <p>
                        <?php if($producto->stock > 0): ?>
                            <span class="stock">Stock disponible:</span> <?php echo e($producto->stock); ?>

                        <?php else: ?>
                            <span class="sin-stock">No hay stock disponible</span>
                        <?php endif; ?>
                    </p>
                    <p><b><?php echo e($producto->precio); ?> €</b></p>
                </div>

                <form action="<?php echo e(route('productos.comprar', $producto->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="submit" class="btn-comprar" 
                           value="<?php echo e($producto->stock > 0 ? 'Comprar' : 'Sin stock'); ?>" 
                           <?php echo e($producto->stock <= 0 ? 'disabled' : ''); ?>>
                </form>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <div class="pagination">
        <?php echo e($productos->links('pagination::simple-default')); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Azahara\Desktop\tiendaMascotas\resources\views/user/user.blade.php ENDPATH**/ ?>