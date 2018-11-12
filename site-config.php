<?php

// *************** Basic Site Information *******************************************
/**
* Define site description
*/
define( 'SITE_BRAND', 'Victor Livery ' );
define( 'SITE_TITLE', 'Victor Livery' );
define( 'SITE_DOMAIN', 'http://victorlivery.com/' );
define( 'SITE_OWNER', 'Victor' );
define( 'SITE_CONTACT_PHONE', '781-346-8077, 781-521-6430' );
define( 'SITE_CONTACT_EMAIL', 'Unknown@gmail.com' );

/**
* Developer information
*/
define( 'DEVELOPER', 'MD. MONIR KHAN' );
define( 'DEVELOPER_WEB_SITE', 'http://monirkhan.net/' );
define( 'DEVELOPER_PHONE', '617-866-3824'  );
define( 'DEVELOPER_EMAIL', 'md.monir.khan707@gmail.com'  );


/**
* Define Payment Gate way
*/
define( 'PAYMENT_GATE_WAY', 'Stripe' );
define( 'PAYMENT_GATE_WAY_WEB_LINK', 'https://stripe.com/' );

//********************* Site Technical Setup
/**
* geting file from root directory
*/
define('root', $_SERVER['DOCUMENT_ROOT']);


// ************ Service Area *****************************
/**
* Defines Car Owner Service Area
* Thise section is extend able
*/
define( 'CAR_SERVICE_AREA', 'BOSTON, E.BOSTON, REVERE, CHELSEA, 
							EVERETT, MALDEN, LYNN, SOMERVILLE' );