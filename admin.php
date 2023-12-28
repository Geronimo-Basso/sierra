<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'head.php'?>
</head>
<body>
    <?php require 'includes/header.php'; ?>
    <?php require 'includes/headernavmobile.php'; ?>
    <div>
        <h1>Crear nueva campaña</h1>
        <form enctype="multipart/form-data" action="process-admin.php" method="post">
            <input type="text" name="title" placeholder="Titulo">
            <textarea name="description" placeholder="Describe porque quieres juntar dinero"></textarea>
            <input type="number" name="target" placeholder="Cantidad a recaudar">
            <input type="file" name="image" accept="image/*" multiple>
            <input type="submit" value="Enviar">
        </form>

    </div>
    <?php require 'includes/footer.php'; ?>
</body>
</html>