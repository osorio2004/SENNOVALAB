<?php

namespace App\Models;

use PDO;
use PDOException;

require_once MAIN_APP_ROUTE . "../models/BaseModel.php";

class UsuarioModel extends BaseModel
{
    public function __construct(
        ?int $idUsuario = null,
        ?string $nombre = null,
        ?string $apellido = null,
        ?string $correoElectronico = null,
        ?string $contraseña = null,
        ?int $idRol = null
    ) {
        $this->table = "usuario"; // Verifica que la tabla se llama exactamente así en la BD
        parent::__construct();
    }

    public function saveUsuario($nombre, $apellido, $correoElectronico, $contraseña, $idRol)
    {
        try {
            if (!$this->dbConnection) {
                echo "Error: No hay conexión a la base de datos.";
                return;
            }

            $sql = "INSERT INTO {$this->table} (nombre, apellido, correoElectronico, `contraseña`, idRol) 
                    VALUES (:nombre, :apellido, :correoElectronico, :contraseña, :idRol)";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $statement->bindParam(":apellido", $apellido, PDO::PARAM_STR);
            $statement->bindParam(":correoElectronico", $correoElectronico, PDO::PARAM_STR);
            $statement->bindParam(":contraseña", $contraseña, PDO::PARAM_STR);
            $statement->bindParam(":idRol", $idRol, PDO::PARAM_INT);

            if ($statement->execute()) {
                echo "Usuario guardado correctamente.";
            } else {
                echo "Error al ejecutar la consulta.";
            }
        } catch (PDOException $ex) {
            echo "Error al guardar el usuario: " . $ex->getMessage();
        }
    }



    public function getUsuario($idUsuario)
    {
        try {
            $sql = "SELECT * FROM {$this->table} WHERE idUsuario = :idUsuario";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":idUsuario", $idUsuario, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_OBJ);
            return $result[0] ?? null;
        } catch (PDOException $ex) {
            echo "Error al obtener usuario: " . $ex->getMessage();
            return null;
        }
    }

    public function editUsuario($idUsuario, $nombre, $apellido, $correoElectronico)
    {
        try {
            $sql = "UPDATE {$this->table} 
                    SET nombre = :nombre, apellido = :apellido, correoElectronico = :correoElectronico
                    WHERE idUsuario = :idUsuario";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $statement->bindParam(":apellido", $apellido, PDO::PARAM_STR);
            $statement->bindParam(":correoElectronico", $correoElectronico, PDO::PARAM_STR);
            $statement->bindParam(":idUsuario", $idUsuario, PDO::PARAM_INT);
            return $statement->execute();
        } catch (PDOException $ex) {
            echo "No se pudo editar el usuario: " . $ex->getMessage();
            return false;
        }
    }

    public function deleteUsuario($idUsuario)
    {
        try {
            $sql = "DELETE FROM {$this->table} WHERE idUsuario = :idUsuario";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":idUsuario", $idUsuario, PDO::PARAM_INT);
            $statement->execute();
        } catch (PDOException $ex) {
            echo "No se pudo eliminar el usuario: " . $ex->getMessage();
        }
    }

    public function validarLogin($correoElectronico, $contraseña)
    {
        try {
            $sql = "SELECT * FROM {$this->table} WHERE correoElectronico = :correoElectronico";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":correoElectronico", $correoElectronico, PDO::PARAM_STR);
            $statement->execute();
            $user = $statement->fetch(PDO::FETCH_OBJ);

            if ($user && password_verify($contraseña, $user->contraseña)) {
                return $user;
            } else {
                return false;
            }
        } catch (PDOException $ex) {
            echo "Error al validar el login: " . $ex->getMessage();
            return false;
        }
    }
}
