

        <main>

            <section class="tracking-search">


                <div class="contener">

                    <div class="go-tracking">
                        <h1>Parcel tracking:</h1>
                        <div class="search-label"><form method="post" action="<?php echo base_url('PublicPage/tracking'); ?>">   
                                <input class="label-track" type="text" name="trackingNumber" placeholder="Enter the shipment number"></input>
                                <input style="height:50px" type="image" src="<?php echo base_url('/views/web/') ?>img/search.svg" border="0" alt="Submit" />
                            </form></div>
                    </div>

                    <div class="tracking-step">

                        <div id="first-step" class="step">Parcel handed to FDS</div>
                        <div id="step-two" class="step">In transit</div>
                        <div class="step">At parcel delivery centre</div>
                        <div class="step">Parcel out for delivery</div>
                        <div id="last-step" class="step">Delivered</div>

                    </div>
                    <script type="text/javascript">
                        var statusCase = ['Parcel handed to FDS','In transit','At parcel delivery centre','Parcel out for delivery','Delivered'];
                        var elements = document.getElementsByClassName('step');
                        var count = 0;
                        for(count = 0; count > statusCase.indexOf('<?php echo $tracking->overallStatus  ?>'); count++){
                            
                            elements[count].classList.add("active");
                            console.log(elements[count]);
                        }
                    </script>
                    <div class="trans-page">

                        <div class="track-number">		
                            <div class="tracking-res">

                                <div class="tracking-info">
                                    <div class="info-item"><strong>Parcel label number: </strong></div>
                                    <div class="info-item"><strong>Address: </strong></div>
                                    <div class="info-item"><strong>Delivery status:</strong></div>
                                </div>

                                <div class="tracking-info-res">
                                    <div class="info-item"><?php echo $tracking->generatedTracking ?></div>
                                    <div class="info-item"><?php echo $tracking->address ?></div>
                                    <div id="deliveryStatus" class="info-item"><?php echo $tracking->overallStatus ?></div>
                                </div>

                            </div>
                        </div>	
                        <div class="status">
                            <div class="status-item-name">
                                <div class="date">Date</div>
                                <div class="time">Time</div>
                                <div class="location">Parcel Center</div>
                                <div class="parcel">Parcel status</div>
                            </div>  
                            <?php foreach ($trackingLog as $log) {
                                $d = new DateTime($log->Date);
                                ?>
                                <?php $date = $d->format('Y-m-d');
                                $time = $d->format('H:i') ?>

                                <div class="status-item">
                                    <div class="date"><?php echo $date ?></div>
                                    <div class="time"><?php echo $time ?></div>
                                    <div class="location"><?php echo $log->address?></div>
                                    <div class="parcel"><?php echo $log->Description ?></div>
                                </div>
                                <?php } ?>


                        </div>


                    </div>
                </div>
            </section>		

            <section class="faq-home">

                 <div class="contener">
                    <h2>Question and answer</h2>
                    <p></p>
                    <div class="faq">

                        <details>
                            <summary>Can I track my delivery online?</summary>
                            <p>Yes, you can track your delivery online, simply go to our website and enter the consignment number on the homepage. Please allow up to 24 hours after sending. Packages tracking information are updated every day.</p>
                        </details>

                        <details>
                            <summary>What are my payment options?</summary>
                            <p>We currently offer payment via Credit Card or Bank Transfer.</p>
                        </details>

                        <details>
                            <summary>Is there a cut-off time for bookings?</summary>
                            <p>In metro areas the cut off is 12 midday for same day pickups. For regional areas the cut off is 12 midday for next day pickups.</p>
                        </details>

                        <details>
                            <summary>Can I change or cancel my booking?</summary>
                            <p>Yes you can, however once you have made a booking with FDS Parcel, you may be charged a £10.00 cancellation/change of details fee.</p>
                        </details>
                        
                    </div>

                </div>
            </section>

        </main>

 
