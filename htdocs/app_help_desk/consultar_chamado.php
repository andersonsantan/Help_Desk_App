<?php require_once "validador_acesso.php"?>


<?php 

$chamados = array();


$arquivo = fopen('../../app_help_desk/arquivo.txt', 'r');


/* 
Essa script percorre o arquivo referenciado pela variável $arquivo linha por linha a cada repetição do laço  atravé da função feof() e recupera essas linhas através da função fgets() que armazena na variável $registro essas linhas, depois o script armazena no array $chamados[] essas linhas do arquivo, a cada laço é criado um novo indice.
*/
while (!feof($arquivo)) {

 $registro = fgets($arquivo);
 $teste_id = explode('#', $registro);
   if ($teste_id[0] != $_SESSION['id'] && $_SESSION['pefil_id'] != 1) {
    unset($registro);
    continue;
   }
 $chamados[] = $registro;

}
 

fclose($arquivo);

 ?>


<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="sair.php">SAIR</a>
        </li>
      </ul>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">

              <?php foreach ($chamados as $chamado) { ?>

                <?php 

                $chamado_dados = explode('#', $chamado); 

                /*if ($_SESSION['pefil_id'] == 2) {
                    if ($_SESSION['id'] != $chamado_dados[0]) {
                      continue;
                    }
                }*/

                if (count($chamado_dados) < 3) {
                  continue;
                }
                ?>
              <div class="card mb-3 bg-light">
                <div class="card-body">
                  <h5 class="card-title"><?php echo "$chamado_dados[1]"; ?></h5>
                  <h6 class="card-subtitle mb-2 text-muted"> <?php echo "$chamado_dados[2]"; ?> </h6>
                  <p class="card-text"><?php echo "$chamado_dados[3] </br> <h6>ID Solicitante: $chamado_dados[0]</h6>"; ?></p>

                </div>
              </div>
              <?php } ?>
              <div class="row mt-5">
                <div class="col-6">
                  <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>