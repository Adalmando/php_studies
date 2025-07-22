<?php

// mysqli
$servidor = "localhost";
$usuario = "root";
$senha = "mysql";
$database = "aula_php";

$conexao = NULL;

// Criando a conexao com o banco de dados
try{
    $conexao = mysqli_connect($servidor, $usuario, $senha, $database);  
    echo "Conectado com sucesso ao banco de dados $database";  

} catch (mysqli_sql_exception $e) {
        echo "Erro ao conectar ao banco de dados $database: <br><br>" . $e->getMessage();
    }

// dessa forma a query vai ser executada assim que eu executar esse codigo (atualizar a pagina)
function rodarScriptSql($query) {
    
    global $conexao;
    
    try{
        mysqli_query($conexao, $query);
        echo "<br><br>Query realizada com sucesso!";
    } catch(mysqli_sql_exception $e) {
        echo "<br><br>Erro ao executar query SQL! <br>" . $e->getMessage();
    }
}

// Criando tabela no banco de dados:
$query_apaga_tabela_cursos = "DROP TABLE IF EXISTS CURSOS;";

$query_cria_cursos = "CREATE TABLE IF NOT EXISTS CURSOS (
    id_curso int not null auto_increment,
    nome_curso varchar(250) not null, 
    carga_horaria int not null,
    primary key(id_curso)
);";

$query_cria_alunos = "CREATE TABLE IF NOT EXISTS ALUNOS (
    id_aluno int not null auto_increment,
    nome_aluno varchar(250) not null, 
    data_nascimento varchar(30) not null,
    primary key(id_aluno)
);";

$query_cria_alunos_cursos = "CREATE TABLE IF NOT EXISTS ALUNOS_CURSOS (
    id_aluno_curso int not null auto_increment,
    id_aluno int not null,
    id_curso int not null,
    nome_aluno varchar(250) not null, 
    data_nascimento varchar(30) not null,
    primary key(id_aluno_curso)
);";



// Inserindo dados na tabela:
$query_inserir_alunos = "INSERT INTO ALUNOS (NOME_ALUNO, DATA_NASCIMENTO) VALUES ('Maria', '12-01-2005')";



// Apagando dados do banco:
$query_deletar_alunos = "DELETE FROM ALUNOS WHERE ID_ALUNO = 1";
$query_deletar_alunos2 = "DELETE FROM ALUNOS WHERE NOME_ALUNO = 'Jose'";




// Modificando registros de uma tabela do banco de dados:
$query_atualizar_alunos = "UPDATE ALUNOS SET NOME_ALUNO = 'Fulano de Tal' WHERE NOME_ALUNO LIKE '%Maria%'";
$query_atualizar_alunos2 = "UPDATE ALUNOS SET NOME_ALUNO = 'Adalmando Araujo' WHERE NOME_ALUNO LIKE '%Adal%'";



// COMANDO PARA MODIFICAR UMA TABELA (Não seus dados mas a estrutura da tabela):
$query_modificar_tabela = "ALTER TABLE ALUNOS CHANGE data_nascido data_nascimento VARCHAR(30) NOT NULL";
//rodarScriptSql($query_modificar_tabela);



// Selecionar tudo de uma tabela:
$query_selecionar_alunos = "SELECT * FROM ALUNOS;";
$consulta = mysqli_query($conexao, $query_selecionar_alunos); // Faz a query no MySQL
$dados = mysqli_fetch_all($consulta, MYSQLI_ASSOC); // Retorna um array com todas as linhas da consulta

// Para cada resultado da consulta geral, ela printa os dados de cada linha por vez nesse loop:
// foreach($dados as $linha){
//     echo "\n-id: " . $linha['id_aluno'], " -nome: " . $linha['nome_aluno'], " -data_nascimento: " .$linha['data_nascimento'];
// }



// CONSULTA COM CONDICIONAIS EM MYSQL:
$query_selecionar_alunos_com_nome_comecando_por_a = "SELECT * FROM ALUNOS WHERE nome_aluno LIKE 'a%'"; // Busca todos no banco que o nome começa com A
$consulta2 = mysqli_query($conexao, $query_selecionar_alunos_com_nome_comecando_por_a);
$dados2 = mysqli_fetch_all($consulta2, MYSQLI_ASSOC); // Transforma os resultados da query em um array

// Para cada resultado da consulta geral, ela printa os dados de cada linha por vez nesse loop:
foreach($dados2 as $linha){
    echo "\n-id: " . $linha['id_aluno'], " -nome: " . $linha['nome_aluno'], " -data_nascimento: " .$linha['data_nascimento'];
} 