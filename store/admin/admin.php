<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" type="image/x-icon" href="../skull.ico" />
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Sett Store</title>
</head>
<?php 
  include "../mylibrary/login.php"; 
  include "../mylibrary/getThumb.php";
  include "../mylibrary/showproducts.php";
  ?>
<body>
<div id="wrapper">
<table width="100%" border="0" border-collapse="collapse">
	<tr>
		<td id="header" height="90" colspan="3"><?php include "header.inc.php"; ?></td>
	</tr>
	<tr>
		<td id="nav" width="20%" valign="top">
			<?php include "adminnav.inc.php"; ?>
		</td>
		<td id="main" width="50%" valign="top">
			  <?php
          if(!isset($_REQUEST['content'])){
            if(!isset($_SESSION['store_admin'])){
              include "adminlogin.html";
            }else{
              include "adminmain.inc.php";
            }
          }else{
            $content = $_REQUEST['content'];
            $nextpage = $content.".inc.php";
            include($nextpage);
          }



        ?>
          </td>
          <td id="status" width="30%" valign="top">
          	<?php include "adminstatus.inc.php"; ?>
          </td>
      </tr>
      <tr>
      	<td id="footer" colspan="3">
      		<?php include "footer.inc.php"; ?>
      	</td>
      </tr>
    </table>
    </div>
    </body>
    </html>
