<?php include('includes/navbar_admin.php');?>

<main>
    <h1>Reviews</h1>
    <table>
        <tr>
            <th>Username</th>
            <th>Planet</th>
            <th>Review</th>
            <th>Rating</th>
            <th>Curated</th>
        </tr><?php
        $blem = $conn->prepare("SELECT reviews.*,journeys.planet,users.username FROM reviews INNER JOIN journeys ON reviews.planet_id=journeys.planet_id INNER JOIN users ON reviews.user_id=users.user_id ORDER BY curated ASC");
        $blem->execute();
        $result = $blem->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $i){ echo '
        <tr>
            <td>'.$i['username'].'</td>
            <td>'.$i['planet'].'</td>
            <td>'.$i['text'].'</td>
            <td>'.str_repeat('⭐', $i['stars']).'</td>
            <td>'; if($i['curated']==1){echo'Approved';}else{echo'Pending';} echo '</td>
            <td class="btns">';
            if($i['curated']!=1){echo '
            <form action="./includes/functions_admin.php" method="POST">
                <input class="inv" type="text" value="'.$i['review_id'].'"name="review_id"/>
                <input class="good" type="submit" name="approvereview" value="accept">
            </form>';} echo'
            <form action="./includes/functions_admin.php" method="POST">
                <input class="inv" type="text" value="'.$i['review_id'].'"name="review_id"/>
                <input class="bad" type="submit" name="deletereview" value="delete">
            </form></td>
        </tr>';}?>
    </table>
</main>

<?php include('./includes/footer_admin.php');?>