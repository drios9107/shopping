<!DOCTYPE html>
<html>
<head>
    <title>Shopping</title>
</head>
<body>
    <h3>You have bought a shoe:</h3>

    <ul>
        <li>Color: {{ $details['color'] }}</li>
        <li>Size: {{ $details['size'] }}</li>
        <li>Price: {{ $details['price'] }}</li>
        <li>Brand: {{ $details['brand_id'] }}</li>
    </ul>
   
    <p>Enjoy it</p>
</body>
</html>