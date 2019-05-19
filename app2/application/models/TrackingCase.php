<?php

defined('BASEPATH') or exit('access denied');

class TrackingCase extends CI_Model {

    private $caseLibrary = array(
        'umówiono późniejszy termin doręcznia' => array('hierarchy' => '4', 'description' => 'Recipient changed delivery date', 'overallStatus' => 'At parcel delivery centre', 'address' => 'Dane klienta (CSV), API(Panstwo)'),
        'brak przesyłki w oddziale doręczającym' => array('hierarchy' => '0', 'description' => '', 'overallStatus' => '', 'address' => ''),
        'nie doręczono - brak możliwości dojazdu' => array('hierarchy' => '4', 'description' => 'Undelivered - Wrong Address', 'overallStatus' => 'At parcel delivery centre', 'address' => 'Dane klienta (CSV), API(Panstwo)'),
        'przyjęcie przesyłki w oddziale dpd' => array('hierarchy' => '2', 'description' => 'Arrived FDS Parcel Centre, In Transit', 'overallStatus' => 'In Transit', 'address' => 'FDS (GB)'),
        'przyjęcie przesyłki w sortowni' => array('hierarchy' => '2', 'description' => 'Arrived FDS Parcel Centre, In Transit', 'overallStatus' => 'In Transit', 'address' => 'FDS (GB)'),
        'przesyłka doręczona' => array('hierarchy' => '5', 'description' => 'Delivered', 'overallStatus' => 'Delivered', 'address' => 'Dane klienta (CSV), API(Panstwo) lub Bedford MK42, GB - gdy zwrot'),
        'przesyłka niedoręczona - towar niezamawiany' => array('hierarchy' => '4', 'description' => 'Undelivered - Recipient rejected the delivery', 'overallStatus' => 'At parcel delivery centre', 'address' => 'Dane klienta (CSV), API(Panstwo)'),
        'przesyłka niedoręczona- odmowa zapłaty cod - niewłaściwa forma płatności' => array('hierarchy' => '', 'description' => 'Undelivered - Recipient rejected the delivery', 'overallStatus' => 'At parcel delivery centre', 'address' => 'Dane klienta (CSV), API(Panstwo)'),
        'przesyłka niedoręczona - odmowa zapłaty cod - błędna kwota cod' => array('hierarchy' => '4', 'description' => 'Undelivered - Recipient rejected the delivery', 'overallStatus' => 'At parcel delivery centre', 'address' => 'Dane klienta (CSV), API(Panstwo)'),
        'przesyłka niedoręczona - błędny adres' => array('hierarchy' => '4', 'description' => 'Undelivered - Wrong Address', 'overallStatus' => 'At parcel delivery centre', 'address' => 'Dane klienta (CSV), API(Panstwo)'),
        'przesyłka niedoręczona - brak gotówki cod' => array('hierarchy' => '4', 'description' => 'Undelivered - Recipient rejected the delivery', 'overallStatus' => 'At parcel delivery centre', 'address' => 'Dane klienta (CSV), API(Panstwo)'),
        'przesyłka niedoręczona - odbiorca nieobecny' => array('hierarchy' => '4', 'description' => 'Parcel could not be delivered, recipient absent', 'overallStatus' => 'At parcel delivery centre', 'address' => 'Dane klienta (CSV), API(Panstwo)'),
        'przesyłka niedoręczona - negatywna weryfikacja odbiorcy' => array('hierarchy' => '4', 'description' => 'Undelivered - Recipient rejected the delivery', 'overallStatus' => 'At parcel delivery centre', 'address' => 'Dane klienta (CSV), API(Panstwo)'),
        'przesyłka niedoręczona - rezygnacja klienta z przesyłki' => array('hierarchy' => '4', 'description' => 'Undelivered - Recipient rejected the delivery', 'overallStatus' => 'At parcel delivery centre', 'address' => 'Dane klienta (CSV), API(Panstwo)'),
        'przesyłka niedoręczona - odmowa z podpisem' => array('hierarchy' => '4', 'description' => 'Undelivered - Recipient rejected the delivery', 'overallStatus' => 'At parcel delivery centre', 'address' => 'Dane klienta (CSV), API(Panstwo)'),
        'przesyłka niedoręczona - odmowa' => array('hierarchy' => '4', 'description' => 'Undelivered - Recipient rejected the delivery', 'overallStatus' => 'At parcel delivery centre', 'address' => 'Dane klienta (CSV), API(Panstwo)'),
        'przesyłka niedoręczona - odmowa - niewłaściwa forma zapłaty exw' => array('hierarchy' => '4', 'description' => 'Undelivered - Recipient rejected the delivery', 'overallStatus' => 'At parcel delivery centre', 'address' => 'Dane klienta (CSV), API(Panstwo)'),
        'przesyłka niedoręczona - odmowa - dokumenty zwrotne niezgodne z ' => array('hierarchy' => '4', 'description' => 'Undelivered - Recipient rejected the delivery', 'overallStatus' => 'At parcel delivery centre', 'address' => 'Dane klienta (CSV), API(Panstwo)'),
        'przesyłka niedoręczona - odmowa - błędna kwota exw' => array('hierarchy' => '4', 'description' => 'Undelivered - Recipient rejected the delivery', 'overallStatus' => 'At parcel delivery centre', 'address' => 'Dane klienta (CSV), API(Panstwo)'),
        'przesyłka niedoręczona - odmowa - brak gotówki exw' => array('hierarchy' => '4', 'description' => 'Undelivered - Recipient rejected the delivery', 'overallStatus' => '', 'address' => 'Dane klienta (CSV), API(Panstwo)'),
        'przesyłka niedoręczona - odmowa - brak dokumentów zwrotnych przy paczce' => array('hierarchy' => '4', 'description' => 'Undelivered - Recipient rejected the delivery', 'overallStatus' => '', 'address' => 'Dane klienta (CSV), API(Panstwo)'),
        'przesyłka niedoręczona - odmowa - przesyłka niekompletna' => array('hierarchy' => '4', 'description' => 'Undelivered - Recipient rejected the delivery', 'overallStatus' => 'At parcel delivery centre', 'address' => 'Dane klienta (CSV), API(Panstwo)'),
        'przesyłka niedoręczona - odmowa - paczka uszkodzona' => array('hierarchy' => '4', 'description' => 'Undelivered - Recipient rejected the delivery', 'overallStatus' => 'At parcel delivery centre', 'address' => 'Dane klienta (CSV), API(Panstwo)'),
        'przesyłka niedoręczona - rezygnacja telefoniczna' => array('hierarchy' => '4', 'description' => 'Undelivered - Recipient rejected the delivery', 'overallStatus' => 'At parcel delivery centre', 'address' => 'Dane klienta (CSV), API(Panstwo)'),
        'przesyłka odebrana przez kuriera' => array('hierarchy' => '1', 'description' => 'Collected from Sender', 'overallStatus' => 'Parcel handed to FDS', 'address' => 'Bedford MK42 (GB)'),
        'przeadresowanie przesyłki zgodnie z dyspozycją' => array('hierarchy' => '1', 'description' => 'Collected from Sender', 'overallStatus' => 'Parcel handed to FDS', 'address' => 'Bedford MK42 (GB)'),
        'wydanie przesyłki do doręczenia' => array('hierarchy' => '4', 'description' => 'Out for delivery', 'overallStatus' => 'Out for delivery', 'address' => 'FDS depot, API(Panstwo)'),
        'przepakowanie przesyłki' => array('hierarchy' => '0', 'description' => 'Collected from Sender', 'overallStatus' => 'Parcel handed to FDS', 'address' => 'FDS depot, API(Panstwo)'),
        'zwrot przesyłki' => array('hierarchy' => '1', 'description' => 'Returned to sender', 'overallStatus' => 'In Transit', 'address' => 'FDS depot, API(Panstwo)'),
        'magazywnowanie przesyłki w oddziale' => array('hierarchy' => '', 'description' => 'Parcel is awaiting for personal collection, please contact us for details', 'overallStatus' => 'At parcel delivery centre', 'address' => 'FDS depot, API(Panstwo)'),
        'magazynowanie przesyłki w oddziale' => array('hierarchy' => '', 'description' => 'Parcel is awaiting for personal collection, please contact us for details', 'overallStatus' => 'At parcel delivery centre', 'address' => 'FDS depot, API(Panstwo)'),
        'zmiana wagi przesyłki' => array('hierarchy' => '1', 'description' => 'Collected from Sender', 'overallStatus' => 'Parcel handed to FDS', 'address' => 'Bedford MK42 (GB)'),
        'odbiór własny' => array('hierarchy' => '5', 'description' => 'Delivered', 'overallStatus' => 'Delivered', 'address' => 'Dane klienta (CSV), API(Panstwo)" lub "Bedford MK42, GB" - gdy zwrot'),
        'odbór własny' => array('hierarchy' => '5', 'description' => 'Delivered', 'overallStatus' => 'Delivered', 'address' => 'Dane klienta (CSV), API(Panstwo)" lub "Bedford MK42, GB" - gdy zwrot'),
        'błąd w sortowaniu' => array('hierarchy' => '0', 'description' => 'Collected from Sender', 'overallStatus' => 'Parcel handed to FDS', 'address' => 'Bedford MK42 (GB)'),
        'dokumenty zwrotne wysłane do nadawcy' => array('hierarchy' => '0', 'description' => '', 'overallStatus' => '', 'address' => ''),
        'przesyłka niedoręczona- firma zmieniona siedziba' => array('hierarchy' => '4', 'description' => 'Undelivered - Wrong Address', 'overallStatus' => 'At parcel delivery centre', 'address' => 'API'),
        'likwidacja przesyłki' => array('hierarchy' => '', 'description' => '0', 'overallStatus' => '', 'address' => ''),
        'zlecenie przekazane do realizacji' => array('hierarchy' => '1', 'description' => 'Collected from Sender', 'overallStatus' => 'Parcel handed to FDS', 'address' => 'Bedford MK42 (GB)'),
        'zlecenie niezrealizowane - liczba paczek inna niż w zleceniu' => array('hierarchy' => '1', 'description' => 'Collected from Sender', 'overallStatus' => 'Parcel handed to FDS', 'address' => 'Bedford MK42 (GB)'),
        'zlecenie niezrealizowane - błędny adres' => array('hierarchy' => '1', 'description' => 'Collected from Sender', 'overallStatus' => 'Parcel handed to FDS', 'address' => 'Bedford MK42 (GB)'),
        'zlecenie niezrealizowane - niewłaściwy wymiar/waga paczki' => array('hierarchy' => '1', 'description' => 'Collected from Sender', 'overallStatus' => 'Parcel handed to FDS', 'address' => 'Bedford MK42 (GB)'),
        'zlecenie niezrealizowane - rezygnacja nadawcy' => array('hierarchy' => '1', 'description' => 'Collected from Sender', 'overallStatus' => 'Parcel handed to FDS', 'address' => 'Bedford MK42 (GB)'),
        'zlecenie niezrealizowane - nadawca niepoinformowany' => array('hierarchy' => '1', 'description' => 'Collected from Sender', 'overallStatus' => 'Parcel handed to FDS', 'address' => 'Bedford MK42 (GB)'),
        'zlecenie niezrealizowane - brak dokumentów celnych' => array('hierarchy' => '1', 'description' => 'Collected from Sender', 'overallStatus' => 'Parcel handed to FDS', 'address' => 'Bedford MK42 (GB)'),
        'zlecenie niezrealizowane - paczka nieprzygotowana' => array('hierarchy' => '1', 'description' => 'Collected from Sender', 'overallStatus' => 'Parcel handed to FDS', 'address' => 'Bedford MK42 (GB)'),
        'zlecenie niezrealizowane - liczba paczek inna niż w zleceniu' => array('hierarchy' => '1', 'description' => 'Collected from Sender', 'overallStatus' => 'Parcel handed to FDS', 'address' => 'Bedford MK42 (GB)'),
        'przesyłka doręczona, odbiorca stwierdził uszkodzenie.' => array('hierarchy' => '5', 'description' => 'Delivered to Sender', 'overallStatus' => 'Delivered', 'address' => 'Dane klienta (CSV), API(Panstwo) lub Bedford MK42, GB - gdy zwrot'),
        'przyjęcie przesyłki do punktu pickup' => array('hierarchy' => '4', 'description' => 'Parcel Transferred to PickUp point as requested', 'overallStatus' => 'At parcel delivery center', 'address' => 'FDS (GB)'),
        'przyjęcie przesyłki w oddziale dpd' => array('hierarchy' => '2', 'description' => 'Arrived FDS Parcel Centre, In Transit', 'overallStatus' => 'In Transit', 'address' => 'FDS (GB)'),
        'przesyłka doręczona.' => array('hierarchy' => '5', 'description' => 'Delivered', 'overallStatus' => 'Delivered', 'address' => 'Dane klienta (CSV), API(Panstwo) lub Bedford MK42, GB - gdy zwrot'),
        'przesyłka doręczona' => array('hierarchy' => '5', 'description' => 'Delivered', 'overallStatus' => 'Delivered', 'address' => 'Dane klienta (CSV), API(Panstwo) lub Bedford MK42, GB - gdy zwrot'),
        'przesyłka doręczona w punkcie pickup' => array('hierarchy' => '5', 'description' => 'Delivered', 'overallStatus' => 'Delivered', 'address' => 'Dane klienta (CSV), API(Panstwo) lub Bedford MK42, GB - gdy zwrot'),
        'przekazanie przesyłki do doręczenia w punkcie pickup' => array('hierarchy' => '4', 'description' => 'Out for delivery', 'overallStatus' => 'Delivered', 'address' => 'FDS depot, API(Panstwo)'),
        'przekazanie przesyłki kurierowi' => array('hierarchy' => '4', 'description' => 'Collected from Sender', 'overallStatus' => 'Out for delivery', 'address' => 'Bedford MK42 (GB)'),
        'nieprzygotowana przesyłka zwrotna' => array('hierarchy' => '0', 'description' => 'Collected from Sender', 'overallStatus' => 'Parcel handed to FDS', 'address' => 'Bedford MK42 (GB)'),
        'przesyłka niedoręczona - odmowa' => array('hierarchy' => '4', 'description' => 'Undelivered - Recipient rejected the delivery', 'overallStatus' => 'At parcel delivery centre', 'address' => 'API'),
        'umówiono odbiór własny' => array('hierarchy' => '4', 'description' => 'Recipient changed delivery date', 'overallStatus' => 'At parcel delivery centre', 'address' => 'API'),
        'przesyłka niedoręczona - rezygnacja klienta z przesyłki' => array('hierarchy' => '4', 'description' => 'Undelivered - Recipient rejected the delivery', 'overallStatus' => 'At parcel delivery centre', 'address' => 'Dane klienta (CSV), API(Panstwo)'),
        'nie przekazana do punktu pickup' => array('hierarchy' => '0', 'description' => '', 'overallStatus' => '', 'address' => ''),
        'nie przekazana do punktu pickup - Błąd Kuriera' => array('hierarchy' => '0', 'description' => '', 'overallStatus' => '', 'address' => ''),
        'nie przekazana do punktu pickup - Paczka uszkodzona' => array('hierarchy' => '0', 'description' => '', 'overallStatus' => '', 'address' => ''),
        'nie przekazana do punktu pickup - Paczka nie spełnia wymogów' => array('hierarchy' => '0', 'description' => '', 'overallStatus' => '', 'address' => ''),
        'nadanie przesyłki w punkcie pickup' => array('hierarchy' => '1', 'description' => 'Collected from Sender', 'overallStatus' => 'Parcel handed to FDS', 'address' => 'Bedford MK42 (GB)'),
        'paczka wysłana do oddziału dpd' => array('hierarchy' => '0', 'description' => '', 'overallStatus' => '', 'address' => ''),
        'paczka odebrana z punktu' => array('hierarchy' => '5', 'description' => 'Delivered', 'overallStatus' => 'Delivered', 'address' => 'Dane klienta (CSV), API(Panstwo) lub Bedford MK42, GB - gdy zwrot'),
        'przekroczenie terminu oczekiwania na odbiór w punkcie pickup' => array('hierarchy' => '4', 'description' => 'Time frame exceeded, Package will be returned to sender', 'overallStatus' => 'At parcel delivery centre', 'address' => 'FDS depot, API(Panstwo)'),
        'przesyłka doręczona - odebrano przesyłkę zwrotną.' => array('hierarchy' => '0', 'description' => '', 'overallStatus' => '', 'address' => ''),
        'przesyłka doręczona w punkcie pickup - Odebrano przesyłkę zwrotną' => array('hierarchy' => '0', 'description' => '', 'overallStatus' => '', 'address' => 'API'),
        'przechowywanie przesyłki w punkcie pickup' => array('hierarchy' => '4', 'description' => 'At parcel delivery centre', 'overallStatus' => 'At parcel delivery centre', 'address' => 'FDS depot, API(Panstwo)'),
        'zarejestrowano dane przesyłki, przesyłka jeszcze nie nadana' => array('hierarchy' => '1', 'description' => 'Collected from Sender', 'overallStatus' => 'Parcel handed to FDS', 'address' => 'Bedford MK42 (GB)'),
        'zarejestrowano dane przesyłki, przesyłka jeszcze nienadana' => array('hierarchy' => '1', 'description' => 'Collected from Sender', 'overallStatus' => 'Parcel handed to FDS', 'address' => 'Bedford MK42 (GB)'),
        'nieprzygotowana przesyłka zwrotna' => array('hierarchy' => '0', 'description' => '', 'overallStatus' => '', 'address' => ''),
        'wysłano powiadomienie' => array('hierarchy' => '0', 'description' => '', 'overallStatus' => '', 'address' => ''),
        'zlecenie niezrealizowane - nadawca nieobecny' => array('hierarchy' => '1', 'description' => 'Collected from Sender', 'overallStatus' => 'Parcel handed to FDS', 'address' => 'Bedford MK42 (GB)'),
        'zlecenie niezrealizowane - prosimy o kontakt' => array('hierarchy' => '1', 'description' => 'Collected from Sender', 'overallStatus' => 'Parcel handed to FDS', 'address' => 'Bedford MK42 (GB)'),
        'przekazano za granicę' => array('hierarchy' => '3', 'description' => 'The parcel is in transit on its way to its final destination', 'overallStatus' => 'In Transit', 'address' => 'FDS Hub, Hinckley (GB)'),
        'stworzenie zlecenia cr' => array('hierarchy' => '1', 'description' => 'Collected from Sender', 'overallStatus' => 'Parcel handed to FDS', 'address' => 'Bedford MK42 (GB)')
    );

    public function getTrackingCase(string $trackingDescription) {
        return $this->caseLibrary[$trackingDescription];
    }

}
