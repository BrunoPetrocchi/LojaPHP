<?php

namespace core\classes;

use PDO;
use PDOException;

class Database
{

    private $ligacao;

    //=======================================================
    private function conectar()
    {
        // conexao com o banco de dados
        $this->ligacao = new PDO(
            'mysql:' .
                'host=' . MYSQL_SERVER . ';' .
                'dbname=' . MYSQL_DATABASE . ';' .
                'charset=' . MYSQL_CHARSET,
            MYSQL_USER,
            MYSQL_PASS,
            array(PDO::ATTR_PERSISTENT => true)
        );

        $this->ligacao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }
    //=======================================================

    private function desconectar()
    {
        // desconectar banco de dados
        $this->ligacao = null;
    }
    //=======================================================

    // $sql, $parametros organizando para prevenir SQLINJECTION
    public function select($sql, $parametros = null)
    {
        // verifica se é um select
        // no if abaixo verifica se o select é Maius ou min
        if (!preg_match("/^SELECT/i", $sql)) {
            die('Base de Dados - Opção invalida');
        }


        $this->conectar();

        $resultados = null;

        try {
            if (!empty($parametros)) {
                $executar = $this->ligacao->prepare($sql);
                $executar->execute($parametros);
                $resultados = $executar->fetchAll(PDO::FETCH_CLASS);
            } else {
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();
                $resultados = $executar->fetchAll(PDO::FETCH_CLASS);
            }
        } catch (PDOException $e) {

            return false;
        }

        $this->desconectar();
        return $resultados;
    }

    //=======================================================
    public function insert($sql, $parametros = null)
    {
        // verifica se é um INSERT
        if (!preg_match("/^INSERT/i", $sql)) {
            die('Base de Dados - Opção invalida');
        }

        $this->conectar();


        try {
            if (!empty($parametros)) {
                $executar = $this->ligacao->prepare($sql);
                $executar->execute($parametros);
            } else {
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();
            }
        } catch (PDOException $e) {

            return false;
        }

        $this->desconectar();
    }

    //=======================================================
    public function update($sql, $parametros = null)
    {
        // verifica se é um UPDATE
        if (!preg_match("/^UPDATE/i", $sql)) {
            die('Base de Dados - Opção invalida');
        }

        $this->conectar();


        try {
            if (!empty($parametros)) {
                $executar = $this->ligacao->prepare($sql);
                $executar->execute($parametros);
            } else {
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();
            }
        } catch (PDOException $e) {

            return false;
        }
        $this->desconectar();
    }

    //=======================================================
    public function delete($sql, $parametros = null)
    {
        // verifica se é um DELETE
        if (!preg_match("/^DELETE/i", $sql)) {
            die('Base de Dados - Opção invalida');
        }

        $this->conectar();


        try {
            if (!empty($parametros)) {
                $executar = $this->ligacao->prepare($sql);
                $executar->execute($parametros);
            } else {
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();
            }
        } catch (PDOException $e) {

            return false;
        }
        $this->desconectar();
    }

    //=======================================================
    public function statment($sql, $parametros = null)
    {
        // verifica se é igual as instrucoes anteriores
        if (preg_match("/^(SELECT|INSERT|UPDATE|DELETE)/i", $sql)) {
            die('Base de Dados - Opção invalida');
        }

        $this->conectar();


        try {
            if (!empty($parametros)) {
                $executar = $this->ligacao->prepare($sql);
                $executar->execute($parametros);
            } else {
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();
            }
        } catch (PDOException $e) {

            return false;
        }
        $this->desconectar();
    }
};
