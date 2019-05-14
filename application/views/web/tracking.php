<!DOCTYPE html>

<?php var_dump($tracking) ?>
<?php var_dump($trackingLog) ?>

<html lang="en" class="no-js">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>FDS PARCEL - FAST DELIVERY</title>
        <meta name="description" content="All For Movies" />
        <meta name="keywords" content="All For Movies" />
        <meta name="author" content="All For Movies" />
        <link rel="shortcut icon" href="http://all.com.pl/wp-content/themes/all/images/favicon.ico" />
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,800,500,600' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('views/web/') ?>css/normalize.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('views/web/') ?>css/style.css" />
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.2.0/css/font-awesome.min.css" />
        <!--[if IE]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    <body>

        <section class="top-nav">

            <div class="logo"><a href="http://serwiswordpress.pl/projekty/fdsparcel/"><img src="<?php echo base_url('views/web/') ?>img/logo.svg"></a></div>

            <input id="menu-toggle" type="checkbox" />
            <label class='menu-button-container' for="menu-toggle">
                <div class='menu-button'></div>
            </label>
            <ul class="menu">
                <li>About us</li>
                <li>Offer</li>
                <li>FAQ</li>
                <li>Contact</li>	
            </ul>
        </section>

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

                        <div id="first-step" class="step"><strong>Parcel handed to FDS</strong></div>
                        <div id="step-two" class="step">In transit</div>
                        <div class="step">At parcel delivery centre</div>
                        <div class="step">Parcel out for delivery</div>
                        <div id="last-step" class="step">Delivered</div>

                    </div>
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
                                    <div class="info-item"><?php echo $tracking->overallStatus ?></div>
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
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>

                    <div class="faq">

                        <details>
                            <summary>Question and answer</summary>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                        </details>

                        <details>
                            <summary>Question and answer</summary>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                        </details>

                        <details>
                            <summary>Question and answer</summary>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                        </details>

                        <details>
                            <summary>Question and answer</summary>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                        </details>

                        <details>
                            <summary>Question and answer</summary>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                        </details>

                    </div>

                </div>
            </section>

        </main>

        <footer class="footer">
            <div class="contener">
                <div class="footer-area">
                    <div class="footer-logo"><img src="<?php echo base_url('views/web/') ?>img/logowhite.svg"></div>
                    <div class="footer-menu">
                        <ul>
                            <li>About us</li>
                            <li>Offer</li>
                            <li>FAQ</li>
                            <li>Contact</li>					
                        </ul>
                    </div>
                </div>

                <div class="footer-note">The parcel tracking function which is available via the parcel tracking system as well as the parcel tracking data which is accessed via the system is the property of FDS. FDS provides permission for the use of its parcel tracking system only for the purpose of checking on the status of shipments which you have entrusted to FDS for transport and delivery, or which have been entrusted to FDS for this purpose by a third party acting on your behalf. Permission is not provided for the use of the data for other purposes. Without the express written permission of FDS customers do not have the right to make available the parcel tracking data on a website, to reproduce it elsewhere or to distribute, copy, save, use or sell it for commercial purposes. The service in question is a personal service, which means that your right to use the parcel tracking system or the parcel tracking data is only valid within the framework of the contractual relationship between the consignor, shipping service provider and consignee. In the event of any breach of these provisions the right to access the parcel tracking function may be withdrawn and the user IDs and passwords deleted. In addition any contravention may be subject to legal penalties. 
                    Any access to the parcel tracking function or use of the parcel tracking system / parcel tracking data which does not comply with these contractual provisions is implemented without approval and is strictly forbidden.</div>
            </div>

        </footer>

    </body>
</html>
