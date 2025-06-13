<?php $__env->startSection('content'); ?>

    <link rel="stylesheet" href="<?php echo e(asset('css/estilosFormularios.css')); ?>">
    
    <?php if(session('success')): ?>
        <div class="alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <div class="register-container">
        
        <img src="<?php echo e(asset('img/paw.svg')); ?>" alt="Logo Tienda de Mascotas" class="logo">

        <h1>Registrarse</h1>

        <form method="POST" action="<?php echo e(route('register')); ?>">
            <?php echo csrf_field(); ?>

            <label for="name">Nombre completo:</label>
            <input type="text" id="name" name="name" required autocomplete="name" autofocus>

            <label for="email">Correo electrónico:</label>
            <input type="email" id="email" name="email" required autocomplete="email">

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required autocomplete="new-password">

            <label for="password_confirmation">Confirmar contraseña:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required
                autocomplete="new-password">

            <input type="submit" value="Registrarse">
        </form>

        <div class="register-link">
            ¿Ya tienes cuenta?
            <a href="<?php echo e(route('login')); ?>">Iniciar sesión</a>
        </div>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Azahara\Desktop\tiendaMascotas\resources\views/auth/register.blade.php ENDPATH**/ ?>