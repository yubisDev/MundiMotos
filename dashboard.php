<?php
// Incluir el archivo de conexión
include_once 'conexion.php';

// Determinar el módulo actual a cargar
// Por defecto, carga 'productos'
$modulo = $_GET['modulo'] ?? 'productos'; 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración MundiMotos</title>
    <!-- Incluir Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Iconos de Bootstrap (opcional, pero útil) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body { background-color: #f8f9fa; }
        .main-container { padding-top: 20px; }
        .nav-tabs .nav-link.active {
            background-color: #007bff;
            color: white;
            border-color: #007bff;
        }
    </style>
</head>
<body>

<div class="container main-container">
    <h1 class="mb-4">
        <i class="bi bi-gear-fill text-primary"></i> Panel de Administración MundiMotos
    </h1>

    <!-- Pestañas de Navegación: Se eliminó role="tablist" para corregir la advertencia de accesibilidad -->
    <ul class="nav nav-tabs mb-4" id="crudTabs">
        <li class="nav-item">
            <a class="nav-link <?= ($modulo == 'productos' || !isset($_GET['modulo'])) ? 'active' : '' ?>" 
               href="dashboard.php?modulo=productos">Gestión de Productos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= ($modulo == 'tipos') ? 'active' : '' ?>" 
               href="dashboard.php?modulo=tipos">Gestión de Tipos de Producto</a>
        </li>
    </ul>

    <!-- Contenido del Módulo -->
    <div class="tab-content" id="crudContent">
        <div class="tab-pane fade show active">
            <?php
            // La inclusión usa require_once, asumiendo que el archivo está en 'includes/'
            
            if ($modulo == 'productos') {
                require_once 'includes/crud_productos.php'; 
            }  elseif ($modulo == 'tipos') {
                require_once 'includes/crud_tipos.php';
            } else {
                echo '<div class="alert alert-danger">Módulo no encontrado.</div>';
            }
            ?>
        </div>
    </div>
</div>

<!-- Scripts de Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>