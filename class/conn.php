<?php

    class databaser
{
    private $pdo;
    //construtor
    public function __construct($dbname, $host, $usuario, $senha)
    {
        try {
            $this->pdo = new PDO("mysql:dbname=".$dbname.";host=".$host, $usuario, $senha);
        } catch (PDOException $e) {
            echo "Erro com BD: ".$e->getMessage();
        } catch (Exception $e) {
            echo "Erro: ".$e->getMessage();
        }
    }
    //função cadastar
    public function cadastrar($nome, $sobrenome, $email, $telefone, $senha)
    {
        //antes de cadastrar verificar se ja email cadastrado
        $cmd = $this->pdo->prepare("SELECT id from usuarios WHERE email = :e");
        //selecionar pelo id, ta tabela usuario onde email = e
        $cmd->BindValue(":e", $email);
        //substitue a variavel email para :e
        $cmd->execute();
        if ($cmd->rowCount() > 0) {// verifica se veio algum id pra cmd se sim o email ja foi cadastrado
            return false;
        } else {//se nao veio id
            //cadastrar
            $cmd = $this->pdo->prepare("INSERT INTO usuarios (nome, sobrenome, email, telefone, senha) values(:n, :z, :e, :t, :s) ");
            //depois de inserir passa as variaveis para o parametro
            $cmd->BindValue(":n", $nome);
            $cmd->BindValue(":z", $sobrenome);
            $cmd->BindValue(":e", $email);
            $cmd->BindValue(":t", $telefone);
            $cmd->BindValue(":s", md5($senha));
            $cmd->execute();
            return true;
        }
    }

    public function logar($email, $senha)
    {
        
        $cmd = $this->pdo->prepare("SELECT * FROM usuarios WHERE email = :e AND senha = :s");
        $cmd->bindValue(":e", $email);
        $cmd->bindValue(":s", md5($senha));
        $cmd->execute();
        if ($cmd->rowCount() > 0) {//se foi encontrado id >0 pode logar
            $dados = $cmd->fetch(PDO::FETCH_ASSOC);//transforma os parametros do banco de dados em array
         session_start();
            if ($dados['id'] == 1) {//verifica se encontrou a pessoa
               //usuario adm
                $_SESSION['id_master']  = 1;
            } else {      //usuario cadastrado
                $_SESSION['id_usuario'] = $dados['id'];
            }
            return true;//encontrou a pessoa
        } else {
            return false;// nao encontrou a pessoa
        }
    }
    public function buscarDados($id)
    {
        $cmd = $this->pdo->prepare("SELECT * FROM usuarios WHERE  id  = :id");
        $cmd->bindValue(":id", $id);
        $cmd->execute();      
        $dados = $cmd->fetch();
        return $dados;
    }

    public function buscarTodosUsuarios()
    {
        $cmd = $this->pdo->prepare("SELECT * FROM usuarios ");       
       
        $cmd->execute();
        $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $dados;
    }
    public function excluirUsuario($id)
    {
       
            $cmd = $this->pdo->prepare("DELETE FROM usuarios WHERE id = :id_c");
            $cmd->bindValue(":id_c", $id);
            $cmd->execute();
       
            
    }

    public function sugestao($a1,$a2,$a3,$a4,$a5,$a6,$a7,$a8,$a9,$a10){
        $cmd = $this->pdo->prepare("INSERT INTO sugestao (a1,a2,a3,a4,a5,a6,a7,a8,a9,a10) values(:a,:b,:c,:d,:e,:f,:g,:h,:i,:j) ");
        $cmd->bindValue(":a",$a1);
        $cmd->bindValue(":b",$a2);
        $cmd->bindValue(":c",$a3);
        $cmd->bindValue(":d",$a4);
        $cmd->bindValue(":e",$a5);
        $cmd->bindValue(":f",$a6);
        $cmd->bindValue(":g",$a7);
        $cmd->bindValue(":h",$a8);
        $cmd->bindValue(":i",$a9);
        $cmd->bindValue(":j",$a10);
        
        $cmd->execute();



        return true;
        


    }
    public function tabela1($concurso,$dia,$a1,$a2,$a3,$a4,$a5,$a6,$a7,$a8,$a9,$a10,$a11,$a12,$a13,$a14,$a15){
        $cmd = $this->pdo->prepare("INSERT INTO tabela1 (concurso,dia,a1,a2,a3,a4,a5,a6,a7,a8,a9,a10,a11,a12,a13,a14,a15) values(:concurso,:dia,:a,:b,:c,:d,:e,:f,:g,:h,:i,:j,:l,:m,:n,:o,:p) ");
        $cmd->bindValue(":concurso",$concurso);
        $cmd->bindValue(":dia",$dia);
        $cmd->bindValue(":a",$a1);
        $cmd->bindValue(":b",$a2);
        $cmd->bindValue(":c",$a3);
        $cmd->bindValue(":d",$a4);
        $cmd->bindValue(":e",$a5);
        $cmd->bindValue(":f",$a6);
        $cmd->bindValue(":g",$a7);
        $cmd->bindValue(":h",$a8);
        $cmd->bindValue(":i",$a9);
        $cmd->bindValue(":j",$a10);
        $cmd->bindValue(":l",$a11);
        $cmd->bindValue(":m",$a12);
        $cmd->bindValue(":n",$a13);
        $cmd->bindValue(":o",$a14);
        $cmd->bindValue(":p",$a15);
        $cmd->execute();


        return true;
        
    }
    public function buscartabela1()
    {
        $cmd = $this->pdo->prepare('SELECT * FROM tabela1 ORDER BY id DESC LIMIT 12');       
       
        $cmd->execute();
        $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $dados;
    }
    public function buscartabela1home()
    {
        $cmd = $this->pdo->prepare('SELECT * FROM tabela1 ORDER BY id DESC LIMIT 1');       
       
        $cmd->execute();
        $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $dados;
    }
    public function buscartabela_14biz()
    {
        $cmd = $this->pdo->prepare('SELECT * FROM sugestao ORDER BY id DESC LIMIT 1');       
       
        $cmd->execute();
        $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $dados;
    }
    public function buscartabela_sugestao1()
    {
        $cmd = $this->pdo->prepare('SELECT * FROM sugestao ORDER BY id DESC LIMIT 8');       
       
        $cmd->execute();
        $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $dados;
    }
    public function excluirComentario($id)
    {
        
            $cmd = $this->pdo->prepare("DELETE FROM tabela1 WHERE id = :id_c");
            $cmd->bindValue(":id_c", $id);
            $cmd->execute();
    }
    public function excluirSugestao($id)
    {
        
            $cmd = $this->pdo->prepare("DELETE FROM sugestao WHERE id = :id_c");
            $cmd->bindValue(":id_c", $id);
            $cmd->execute();
    }
    public function api($concurso)
    {
        $cmd = $this->pdo->prepare("SELECT * FROM tabela1 WHERE concurso = :concurso");
              
        $cmd->bindValue(":concurso", $concurso);
        $cmd->execute();
        $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $dados;
    }
        

}
?>