<?php 
// usuarios.php

require_once "conexion.php";

class Usuarios {
    private $conn;

    public function __construct() {
        $this->conn = Conexion::getConexion();
    }
   
    public function consultar($usuario_id = null) {
        $data = [];
        
        if ($usuario_id !== null) {
            // Consulta un usuario específico
            $stmt = $this->conn->prepare("SELECT usuario_id, nombre, apellidos, usuario FROM usuarios WHERE usuario_id = ?");
            $stmt->bind_param("i", $usuario_id); 
            $stmt->execute();
            $result = $stmt->get_result();
        } else {
            // Consulta todos los usuarios
            $sql = "SELECT usuario_id, nombre, apellidos, usuario FROM usuarios";
            $result = $this->conn->query($sql);
        }

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        
        $this->mostrarEnTabla($data, $usuario_id);
    }


    // Los siguientes metodos he usado IA porque no sabia muy bien como hacerlo.
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
            echo "<p>No se encontraron usuarios</p>";
        }
    }
    public function insertar(string $nombre, string $apellidos, string $usuario, string $contrasenya) {
        $hash_contrasenya = hash('sha256', $contrasenya); 

        $stmt = $this->conn->prepare("INSERT INTO usuarios (nombre, apellidos, usuario, contrasenya) VALUES (?, ?, ?, ?)");
        
        $stmt->bind_param("ssss", $nombre, $apellidos, $usuario, $hash_contrasenya);

        if ($stmt->execute()) {
            echo "<p>Usuario $usuario agregado ID: {$stmt->insert_id}</p>";
        } else {
            echo "<p>Error de Inserción: " . $stmt->error . "</p>";
        }
        $stmt->close();
    }

    public function modificar(int $usuario_id, string $nombre, string $apellidos, string $usuario) {

        $stmt = $this->conn->prepare("UPDATE usuarios SET nombre = ?, apellidos = ?, usuario = ? WHERE usuario_id = ?");
        $stmt->bind_param("sssi", $nombre, $apellidos, $usuario, $usuario_id);

        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                echo "<p>Usuario ID $usuario_id actualizado</p>";
            } else {
                echo "<p>No se encontró el usuario ID $usuario_id o los datos eran idénticos</p>";
            }
        } else {
            echo "<p>Error de Modificación: " . $stmt->error . "</p>";
        }
        $stmt->close();
    }

    public function borrar(int $usuario_id) {
        $stmt = $this->conn->prepare("DELETE FROM usuarios WHERE usuario_id = ?");
        
        $stmt->bind_param("i", $usuario_id);

        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                echo "<p>Usuario ID $usuario_id eliminado</p>";
            } else {
                echo "<p>No se encontró el usuario ID $usuario_id</p>";
            }
        } else {
            echo "<p>Error de Borrado: " . $stmt->error . "</p>";
        }
        $stmt->close();
    }
}
