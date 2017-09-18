<?php
/**
 * Define autoloader.
 * @param string $class_name 
 */
function __autoload($class_name) {
  include 'class.' . $class_name . '.inc';
}

/**
* Save an Address. 
*/
final public function save() {
	$db = Database::getInstance();
	$mysqli = $db->getConnection();
	
	$sql_insert	= 'INSERT INTO address (address_id, address_type_id, time_created, street_address_1, street_address_2, city_name, subdivision_name, postal_code, country_name ) ';
	$sql_insert .= "VALUES ('";
	$sql_insert .= $_POST["address_type_id"] . "', '";
	$sql_insert .= $_POST["street_address_1"] . "', '";
	$sql_insert .= $_POST["street_address_2"] . "', '";
	$sql_insert .= $_POST["city_name"] . "', '";
	$sql_insert .= $_POST["subdivision_name"] . "', '";
	$sql_insert .= $_POST["postal_code"] . "', '";
	$sql_insert .= $_POST["country_name"] . "'";
	$sql_insert .= ")";
	echo $sql_insert;
	if ($mysqli->query($sql_insert === TRUE)) {
		echo 'New record created successfully';
	}
	throw new ExceptionAddress('Address not found.', self::ADDRESS_ERROR_NOT_FOUND);
	
}

if(isset($_POST['save'])) {
	Address::save(Address::ADDRESS_TYPE_RESIDENCE);
}
?>