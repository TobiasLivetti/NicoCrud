<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Iniciar sesion </h1>    
    <?php if(isset($error)): ?>
        <p style="color:red;"><?=$error?></p>
        <?php endif; ?>
        
        <form action="index.php?action=login" method="POST">
        <input type="text" id="username" name="username" placeholder="usuario.." required>
        <input type="password" id="password" name="password" placeholder="clave.." required>
    <button type="submit">Iniciar sesion</button>
</form>   
<a href="../public/index.php?action=user">Volver a la lista</a>

</body>
</html>