<?php
$products = array(
        array(
            'id'=>1,
            'name'=> 'GeForce RTX 4090',
            'price'=>  150000,
            'description'=>'PCI-E 4.0 24 ГБ GDDR6X, 384 бит, DisplayPort x3, HDMI, GPU 2230 МГцd'
        ),
        array(
            'id'=>2,
            'name'=> 'Intel Core i9-13900K',
            'price'=>  66000,
            'description'=>'LGA 1700, 8P x 3 ГГц, 16E x 2.2 ГГц, L2 - 32 МБ, L3 - 36 МБ, 2хDDR4, DDR5-5600 МГц, Intel UHD Graphics 770, TDP 253 Вт'
        ),
        array(
            'id'=>3,
            'name'=> 'Samsung Odyssey Neo G9',
            'price'=>  150000,
            'description'=>'5120x1440@240 Гц, VA, 1 мс, 1M : 1, 420 Кд/м², 178°/178°, DisplayPort, HDMI x2, USB х2 шт, изогнутый, AMD FreeSync Premium Pro, NVIDIA G-SYNC Compatible'
        ),
    );
$xml =new DOMDocument('1.0','UTF-8');

$root = $xml->createElement('products');
$xml->appendChild($root);

foreach ($products as $value ){
    $product = $xml->createElement('product');
    foreach ($value as $key=>$value){
        $node = $xml->createElement($key,$value);
        $product->appendChild($node);
    }
    $root->appendChild($product);

}
$xml->formatOutput = true;
$xml->save('files/data.xml')or die('Error');
