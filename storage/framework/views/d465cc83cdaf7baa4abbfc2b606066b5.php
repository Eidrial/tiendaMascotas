

<link rel="stylesheet" href="<?php echo e(asset('css/estilosFormularios.css')); ?>">

<?php $__env->startSection('content'); ?>

    <div class="product-form-container">
        <h1>Editar producto</h1>
        <form action="<?php echo e(route('productos.update', $producto->id)); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <label for="nombre">Nombre del producto:</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo e($producto->nombre); ?>" required>

            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" required><?php echo e($producto->descripcion); ?></textarea>

            <label for="precio">Precio (€):</label>
            <input type="number" id="precio" name="precio" value="<?php echo e($producto->precio); ?>" required step="0.01" min="0">

            <label for="stock">Stock:</label>
            <input type="number" id="stock" name="stock" value="<?php echo e($producto->stock); ?>" required min="0">

            <label for="imagen">Imagen del producto:</label>
            <input type="file" id="imagen" name="imagen" accept="image/*">

            <input type="submit" value="Actualizar Producto">
            <a href="<?php echo e(route('productos.index')); ?>" class="back-button">Volver a la lista</a>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Azahara\Desktop\tiendaMascotas\resources\views/productos/edit.blade.php ENDPATH**/ ?>