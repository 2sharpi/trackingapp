
<main class="panelD">

    <h1 class="tituloD">Dashboard</h1>

    <div class="forms">
        <form class="" action="Dashboard/addNewTracking" method="post">
            <h3>Dodaj nowy tracking</h3>
            <input type="text" name="realTracking" value="" placeholder="Numer DPD">
            <input type="text" name="generatedTracking" value="" placeholder="Numer wewnętrzny (zostaw jeśi system ma go wygenerować automatycznie)">
            <input type="text" name="address" value="" placeholder="Adres">
            <input type="hidden" name="overallStatus" value="Parcel handed to FDS" />
            <br>
            <input type="submit" name="addNewTracking" value="Dodaj" class="botonEnviar">

        </form>
    </div>



    <h2>Ostatno dodane paczki<i class="fas fa-arrow-down"></i></h2>
          <form method="post" action="<?php echo base_url('Dashboard/batchDelete')?>">
    <div class="tabla">

        <table cellpadding="0" cellspacing="0">
            <tr class="negrita">
                <th>Numer DPD</th>
                <th>Numer wygenerowany</th>
                <th>Adres</th>
                <th>Status ogólny</th>
                <th>Ostatnia aktualizacja</th>
                <th>Opcje</th>
                <th>Usuń zbiorczo</th>
            </tr>
            <?php if (sizeof($trackingArray) === 0) { ?>
                <tr>
                    <th> Baza danych jest pusta! </th>
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
                        <th><a href="<?php echo base_url() ?>/TrackingLog/showTrackingDetails/<?php echo $tracking->idTracking ?>">Edytuj</a>
                        </th>
                        <th><input type="checkbox" name="idTracking[]" value="<?php echo $tracking->idTracking?>"></th>
                    </tr>
                    
                <?php }
            }
            ?>
                    
        </table>
            
        
    </div>
              <button type="submit">Usuń zaznaczone</button>
              </form>
     <?php echo $pagination ?>
</main>

</div>
</body>

