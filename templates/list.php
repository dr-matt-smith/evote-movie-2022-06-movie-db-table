<?php
$pageTitle = "MOVIE listings";
require_once __DIR__ . '/_header.php';
//---------------- footer ---------------
?>


<!-- start table for displaying DVD details -->
<h2>Lists of movies and their average votes</h2>

        <table>
            <tr>
                <th> ID </th>
                <th> title </th>
                <th> category </th>
                <th> price </th>
                <th> vote average </th>
                <th> num votes </th>
                <th> stars </th>
            </tr>

            <!-- ********************* HTML for dvd items ****************** -->
        <!--
            //   	0 - 15 - 40 - 55 - 70 - 85 - 100 %age
            // 	      .5   1    2    3    4    5     stars
        -->
            <?php foreach($movies as $movie): ?>
            <tr>
                <td><?= $movie->getId() ?></td>
                <td><?= $movie->getTitle() ?></td>
                <td><?= $movie->getCategory() ?></td>
                <td>&euro; <?= $movie->getPrice() ?></td>
                <td><?= $movie->getVoteAverage() ?> %</td>
                <td><?= $movie->getNumVotes() ?></td>
                <td>
                    <?php if($movie->getNumVotes() > 0): ?>
                    <img src="images/<?= $movie->getStarImage() ?>" alt="star image for percentage">
                    <?php else: ?>
                    (no votes yet)
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>


<?php
//---------------- footer ---------------
require_once __DIR__ . '/_footer.php';
?>