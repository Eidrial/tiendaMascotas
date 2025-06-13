

<link rel="stylesheet" href="<?php echo e(asset('css/estilosFormularios.css')); ?>">

<?php $__env->startSection('content'); ?>

    <div class="bienvenida-wrapper">
        <div class="bienvenida">

            <?php if(session('success')): ?>
                <div class="alert-success"><?php echo e(session('success')); ?></div>
            <?php endif; ?>

            <table class="tabla-usuarios">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($user->id); ?></td>
                            <td><?php echo e($user->name); ?></td>
                            <td><?php echo e($user->email); ?></td>
                            <td class="text-capitalize"><?php echo e($user->role); ?></td>
                            <td class="acciones">
                                <a href="<?php echo e(route('admin.usuarios.edit', $user->id)); ?>" class="btn-editar">Editar</a>

                                <form action="<?php echo e(route('admin.usuarios.destroy', $user->id)); ?>" method="POST"
                                    class="form-eliminar">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <input type="submit" class="btn-eliminar" value="Eliminar">
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>

            <a href="<?php echo e(url()->previous()); ?>" class="btn-volver" style="margin-top: 2rem;">← Volver atrás</a>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Azahara\Desktop\tiendaMascotas\resources\views/admin/users/index.blade.php ENDPATH**/ ?>