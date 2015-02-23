<?php
/**
 * Copyright (C) 2013 peredur.net
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
include 'conf/db.php';

sec_session_start();
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Champions League 2015</title>
<style>
  th {
    text-align: center !important;
  }
  td {
    line-height: 35px !important;
    vertical-align: middle !important; 
    text-align: center !important;
  }
  td img {
    width: 35px;
  }
  tr {
    text-align: center;
  }
</style>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Champions League 2015</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="/">Inicio</a></li>
            <li><a href="/partidos.php">Partidos</a></li>
            <li><a href="/pronosticos.php">Pronósticos</a></li>
            <li class="active"><a href="/tabla.php">Tabla</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav><br><br><br><br>

  <div class="container" style="max-width: 700px;">
    <div class="starter-template">
      <?php if (login_check($mysqli) == true) : ?>

      <div class="panel panel-primary" style="max-width: 600px; margin: 0 auto;">
    <!-- Default panel contents -->
        <div class="panel-heading">Tabla General</div>
        <div class="panel-body"></div>
        <!-- Table -->

        <table class='table'>
          <thead><tr>
            <th>Nombre</th>
            <th>Resultados</th>
            <th>Marcadores</th>
            <th>Pts</th>
          </tr></thead>
          <tbody>
              <?php
              $i = 0;
              $sql = "SELECT * FROM tabla ";
              $result = mysqli_query($conn, $sql);
              if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_array($result))
            {
                $i++;

                echo "<tr><td>";
                if( $i == 1){ echo "<i style='color: #C0C0C0' class='fa fa-trophy fa-2x'></i> ";};
                echo  $row['nombre'] .
                      "</td><td>". $row['resultados'] . "</td>" .
                      "<td>". $row['marcadores'] . "</td>" .
                      "<td>". $row['pts_totales'] . " </td></tr>" ;
              } ; } else {
                echo "<br>Sin Resultados";
              };
                //$conn->close(); // Cerrar DB
                ?>
          </tbody>
        </table>
      </div>
    <?php else : ?>
        <p>
          <div class="alert alert-danger" role="alert" style="text-align:center">
          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
          <span class="sr-only">Error:</span>
          No estás autorizado para ver esta página.<br>
          Por favor <a href="login.php">ingresa a tu cuenta</a>
          </div>
        </p>
    <?php endif; ?>

    </div>
  </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

  </body>
