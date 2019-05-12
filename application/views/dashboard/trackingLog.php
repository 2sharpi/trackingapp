
<main class="panelD">

    <h1 class="tituloD">Dashboard</h1>
    <?php
//var_dump($trackingLog);
//var_dump($trackingData);
    ?>

    <h2>Sczególy<i class="fas fa-arrow-down"></i></h2>
    <div class="tabla">
        <table cellpadding="0" cellspacing="0">
            <tr class="negrita">
                <th>Numer DPD</th>
                <th>Numer wygenerowany</th>
                <th>Dostarczono</th>
                <th>Opcje</th>
            </tr>

            <tr>
                <th><?php echo $trackingData->realTracking ?></th>
                <th><?php echo $trackingData->generatedTracking ?></th>
                <th><?php
                    if ($trackingData->isDelivered) {
                        echo 'Tak';
                    } else {
                        echo 'Nie';
                    }
                    ?></th>
                <th><button onclick="location.href = 'Tracking/showDetails/<?php echo $trackingData->idTracking ?>';">Edytuj</button>
                    <button onclick="location.href = 'Tracking/deleteById/<?php echo $trackingData->idTracking ?>';">Usun</button></th>
        </table>
    </div>




    <h2>Zdarzenia<i class="fas fa-arrow-down"></i></h2>
    <div class="tabla">
        <table cellpadding="0" cellspacing="0">
            <tr class="negrita">
                <th>Data</th>
                <th>Opis</th>
                <th>Ukrycie wpisu</th>
                <th>Opcje</th>
            </tr>
            <?php if (sizeof($trackingLog) === 0) { ?>
                <tr>
                    <th>Brak wpisów w bazie danych</th>
                </tr>
            <?php } else {
                foreach ($trackingLog as $tracking) {
                    ?>
                    <tr>
                    <form method="post" action="<?php echo base_url() ?>TrackingLog/editContent/<?php echo $tracking->idLog ?>">
                        <th><input type="text" name="date" value="<?php echo $tracking->Date ?>" ></th>
                        <th><input type="text" name="description" value="<?php echo $tracking->Description ?>" ></th>
                        <th><select name="isHidden">
                                <option <?php if($tracking->isHidden == '1') {echo 'selected="selected"';}?>value="1">Tak</option>
                                <option <?php if($tracking->isHidden == '0') {echo 'selected="selected"';}?>value="0">Nie</option>
                            </select>
                        
                        <input type="hidden" name="idTracking" value="<?php echo $trackingData->idTracking ?>" />
                        <th><button type="submit">Zmień</button>
                           
                    </form>
                    </tr>    
    <?php }
} ?>
        </table>
    </div>
</main>

</div>
</body>

