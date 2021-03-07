  
<?php
    require_once('./header.php');
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

<title>Add Hero</title>


<form method="POST" action="hero_insert.php">
    <center>
        <table class="w3-table" style="width:40%">
            <tr>
                <th>Hero name:<input class="w3-input" type="text" name="hero_name" onfocus="this.value=''" /></th>
            </tr>
            <tr>
                <th>Hero ability:<input class="w3-input" type="text" name="hero_ability" onfocus="this.value=''" /></th>
            </tr>
            <tr>
                <th>Hero description:<input class="w3-input" type="text" name="hero_description" onfocus="this.value=''" /></th>
            </tr>
            <tr>
                <th>
                    <center><input class="btn btn-primary w3-button w3-round w3-blue" type="submit"
                            value="Create hero" /></center>
            </tr>
        </table>
    </center>
</form>


<?php
    require_once('./footer.php');
?>