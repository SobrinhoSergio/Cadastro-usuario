<?php

require_once 'classe/Pessoa.php';
$p = new Pessoa("crudpessoa", "localhost", "root", "");

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Pessoas</title>
    <link rel="stylesheet" href="style/main.css">
</head>
<body>

<?php

    if(isset($_POST['nome'])){ //CLICOU NO BOTÃO CADASTRAR OU EDITAR


        //---------------------EDITAR--------------------------
        if(isset($_GET['id_up']) && !empty($_GET['id_up'])){

            $id_upd = addslashes($_GET['id_up']);
            $nome = addslashes($_POST['nome']);
            $telefone = addslashes($_POST['telefone']);
            $email = addslashes($_POST['email']);
    
            if(!empty($nome) && !empty($telefone) && !empty($email)){
    
                $p->atualizarDados($id_upd, $nome, $telefone, $email);

                header('location: index.php');
                    
            }
    
    
            else{

                ?>

                <div class="aviso"> 
                    <img src="imagens/aviso.png">
                    <h4>Preencha todos os Campos!</h4>
                </div>

                <?php
                
               
            }

        }
        //-----------------------CADASTRAR-----------------------
        else{

            $nome = addslashes($_POST['nome']);
            $telefone = addslashes($_POST['telefone']);
            $email = addslashes($_POST['email']);
    
            if(!empty($nome) && !empty($telefone) && !empty($email)){
    
                if(!$p->cadastrarPessoa($nome, $telefone, $email)){

                ?>

                <div class="aviso"> 
                    <img src="imagens/aviso.png">
                    <h4>O email já está cadastrado!</h4>
                </div>

                <?php
                    
                }
    
            }
    
            else{
    
                ?>

                <div class="aviso"> 
                    <img src="imagens/aviso.png">
                    <h4>Preencha todos os Campos!</h4>
                </div>

                <?php
            }


        }

    }  

?>

<?php

    if(isset($_GET['id_up'])){ //SE A PESSOA CLICOU EM EDITAR

        $id_update = addslashes($_GET['id_up']);
        $res = $p->buscarDadosPessoa($id_update);

    }    

?>

<section id="left">
    
    <form method="POST">
        <h2>CADASTRAR PESSOA</h2>
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" value="<?php if(isset($res)){ echo $res['nome']; } ?>">
        <label for="telefone">Telefone</label>
        <input type="text" name="telefone" id="telefone" value="<?php if(isset($res)){ echo $res['telefone']; } ?>">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="<?php if(isset($res)){ echo $res['email']; } ?>">
        <input type="submit" value="<?php if(isset($res)){ echo "Atualizar"; } else{ echo "Cadastrar"; } ?>">

    </form>

</section>

<section id="right">
    
    <table>

        <tr id="titulo">
            
            <td>NOME</td>
            <td>TELEFONE</td>
            <td colspan="2">EMAIL</td>
        
        </tr>

    <?php

        $dados = $p->buscarDados();

        if(count($dados)>0){

            $i = 0;
            while($i<count($dados)){

                echo "<tr>";

                foreach($dados[$i] as $key => $value){

                    if($key != "id"){

                        echo "<td>".$value."</td>";

                    }

                }
                ?>

                <td>
                    <a href="index.php?id_up=<?php echo $dados[$i]['id']; ?>">Editar</a>
                    <a href="index.php?id=<?php echo $dados[$i]['id']; ?>">Excluir</a>
                </td>
                
                <?php

                echo "</tr>";

                $i++;
            }
        
        }

        else{

        ?>

    </table>

    <div class="aviso">
        <h4> Ainda não há pessoas cadastradas! </h4>
    </div>

    <?php

    }

    ?>

</section>

 
</body>
</html>


<?php

        if(isset($_GET['id'])){

            $id_pessoa = addslashes($_GET['id']);

            $p->excluirPessoa($id_pessoa);
            header("location: index.php");
        }

?>