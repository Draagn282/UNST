<?php include('./includes/navbar_admin.php');?>
<main>
    <h1>Accounts</h1>
    <table>
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Admin</th>
        </tr><?php
        $blem = $conn->prepare("SELECT * FROM users ORDER BY admin desc");
        $blem->execute();
        $result = $blem->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $i){echo '
            <tr><form action="./includes/functions_admin.php" method="POST">
                <td><input type="text" name="username" value="'.$i['username'].'"></td>
                <td><input type="text" name="email" value="'.$i['email'].'"></td>
                <td>
                <input type="text" value='.$i['admin'].' name="admin"/>
                '; 
                // if($i['admin']==1){echo'✅';}else{echo'❌';} 
                echo '</td>
                <td class="btns">
                    <input class="inv" type="text" value='.$i['user_id'].' name="user_id"/>
                    <input class="good" type="submit" name="edit_user" value="save">
                </form>
                <form action="./includes/functions_admin.php" method="POST">
                    <input class="inv" type="text" value="'.$i['user_id'].'" name="user_id"/>
                    <input class="bad" type="submit" name="delete_user" value="delete">
                </form></td>
            </tr>
        ';}?>
    </table>
</main>
<?php include('./includes/footer_admin.php');?>