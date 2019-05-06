<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

    class ClassDB{
        public $servername = "127.0.0.1";
        public $username = "root";
        public $password = "root";
        public $dbname = "TeaShopDB";
        

  //       public function __construct(){
		// 	this->createDB();
		// 	this->createTable();
		// 	this->addData();
		// }
        
        public function createDB(){
            try {
                $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                	$sql = "DROP DATABASE $this->dbname";
				    // use exec() because no results are returned
				    $conn->exec($sql);

				    // echo "dropDB successfully <br>";


                    $sql = "CREATE DATABASE $this->dbname";
				    // use exec() because no results are returned
				    $conn->exec($sql);

                	// echo "createDB successfully <br>";
                
            }
            catch(PDOException $e)
            {
                // echo "Connection failed:" . $e->getMessage()."\n";
            }
            
            
            $conn = null;
        }
        
        
        public function createTable(){
            try {
                $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                // sql to create table
                $sql1 = "CREATE TABLE Items (
                id INT(100) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(30) NOT NULL,
                price INT(100) NOT NULL,
                des VARCHAR(500),
                photo VARCHAR(30)
                )";
               
           
                // create order
                $sql2 = "CREATE TABLE Orders (
                OrderID INT(100) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                ProductID INT(100) NOT NULL,
                Quanntity INT(100) NOT NULL,
                FirstName VARCHAR(30) NOT NULL,
                LastName VARCHAR(30) NOT NULL,
                PhoneNumber VARCHAR(30),
                ShippingAddressLine1 VARCHAR(30),
                ShippingAddressLine2 VARCHAR(30),
                State VARCHAR(30),
                ZIPCode VARCHAR(30),
                Country VARCHAR(30),
                CreaditCardNumber VARCHAR(30),
                ExpirationDate VARCHAR(30),
                SecurityCode INT(100),
                ShippingMethod VARCHAR(30)
                )";


                // use exec() because no results are returned
                $conn->exec($sql1);
                $conn->exec($sql2);
                // echo "Table MyGuests created successfully <br>";
                
            }
            catch(PDOException $e)
            {
                // echo "error:" . $e->getMessage() ;
            }
            $conn = null;
        }

        public function addOrder(
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
                $pass_ShippingMethod){


            try {
                $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // prepare sql and bind parameters
                $stmt = $conn->prepare("INSERT INTO Orders (ProductID, Quanntity,FirstName,LastName,PhoneNumber,ShippingAddressLine1,ShippingAddressLine2,State,ZIPCode,Country,CreaditCardNumber,ExpirationDate,SecurityCode,ShippingMethod) 
                VALUES (:ProductID, :Quanntity,:FirstName,:LastName,:PhoneNumber,:ShippingAddressLine1,:ShippingAddressLine2,:State,:ZIPCode,:Country,:CreaditCardNumber,:ExpirationDate,:SecurityCode,:ShippingMethod)");
 

                $stmt->bindParam(':ProductID' ,$ProductID); 
                $stmt->bindParam(':Quanntity' ,$Quanntity); 
                $stmt->bindParam(':FirstName' ,$FirstName); 
                $stmt->bindParam(':LastName' ,$LastName); 
                $stmt->bindParam(':PhoneNumber' ,$PhoneNumber); 
                $stmt->bindParam(':ShippingAddressLine1' ,$ShippingAddressLine1); 
                $stmt->bindParam(':ShippingAddressLine2' ,$ShippingAddressLine2); 
                $stmt->bindParam(':State' ,$State); 
                $stmt->bindParam(':ZIPCode' ,$ZIPCode); 
                $stmt->bindParam(':Country' ,$Country);
                $stmt->bindParam(':CreaditCardNumber' ,$CreaditCardNumber); 
                $stmt->bindParam(':ExpirationDate' ,$ExpirationDate); 
                $stmt->bindParam(':SecurityCode' ,$SecurityCode);
                $stmt->bindParam(':ShippingMethod' ,$ShippingMethod); 


                // insert a row
                
                $ProductID = $pass_ProductID;  
                $Quanntity = $pass_Quanntity; 
                $FirstName = $pass_FirstName; 
                $LastName = $pass_LastName; 
                $PhoneNumber = $pass_PhoneNumber;
                $ShippingAddressLine1 = $pass_ShippingAddressLine1; 
                $ShippingAddressLine2 = $pass_ShippingAddressLine2;
                $State = $pass_State; 
                $ZIPCode = $pass_ZIPCode; 
                $Country = $pass_Country;
                $CreaditCardNumber = $pass_CreaditCardNumber; 
                $ExpirationDate = $pass_ExpirationDate; 
                $SecurityCode = $pass_SecurityCode;
                $ShippingMethod = $pass_ShippingMethod; 

                $stmt->execute();
  

                // echo "New records created successfully";
            }
            catch(PDOException $e)
            {
                // echo "error" . $e->getMessage();
            }
            
            $conn = null;
        }

        
        
        public function addData(){
            try {
                $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // prepare sql and bind parameters
			    $stmt = $conn->prepare("INSERT INTO Items (id, name, price, des, photo) 
			    VALUES (:id, :name, :price, :des, :photo)");
			    $stmt->bindParam(':id', $id);
			    $stmt->bindParam(':name', $name);
			    $stmt->bindParam(':price', $price);
			    $stmt->bindParam(':des', $des);
			    $stmt->bindParam(':photo', $photo);

			    // insert a row
			    //$id = "1";
			    $name = "Red Tea Bag";
			    $price = "12";
			    $des = "Our classic Red Tea Bag is the base of our drink and very easy to use";
			    $photo = "imgs/tea1.jpg";
			    $stmt->execute();

			    // insert a row
			    //$id = "2";
			    $name = "Green Mocha Powder";
			    $price = "10";
			    $des = "Mocha Tea is sold in powder form and can be also used to make Mocha flavor food such as Mocha cake.";
			    $photo = "imgs/tea2.jpg";
			    $stmt->execute();

			    // insert a row
			    //$id = "3";
			    $name = "Oolong Flower Mixed";
			    $price = "15";
			    $des = "Mix most popular Oolong with flowers!";
			    $photo = "imgs/tea3.jpg";
			    $stmt->execute();

			    // insert a row
			    //$id = "4";
			    $name = "Lemon Red Tea";
			    $price = "10";
			    $des = "lemon tea, add honey to make it better";
			    $photo = "imgs/tea4.jpg";
			    $stmt->execute();

			    // insert a row
			    //$id = "5";
			    $name = "Flower Tea";
			    $price = "14";
			    $des = "Combine 5 different dry flowers together";
			    $photo = "imgs/tea5.jpg";
			    $stmt->execute();

			    // insert a row
			    //$id = "6";
			    $name = "Lemon & Flower";
			    $price = "12";
			    $des = "It can never be wrong to put two delicious food together!";
			    $photo = "imgs/tea6.jpg";
			    $stmt->execute();

			    // insert a row
			    //$id = "7";
			    $name = "Orange Z";
			    $price = "12";
			    $des = "Orange flavor, better to serve in white tea cup";
			    $photo = "imgs/tea7.jpg";
			    $stmt->execute();

			    // insert a row
			    //$id = "8";
			    $name = "Black Tea";
			    $price = "12";
			    $des = "Freshly dried black tea in power form";
			    $photo = "imgs/tea8.jpg";
			    $stmt->execute();

			    // insert a row
			    //$id = "9";
			    $name = "Cinnamon Tea";
			    $price = "15";
			    $des = "If you are a Cinnamon lover this is your tea!";
			    $photo = "imgs/tea9.jpg";
			    $stmt->execute();

			    // insert a row
			    //$id = "10";
			    $name = "Cookie Mate";
			    $price = "14";
			    $des = "Cookie Mate is a flower mixed tea which is best thing to serve with cookie";
			    $photo = "imgs/tea10.jpg";
			    $stmt->execute();


			    // echo "New records created successfully";
            }
            catch(PDOException $e)
            {
                // echo "error" . $e->getMessage();
            }
            
            $conn = null;
        }
        
        public function getLastID(){
            try {
                $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                // $sql = "INSERT INTO MyGuests (firstname, lastname, email)
                // VALUES ('John', 'Doe', 'john@example.com')";
                // // use exec() because no results are returned
                // $conn->exec($sql);
                $last_id = $conn->lastInsertId();
                // echo ("<h1>asdfasdfa$last_id</h1>");
                
            }
            catch(PDOException $e)
            {
                print_r( "error:" . $e->getMessage());
            }

            
            $conn = null;
        }


    }
    
?>
