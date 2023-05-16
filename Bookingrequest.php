<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <!-- Google Translater -->
<div id="google_translate_element"></div>
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'en,hi,ml,gu,pa,ta,te,ur,ar,fr,ta', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, autoDisplay: true}, 'google_translate_element');
        }

        //Languages Dropdown Style
        $('document').ready(function () {
            $('#google_translate_element').on("click", function () {

                // Change menu's padding
                $("iframe").contents().find('.goog-te-menu2-item-selected').css ('display', 'hide');

                // Change menu's padding
                $("iframe").contents().find('.goog-te-menu2').css ('padding', '0px');
				 $("iframe").contents().find('.goog-te-menu2').css ('overflow', 'scroll');

                // Change the padding of the languages
                $("iframe").contents().find('.goog-te-menu2-item div').css('padding', '20px 100px 20px 20px');

                // Change the width of the languages
                $("iframe").contents().find('.goog-te-menu2-item').css('width', '200px');
                $("iframe").contents().find('td').css('width', '200px');

                // Change the iframe's size and position?
                $(".goog-te-menu-frame").css({
                    'height': '43.5%',
                    'width': '200px',
                    'border-radius':'8px',
                    'top':'490px'
                });
                // Change iframes's size
                $("iframe").contents().find('.goog-te-menu2').css({
                    'height': '100%',
                    'width': '200px'
                });
            });
        });
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <meta charset="UTF-8">
    
    <link rel="stylesheet" href="styleA.css">
    <title>COURSE DISPLAY</title>
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <style>
      th {
  height: 50px;
  vertical-align: bottom;
}
td {
  height: 50px;
  vertical-align: bottom;
}
.button {
  background: linear-gradient(120deg,#FFEFD5 , #8e44ad);
  border: none;
  color: white;
  padding: 10px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
.btn {
    background-color: green;
    border: none;
    color: white;
    padding: 10px 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
  }
  .bttn {
    background-color: red;
    border: none;
    color: white;
    padding: 10px 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
  }
  
  /* .status-button {
    display: inline-block;
    padding: 10px 10px;
    background-color: blue;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
  }

  .status-button:hover {
    background-color: hotpink;
  } */
</style>

<body>
  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">EduWell</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="Adminpanel.php" class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="categoryadd.php">
            <i class='bx bx-box' ></i>
            <span class="links_name">category</span>
          </a>
        </li>
        <li>
          <a href="subcategory.php">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Subactegory</span>
          </a>
        </li>
        <li>
          <a href="courseregister.php">
            <i class='bx bx-pie-chart-alt-2' ></i>
            <span class="links_name">Courses</span>
          </a>
        </li>
        <li>
          <a href="categoryview.php">
            <i class='bx bx-coin-stack' ></i>
            <span class="links_name">Category View</span>
          </a>
        </li>
        <li>
          <a href="subcategoryview.php">
            <i class='bx bx-book-alt' ></i>
            <span class="links_name">Subcategory view</span>
          </a>
        </li>
       <!-- <li>
          <a href="#">
            <i class='bx bx-user' ></i>
            <span class="links_name">Team</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-message' ></i>
            <span class="links_name">Messages</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-heart' ></i>
            <span class="links_name">Favrorites</span>
          </a>
        </li>-->
        <li>
          <a href="#">
            <i class='bx bx-cog' ></i>
            <span class="links_name">Setting</span>
          </a>
        </li>
        <li class="log_out">
          <a href="logout.php">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Dashboard</span>
      </div>
      <div class="search-box">
        <input type="text" placeholder="Search...">
        <i class='bx bx-search' ></i>
      </div>
      <div class="profile-details">
        <img src="images/profile.jpg" alt="">
        <span class="admin_name">Admin</span>
        <i class='bx bx-chevron-down' ></i>
      </div>
    </nav>
    <body>
    <input type="hidden" class="cid" value="<?= $row['cid'] ?>">
                <input type="hidden" class="logid" value="<?= $row['logid'] ?>">
                
<h1 align="center"> Booking Request</h1>
<br>
                <br>
                <br>
                <h1 align="center"> Booking Request</h1>
<table style="width:95%"cellpadding="1" cellspacing="4" border="3" align="center">
              
<tr>
    <th>Course No</th>
    <th>Class</th>
    <th>Course Name</th>
    <th>Teacher name</th>
    <th>Status</th>
    <th>Decline</th>
    <th>Accept</th>
   
    
</tr>
<?php
include 'config.php';
$query=mysqli_query($conn,"SELECT tbl_booking.bid, tbl_login.email, tbl_courseadd.cname,tbl_subcategory.class,tbl_booking.status FROM tbl_booking INNER JOIN tbl_login ON tbl_booking.logid = tbl_login.logid INNER JOIN tbl_courseadd ON tbl_booking.cid = tbl_courseadd.cid INNER JOIN tbl_subcategory ON tbl_subcategory.subcatid = tbl_courseadd.subcatid");
//$query=mysqli_query($conn,"SELECT * FROM `tbl_studentregister` t inner join tbl_courseadd c WHERE t.stid in (SELECT stid from tbl_booking WHERE bid = bid ) and c.cid in (SELECT cid from tbl_booking where bid = bid);");
//$query=mysqli_query($conn,"SELECT tbl_booking.bid, tbl_courseadd.cname,tbl_login.email FROM tbl_booking JOIN tbl_courseadd ON tbl_booking.bid = tbl_courseadd.cid JOIN tbl_login ON tbl_courseadd.cid = tbl_login.logid;;");
//$query=mysqli_query($conn,"SELECT * FROM `tbl_studentregister` t inner join tbl_courseadd c WHERE t.stid in (SELECT stid from tbl_booking WHERE bid = bid ) and c.cid in (SELECT cid from tbl_booking where bid = bid);");

$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>                                  
<tr>
    <td><?php echo htmlentities($cnt);?></td>
    <td> <?php echo htmlentities($row['class']);?></td>

   <td> <?php echo htmlentities($row['cname']);?></td>

    <td><?php echo htmlentities($row['email']);?></td>
   <td> <?php echo htmlentities($row['status']);?></td>
    <td><a href="declinebooking.php?bid=<?php echo $row['bid']?>"class="bttn">Decline</a>
                   
</td>
<td><a href="acceptbooking.php?bid=<?php echo $row['bid']?>" class="btn">Accept</a></td>
                   
               <!-- <button class="btn btn-info btn-block addItemBtn"><i class="fas fa-cart-plus"></i>&nbsp;Accept</button>-->
              <!-- <td> 
               <a href="process_booking.php?bid=<?php echo $row['bid']?>">Accept</a></td> -->
                                
</tr>
<?php $cnt=$cnt+1; } ?>

</table>
</body>
</html>