<?php

$CONFIG['CONFERENCE'] = array(
	/**
	 * Der Startzeitpunkt der Konferenz als Unix-Timestamp. Befinden wir uns davor, wird die Closed-Seite
	 * mit einem Text der Art "hat noch nicht angefangen" angezeigt.
	 *
	 * Wird dieser Zeitpunkt nicht angegeben, gilt die Konferenz immer als angefangen. (Siehe aber ENDS_AT
	 * und CLOSED weiter unten)
	 */
	'STARTS_AT' => strtotime("2018-09-21 10:00"),

	/**
	 * Der Endzeitpunkt der Konferenz als Unix-Timestamp. Befinden wir uns danach, wird eine Danke-Und-Kommen-Sie-
	 * Gut-Nach-Hause-Seite sowie einem Ausblick auf die kommenden Events angezeigt.
	 *
	 * Wird dieser Zeitpunkt nicht angegeben, endet die Konferenz nie. (Siehe aber CLOSED weiter unten)
	 */
	'ENDS_AT' => strtotime("2018-09-21 19:00"),

	/**
	 * Hiermit kann die Funktionalitaet von STARTS_AT/ENDS_AT überschrieben werden. Der Wert 'before'
	 * simuliert, dass die Konferenz noch nicht begonnen hat. Der Wert 'after' simuliert, dass die Konferenz
	 * bereits beendet ist. 'running' simuliert eine laufende Konferenz.
	 *
	 * Der Boolean true ist aus Abwärtskompatibilitätsgründen äquivalent zu 'after'. False ist äquivalent
	 * zu 'running'.
	 */
	//'CLOSED' => 'running',

	/**
	 * Titel der Konferenz (kann Leer- und Sonderzeichen enthalten)
	 * Dieser im Seiten-Header, im <title>-Tag, in der About-Seite und ggf. ab weiteren Stellen als
	 * Anzeigetext benutzt
	 */
	'TITLE' => 'Das ist Netzpolitik! #14np',

	/**
	 * Veranstalter
	 * Wird für den <meta name="author">-Tag verdet. Wird diese Zeile auskommentiert, wird kein solcher
	 * <meta>-Tag generiert.
	 */
	'AUTHOR' => 'netzpolitik.org',

	/**
	 * Beschreibungstext
	 * Wird für den <meta name="description">-Tag verdet. Wird diese Zeile auskommentiert, wird kein solcher
	 * <meta>-Tag generiert.
	 */
//	'DESCRIPTION' => '<img src="./configs/conferences/jh-nord-2017/Icon_JH-Nord-2017.svg" class="iconjh">',

	/**
	 * Schlüsselwortliste, Kommasepariert
	 * Wird für den <meta name="keywords">-Tag verdet. Wird diese Zeile auskommentiert, wird kein solcher
	 * <meta>-Tag generiert.
	 */
	'KEYWORDS' => 'netzpolitik, IoT, Datenschutz, Regulierung, Netzneutralität, Blockchain, Privatsphäre, Bildung, Journalismus',

	/**
	 * HTML-Code für den Footer (z.B. für spezielle Attribuierung mit <a>-Tags)
	 * Sollte üblicherweise nur Inline-Elemente enthalten
	 * Wird diese Zeile auskommentiert, wird die Standard-Attribuierung für (c3voc.de) verwendet
	 */
	'FOOTER_HTML' => '
		by <a href="https://netzpolitk.org/">netzpolitik.org</a> &amp;
		<a href="https://c3voc.de">C3VOC</a>
	',

	/**
	 * HTML-Code für den Banner (nur auf der Startseite, direkt unter dem Header)
	 * wird üblicherweise für KeyVisuals oder Textmarke verwendet (vgl. Blaues
	 * Wischiwaschi auf http://media.ccc.de/)
	 *
	 * Dieser HTML-Block wird üblicherweise in der main.less speziell für die
	 * Konferenz umgestaltet.
	 *
	 * Wird diese Zeile auskommentiert, wird kein Banner ausgegeben.
	 */
	//'BANNER_HTML' => '<img src="../configs/conferences/jh-nord-2017/Banner_JH-Nord-2017.svg" class="jhnord">',

	/**
	 * Link zu den Recordings
	 * Wird diese Zeile auskommentiert, wird der Link nicht angezeigt
	 */
	'RELEASES' => 'https://media.ccc.de/c/14np',

	/**
	 * Link zu einer (externen) ReLive-Übersichts-Seite
	 * Wird diese Zeile auskommentiert, wird der Link nicht angezeigt
	 */
	//'RELIVE' => 'http://vod.c3voc.de/',

	/**
	 * Alternativ kann ein ReLive-Json konfiguriert werden, um die interne
	 * ReLive-Ansicht zu aktivieren.
	 *
	 * Wird beides aktiviert, hat der externe Link Vorrang!
	 * Wird beides auskommentiert, wird der Link nicht angezeigt
	 */
	'RELIVE_JSON' => 'http://relive.c3voc.de/relive/14np/index.json',

	/**
	 * APCU-Cache-Zeit in Sekunden
	 * Wird diese Zeile auskommentiert, werden die apc_*-Methoden nicht verwendet und
	 * das Relive-Json bei jedem Request von der Quelle geladen und geparst
	 */
	//'RELIVE_JSON_CACHE' => 30*60,
);

