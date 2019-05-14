
<main class="panelD">

    <h1 class="tituloD">Dashboard</h1>


    <h2>Sczególy<i class="fas fa-arrow-down"></i></h2>
    <div class="tabla">
        <table cellpadding="0" cellspacing="0">
            <tr class="negrita">
                <th>Numer DPD</th>
                <th>Numer wygenerowany</th>
                <th>Adres</th>
                <th>Status ogólny</th>
            </tr>
                    <tr>
                        <th><?php echo $trackingData->realTracking ?></th>
                        <th><?php echo $trackingData->generatedTracking ?></th>
                        <th><?php echo $trackingData->address?></th>
                        <th><?php echo $trackingData->overallStatus?></th>
                        
                    </tr>

        </table>
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
            <?php } else {
                foreach ($trackingLog as $tracking) {
                    $d = new DateTime($tracking->Date);
                    
                    ?>
                    <tr>
                    <form method="post" action="<?php echo base_url() ?>TrackingLog/editContent/<?php echo $tracking->idLog ?>">
                        <th><input type="text" name="date" value="<?php echo $d->format('Y-m-d') ?>" ></th>
                        <th><input type='text' name="time" value="<?php echo $d->format('H:i:s')?>"</th>
                        <th><input type="text" name="description" value="<?php echo $tracking->Description ?>" ></th>
                        <th><input type="text" name="realDescription" value="<?php echo $tracking->realDescription ?>" ></th>
                        <th><input type="text" name="address" value="<?php echo $tracking->address ?>" ></th>
                        <th><select name="isHidden">
                                <option <?php if($tracking->isHidden == '1') {echo 'selected="selected"';}?>value="1">Tak</option>
                                <option <?php if($tracking->isHidden == '0') {echo 'selected="selected"';}?>value="0">Nie</option>
                            </select></th>
                          
                        
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

