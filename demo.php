<?php
/**
 * Define autoloader.
 * @param string $class_name 
 */
function __autoload($class_name) {
  include 'class.' . $class_name . '.inc';
}
//Form to input an address into the database
echo '<form action="index.php" method="post">';
	
echo '<label>address_type_id:</label><br/>';
echo '<input id="address_type_id" type="text" name="address_type_id"><br/>';

echo '<label>street_address_1:</label><br/>';
echo '<input id="street_address_1" type="text" name="street_address_1"><br/>';

echo '<label>street_address_2:</label><br/>';
echo '<input id="street_address_2" type="text" name="street_address_2"><br/>';

echo '<label>city_name:</label><br/>';
echo '<input id="city_name" type="text" name="city_name"><br/>';

echo '<label>subdivision_name:</label><br/>';
echo '<input id="subdivision_name" type="text" name="subdivision_name"><br/>';

echo '<label>postal_code:</label><br/>';
echo '<input id="postal_code" type="text" name="postal_code"><br/>';

echo '<label>country_name:</label><br/>';
echo '<input id="country_name" type="text" name="country_name"><br/>';

echo '<button type="submit" name="save">save</button>';

echo '</form>';

echo '<h2>Instantiating AddressResidence</h2>';
$address_residence = Address::getInstance(Address::ADDRESS_TYPE_RESIDENCE);

echo '<h2>Setting properties...</h2>';
$address_residence->street_address_1 = '555 Fake Street';
$address_residence->city_name = 'Townsville';
$address_residence->subdivision_name = 'State';
$address_residence->country_name = 'Test Country';
echo $address_residence;
echo '<tt><pre>' . var_export($address_residence, TRUE). '</pre></tt>';


echo '<h2>Testing Address __construct with an array</h2>';
$address_business = new AddressBusiness(array(
	'street_address_1' => '444 Fake Street',
	'city_name' => 'VillageLand',
	'subdivision_name' => 'Region',
	'country_name' => 'Test2 Country'
));
echo $address_business;
echo '<tt><pre>' . var_export($address_residence, TRUE). '</pre></tt>';

echo '<h2>Instantiating AddressPark</h2>';
$address_park = new AddressPark(array(
	'street_address_1' => '789 Missing Circle',
	'street_address_2' => 'Suite 0',
	'city_name' => 'Hamlet',
	'subdivision_name' => 'Territory',
));
echo $address_park;
echo '<tt><pre>' . var_export($address_park, TRUE). '</pre></tt>';

echo '<h2>Testing typecasting to an object</h2>';
$test_object = (object) 12345;
echo '<tt><pre>' . var_export($test_object, TRUE) . '</pre></tt>';

echo '<h2>Loading from database</h2>';
try {

$address_db = Address::load(2);
echo '<tt><pre>' . var_export($address_db, TRUE) . '</pre></tt>';
	
}
catch(ExceptionAddress $e) {
	echo $e;
}