<?php

require_once("pdo_conexion.php");

class PDOUsuarios {
    private $pdo;

    public function __construct() {
        $this->pdo = PDOConexion::getConexion();
    }
    
    public function consultar($usuario_id = null) {
        $data = [];
        
        try {
            if ($usuario_id !== null) {
                $stmt = $this->pdo->prepare("SELECT usuario_id, nombre, apellidos, usuario FROM usuarios WHERE usuario_id = :id");
                $stmt->bindParam(':id', $usuario_id, PDO::PARAM_INT);
                $stmt->execute();
            } else {
                $stmt = $this->pdo->prepare("SELECT usuario_id, nombre, apellidos, usuario FROM usuarios");
                $stmt->execute();
            }
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "<p>Error en consulta: " . $e->getMessage() . "</p>";
        }

        $this->mostrarEnTabla($data, $usuario_id);
    }
    private function mostrarEnTabla($data, $id = null) {
        echo "<h3>" . ($id !== null ? "Consulta de Usuario ID: $id" : "Listado de Usuarios") . "</h3>";
        if (count($data) > 0) {
            echo "<table border='1' style='border-collapse: collapse; width: 100%;'>";
            echo "<thead><tr><th>ID</th><th>Nombre</th><th>Apellidos</th><th>Usuario</th></tr></thead>";
            echo "<tbody>";
            foreach ($data as $row) {
                echo "<tr>";
                echo "<td>{$row['usuario_id']}</td>";
                echo "<td>{$row['nombre']}</td>";
                echo "<td>{$row['apellidos']}</td>";
                echo "<td>{$row['usuario']}</td>";
                echo "</tr>";
            }
            echo "</tbody></table>";
        } else {
            echo "<p>No se encontraron usuarios.</p>";
        }
    }

    public function insertar(string $nombre, string $apellidos, string $usuario, string $contrasenya) {
        $hash_contrasenya = hash('sha256', $contrasenya); 
        
        $sql = "INSERT INTO usuarios (nombre, apellidos, usuario, contrasenya) 
                VALUES (:nombre, :apellidos, :usuario, :pass)";

        try {
            $stmt = $this->pdo->prepare($sql);
        
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':apellidos', $apellidos);
            $stmt->bindParam(':usuario', $usuario);
            $stmt->bindParam(':pass', $hash_contrasenya);

            $stmt->execute();
            $last_id = $this->pdo->lastInsertId();
            echo "<p>Usuario $usuario agregado. ID: {$last_id}</p>";
        } catch (PDOException $e) {
            echo "<p>Error de inserción: " . $e->getMessage() . "</p>";
        }
    }
    
    public function modificar(int $usuario_id, string $nombre, string $apellidos, string $usuario) {
        $sql = "UPDATE usuarios SET nombre = :nombre, apellidos = :apellidos, usuario = :usuario 
                WHERE usuario_id = :id";
        
        try {
            $stmt = $this->pdo->prepare($sql);
            
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':apellidos', $apellidos);
            $stmt->bindParam(':usuario', $usuario);
            $stmt->bindParam(':id', $usuario_id, PDO::PARAM_INT);

            $stmt->execute();
            
            if ($stmt->rowCount() > 0) {
                 echo "<p>Usuario ID $usuario_id actualizado.</p>";
            } else {
                 echo "<p>No se encontró el usuario ID $usuario_id</p>";
            }

        } catch (PDOException $e) {
            echo "<p>Error de Modificación: " . $e->getMessage() . "</p>";
        }
    }
    
    public function borrar(int $usuario_id) {
        $sql = "DELETE FROM usuarios WHERE usuario_id = :id";
        
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $usuario_id, PDO::PARAM_INT);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                echo "<p>Borrado exitoso: Usuario ID $usuario_id eliminado</p>";
            } else {
                echo "<p>No se encontró el usuario ID $usuario_id</p>";
            }

        } catch (PDOException $e) {
            echo "<p>Error de Borrado: " . $e->getMessage() . "</p>";
        }
    }
}
?>