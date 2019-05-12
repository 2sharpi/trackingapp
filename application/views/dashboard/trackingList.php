
<main class="panelD">

    <h1 class="tituloD">Dashboard</h1>

    <div class="forms">
        <form class="" action="Dashboard/addNewTracking" method="post">
            <h3>Dodaj nowy tracking</h3>
            <input type="text" name="dpdTracking" value="" placeholder="Numer DPD">
            <br>
            <input type="submit" name="addNewTracking" value="Dodaj" class="botonEnviar">

        </form>
    </div>


    <h2>Ostatno dodane paczki<i class="fas fa-arrow-down"></i></h2>
    <div class="tabla">
        <table cellpadding="0" cellspacing="0">
            <tr class="negrita">
                <th>Numer DPD</th>
                <th>Numer wygenerowany</th>
                <th>Dostarczono</th>
                <th>Opcje</th>
            </tr>
            <?php if (sizeof($trackingArray) === 0) { ?>
                <tr>
                    <th> Baza danych jest pusta! </th>
                </tr>
            <?php } else {
                foreach ($trackingArray as $tracking) {
                    ?>
                    <tr>
                        <th><?php echo $tracking->realTracking ?></th>
                        <th><?php echo $tracking->generatedTracking ?></th>
                        <th><?php
                            if ($tracking->isDelivered) {
                                 echo 'Tak"';
                            } else {
                               echo 'Nie';
                            }
                            ?></th>
                        <th><button onclick="location.href = '<?php echo base_url()?>/TrackingLog/showTrackingDetails/<?php echo $tracking->idTracking?>';">Edytuj</button>
                            <button onclick="location.href = '<?php echo base_url()?>Tracking/deleteById/<?php echo $tracking->idTracking?>';">Usun</button></th>
                    </tr>
    <?php }
} ?>
        </table>
    </div>
</main>

</div>
</body>
