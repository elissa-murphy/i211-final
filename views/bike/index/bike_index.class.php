<?php

class BikeIndex extends BikeIndexView {
    public function display() {
        //display page header
        parent::displayHeader("List All Bikes");

        ?>
        <div id="main-header"> Bikes in the Shop</div>

<!--        <div class="grid-container">-->
<!--            --><?php
//            if ($movies === 0) {
//                echo "No movie was found.<br><br><br><br><br>";
//            } else {
//                //display movies in a grid; six movies per row
//                foreach ($movies as $i => $movie) {
//                    $id = $movie->getId();
//                    $title = $movie->getTitle();
//                    $rating = $movie->getRating();
//                    $release_date = new \DateTime($movie->getRelease_date());
//                    $image = $movie->getImage();
//                    if (strpos($image, "http://") === false AND strpos($image, "https://") === false) {
//                        $image = BASE_URL . "/" . MOVIE_IMG . $image;
//                    }
//                    if ($i % 6 == 0) {
//                        echo "<div class='row'>";
//                    }
//
//                    echo "<div class='col'><p><a href='", BASE_URL, "/movie/detail/$id'><img src='" . $image .
//                        "'></a><span>$title<br>Rated $rating<br>" . $release_date->format('m-d-Y') . "</span></p></div>";
//                    ?>
<!--                    --><?php
//                    if ($i % 6 == 5 || $i == count($movies) - 1) {
//                        echo "</div>";
//                    }
//                }
//            }
//            ?>
<!--        </div>-->

        <?php
        //display page footer
        parent::displayFooter();

    } //end of display method
}