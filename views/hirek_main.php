<h1 style="max-width: 100%; font-size:52pt; color: antiquewhite; text-align: center; margin: auto;">Hírek és Vélemények</h1>

<?php if ($_SESSION['userid'] == 0 || !isset($_SESSION['userid'])) { ?>
    <h2 style="max-width: 50%; margin-left:auto; margin-right: auto;">A "Hírek és Vélemények" oldal eléréséhez
    bejelentkezes kell!</h2>
<?php } else { ?>
    <h2><?= ($viewData['uzenet'] ?? "") ?></h2>
    <h2><?= ($viewData['kommentel-uzenet'] ?? "") ?></h2>
    <h2><?= ($viewData['hirbekuld-uzenet'] ?? "") ?></h2>

    <?php foreach ($viewData as $hir) {
        if (isset($hir['hir'])) { ?>
            <div class="list-group">
                <ul class="list-group-item list-group-item-action"
                    style="max-width: 60%; margin-left:auto; margin-right: auto; margin-top:  20px; list-style-type: none;
                    background-color: #333; color: antiquewhite;">
                    <li style="max-width: 600px; margin-left:auto; margin-right: auto; padding-top:  40px">
                        <dl>
                            <dt><em><?php echo $hir['bejelentkezes'] . ' - ' . $hir['datum'] ?></em></dt>
                            <dd><?php echo $hir['hir'] ?></dd>
                        </dl>
                    </li>
                    <?php foreach ($hir['kommentek'] as $komment) { ?>
                        <ul>
                            <li style="max-width: 600px; margin-left:auto; margin-right: auto; margin-top:  20px">
                                <dl>
                                    <dt><em><?php echo $komment['bejelentkezes'] . ' - ' . $komment['datum'] ?></em>
                                    </dt>
                                    <dd><?php echo $komment['komment'] ?></dd>
                                </dl>
                            </li>
                        </ul>
                    <?php } ?>
                    <form style="max-width: 600px; margin-left:auto; margin-right: auto; margin-top:  20px"
                          action="<?php echo SITE_ROOT ?>kommentel" method="post">
                        <textarea name="ujkomment"
                                  style="width: 100%; height: 60px; padding: 12px 20px; box-sizing: border-box; border: 2px solid #ccc; border-radius: 4px; background-color: #f8f8f8; font-size: 16px; resize: none;"></textarea>
                        <input name="hirid" type="hidden" value="<?php echo $hir['id'] ?>"/>
                        <br>
                        <input class="btn btn-secondary" type="submit" value="Komment küldése">
                    </form>
                </ul>
            </div>
        <?php }
    } ?>

    <div class="list-group" style=" margin-top: 50px;">
        <h2 style="max-width: 100%; margin: auto; text-align: center; background-color: #333; color: antiquewhite; 
        opacity: 0.9; border-radius: 5px; padding: 5px">Hír Létrehozása</h2>
        <form action="<?php echo SITE_ROOT ?>hirbekuld" method="post">
            <ul class="list-group-item list-group-item-action"
                style="max-width: 80%; margin-left:auto; margin-right: auto; background-color: #333; color: antiquewhite;">

                <li style="max-width: 600px; margin-left:auto; margin-right: auto; margin-top:  40px; list-style-type: none;">
                    <textarea name="ujhir"
                              style="width: 100%; height: 150px; padding: 12px 20px; box-sizing: border-box; border: 2px solid #ccc; 
                              border-radius: 4px; background-color: #f8f8f8; font-size: 16px; resize: none;">A hír szövege.</textarea>
                </li>
                <li style="max-width: 600px; margin-left:auto; margin-right: auto; margin-top:  10px; list-style-type: none;">
                    <input class="btn btn-secondary" type="submit" value="Létrehozás">
                </li>
            </ul>
        </form>
    </div>
<?php } ?>
