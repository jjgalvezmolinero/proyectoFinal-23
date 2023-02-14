<?php
function tabla_generica($datos, $cabecera) {
  ?>
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <?php
        foreach($cabecera as $titulo) {
          echo "<th scope='col'>$titulo</th>";
        }
        ?>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach($datos as $dato){
        echo "<tr>";
        $pasada = 0;
        foreach($dato as $row){
          if($pasada==0){
            echo "<td scope='row'>$row</td>";
          } else {
            echo "<td>$row</td>";
          }
          $pasada++;
        }
        echo "</tr>";
      }
      ?>
    </tbody>
  </table>
  <?php
}