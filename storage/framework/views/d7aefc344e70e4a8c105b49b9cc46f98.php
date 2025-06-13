<link rel="stylesheet" href="<?php echo e(asset('css/tienda.css')); ?>">

<?php $__env->startSection('content'); ?>

    <div class="admin-menu">
        <div class="admin-actions">
            <a href="<?php echo e(route('productos.create')); ?>" class="btn-add-product">Añadir nuevo producto</a>
            <a href="<?php echo e(route('admin.usuarios')); ?>" class="btn-add-product">Gestionar usuarios</a>
            <form action="<?php echo e(route('logout')); ?>" method="POST" class="logout-form">
                <?php echo csrf_field(); ?>
                <input type="submit" value="Cerrar sesión" class="btn-simple logout">
            </form>
        </div>
    </div>


    <h2 class="titulo"><span class="titulo__color">MASCOTITAS</span> - ADMINISTRACIÓN</h2>

    <?php if(session('success')): ?>
        <div class="alert-success">
            <?php echo e(session('success')); ?>

        </div>
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

                <div style="display: flex; gap: 0.5rem; justify-content: center; margin-top: 1rem; flex-wrap: wrap;">
                    <!-- Ver detalles -->
                    <a href="<?php echo e(route('productos.show', $producto->id)); ?>" class="btn-comprar"
                        style="width: auto; padding: 8px 18px; font-size: 0.95rem; text-transform: none;">Ver</a>
                    <!-- Editar producto -->
                    <a href="<?php echo e(route('productos.edit', $producto->id)); ?>" class="btn-comprar"
                        style="width: auto; padding: 8px 18px; font-size: 0.95rem; text-transform: none; background: linear-gradient(90deg,#aee571 0%,#b2ff59 100%); color: #2d3e50;">Editar</a>
                    <!-- Eliminar producto -->
                    <a href="<?php echo e(route('productos.confirmar', $producto->id)); ?>" class="btn-comprar"
                        style="width: auto; padding: 8px 18px; font-size: 0.95rem; text-transform: none; background: linear-gradient(90deg,#ff8585 0%,#ffb347 100%); color: #2d3e50;">Eliminar</a>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <div class="pagination">
        <?php echo e($productos->links('pagination::simple-default')); ?>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Azahara\Desktop\tiendaMascotas\resources\views/user/admin.blade.php ENDPATH**/ ?>