<?php
class Conteudos {
    private $pdo;

    public function __construct($dbname, $host, $user, $senha) {
        try {
            $this->pdo = new PDO("mysql:dbname=".$dbname.";host=".$host, $user, $senha);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Para tratamento de erros no PDO
        } catch (PDOException $e) {
            die("Erro com banco de dados: " . $e->getMessage()); // Melhor interromper a execução se a conexão falhar
        }
    }

    public function buscaCard() {
        try {
            $cmd = $this->pdo->query("SELECT * FROM card ORDER BY titulo");
            return $cmd->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return []; // Retorna um array vazio em caso de erro
        }
    }

    public function cadastrar($titulo, $conteudo) {
        try {
            $cmd = $this->pdo->prepare("SELECT id FROM card WHERE titulo = :t");
            $cmd->bindValue(":t", $titulo);
            $cmd->execute();
            if ($cmd->rowCount() > 0) {
                return false; // Título já cadastrado
            } else {
                $cmd = $this->pdo->prepare("INSERT INTO card (titulo, conteudo) VALUES (:t, :c)");
                $cmd->bindValue(":t", $titulo);
                $cmd->bindValue(":c", $conteudo);
                $cmd->execute();
                return true; // Cadastro realizado
            }
        } catch (PDOException $e) {
            return false; // Falha no cadastro
        }
    }

    public function excluir($id) {
        try {
            $cmd = $this->pdo->prepare("DELETE FROM card WHERE id = :id");
            $cmd->bindValue(":id", $id);
            $cmd->execute();
            return true; // Excluído com sucesso
        } catch (PDOException $e) {
            return false; // Falha na exclusão
        }
    }

    public function editar($id) {
        try {
            $cmd = $this->pdo->prepare("SELECT * FROM card WHERE id = :id");
            $cmd->bindValue(":id", $id);
            $cmd->execute();
            return $cmd->fetch(PDO::FETCH_ASSOC); // Retorna os dados para edição
        } catch (PDOException $e) {
            return null; // Falha ao buscar os dados
        }
    }

    public function atualizar($id, $titulo, $conteudo) {
        try {
            $cmd = $this->pdo->prepare("UPDATE card SET titulo = :t, conteudo = :c WHERE id = :id");
            $cmd->bindValue(":t", $titulo);
            $cmd->bindValue(":c", $conteudo);
            $cmd->bindValue(":id", $id);
            $cmd->execute();
            return true; // Atualização bem-sucedida
        } catch (PDOException $e) {
            return false; // Falha na atualização
        }
    }
}
