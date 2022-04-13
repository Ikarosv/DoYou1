<?php 
require_once "db/db_tabela.php";
if (!isset($_SESSION['nome'])) {
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DoYou | Tabela</title>
    <!-- DoYou style -->
    <link rel="stylesheet" href="assets/css/style_tabela.css">
    <link rel="stylesheet" href="assets/css/style_header.css">
    <link rel="stylesheet" href="assets/css/style_inicio.css">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
    <!-- Header -->
        <?php include_once "header.php";

        if (!$_SESSION['nome']){
            header('location: login.php');
            exit();
        }
        ?>
    <!--  -->

    <!-- AREA 1 = Acesso rápido -->
    <div class="d-flex container flex-column bgPerso my-4 p-3">
                <div class="d-flex flex-md-nowrap flex-wrap">
                <div class="order-md-0 order-2 flex-fill d-flex justify-content-between mr-2 mt-1 align-items-center">
                
                    <div class="d-flex border border-success rounded py-4 px-2">
                        <h5 class="mb-0 mx-1"> <strong class="DoYou">Saldo:</strong></h5>
                        <h5 class="mb-0">R$ <?php echo $saldo; ?></h5>
                    </div>
                    <h5 class="mb-0 mx-1"> <strong class="DoYou">Inserir</strong></h5>
                </div>
                <div class="order-md-0 order-1 borda-left pl-md-2 py-1 d-block d-flex mb-2">
                <a href="form.php?tm=1" data-toggle="tooltip" data-placement="bottom" title="Adicionar receita" class="btn btnPerso">
                        <svg xmlns="http://www.w3.org/2000/svg" height="43px" viewBox="0 0 24 24" width="43px" fill="#FFFFFF"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M13 7h-2v4H7v2h4v4h2v-4h4v-2h-4V7zm-1-5C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>
                        <h6>Receita</h6>
                    </a>
                    <a href="form.php?tm=2" data-toggle="tooltip" data-placement="bottom" title="Adicionar despesa" class="btn btnPerso">
                        <svg xmlns="http://www.w3.org/2000/svg" height="43px" viewBox="0 0 24 24" width="43px" fill="#ff6c6c">
                            <path d="M0 0h24v24H0V0z" fill="none"/><path d="M7 11v2h10v-2H7zm5-9C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/>
                        </svg>
                        <h6>Despesa</h6>
                    </a>
                
              
                </div>
                </div>
                <!-- NAV DE TABELAS -->
                    <div class="justify-content-center w-100 mt-3">
                        <nav class="nav myNav nav-tabs justify-content-md-center">
                            <a href="inicio.php" class="nav-link">Início</a>    
                            <a href="tabela.php?tt=0" class="nav-link">Geral</a>
                            <a href="tabela.php?tt=1" class="nav-link">Receitas</a>
                            <a href="tabela.php?tt=2" class="nav-link">Despesas</a>
                            <a href="grafico.php" class="nav-link">Gráficos</a>
                        </nav>
                    </div>
                <!--  -->
            </div>
        <!--  -->

    

    <!-- TABELA -->
        <div class="mx-md-5 px-lg-5 mt-2">
            <form method="post">
                <div class="form-group d-inline-flex" style="border: solid 1px #00d863;">
                <input class="d-inline-flex w-75 form-control" type="month" name="mes" id="mes" style="border-right: none;border: none;"><button class="btn myBtn" type="submit" name="pesq" style="border-radius: 0px !important; vertical-align: inherit;">Pesquisar</button>
                </div>
            </form>
            <?php if (mysqli_num_rows($query) == 0){ ?>
                <h6 class="alert alert-danger text-center">
                    Nenhum resultado
            </h6>
            <?php } ?>
            <div class="table-responsive">
                <table class="table table-striped table-bordered text-center  ">
                    <thead class="myTable bg-secondary">
                        <tr>
                            <th scope="col" class="tipo col-1">Tipo</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Valor</th>
                            <th scope="col" class="col-1">Data</th>
                            <th scope="col" class="col-2">Categoria</th>
                            <th scope="col" class="col-1"></th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php foreach($query as $r){ ?>
                        <tr style="color: <?php if($r['idTipoMov'] == "2") {echo "red";} else {echo "green";} ?>;" class="align-items-center">
                            <td scope="row" class="tipo">
                                <?php echo $r['idTipoMov'] ?>
                            </td>

                            <td>
                                <?php echo $r['descricao'] ?>
                            </td>

                            <td> 
                                <?php echo 'R$ ' . str_replace(".", ",", $r['valor']) ?>
                            </td>

                            <td> 
                                <?php echo $r['data_'] ?> 
                            </td>

                            <td> 
                                <?php echo $r['nome'] ?> 
                            </td>
                            <td>
                                <a href="movimentacao.php?tm=<?php echo $r['idTipoMov']?>&idMov=<?php echo $r['idMovimentacao'] ?>" class="btn myBtn" style="border-radius: 0px !important;  ">Editar</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    <!--  -->

    <!-- Footer -->
        <?php include_once "footer.php" ?>
    <!--  -->

    <!-- Js Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <!--  -->
</body>
</html>