
<main class="panelD">

    <h1 class="tituloD"><a href="<?php echo base_url('PublicPage/tracking/'.$trackingData->generatedTracking)?>"><?php echo base_url('PublicPage/tracking/'.$trackingData->generatedTracking)?></a></h1>


    <h2>Sczególy<i class="fas fa-arrow-down"></i></h2>
    <div class="tabla">
        <form method="post" action="<?php echo base_url() ?>TrackingLog/updateTracking/<?php echo $trackingData->idTracking ?>">
        <table cellpadding="0" cellspacing="0">
            <tr class="negrita">
                <th>Numer DPD</th>
                <th>Numer wygenerowany</th>
                <th>Adres</th>
                <th>Status ogólny</th>
                <th>Ostatnia aktualizacja</th>
                <th>Opcje</th>
            </tr>
            <tr>
                <th><?php echo $trackingData->realTracking ?></th>
                <th><input type="text" name="generatedTracking" value="<?php echo $trackingData->generatedTracking ?>" /></th>
                <th><input type="text" name="address" value="<?php echo $trackingData->address ?>" /></th>
                <th> <select id="overallStatus" name="overallStatus">
                        <option <?php
                        if ($trackingData->overallStatus == 'Delivered') {
                            echo 'selected="selected"';
                        }
                        ?> value="Delivered">Delivered</option>
                        <option <?php
                        if ($trackingData->overallStatus == 'Out for delivery') {
                            echo 'selected="selected"';
                        }
                        ?> value="Out for delivery">Out for delivery</option>
                        <option <?php
                        if ($trackingData->overallStatus == 'At parcel delivery centre') {
                            echo 'selected="selected"';
                        }
                        ?> value="At parcel delivery centre">At parcel delivery centre</option>
                        <option <?php
                        if ($trackingData->overallStatus == 'In Transit') {
                            echo 'selected="selected"';
                        }
                        ?> value="In Transit">In Transit</option>
                        <option <?php
                        if ($trackingData->overallStatus == 'Parcel handed to FDS') {
                            echo 'selected="selected"';
                        }
                        ?> value="Parcel handed to FDS">Parcel handed to FDS</option>
                    </select></th>  
                    <th><?php echo $trackingData->lastUpdate?></th>
                <th><button type="submit">Aktualizuj</button></th>

            </tr>

        </table>
        </form> 
    </div>
   



    <h2>Zdarzenia<i class="fas fa-arrow-down"></i></h2>
    <div class="tabla">
        <table cellpadding="0" cellspacing="0">
            <tr class="negrita">
                <th>Data</th>
                <th>Godzina</th>
                <th>Opis</th>
                <th>Opis DPD</th>

                <th>Lokalizacja</th>
                <th>Ukrycie wpisu</th>
                <th>Opcje</th>
            </tr>
            <?php if (sizeof($trackingLog) === 0) { ?>
                <tr>
                    <th>Brak wpisów w bazie danych</th>
                </tr>
                <?php
            } else {
                foreach ($trackingLog as $tracking) {
                    $d = new DateTime($tracking->Date);
                    ?>
                    <tr>
                    <form method="post" action="<?php echo base_url() ?>TrackingLog/editContent/<?php echo $tracking->idLog ?>">
                        <th><input type="text" name="date" value="<?php echo $d->format('Y-m-d') ?>" ></th>
                        <th><input type='text' name="time" value="<?php echo $d->format('H:i:s') ?>"</th>
                        <th><input type="text" name="description" value="<?php echo $tracking->Description ?>" ></th>
                        <th><input type="text" name="realDescription" value="<?php echo $tracking->realDescription ?>" ></th>
                        <th><input type="text" name="address" value="<?php echo $tracking->address ?>" ></th>
                        <th><select name="isHidden">
                                <option <?php
                                if ($tracking->isHidden == '1') {
                                    echo 'selected="selected"';
                                }
                                ?>value="1">Tak</option>
                                <option <?php
                                if ($tracking->isHidden == '0') {
                                    echo 'selected="selected"';
                                }
                                ?>value="0">Nie</option>
                            </select></th>


                        <input type="hidden" name="idTracking" value="<?php echo $trackingData->idTracking ?>" />
                        
                        <th><button type="submit">Zmień</button>

                    </form>
                    </tr>    
        <?php
    }
}
?>
        </table>

    </div>
    
</main>

</div>
</body>

