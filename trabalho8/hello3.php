<html>
    <body>
        <h1>Página com PHP</h1>
        <?php
        $n = $_GET["qdeParagrafos"];
        for ($i = 0; $i < $n; $i++) {
            echo "<p>Parágrafo " . ($i + 1) . "</p>";
        }
        ?>
    </body>
</html>
