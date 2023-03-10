<?php
$dom = new DOMDocument();
$dom->load('files/data.xml');
$products = $dom->getElementsByTagName('products')->item(0);
$product=$products->getElementsByTagName('product');
$index = $product->length;
$id=$product[$index-1]->getElementsByTagName('id')->item(0)->nodeValue+1;
if(isset($_POST['sbm'])){
    $prd_name = $_POST['prd_name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $new_prd = $dom->createElement('product');

    $node_id = $dom->createElement('id',$id);
    $new_prd->appendChild($node_id);

    $node_name = $dom->createElement('name',$prd_name);
    $new_prd->appendChild($node_name);

    $node_price = $dom->createElement('price',$price);
    $new_prd->appendChild($node_price);

    $node_description = $dom->createElement('description',$description);
    $new_prd->appendChild($node_description);

    $products->appendChild($new_prd);

    $dom->formatOutput=true;
    $dom->save('files/data.xml')or die('Error');
    header('location: index.php?page_layout=list');
}
?>
<style>
    .container-fuild{
        position: relative;
        left: 800px;
        font-size: 20px;
        color: white;
        font-family: "Comic Sans MS";
    }
    body{
        background: #5131af;
    }
    button{
        border: solid black;
        border-radius: 20px;
        font-size: 30px;
        font-family: "Comic Sans MS";
        color: white;
        background: black;
    }
</style>
<body>
<div class="container-fuild">
    <div class="card">
        <div class="card-header">
            <h2>Добавить товар</h2>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Название товара</label>
                    <input type="text" name="prd_name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Цена продукта</label>
                    <input type="number" name="price" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Описание продукта</label>
                    <input type="text" name="description" class="form-control" required>
                </div>
                <button name="sbm" class="btn btn-success" type="submit">Add</button>
            </form>
        </div>
    </div>
</div>
</body>
