<?php
class Footer {
  private array $url;
  private array $tipo;
  function __construct(array $url=null, array $tipo=null) {
    if(!is_null($url) && !is_null($tipo)){
      $this->url = $url;
      $this->tipo = $tipo;
    } else {
      $this->url = array();
      $this->tipo = array();
    }
  }

  function footer() {
    $pasada = 0;
    ?>
    <footer>
      <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
      <script src="../js/generales.js"></script>
      <?php
        foreach($this->url as $url):
          switch ($this->tipo[$pasada]):
            case "css":
              echo "<link rel = 'stylesheet' href = '$url'>";
              break;
            case "js":
              echo "<script href = '$url'></script>";
              break;
          endswitch;
          $pasada ++;
        endforeach;
      ?>
    </footer>
    <?php
  }
}