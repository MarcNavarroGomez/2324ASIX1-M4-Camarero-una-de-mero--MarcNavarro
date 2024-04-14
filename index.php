<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/3bc5094caf.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel ="stylesheet" href="./css/styles.css">
    <title>Cordelius Burger's</title>
</head>
<body>
    <?php
        // Cargar el archivo XML
        if(file_exists('./xml/platos.xml')){
            $platos = simplexml_load_file('./xml/platos.xml');
        } else {
            exit('Error abriendo platos.xml');
        }
    ?>

    <!-- Barra de navegación -->
    <div class="container-fluid justify-content-center">
    <nav class="navbar navbar-expand-lg bg-black navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand navbar-light" href="#">Cordelius Burguer's</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            </ul>
        </div>
    </div>
    </nav>

    <!-- Carousel -->
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./hamburguesas/banner1.webp" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="./hamburguesas/banner2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="./hamburguesas/banner3.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="titulo">
<h2>LAS MEJORES BURGUERS AQUÍ</h2>
    </div>
<br>
    <div class="iconos">
        <p><i class="fas fa-seedling"></i>= Contiene gluten</p>
        <p><i class="fa-solid fa-egg"></i>= Contiene huevo</p>
        <p><i class="fa-solid fa-cheese"></i>>= Contiene queso</p>
        <p><i class="fa-solid fa-leaf"></i>= Contiene verduras</p>
        <p><i class="fa-solid fa-pepper-hot"></i>= Contiene picante</p>
        <i class="fa-solid fa-bacon"></i>>= Contiene bacon</p>
    </div>

    <!-- Contenido de platos -->
    <div class="container mt-5 ">
        <div class="row">
            <?php
            // Mostrar los platos según la opción seleccionada
            foreach ($platos->plato as $fila) {
                echo '<div class="col-md-4 mb-4">';
                echo '<div class="card plato-card-gris">';
                echo '<img src="' . $fila->imagen . '" class="card-img-top" alt="Imagen del plato">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $fila->title . '</h5>';
                echo '<p class="card-text">' . $fila->description . '</p>';
                echo '<p class="card-text">' . $fila->calorias . '</p>';
                echo '<p class="card-text">' . $fila->precio . '</p>';
                if(isset($fila->caracteristicas->item['tipo1']) && $fila->caracteristicas->item['tipo1'] == 'glutenfree'){
                    echo '<div class="dish-icon" title="Libre de gluten"><i class="fas fa-seedling"></i></div>';
                  }
                  if(isset($fila->caracteristicas->item['tipo2']) && $fila->caracteristicas->item['tipo2'] == 'huevo'){
                    echo '<div class="icon" title="Contiene huevo"><i class="fa-solid fa-egg"></i></div>';
                  }
                  if(isset($fila->caracteristicas->item['tipo3']) && $fila->caracteristicas->item['tipo3'] == 'queso'){
                    echo '<div class="icon" title="Contiene queso"><i class="fa-solid fa-cheese"></i></div>';
                  }
                  if(isset($fila->caracteristicas->item['tipo4']) && $fila->caracteristicas->item['tipo4'] == 'verduras'){
                    echo '<div class="icon" title="Contiene verduras"><i class="fa-solid fa-leaf"></i></div>';
                  }
                  if(isset($fila->caracteristicas->item['tipo5']) && $fila->caracteristicas->item['tipo5'] == 'picante'){
                    echo '<div class="icon" title="Picante"><i class="fa-solid fa-pepper-hot"></i></div>';
                  }
                  if(isset($fila->caracteristicas->item['tipo6']) && $fila->caracteristicas->item['tipo6'] == 'bacon'){
                    echo '<div class="icon" title="bacon"><i class="fa-solid fa-bacon"></i></div>';
                  }
                echo '</div>'; 
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

