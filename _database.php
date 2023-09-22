<?
try
{
	$database = new PDO("mysql:host=".$settings['dbhost'].";port=".$settings['dbport'].";dbname=".$settings['dbname'].";charset=utf8", $settings['dbusername'], $settings['dbpassword'],
           array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));

}
catch(Exception $error)
{
        die('Error : '.$error->getMessage());
}
?>