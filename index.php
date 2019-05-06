<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="navBar">
    <div class="sideNav">
      <li><a href="index.php">Home</a></li>
      <li><a href="#CommingSoon">CommingSoon</a></li>
    </div>
    <div class="middleNav">
      <li style="float:initial;"><img class="center" src="imgs/logo1.jpg" alt="logo" width=auto height=100px"></img><li>
    </div>
    <div class="sideNav">
      <!-- <li style="float:right"><a class="active" href="about.html">About</a></li> -->
    </div>
  </div>

  <div class="welcomeImg">
    <img src="imgs/background.jpg" alt="background img" width=100% height= auto>
  </div>


  <div class="mainBody">

    <div class="intro" id="intro">
      <h2>Welcome to Tea Shop</h2>
      <button type="button" onclick="loadIntro()">Show Introduction</button>
      <p>  
    </p>
  </div>

  <?php
  ini_set('display_errors', 'On');
  error_reporting(E_ALL | E_STRICT);
    require_once "CreateDB.php";
    require_once "ItemModel.php";


    $classDB =  new ClassDB();
    // $classDB->createDB();
    // $classDB->createTable();

    // $classDB->addData();
    //$classDB->addOrder("1","2","3","4","5","6","7","8","9","10","11","12","13","14");
    //$classDB->getLastID();

    $itemModelArray = array();

    try {
        $conn = new PDO("mysql:host=$classDB->servername;dbname=$classDB->dbname", $classDB->username, $classDB->password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->query("SELECT * FROM Items");

        while ($row = $stmt->fetch()) {

            //create Model
            $itemModel = new ItemModel();

            $itemModel->id = $row['id'];
            $itemModel->name = $row['name'];
            $itemModel->price = $row['price'];
            $itemModel->des = $row['des'];
            $itemModel->photo = $row['photo'];

            array_push($itemModelArray, $itemModel);

        }

    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn = null;

  ?>

  <script type="text/javascript">

    var itemModelArray = <?php echo json_encode($itemModelArray); ?>;

    for (i = 1; i <= itemModelArray.length; i++) {
      // var nameId = "name" + i;
      // var photoId = "photo" + i;
      // var priceId = "price" + i;


      // document.getElementById(nameId).innerHTML = itemModelArray[i-1].name;
      // document.getElementById(priceId).innerHTML = "$" + itemModelArray[i-1].price;
      // document.getElementById(photoId).src = itemModelArray[i-1].photo;
      var gallery = document.createElement("div");
      gallery.className = "gallery";

      var link = document.createElement("a");
      var passPhoto = itemModelArray[i-1].photo;
      var passDesc = itemModelArray[i-1].des; 
      link.setAttribute("href", "moreinfo.php?photo="+passPhoto+"&desc="+passDesc);
      //link.setAttribute("target", "_self");

      var photo = document.createElement("img");
      photo.src = itemModelArray[i-1].photo;

      link.appendChild(photo);
      gallery.appendChild(link);

      var desc = document.createElement("div");
      desc.className = "desc";

      var p1 = document.createElement("p");
      p1.innerHTML = itemModelArray[i-1].name;

      var p2 = document.createElement("p");
      p2.innerHTML = "$" + itemModelArray[i-1].price;

      desc.appendChild(p1);
      desc.appendChild(p2);

      gallery.appendChild(desc);

      document.getElementsByClassName("mainBody")[0].appendChild(gallery); 

    }
              
    function loadIntro() {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("intro").innerHTML =
          this.responseText;
        }
      };
      xhttp.open("GET", "intro.txt", true);
      xhttp.send();
    }

  </script>

</body>
</html>