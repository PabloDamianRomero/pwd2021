
</main>

    <footer class="footer mt-auto py-3 bg-dark">
        <div class="container font-montserrat">
            <h5 class="text-light">Programación Web Dinámica</h5>
            <strong class="text-light">Grupo 2: Peralta-Romero</strong>
        </div>
        <div class="container text-center">
            <?php
                if ($estructuraAMostrar == "desdeVista") {
                    echo '<a href="../../index.html" style="color: #70fd9c;">Raiz del proyecto</a>';
                }
                if ($estructuraAMostrar == "desdeAccion") {
                    echo '<a href="../../../index.html" style="color: #70fd9c;">Raiz del proyecto</a>';
                }
            ?>
        </div>
    </footer>
    <?php 
        if ($estructuraAMostrar == "desdeVista") {
            echo '<script src="js/bootstrap/bootstrap.bundle.min.js"></script>';
            echo '<script src="js/validacion.js"></script>';
            echo '<script src="js/userAndPass.js"></script>';
        }
        if ($estructuraAMostrar == "desdeAccion") {
            echo '<script src="../js/bootstrap/bootstrap.bundle.min.js"></script>';
            echo '<script src="../js/validacion.js"></script>';
            echo '<script src="../js/userAndPass.js"></script>';
        }
    ?>
</body>
</html>