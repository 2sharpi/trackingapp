
<main class="panelD">

    <h1 class="tituloD">Znajdź</h1>

    <div class="forms">
        <form class="" action="<?php echo base_url('Dashboard/search')?>" method="post">
            <h3>Znajdź</h3>
            <input type="text" name="realTracking" value="" placeholder="Numer DPD">
            <input type="text" name="generatedTracking" value="" placeholder="Numer wewnętrzny (zostaw jeśi system ma go wygenerować automatycznie)">
            <input type="text" name="address" value="" placeholder="Adres">
            <select id="overallStatus" name="overallStatus">
                        <option value="">Status</option>
                        <option value="Delivered">Delivered</option>
                        <option value="Out for delivery">Out for delivery</option>
                        <option value="At parcel delivery centre">At parcel delivery centre</option>
                        <option value="In Transit">In Transit</option>
                        <option value="Parcel handed to FDS">Parcel handed to FDS</option>
                    </select>
            <br>
            <input type="submit" name="addNewTracking" value="Szukaj" class="botonEnviar">

        </form>
    </div>



    <h2>Znalezione rekordy<i class="fas fa-arrow-down"></i></h2>
  
    <div class="tabla">
        <table cellpadding="0" cellspacing="0">
            <tr class="negrita">
                <th>Numer DPD</th>
                <th>Numer wygenerowany</th>
                <th>Adres</th>
                <th>Status ogólny</th>
                <th>Ostatnia aktualizacja</th>
                <th>Opcje</th>
            </tr>
            <?php if (sizeof($trackingArray) === 0) { ?>
                <tr>
                    <th> Brak wyników </th>
                </tr>
            <?php
            } else {
                foreach ($trackingArray as $tracking) {
                    ?>
                    <tr>
                        <th><?php echo $tracking->realTracking ?></th>
                        <th><?php echo $tracking->generatedTracking ?></th>
                        <th><?php echo $tracking->address ?></th>
                        <th><?php echo $tracking->overallStatus ?></th>
                        <th><?php echo $tracking->lastUpdate ?></th>
                        <th><button onclick="location.href = '<?php echo base_url() ?>/TrackingLog/showTrackingDetails/<?php echo $tracking->idTracking ?>';">Edytuj</button>
                            <button onclick="location.href = '<?php echo base_url() ?>/Dashboard/deleteTracking/<?php echo $tracking->idTracking ?>';">Usuń</button>
                    </tr>
                <?php }
            }
            ?>
        </table>
    </div>
</main>

</div>
</body>

