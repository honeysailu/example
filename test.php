<?php
$db = pg_connect("host=192.200.200.252 dbname=akhila user=postgres password=post123");

if(isset($_POST['add_main_menu']))
{
 
 $menu_name = $_POST['menu_name'];
 $menu_desc = $_POST['mn_desc'];
$query=("INSERT INTO mainmenu(m_main_menuname,m_main_menudesc) VALUES('$menu_name','$menu_desc')");
 $result = pg_query( $query);
}

if(isset($_POST['add_sub_menu'])){

 $parent = $_POST['parent'];
 $proname = $_POST['sub_menu_name'];
 $menu_desc = $_POST['sub_menu_desc'];
$query1=("INSERT INTO submenu(m_submenu_menuid,m_main_menuname,m_submenu_menudesc) VALUES('$parent','$proname','$menu_desc')");
    $result = pg_query( $query1);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dynamic Dropdown Menu using PHP and MySQLi</title>
<link rel="stylesheet" type="text/css" href="style.css" media="all" />
</head>
<body>
<div id="head">

</div>
<center>
<pre>
<form method="post">
<input type="text" placeholder="menu name :" name="menu name" /><br />
<input type="text" placeholder="menu desc :" name="mn_desc" /><br />
<button type="submit" name="add_main_menu">Add main menu</button>
</form>
</pre>
<br />
<pre>
<form method="post">

<select name="parent">
<option selected="selected">select parent menu</option>
<?php
echo $query=("SELECT * FROM test");
while($row= pg_fetch_assoc($result))
{
 ?>
    <option value="<?php echo $row['m_main_menuid']; ?>"><?php echo $row[' m_main_menuname']; ?></option>
    <?php
}
?>
</select>
<input type="text" placeholder="menu name :" name="sub_menu_name" /><br />
<input type="text" placeholder="menu desc :" name="sub_menu_desc" /><br />
<button type="submit" name="add_sub_menu">Add sub menu</button>
</form>
</pre>
<a href="test.php">back to main page</a>
</center>
</body>
</html>
