<?php
function tabla_generica($datos, $cabecera) {
  ?>
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col"></th>
        <?php
        $pasada = 0;
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
          if($pasada==0) {
            $pasada++;
            ?>
            <td>
              <button class="edit" data="<?php echo $row;?>"><i class="fa fa-pencil"></i></button>
              <button class="delete" data="<?php echo $row;?>"><i class='fa fa-trash'></i></button>
              <input type="hidden" name="id" value="<?php echo $row; ?>">
            </td>
            <?php
          }
          if($pasada == 1) {
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
        echo "</tr>";
      }
      ?>
    </tbody>
  </table>
  <?php
}