/**
 * Konfiguration der Stream-Übersicht auf der Startseite
 */
$CONFIG['OVERVIEW'] = array(
	/**
	 * Abschnitte aud der Startseite und darunter aufgeführte Räume
	 * Es können beliebig neue Gruppen und Räume hinzugefügt werden
	 *
	 * Die Räume müssen in $CONFIG['ROOMS'] konfiguriert werden,
	 * sonst werden sie nicht angezeigt.
	 */
	'GROUPS' => array(
		'Lecture Rooms' => array(
			'Saal1', 'Saal2'
		),
	),
);



/**
 * Liste der Räume (= Audio & Video Produktionen, also auch DJ-Sets oä.)
 */
$CONFIG['ROOMS'] = array(
	/**
	 * Array-Key ist der Raum-Slug, der z.B. auch zum erstellen der URLs,
	 * in $CONFIG['OVERVIEW'] oder im Feedback verwendet wird.
	 */
	'Saal1' => array(
		'DISPLAY' => 'Hauptbühne',
		'STREAM' => 's1',
		'PREVIEW' => true,
		'TRANSLATION' => false,


		'SD_VIDEO' => true,
		'HD_VIDEO' => true,
		'SLIDES' => false,
                'DASH' => true,

		'AUDIO' => true,
		'MUSIC' => false,

		'SCHEDULE' => true,
		'SCHEDULE_NAME' => 'Hauptbühne',

		'FEEDBACK' => false,
		'SUBTITLES' => false,

		'EMBED' => true,
		'IRC' => false,
	),
	'Saal2' => array(
		'DISPLAY' => 'Roter Salon',
		'STREAM' => 's2',
		'PREVIEW' => true,
		'TRANSLATION' => false,


		'SD_VIDEO' => true,
		'HD_VIDEO' => true,
		'SLIDES' => false,
                'DASH' => true,

		'AUDIO' => true,
		'MUSIC' => false,

		'SCHEDULE' => true,
		'SCHEDULE_NAME' => 'Roter Salon',

		'FEEDBACK' => false,
		'SUBTITLES' => false,

		'EMBED' => true,
		'IRC' => false,
	),
);

/**
 * Globaler Schalter für die Embedding-Funktionalitäten
 *
 * Wird diese Zeile auskommentiert oder auf False gesetzt, werden alle
 * Embedding-Funktionen deaktiviert.
 */
$CONFIG['EMBED'] = true;

/**
 * Konfigurationen zum Konferenz-Fahrplan
 * Wird dieser Block auskommentiert, werden alle Fahrplan-Bezogenen Features deaktiviert
 */
$CONFIG['SCHEDULE'] = array(
	/**
	 * URL zum Fahrplan-XML
	 *
	 * Diese URL muss immer verfügbar sein, sonst können kann die Programm-Ansicht
	 * aufhören zu funktionieren. Wenn die Quelle unverlässlich ist ;) sollte ein
	 * externer HTTP-Cache vorgeschaltet werden.
	 */
	'URL' => 'https://www.thorti.de/media/np14/np14.xml',

	/**
	 * Nur die angegebenen Räume aus dem Fahrplan beachten
	 *
	 * Wird diese Zeile auskommentiert, werden alle Räume angezeigt
	 */
#	'ROOMFILTER' => array('HS 1', 'HS 3', 'HS 4', 'HS 5', 'HS 6', 'HS 7', 'HS 8', 'C116 (OSGeo)'),

	/**
	 * Skalierung der Programm-Vorschau in Sekunden pro Pixel
	 */
	'SCALE' => 7,

	/**
	 * Simuliere das Verhalten als wäre die Konferenz bereits heute
	 *
	 * Diese folgende Beispiel-Zeile Simuliert, dass das
	 * Konferenz-Datum 2014-12-29 auf den heutigen Tag 2015-02-24 verschoben ist.
	 */
	//'SIMULATE_OFFSET' => strtotime(/* Conference-Date */ '2017-05-21') - strtotime(/* Today */ '2017-05-19'),
	'SIMULATE_OFFSET' => 0,
);


return $CONFIG;
