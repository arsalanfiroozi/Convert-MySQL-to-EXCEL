<?php 
    require_once("get_csvTable.php");
    $Password = 'My_Pass';

    if(isset($_POST['submit']) && isset($_POST['Pass'])) if($_POST['Pass']==$Password){
        $table_name = 'my_table_name';
        $columns = array("Col1", "Col2");
        $columns_names = array("Col1_Name_to_show", "Col2_Name_to_show");
        $Table = get_csvTable($table_name,$columns,$columns_names);
    }
?>
<!DOCTYPE html>
<html>
<head>
<style>
#myTable {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#myTable td, #myTable th {
  border: 1px solid #ddd;
  padding: 8px;
}

#myTable tr:nth-child(even){background-color: #f2f2f2;}

#myTable tr:hover {background-color: #ddd;}

#myTable th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
.PassRequired{
    text-align: center;
    margin-left: auto;
    margin-right: auto;
    border: solid;
    border-color: #04AA0000;
    display: grid;
    width: 30%;
    height: 10%;
}
.PassRequired input[type=text]{
    padding-right: 1%;
    padding-left: 1%;
    padding-top: 0.5%;
    padding-bottom: 0.5%;
    border: none;
}
.PassRequired input[type=submit]{
    padding-top: 0.5%;
    padding-bottom: 0.5%;
    border: none;
    border-radius: 1px;
    background-color: #04AA6D;
    color: white;
}
</style>
</head>
<body>
<form method="post">
    <div class="PassRequired">
        <input type="text" name="Pass" placeholder="Your Password" />
        <input type="submit" name="submit" value="Submit"/>
    </div>
</form>

<!-- Needed for Generating CSV File -->
<?php if(isset($Table)){ ?>
<div>
    <?php echo $Table; ?>
</div>
<script>
    htmlToCSV('Table.csv');    
</script>
<?php } ?>
<!-- END -->

</body>
</html>


