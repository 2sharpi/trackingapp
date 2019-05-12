<?php

defined('BASEPATH') or exit ('access denied');

class TrackingLog extends CI_Model{

private $caseLibrary = array(
    'umówiono późniejszy termin doręcznia' => array ('hierarchy' => '4' ,'Description' => 'Recipient changed delivery date', 'overallStatus' => 'At parcel delivery centre', 'address' => 'API'),
    'brak przesyłki w oddziale doręczającym' => array ('hierarchy' => '0' ,'Description' => '', 'overallStatus' => '', 'address' => ''),
    'nie doręczono - brak możliwości dojazdu' => array ('hierarchy' => '4' ,'Description' => 'Undelivered - Wrong Address', 'overallStatus' => 'At parcel delivery centre', 'address' => 'API'),
    'przyjęcie przesyłki w oddziale DPD' => array ('hierarchy' => '2' ,'Description' => 'Arrived FDS Parcel Centre, In Transit', 'overallStatus' => 'In Transit', 'address' => 'FDS (GB)'),
    'przyjęcie przesyłki w sortowni' => array ('hierarchy' => '2' ,'Description' => 'Arrived FDS Parcel Centre, In Transit', 'overallStatus' => 'In Transit', 'address' => 'FDS (GB)'),
    'przesyłka doręczona' => array ('hierarchy' => '5' ,'Description' => 'Delivered lub Delivered to Sender', 'overallStatus' => 'Delivered', 'address' => 'API'),
    'przesyłka niedoręczona - towar niezamawiany' => array ('hierarchy' => '4' ,'Description' => 'Undelivered - Recipient rejected the delivery', 'overallStatus' => 'At parcel delivery centre', 'address' => 'API'),
    'przesyłka niedoręczona- odmowa zapłaty COD - niewłaściwa forma płatności' => array ('hierarchy' => '' ,'Description' => 'Undelivered - Recipient rejected the delivery', 'overallStatus' => 'At parcel delivery centre', 'address' => 'API'),
    'przesyłka niedoręczona - odmowa zapłaty COD - błędna kwota COD' => array ('hierarchy' => '4' ,'Description' => 'Undelivered - Recipient rejected the delivery', 'overallStatus' => 'At parcel delivery centre', 'address' => 'API'),
    'przesyłka niedoręczona - błędny adres' => array ('hierarchy' => '4' ,'Description' => 'Undelivered - Wrong Address', 'overallStatus' => 'At parcel delivery centre', 'address' => 'API'),
    'przesyłka niedoręczona - brak gotówki COD' => array ('hierarchy' => '4' ,'Description' => 'Undelivered - Recipient rejected the delivery', 'overallStatus' => 'At parcel delivery centre', 'address' => 'API'),
    'przesyłka niedoręczona - odbiorca nieobecny' => array ('hierarchy' => '4' ,'Description' => 'Parcel could not be delivered, recipient absent', 'overallStatus' => 'At parcel delivery centre', 'address' => 'API'),
    'przesyłka niedoręczona - negatywna weryfikacja odbiorcy' => array ('hierarchy' => '4' ,'Description' => 'Undelivered - Recipient rejected the delivery', 'overallStatus' => 'At parcel delivery centre', 'address' => 'API'),
    'przesyłka niedoręczona - rezygnacja klienta z przesyłki' => array ('hierarchy' => '4' ,'Description' => 'Undelivered - Recipient rejected the delivery', 'overallStatus' => 'At parcel delivery centre', 'address' => 'API'),
    'przesyłka niedoręczona - odmowa z podpisem' => array ('hierarchy' => '4' ,'Description' => 'Undelivered - Recipient rejected the delivery', 'overallStatus' => 'At parcel delivery centre', 'address' => 'API'),
    'przesyłka niedoręczona - odmowa' => array ('hierarchy' => '4' ,'Description' => 'Undelivered - Recipient rejected the delivery', 'overallStatus' => 'At parcel delivery centre', 'address' => 'API'),
    'przesyłka niedoręczona - odmowa - niewłaściwa forma zapłaty EXW' => array ('hierarchy' => '4' ,'Description' => 'Undelivered - Recipient rejected the delivery', 'overallStatus' => 'At parcel delivery centre', 'address' => 'API'),
    'przesyłka niedoręczona - odmowa - dokumenty zwrotne niezgodne z ' => array ('hierarchy' => '4' ,'Description' => 'Undelivered - Recipient rejected the delivery', 'overallStatus' => 'At parcel delivery centre', 'address' => 'API'),
    'przesyłka niedoręczona - odmowa - błędna kwota EXW' => array ('hierarchy' => '4' ,'Description' => 'Undelivered - Recipient rejected the delivery', 'overallStatus' => 'At parcel delivery centre', 'address' => 'API'),
    'przesyłka niedoręczona - odmowa - brak gotówki EXW' => array ('hierarchy' => '4' ,'Description' => 'Undelivered - Recipient rejected the delivery', 'overallStatus' => '', 'address' => 'API'),
    'przesyłka niedoręczona - odmowa - brak dokumentów zwrotnych przy paczce' => array ('hierarchy' => '4' ,'Description' => 'Undelivered - Recipient rejected the delivery', 'overallStatus' => '', 'address' => 'API'),
    'przesyłka niedoręczona - odmowa - przesyłka niekompletna' => array ('hierarchy' => '4' ,'Description' => 'Undelivered - Recipient rejected the delivery', 'overallStatus' => 'At parcel delivery centre', 'address' => 'API'),
    'przesyłka niedoręczona - odmowa - paczka uszkodzona' => array ('hierarchy' => '4' ,'Description' => 'Undelivered - Recipient rejected the delivery', 'overallStatus' => 'At parcel delivery centre', 'address' => 'API'),
    'przesyłka niedoręczona - rezygnacja telefoniczna' => array ('hierarchy' => '4' ,'Description' => 'Undelivered - Recipient rejected the delivery', 'overallStatus' => 'At parcel delivery centre', 'address' => 'API'),
    'przesyłka odebrana przez Kuriera' => array ('hierarchy' => '1' ,'Description' => 'Collected from Sender', 'overallStatus' => 'Parcel handed to FDS', 'address' => 'Bedford MK42 (GB)'),
    'przeadresowanie przesyłki zgodnie z dyspozycją' => array ('hierarchy' => '1' ,'Description' => 'Collected from Sender', 'overallStatus' => 'Parcel handed to FDS', 'address' => 'Bedford MK42 (GB)'),
    'wydanie przesyłki do doręczenia' => array ('hierarchy' => '4' ,'Description' => 'Out for delivery', 'overallStatus' => 'Out for delivery', 'address' => 'FDS Depot'),
    'przepakowanie przesyłki' => array ('hierarchy' => '1' ,'Description' => 'Collected from Sender', 'overallStatus' => 'Parcel handed to FDS', 'address' => 'Bedford MK42 (GB)'),
    'zwrot przesyłki' => array ('hierarchy' => '1' ,'Description' => 'Returned to sender', 'overallStatus' => 'In Transit', 'address' => 'FDS depot'),
    'magazynowanie przesyłki w oddziale' => array ('hierarchy' => '' ,'Description' => 'Parcel is awaiting for personal collection, please contact us for details', 'overallStatus' => 'At parcel delivery centre', 'address' => 'FDS DE'),
    'zmiana wagi przesyłki' => array ('hierarchy' => '1' ,'Description' => 'Collected from Sender', 'overallStatus' => 'Parcel handed to FDS', 'address' => 'Bedford MK42 (GB)'),
    'odbiór własny' => array ('hierarchy' => '5' ,'Description' => 'Delivered lub Delivered to Sender', 'overallStatus' => 'Delivered', 'address' => 'API'),
    'błąd w sortowaniu' => array ('hierarchy' => '1' ,'Description' => 'Collected from Sender', 'overallStatus' => 'Parcel handed to FDS', 'address' => 'Bedford MK42 (GB)'),
    'dokumenty zwrotne wysłane do nadawcy' => array ('hierarchy' => '0' ,'Description' => '', 'overallStatus' => '', 'address' => ''),
    'przesyłka niedoręczona- firma zmieniona siedziba' => array ('hierarchy' => '4' ,'Description' => 'Undelivered - Wrong Address', 'overallStatus' => 'At parcel delivery centre', 'address' => 'API'),
    'likwidacja przesyłki' => array ('hierarchy' => '' ,'Description' => '0', 'overallStatus' => '', 'address' => ''),
    'zlecenie przekazane do realizacji' => array ('hierarchy' => '1' ,'Description' => 'Collected from Sender', 'overallStatus' => 'Parcel handed to FDS', 'address' => 'Bedford MK42 (GB)'),
    'zlecenie niezrealizowane - liczba paczek inna niż w zleceniu' => array ('hierarchy' => '1' ,'Description' => 'Collected from Sender', 'overallStatus' => 'Parcel handed to FDS', 'address' => 'Bedford MK42 (GB)'),
    'zlecenie niezrealizowane - błędny adres' => array ('hierarchy' => '1' ,'Description' => 'Collected from Sender', 'overallStatus' => 'Parcel handed to FDS', 'address' => 'Bedford MK42 (GB)'),
    'zlecenie niezrealizowane - niewłaściwy wymiar/waga paczki' => array ('hierarchy' => '1' ,'Description' => 'Collected from Sender', 'overallStatus' => 'Parcel handed to FDS', 'address' => 'Bedford MK42 (GB)'),
    'zlecenie niezrealizowane - rezygnacja nadawcy' => array ('hierarchy' => '1' ,'Description' => 'Collected from Sender', 'overallStatus' => 'Parcel handed to FDS', 'address' => 'Bedford MK42 (GB)'),
    'zlecenie niezrealizowane - nadawca niepoinformowany' => array ('hierarchy' => '1' ,'Description' => 'Collected from Sender', 'overallStatus' => 'Parcel handed to FDS', 'address' => 'Bedford MK42 (GB)'),
    'zlecenie niezrealizowane - brak dokumentów celnych' => array ('hierarchy' => '1' ,'Description' => 'Collected from Sender', 'overallStatus' => 'Parcel handed to FDS', 'address' => 'Bedford MK42 (GB)'),
    'zlecenie niezrealizowane - paczka nieprzygotowana' => array ('hierarchy' => '1' ,'Description' => 'Collected from Sender', 'overallStatus' => 'Parcel handed to FDS', 'address' => 'Bedford MK42 (GB)'),
    'zlecenie niezrealizowane - liczba paczek inna niż w zleceniu' => array ('hierarchy' => '1' ,'Description' => 'Collected from Sender', 'overallStatus' => 'Parcel handed to FDS', 'address' => 'Bedford MK42 (GB)'),
    'przesyłka doręczona, odbiorca stwierdził uszkodzenie.' => array ('hierarchy' => '5' ,'Description' => 'Delivered to Sender', 'overallStatus' => 'Delivered', 'address' => 'API'),
    'przyjęcie przesyłki do punktu Pickup' => array ('hierarchy' => '2' ,'Description' => 'Arrived FDS Parcel Centre, In Transit', 'overallStatus' => 'In Transit', 'address' => 'FDS (GB)'),
    'przyjęcie przesyłki w oddziale DPD ' => array ('hierarchy' => '2' ,'Description' => 'Arrived FDS Parcel Centre, In Transit', 'overallStatus' => 'In Transit', 'address' => 'FDS (GB)'),
    'przesyłka niedoręczona - rezygnacja klienta z przesyłki' => array ('hierarchy' => '4' ,'Description' => 'Undelivered - Recipient rejected the delivery', 'overallStatus' => 'At parcel delivery centre', 'address' => 'API'),
    'przesyłka doręczona.' => array ('hierarchy' => '5' ,'Description' => 'Delivered to Sender', 'overallStatus' => 'Delivered', 'address' => 'API'),
    'przesyłka doręczona w punkcie Pickup' => array ('hierarchy' => '5' ,'Description' => 'Delivered lub Delivered to Sender', 'overallStatus' => 'Delivered', 'address' => 'API'),
    'przekazanie przesyłki do doręczenia w punkcie Pickup' => array ('hierarchy' => '4' ,'Description' => 'Out for delivery', 'overallStatus' => 'Delivered', 'address' => 'Bedford MK42 (GB)'),
    'przekazanie przesyłki kurierowi' => array ('hierarchy' => '4' ,'Description' => 'Collected from Sender', 'overallStatus' => 'Out for delivery', 'address' => 'Bedford MK42 (GB)'),
    'nieprzygotowana przesyłka zwrotna' => array ('hierarchy' => '1' ,'Description' => 'Collected from Sender', 'overallStatus' => 'Parcel handed to FDS', 'address' => 'Bedford MK42 (GB)'),
    'przesyłka niedoręczona - odmowa' => array ('hierarchy' => '4' ,'Description' => 'Undelivered - Recipient rejected the delivery', 'overallStatus' => 'At parcel delivery centre', 'address' => 'API'),
    'umówiono odbiór własny' => array ('hierarchy' => '4' ,'Description' => 'Recipient changed delivery date', 'overallStatus' => 'At parcel delivery centre', 'address' => 'API'),
    'przesyłka niedoręczona - rezygnacja klienta z przesyłki' => array ('hierarchy' => '4' ,'Description' => 'Undelivered - Recipient rejected the delivery', 'overallStatus' => 'At parcel delivery centre', 'address' => 'API'),
    'nie przekazana do punktu Pickup' => array ('hierarchy' => '0' ,'Description' => '', 'overallStatus' => '', 'address' => ''),
    'nie przekazana do punktu Pickup - Błąd Kuriera' => array ('hierarchy' => '0' ,'Description' => '', 'overallStatus' => '', 'address' => ''),
    'nie przekazana do punktu Pickup - Paczka uszkodzona' => array ('hierarchy' => '0' ,'Description' => '', 'overallStatus' => '', 'address' => ''),
    'nie przekazana do punktu Pickup - Paczka nie spełnia wymogów' => array ('hierarchy' => '0' ,'Description' => '', 'overallStatus' => '', 'address' => ''),
    'nadanie przesyłki w punkcie Pickup' => array ('hierarchy' => '1' ,'Description' => 'Collected from Sender', 'overallStatus' => 'Parcel handed to FDS', 'address' => 'Bedford MK42 (GB)'),
    'paczka wysłana do oddziału DPD' => array ('hierarchy' => '0' ,'Description' => '', 'overallStatus' => '', 'address' => ''),
    'paczka odebrana z punktu' => array ('hierarchy' => '5' ,'Description' => 'Delivered', 'overallStatus' => 'Delivered', 'address' => 'API'),
    'przyjęcie przesyłki do punktu Pickup' => array ('hierarchy' => '1' ,'Description' => 'Collected from Sender', 'overallStatus' => 'Parcel handed to FDS', 'address' => 'Bedford MK42 (GB)'),
    'przekroczenie terminu oczekiwania na odbiór w punkcie Pickup' => array ('hierarchy' => '4' ,'Description' => 'Time frame exceeded, Package will be returned to sender', 'overallStatus' => 'At parcel delivery centre', 'address' => 'FDS Depot'),
    'przesyłka doręczona - odebrano przesyłkę zwrotną.' => array ('hierarchy' => '0' ,'Description' => '', 'overallStatus' => '', 'address' => ''),
    'przesyłka doręczona w punkcie Pickup - Odebrano przesyłkę zwrotną' => array ('hierarchy' => '0' ,'Description' => '', 'overallStatus' => '', 'address' => 'API'),
    'przechowywanie przesyłki w punkcie Pickup' => array ('hierarchy' => '4' ,'Description' => 'At parcel delivery centre', 'overallStatus' => 'At parcel delivery centre', 'address' => 'FDS Depot'),
    'zarejestrowano dane przesylki, przesylka jeszcze nie nadana' => array ('hierarchy' => '1' ,'Description' => 'Collected from Sender', 'overallStatus' => 'Parcel handed to FDS', 'address' => 'Bedford MK42 (GB)'),
    'nieprzygotowana przesyłka zwrotna' => array ('hierarchy' => '0' ,'Description' => '', 'overallStatus' => '', 'address' => ''),
    'wysłano powiadomienie' => array ('hierarchy' => '0' ,'Description' => '', 'overallStatus' => '', 'address' => ''),
    'zlecenie niezrealizowane - nadawca nieobecny' => array ('hierarchy' => '1' ,'Description' => 'Collected from Sender', 'overallStatus' => 'Parcel handed to FDS', 'address' => 'Bedford MK42 (GB)'),
    'zlecenie niezrealizowane - prosimy o kontakt' => array ('hierarchy' => '1' ,'Description' => 'Collected from Sender', 'overallStatus' => 'Parcel handed to FDS', 'address' => 'Bedford MK42 (GB)'),
    'przekazano za granicę' => array ('hierarchy' => '3' ,'Description' => 'The parcel is in transit on its way to its final destination', 'overallStatus' => 'In Transit', 'address' => 'FDS Hub, Hinckley (GB)'),
    'stworzenie zlecenia CR' => array ('hierarchy' => '1' ,'Description' => 'Collected from Sender', 'overallStatus' => 'Parcel handed to FDS', 'address' => 'Bedford MK42 (GB)')
);

    public function getTrackingCase(){


}
