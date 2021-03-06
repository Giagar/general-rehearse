<?php 
require_once "config.php";

// prendere dati da products per comporre lista prodotti in shop
$stmt = $dbConnection->prepare("SELECT * FROM products");
$stmt->execute();
$dbProductsList = $stmt->get_result();
$productList = [];
while($row = $dbProductsList->fetch_assoc()){
$productList[] = $row;
};

// aggiungo i prodotti arrivati da index.php al carrello (tabella db)
if(isset($_POST["productId"])) {
    $productId = $_POST["productId"];
    $productQuantity = $_POST["productQuantity"];

    $stmt = $dbConnection->prepare("SELECT product_id FROM orders WHERE product_id=?");
    $stmt->bind_param("i", $productId, ); // per evitare sql injection
    $stmt->execute();

    $response = $stmt->get_result();
    $res = $response->fetch_assoc();
    $code = $res["product_id"] ?? "";
    
    // controlla che il prodotto non sia già presente nel carrello
    if (!$code) {
      // se non ancora presente
	    $query = $dbConnection->prepare("INSERT INTO orders (product_id, qty) VALUES (?,?)");
	    $query->bind_param("ii", $productId, $productQuantity);
	    $query->execute();

      // messaggio di successo
	    echo '<div class="alert alert-success alert-dismissible">
						  <button type="button" class="btn-close close" data-dismiss="alert" onclick="(() => $(this).parent().hide())()"></button>
						  <strong>Prodotto aggiunto al carrello</strong>
						</div>';
	  } else {

      // se già presente: messaggio di avviso
	    echo '<div class="alert alert-danger alert-dismissible">
						  <button type="button" class="btn-close close" data-dismiss="alert" onclick="(() => $(this).parent().hide())()"></button>
						  <strong>Prodotto già presente nel carrello</strong>
						</div>';
	  }
}

// aggiorno database in seguito a cambiamento quantità nel carrello
if(isset($_POST["changeProductQuantity"])) {
  $productId = $_POST["cartItemId"];
  $productQuantity = $_POST["productQuantity"];

  $stmt = $dbConnection->prepare("UPDATE orders SET qty=? WHERE product_id=?");
  $stmt->bind_param("ii", $productQuantity, $productId ); // per evitare sql injection
  $stmt->execute();

  $response = $stmt->get_result();
  $res = $response->fetch_assoc();
  $code = $res["product_id"] ?? "";
  
  $query = $dbConnection->prepare("INSERT INTO orders (product_id, qty) VALUES (?,?)");
  $query->bind_param("ii",$productId, $productQuantity);
  $query->execute();
}

// prendere dati da carrello
$stmt = $dbConnection->prepare("SELECT p.product_name, p.product_price, o.qty, p.product_code, p.id, p.product_price * o.qty as total_price FROM orders o JOIN products p ON o.product_id = p.id");
$stmt->execute();
$result = $stmt->get_result();
$cartContent = [];
while ($row = $result->fetch_assoc()) {
  $cartContent[0][] = $row;
}
// calcolare prezzo totale del carrello
$grand_total = 0; 
if($cartContent) {
  foreach($cartContent[0] as $product) {
    $grand_total += (float)$product["total_price"];
  }
}
$cartContent[1][] = $grand_total;

// svuota carrello
if (isset($_POST["clear"])) {
  $stmt = $dbConnection->prepare("DELETE FROM orders");
  $stmt->execute();
}

// elimina un elemento dal carrello
if (isset($_POST["delete"])) {
  $productId = $_POST["cartItemId"];
  $stmt = $dbConnection->prepare("DELETE FROM orders WHERE product_id=?");
  $stmt->bind_param("i",$productId);
  $stmt->execute();
}
