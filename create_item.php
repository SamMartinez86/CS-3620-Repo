  
<?php
    require_once'sessioncheck.php'; 

    require_once'header.php';

?>  

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
    h1 {
        text-align: center;
    }

    div {
        text-align: center;
        font-size: 20px;
    }

    th {
        text-align: left;
    }

    a {
        color: blue;
        font-size: 20px;
    }
</style>

<title>Add item</title>


<form method="POST" action="item_insert.php">

    <center>
        <table class="w3-table" style="width:40%">
            <tr>
                <th>Item name:<input class="w3-input" type="text" name="Item_name" onfocus="this.value=''" /></th>
            </tr>
            <tr>
                <th>Item cost:<input class="w3-input" type="text" name="Item_cost" onfocus="this.value=''" /></th>
            </tr>
            <tr>
                <th>Item description:<input class="w3-input" type="text" name="Item_description" onfocus="this.value=''" /></th>
            </tr>
            <tr>
                <th>Item type:<input class="w3-input" type="text" name="Item_type" onfocus="this.value=''" /></th>
            </tr>
            <tr>
                <th>Item image:<input class="w3-input" type="text" name="Item_image" onfocus="this.value=''" /></th>
            </tr>
            <tr>
                <th>
                    <center><input class="btn btn-primary w3-button w3-round w3-blue" type="submit"
                            value="Create item" /></center>
            </tr>
        </table>
    </center>
</form>


<?php
    require_once('./footer.php');
?>