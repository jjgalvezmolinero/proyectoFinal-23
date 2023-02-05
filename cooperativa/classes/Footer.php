<?php
class Footer {
  private array $js;
  private array $css;
  function __construct(array $js=null, array $css=null) {
    if(!is_null($js) && !is_null($css)){
      $this->js = $js;
      $this->css = $css;
    } else {
      $this->js = array();
      $this->css = array();
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
        foreach($this->js as $js):
          echo "<script src = '$js'></script>";
        endforeach;
        foreach($this->css as $css):
          echo "<link rel = 'stylesheet' href = '$css'>";
        endforeach;
      ?>
    </footer>
    <?php
  }
}