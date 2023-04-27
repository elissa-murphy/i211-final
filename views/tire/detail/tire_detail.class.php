<?php

class TireDetail extends TireIndexView
{
    public function display($tire, $confirm = "") {
        //display page header
        parent::displayHeader("Display Tire Details");

        //retrieve bike details by calling get methods
        $id = $tire->getId();
        $maker = $tire->getMaker();
        $name = $tire->getName();
        $description = $tire->getDescription();
        $price = $tire->getPrice();
        $rating = $tire->getRating();
        $image = $tire->getImage();

        if (strpos($image, "http://") === false AND strpos($image, "https://") === false) {
            $image = BASE_URL . '/' . TIRE_IMG . $image;
        }
        ?>

<!--        <h2 id="main-header">--><?//= $name ?><!--</h2>-->
<!--        <div style="padding-bottom: 150px;">-->
<!--            <div style="display: flex; justify-content: space-evenly;">-->
<!--                <div>-->
<!--                    <div style="width: 350px; height: 350px;">-->
<!--                      <img src="--><?//= $image ?><!--" alt="Tire Main" style='width: 350px;height: 250px;'/>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div>-->
<!--                    <div style="display: flex; justify-content: space-evenly;">-->
<!--                        <p style="padding: 0px 10px 0px 10px">Maker: --><?//= $maker ?><!--</p>-->
<!--                        <p style="padding: 0px 10px 0px 10px">Rating: --><?//= $rating ?><!--/10</p>-->
<!--                        <p style="padding: 0px 10px 0px 10px">Price:--><?//= $price ?><!--</p>-->
<!--                    </div>-->
<!--                    <div>-->
<!--                        <p style="width: 400px;">Description: --><?//= $description ?><!--</p>-->
<!--                    </div>-->
<!--                    <div id="confirm-message">--><?//= $confirm ?><!--</div>-->
<!--                </div>-->
<!---->
<!--            </div>-->
<!--            <div id="create">-->
<!--                <form method="get" action="--><?//= BASE_URL ?><!--/tire/confirm_delete/--><?//=$id?><!--">-->
<!--                    <input type="submit" value="Delete Tire" />-->
<!--                </form>-->
<!--            </div>-->


            <h2 id="main-header"><?= $name ?></h2>
            <!-- display tire details -->
            <div class="detailPage-container">
                <div>
                    <div class="detailPage-ImageContainer">
                        <img src="<?= $image ?>" alt="Accessory Main" style='width: 350px;height: 250px;display: block;'/>
                    </div>
                </div>


                <div class="detailPage-InfoContainer">
                    <div style="display: flex; justify-content: space-evenly;">
                        <div class="detailPage-Maker">Maker:<p><?= $maker ?></p></div>
                        <div class="detailPage-Price">Price:<p>$<?= $price ?></p></div>
                        <div class="detailPage-Price">Rating:<p> <?= $rating ?>/10</p></div>
                    </div>

                    <div>
                        <div class="detailPage-Desc">Description:<p><?= $description ?></p></div>
                    </div>

                    <div id="confirm-message"><?= $confirm ?></div>

                    <div id="create">
                        <form method="get" action="<?= BASE_URL ?>/tire/confirm_delete/<?=$id?>">
                            <input class="deleteProduct-Input" type="submit" value="Delete Tire" />
                        </form>
                    </div>
                </div>

            </div>


            <a class="backBtn" href="<?= BASE_URL ?>/tire/index"><- Back</a>
        <br>
        <br>
        <br>
        <br>
        </div>
        <?php
        //display page footer
        parent::displayFooter();
    }

//end of display method
}