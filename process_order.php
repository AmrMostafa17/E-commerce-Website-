<?php
include "./inc/config.php";
header('Content-Type: application/json');

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $cart = json_decode($_POST['cart'], true);

    if(!$cart || count($cart) === 0){
        echo json_encode(['status' => 'error', 'message' => 'Cart is empty']);
        exit;
    }

    $total = 0;
    foreach($cart as $item){
        $total += $item['price'] * $item['quantity'];
    }

    try {
        $pdo->beginTransaction();

        $stmt = $pdo->prepare("INSERT INTO orders (name,email,phone,address,total) VALUES (?,?,?,?,?)");
        $stmt->execute([$name,$email,$phone,$address,$total]);
        $order_id = $pdo->lastInsertId();

        $stmt_item = $pdo->prepare("INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?,?,?,?)");
        foreach($cart as $item){
            $stmt_item->execute([$order_id, $item['id'], $item['quantity'], $item['price']]);
        }

        $pdo->commit();
        echo json_encode(['status' => 'success', 'message' => 'Order confirmed']);
    } catch(Exception $e){
        $pdo->rollBack();
        echo json_encode(['status' => 'error', 'message' => 'Order failed: '.$e->getMessage()]);
    }
    exit;
}
?>