<?php include('./includes/navbar_admin.php');?>
<main>
    <h1>Add a planet</h1>
    <form action="./includes/functions_admin.php" method="POST">
        <div class="column">
                <input placeholder="name" type="text" name="planet">
                <input placeholder="price" type="text" name="price">
                <textarea name="shortdescription" placeholder="Short description"></textarea>
                <textarea name="longdescription" placeholder="Long description"></textarea>
                <input class="good" type="submit" value="Insert" name="insert_planet">
        </div>
    </form>
    <table>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>img?</th>
            <th>Short text</th>
            <th>Long text</th>
        </tr>
        <h1>Manage planets</h1>
        <?php
        $blem = $conn->prepare("SELECT * FROM journeys");
        $blem->execute();
        $result = $blem->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $i){ echo '
        <tr><form method="POST" action="./includes/functions_admin.php">
            <td><input type="text" name="planet" value="'.$i['planet'].'"/></td>
            <td><input type="text" name="price" value="'.$i['price'].'"/></td>
            <td><img src="../assets/img/planets/'.$i['planet'].'.png" alt="'.$i['planet'].'"> </td>
            <td><textarea type="text" name="shortdescription">'.$i['shortdescription'].'</textarea></td>
            <td><textarea type="text" name="longdescription"/>'.$i['longdescription'].'</textarea></td>
            <td class="btns">
                <input class="inv" type="text" name="planet_id" value="'.$i['planet_id'].'">
                <input class="good" type="submit" name="edit_planet" value="Edit item"></form>
            <form method="POST" action="./includes/functions_admin.php">
                <input class="inv" type="text" name="planet_id" value='.$i['planet_id'].'/>
                <input class="bad" type="submit" name="delete_planet" value="delete">
            </form>
            </td>
        </tr>
        ';}?>
    </table>
</main>
<?php include('./includes/footer_admin.php');?>