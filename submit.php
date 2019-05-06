<html>
<body>



<?php  

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
require_once "CreateDB.php";

$classDB =  new ClassDB();


$pass_ProductID = $_GET["productId"];
$pass_Quanntity = $_GET["quantity"]; 
$pass_FirstName = $_GET["firstname"]; 
$pass_LastName = $_GET["lastname"]; 
$pass_PhoneNumber = $_GET["phoneNum"]; 
$pass_ShippingAddressLine1 = $_GET["address1"]; 
$pass_ShippingAddressLine2 = $_GET["address2"]; 
$pass_State = $_GET["address3"]; 
$pass_ZIPCode = $_GET["address4"]; 
$pass_Country = $_GET["country"];
$pass_CreaditCardNumber = $_GET["creditCard"]; 
$pass_ExpirationDate = $_GET["expirationDate"]; 
$pass_SecurityCode = $_GET["securityCode"];
$pass_ShippingMethod = $_GET["shippingMethod"];


$classDB->addOrder(
                $pass_ProductID,
                $pass_Quanntity, 
                $pass_FirstName, 
                $pass_LastName, 
                $pass_PhoneNumber, 
                $pass_ShippingAddressLine1, 
                $pass_ShippingAddressLine2, 
                $pass_State, 
                $pass_ZIPCode, 
                $pass_Country,
                $pass_CreaditCardNumber, 
                $pass_ExpirationDate, 
                $pass_SecurityCode,
                $pass_ShippingMethod);

?>




Product ID <?php echo $_GET["productId"]; ?><br>
Quanntity <?php echo $_GET["quantity"]; ?><br>
FirstName <?php echo $_GET["firstname"]; ?><br>
LastName <?php echo $_GET["lastname"]; ?><br>
PhoneNumber <?php echo $_GET["phoneNum"]; ?><br>
ShippingAddress Line1 <?php echo $_GET["address1"]; ?><br>
ShippingAddress Line2 <?php echo $_GET["address2"]; ?><br>
State <?php echo $_GET["address3"]; ?><br>
ZIPCode <?php echo $_GET["address4"]; ?><br>
Country <?php echo $_GET["country"]; ?><br>
CreditCardNumber <?php echo $_GET["creditCard"]; ?><br>
ExpirationDate <?php echo $_GET["expirationDate"]; ?><br>
Security Code <?php echo $_GET["securityCode"]; ?><br>
Shipping Method <?php echo $_GET["shippingMethod"]; ?><br>


</body>
</html>