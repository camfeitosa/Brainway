
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Loja</title>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <style>
    .container {
      display: inline;
    }

    h3 {
      text-align: center;
      font-size: 20px;
      margin-bottom: 20px;

    }

    .product {
      background-color: #efefef;
      width: 140px;
      height: 210px;
      padding: 10px;
      display: inline-block; /* Adicione esta linha */
      margin: 1px; /* Espaçamento entre os produtos */
      position: relative;
      left: 40px;
    }

    .img-inventario{
      margin: auto;
      display: block;
    }

    /* img{
      background-color: #111;
    } */
    p{
      text-align: center;
    }

    h1{
      text-align: center;
      font-family: Arial, Helvetica, sans-serif;
    }
    .btn-inventario{
      cursor: pointer;
      border: none;
      border-radius: 5px;
      background: #2D99DA;
      color: #ffffff;
      padding: 3px 10px;
      margin: auto;
      display: block;
      transition: all 0.3s ease 0s;
    }
.btn-inventario:hover{
  background-color: #45AAF2;
}
    @media (max-width: 984px) {
      .product {
        width: 30%; /* Defina a largura para 100% para ocupar toda a largura da tela */
        margin: 5px; /* Espaçamento menor */
        position: relative;
        left: 50px;
      }
    }

  </style>
</head>

<body>

<div class="all">
  
  <!-- <h1>Inventário</h1> -->

  
    <!-- Botão para acionar modal -->
    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalExemplo">

    </button> -->

    <!-- Modal -->
    <div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Inventário</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                   
<?php
// session_start();
include('config/conexao.php');

$id_usuario = $_SESSION['id_user'];

$query = "SELECT id_avatar from compra WHERE id_user = '$id_usuario';";
$resultado = mysqli_query($conexao, $query);

// Verifica se foi encontrado e a exibe
if ($resultado->num_rows > 0) {
  while ($row = $resultado->fetch_assoc()) {
  $id_av = $row['id_avatar'];


  $query1 = "SELECT id_avatar, nome, caminho from avatar WHERE id_avatar = '$id_av'";
  $resultado1 = mysqli_query($conexao, $query1);


  if ($resultado1->num_rows > 0) {
  while ($row = $resultado1->fetch_assoc()) {
$cr = "pages/loja/" . $row['caminho'];
      echo '<div class="container">';
      echo '<div class="product">';
      echo '<img src="' . $cr . '" alt="' . $row['nome'] . '" width="100" class="img-inventario">';
      echo '<h3>' . $row['nome'] . '</h3>';
      echo '<form method="post" action="pages/inventario/selecionar.php">';
      echo '<input type="hidden" name="caminho" value="' . $row['caminho'] . '">
      <button class="btn-inventario" type="submit">Selecionar</button>
      </form> <br>';
      echo '</div>';
      echo '</div>';
  }
}
  }
} else {
  echo "Nenhum avatar encontrado.";
}

?>
                </div>
                <div class="modal-footer">
                    <input type="submit" value="Fechar" class="btn btn-secondary" data-dismiss="modal">
                    </form>


                </div>
            </div>
        </div>
    </div>
  
</div>
</body>

</html>
