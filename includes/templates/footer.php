<footer class="footer seccion">
    <div class="contenedor contenedor-footer">
      <nav class="navegacion-footer">
        <a href="nosotros.php">Nosotros</a>
        <a href="contacto.php">Contacto</a>
        <a href="anuncios.php">Anuncios</a>
        <a href="blog.php">Blog</a>
      </nav>
    </div>
    <p class="copyright">Todos los derechos reservados &copy; <?php echo date('Y')?></p>
  </footer>
<body>
  <?php if ($inicio) : ?>
    <script src="../build/js/bundle.min.js"></script>
  <?php elseif ($crear) : ?>
      <script src="../../build/js/bundle.min.js"></script>
  <?php else: ?>
    <script src="./build/js/bundle.min.js"></script>
  <?php endif; ?>
</body>
</html>