<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h1>Lista de users</h1>
    <php if(isLoggedIn()): ?>
        <a href="../public/index.php?action=user_create">Crear usuario</a>
    <thread>
        
    <tr>
        <th>ACCIONES</th>
        <th colspan="2">ACCIONES</th>
    </tr>
    </thread>
    <?php foreach ($users as $user): ?>
        <tr>
            <td>
                <?=htmlspecialchars($user["name"])?>
            </td>
            <td>
            <a href="../public/idex.php?action_edit "?> ></a>
            </td>
            <td>
                
            </td>
        
        </tr>
    
</body>
</html>