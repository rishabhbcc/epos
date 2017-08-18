<?php
require_once 'lib/Braintree.php';

Braintree_Configuration::environment('sandbox');
Braintree_Configuration::merchantId('9xv2z2586s4jq9j9');
Braintree_Configuration::publicKey('cjhqn7ksvmcm9n47');
Braintree_Configuration::privateKey('0295f4cda716b2e3f52241b35b19af78');

/*
Braintree_Configuration::environment('sandbox');
Braintree_Configuration::merchantId('ns9ht7p82gyqynby');
Braintree_Configuration::publicKey('qjdytqkm2h5z5kjq');
Braintree_Configuration::privateKey('cf3df4f6077c5e15d0279824744d3ed3');
*/
?>