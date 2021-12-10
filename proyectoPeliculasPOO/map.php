<?php

function MapObject($objeto)
{
       $alert = $objeto->getEdadMin();
        if ($alert < 12 || $alert == "TP"){
            $alert = "success";
        }elseif ($alert >= 12 && $alert < 18){
            $alert = "warning";
        }elseif ($alert == 18){
            $alert = "danger";
        }
        echo('<div class="col-sm-8 col-lg-auto">
            <div class="flex-item card">
                <img class="card-img-top" src="'.$objeto->getPortada().'">
                <div class="card-body">
                    <div class="card-title">
                        <a id="link" href="singleMovie.php?id='.$objeto->getId().'"><h5 class="text-center">'.$objeto->getNombre().' ('.$objeto->getEstreno().')</h5></a>
                    </div>
                    <div class="card-subtitle">
                        '.$objeto->getRating().' <i id="star" class="far fa-star"></i>
                    </div>
                    <div>
                        <p class="card-text text-left">'.$objeto->getDirector().'</p>
                    </div>
                    <div>
                        <p class="card-text text-left">'.$objeto->getDuracion().'h</p>
                    </div>
                    <button type="button" id="boton" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#pelicula_'.$objeto->getId().'">Actores</button>
                    <div class="modal fade" id="pelicula_'.$objeto->getId().'" tabindex="-1"
                         aria-labelledby="pelicula_'.$objeto->getId().'" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="pelicula_'.$objeto->getId().'">Actores</h5>
                                </div>
                                <div class="modal-body">
                                    <ol class="list-group">');
                                            for ($x = 0; $x < count($objeto->getActores()); $x++) {
                                                echo ('<li class="list-group-item d-flex justify-content-between align-items-center">');
                                                 echo $objeto->getActores()[$x]["nombre"];
                                                 echo('<div class="imagen-lista">');
                                                 echo('<img src="'.$objeto->getActores()[$x]["foto"].'" class="img-fluid">');
                                                 echo('</div>');
                                                 echo('</li>');
                                            }
                                echo('</ol>
                                </div>
                                <div class="modal-footer"><button type="button" class="btn btn-secondary"
                                                                  data-bs-dismiss="modal">Close</button></div>
                            </div>
                        </div>
                    </div>
                    <button type="button" id="boton2" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#categoria_'.$objeto->getId().'">Categorias</button>
                    <div class="modal fade" id="categoria_'.$objeto->getId().'" tabindex="-1"
                         aria-labelledby="categoria_'.$objeto->getId().'" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="categoria_'.$objeto->getId().'">Categorias</h5>
                                </div>
                                <div class="modal-body">
                                    <ol class="list-group">');
                                    for ($x = 0; $x < count($objeto->getCategorias()); $x++) {
                                        echo('<li class="list-group-item">');
                                        echo $objeto->getCategorias()[$x];
                                        echo('</li>');
                                    }
                                echo('</ol>
                                </div>
                                <div class="modal-footer"><button type="button" class="btn btn-secondary"
                                                                  data-bs-dismiss="modal">Close</button></div>
                            </div>
                        </div>
                    </div>
                    <p id="edad" class="alert alert-'.$alert.'">'.$objeto->getEdadMin().'</p>
                </div>
            </div>
        </div>');
}

