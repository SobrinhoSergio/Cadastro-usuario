<?php

//--------------------CONEXÃO-------------------

try {
    $pdo = new PDO("mysql:dbname=CRUDPDO; host=localhost","root","");

} catch (PDOException $e) {
    echo "Erro com o bando de dados: ".$e->getMessage();
}
catch (Exception $e) {
    echo "Erro generico: ".$e->getMessage();
}

//--------------------INSERSÃO-------------------

//-------------------1 forma----------------:

/*$res = $pdo->prepare("INSERT INTO Pessoa(nome, telefone, email)
 VALUES (:n, :t, :e)");

//1 forma

$res->bindValue(":n", "Miriam"); //Aceita variáveis, funções
$res->bindValue(":t", "5564673838");
$res->bindValue(":e", "seila@gmail.com");

$res->execute();

//2 forma

/*$nome = "Miriam";

$res->bindParam(":n", $nome); //Aceita apenas variáveis*/


//-----------------------2 forma-----------------------:

/*$pdo->query("INSERT INTO pessoa(nome, telefone, email)
VALUES('Miriam', '34567890987', 'seila@gmail.com')");*/

//----------------DELET-------------------:

/*$cmd =  $pdo->prepare("DELETE FROM pessoa WHERE id= :id");

$id= 2;

$cmd->bindValue(":id", $id);

$cmd->execute();

//OU

$res = $pdo->query("DELETE FROM pessoa WHERE id= '3'");*/

//----------------UPTADE-------------------:

/*$cmd =  $pdo->prepare("UPDATE pessoa SET email= :e WHERE id = :id");

$cmd->bindValue(":e", "carlos@gmail.com");
$cmd->bindValue(":id", 1);

$cmd->execute();*/

//2 Forma:

//$res = $pdo->query("UPDATE pessoa SET email= 'paulo2@hotmail.com' WHERE id = '1'");

//----------------SELECT-------------------:

$cmd = $pdo->prepare("SELECT * FROM pessoa WHERE id = :id");
$cmd->bindValue(":id", 1);
$cmd->execute();

//O fetch e fetchAll serve para pegar informação que vem do BD e transformar em array

$resultado = $cmd->fetch(PDO::FETCH_ASSOC); // Exibir uma unica pessoa 

//ou

//$cmd->fetchAll(); //Mais de um registro do BD, ele não teria o "WHERE id = :id"

/*echo "<pre>";

print_r($resultado);

echo "</pre>";*/

foreach ($resultado as $key => $value) {
    echo $key.": ".$value."<br>";
}

?>