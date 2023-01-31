<?php
class Header {
  private array $url;
  private array $tipo;
  private string $favicon = "../img/logo.svg";

  function __construct(array $url=null, array $tipo=null) {
    if(!is_null($url) && !is_null($tipo)){
      $this->url = $url;
      $this->tipo = $tipo;
    } else {
      $this->url = array();
      $this->tipo = array();
    }
  }

  public function headerBasico() {
    $pasada = 0;
    ?>
    <head>
      <link rel="shortcut icon" href="<?php echo $this->favicon; ?>" type="image/x-icon">
      <title>Cooperativa</title>
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
          $pasada++;
        endforeach;
      ?>
    </head>
    <?php
  }
}