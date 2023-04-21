<?php
function tabla_generica($datos, $cabecera, $acciones = true, $acciones_custom = "") {
  $id = 0;
  ?>
  <div class="tablaGeneral">
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <?php
          if($acciones) echo "<th scope='col'></th>";
          ?>
          <?php
          $pasada = 0;
          foreach($cabecera as $titulo) {
            echo "<th scope='col'>$titulo</th>";
          }
          if($acciones_custom != "") {
            echo "<th scope='col'></th>";
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
            if($pasada==0) {
              $pasada++;
              if(!$acciones) continue;
              $id = $row;
              ?>
              <td>
                <button class="edit" data-edit="<?php echo $row;?>"><i class="fa fa-pencil"></i></button>
                <button class="delete" data-delete="<?php echo $row;?>"><i class='fa fa-trash'></i></button>
                <input type="hidden" name="id" value="<?php echo $row; ?>">
              </td>
              <?php
            }
            if($pasada == 1 && $acciones) {
              $pasada++;
              continue;
            }
            if($pasada==2){
              echo "<td scope='row'>$row</td>";
            } else {
              echo "<td>$row</td>";
            }
            $pasada++;
          }
          if($acciones_custom != "") {
            echo "<td>";
            echo $acciones_custom;
            echo "</td>";
          }
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
  <?php
}