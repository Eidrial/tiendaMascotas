<link rel="stylesheet" href="<?php echo e(asset('css/estilosFormularios.css')); ?>">
<?php $__env->startSection('content'); ?>

    

    <div class="login-container">
        
        <img src="<?php echo e(asset('img/paw.svg')); ?>" alt="Logo Tienda de Mascotas" class="logo">

        <h1>Iniciar Sesión</h1>

        <form method="POST" action="<?php echo e(route('login')); ?>">
            <?php echo csrf_field(); ?>

            <label for="email">Correo electrónico:</label>
            <input type="email" id="email" name="email" required autocomplete="email" autofocus>

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required autocomplete="current-password">

            <input type="submit" value="Entrar">
            <a href="<?php echo e(route('home')); ?>" class="back-button">Volver atrás</a>
        </form>

        <div class="register-link">
            ¿No tienes cuenta?
            <a href="<?php echo e(route('register')); ?>">Regístrate aquí</a>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Azahara\Desktop\tiendaMascotas\resources\views/auth/login.blade.php ENDPATH**/ ?>