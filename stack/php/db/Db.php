<?php 

    $Host = "localhost";
    $User = "root";
    $Password = "";
    $Database = "pharmaviews";

    $connex = new mysqli($Host, $User, $Password, $Database);

    if($connex->connect_error){
        echo "<script>
        console.log('Erro na conexão')
        </script>";

        return;
    } else{
        echo "<script>
        console.log('Conexão feita com sucesso')
        </script>";
    }

    $sql = "CREATE TABLE IF NOT EXISTS tipo_acao(
        codigo_acao INT AUTO_INCREMENT PRIMARY KEY,
        nome_acao VARCHAR(100) NOT NULL
    );
    
    CREATE TABLE IF NOT EXISTS acao(
        id INT AUTO_INCREMENT PRIMARY KEY,
        codigo_acao INT,
        investimento DOUBLE,
        data_prevista DATE,
        data_cadastro DATE,
        FOREIGN KEY (codigo_acao) REFERENCES tipo_acao (codigo_acao)
    );";

    if($connex->multi_query($sql) == true){
        do{
            echo "<script>console.log('Tabelas criadas com sucesso.')</script>";
        } while($connex->next_result());

    } else{
        echo "Erro ao criar as tabelas." . $connex->error;
    }

?>