<?php

include "conex2x.php";

?>

<!DOCTYPE html>
<html lang="en">


<body onload="document.getElementById('doc').focus()">


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>

    <!-- Template Javascript -->
 
</body>

</html>

<div class="container" align="center">
    <fieldset class="mb-4">

        <div class="container">

            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title">propiedades</h4>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-2">
                                    <div class="col-12 col-md-9">
                                        <div class="form-outline mb-4">
                                            <label for="fec1" class="nav-link">&nbsp;<strong>servicio</strong></label>
                                            
                                            
                                            

                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-2">
                                    <div class="col-12 col-md-9">
                                        <div class="form-outline mb-4">
                                            <label for="fec2" class="nav-link">&nbsp;<strong>propiedad</strong></label>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="col-12 col-md-9">
                                        <div class="form-outline mb-4">
                                            <label for="id_usuario" class="nav-link"><strong>barrio propiedad</strong></label>
                                        
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="col-12 col-md-9">
                                        <div class="form-outline mb-4">
                                            <label for="vehiculos" class="nav-link"><strong>celualr</strong></label>
                                            <input type="name" id="cel" name="cel" class="input-text">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-2">
                                    <div class="col-12 col-md-9">
                                        <div class="form-outline mb-4">
                                            <label for="vehiculos" class="nav-link"><strong>
                                                    &nbsp;</strong></label>
                                            <button type="button" onclick="load();" class="btn btn-primary">
                                                FILTRAR</button>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col-12 col-md-2">
                                    <div class="col-12 col-md-9">
                                        <div class="form-outline mb-4">
                                            <a class="btn btn-falcon-primary me-1 mb-1" href="#"
                                                onclick="GenerarExcel()" title="Descargar informe en excel"><img
                                                    src="img/archivo-excel.png" /></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-2">
                                    <div class="col-12 col-md-9">
                                        <div class="form-outline mb-4">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-2">
                                    <div class="col-12 col-md-9">
                                        <div class="form-outline mb-4">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-2">
                                    <div class="col-12 col-md-9">
                                        <div class="form-outline mb-4">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-2">
                                    <div class="col-12 col-md-9">
                                        <div class="form-outline mb-4">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-2">
                                    <div class="col-12 col-md-9">
                                        <div class="form-outline mb-4">

                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div id="loader" class="text-center"> <img src="img/loader.gif">
                            </div>
                            <div class="outer_div"></div><!-- Datos ajax Final -->
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- Copyright End -->
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="lib/wow/wow.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/counterup/counterup.min.js"></script>
        <script src="js/report.js"></script>
        <script src="js/main.js"></script>
        <script>
        function mayus(e) {
            e.value = e.value.toUpperCase();
        }

        function minus(e) {
            e.value = e.value.toLowerCase();
        }
        </script>

        </body>