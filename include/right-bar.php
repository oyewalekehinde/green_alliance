<!--social icon box start -->
<div class="social-icon-wrapper">



  <div class="times-14-red-bold" align="center">Save . Share . Connect</div>

  <div class="social-icons" align="center">

    <ul>

      <li><a target="_new" href="http://www.twitter.com/sansursuz"><img src="images/twiiter-icon-large.jpg" /></a></li>

      <li><a target="_new" href="http://www.facebook.com/pages/Sans%C3%BCrs%C3%BCz-Haber/176407942405860"><img src="images/face-book-icon-large.jpg" /></a></li>

      <li><a href="#"><img src="images/in-icon-large.jpg" /></a></li>

    </ul>

  </div>



</div> <!--social icon box end-->





<?php



/* A simple example of MyWeather. AMIR JAFARI. */





/* Configs */



require 'MyWeather.Class.php';                  // include "MyWeather" class file



$MyWeather = new MyWeather;                     // create class



$TheCity = 'istanbul';                            // set your city with change



$MyWeather = $MyWeather->getWeather($TheCity); // get datas in array



/* Showing data */



echo "Weather of <b>" . $MyWeather['Location'] . "</b>";

echo "<br>";

echo "Temperature : <b>" . $MyWeather['Temp'] . "</b>";

echo "<br>";

echo "Humidity : <b>" . $MyWeather['Humidity'] . "</b>";

echo "<br>";

echo "Preasure : <b>" . $MyWeather['Preasure'] . "</b>";



/* the End */



?>



<?php  // code for author...

$authors = new   Database();

$authors->connect();

$select_authors = "SELECT us.user_id, n.news_id, n.news_date, n.news_title, n.status, n.news_desp, us.user_name, us.is_autor,us.user_image

FROM tbl_articles n

LEFT JOIN tbl_user us ON ( n.user_id = us.user_id )

WHERE is_autor =1

AND n.STATUS =1 group by us.user_id ORDER BY news_id";

$select_authors;

$authors->query($select_authors);

$authors_result = $authors->getResult();

//print_r($authors_result);

?>







<!--authors box start -->
<div class="heading-bg"><a href="#">AUTHORS</a></div>

<div class="authors-box">



  <?php if (!$authors_result[1]) {

  ?>



    <!--small author box start -->
    <div class="authors-box-small">

      <div class="authors-box-small-img"><a onclick="update_artical(<?= $authors_result['news_id'] ?>)" href="author_artical.ph?author_id=<?= $authors_result['user_id'] ?>&artical_id=<?= $authors_result['news_id'] ?>"><img src="<?php echo $authors_result['user_image']; ?>" width="70" height="80" /></a></div>

      <a onclick="update_artical(<?= $authors_result['news_id'] ?>)" href="author_artical.php?author_id=<?= $authors_result['user_id'] ?>&artical_id=<?= $authors_result['news_id'] ?>" class="arial12black"><?php echo $authors_result['news_title']; ?> </a>

      <br />

      <a href="#" class="times-11-grey-2"> <?php echo $authors_result['user_name']; ?> </a>

      <!--dont remove -->
      <div class="clr"></div><!--dont remove -->



    </div><!--small author box end-->

    <?php

  } else {

    foreach ($authors_result as $key => $result) {

    ?>



      <!--small author box start -->
      <div class="authors-box-small">

        <div class="authors-box-small-img"><a onclick="update_artical(<?= $result['news_id'] ?>)" href="author_artical.php?author_id=<?= $result['user_id'] ?>&artical_id=<?= $result['news_id'] ?>" class="arial12black"><img src="<?php echo $result['user_image']; ?>" width="70" height="80" /></a></div>

        <a onclick="update_artical(<?= $result['news_id'] ?>)" href="author_artical.php?author_id=<?= $result['user_id'] ?>&artical_id=<?= $result['news_id'] ?>" class="arial12black"><?php echo $result['news_title']; ?> </a>

        <br />

        <a href="#" class="times-11-grey-2"> <?php echo $result['user_name']; ?> </a>

        <!--dont remove -->
        <div class="clr"></div><!--dont remove -->



      </div><!--small author box end-->

  <?php

    }
  }

  ?>









  <a href="#" class="button-style-1"> MORE </a>



  <!--dont remove -->
  <div class="clr"></div><!--dont remove -->



</div> <!--authors box end -->



<script language="javascript" type="text/javascript">
  $(document).ready(function() {

    $('#banner-1').cycle({

      fx: 'fade',

      speed: 5000,

      timeout: 1000

    });

  });
</script>



<!--add start-->

<div align="center">

  <div id="banner-1" class="add-box-1">



    <?php

    $qyry3 = "SELECT * fROM banner WHERE banner_position='left' && status='1'";

    $getqry2 = mysql_query($qyry3);

    while ($result2 = mysql_fetch_array($getqry2)) {

    ?>

      <a target="_blank" href="HTTP://<?= $result2['external_link'] ?>"><img src="images/banner/<?= $result2['img_path'] ?>" width="160" height="266" /></a> <?php } ?>

  </div>



</div>

<!--add end-->









<!--right-side tabs -->





<div id="example-one">



  <ul class="nav">

    <li class="nav-one"><a href="#popular" class="current">Popular News</a></li>

    <li class="nav-two"><a href="#recent">Articals</a></li>

    <li class="nav-three"><a href="#comments">Comments </a></li>

  </ul>



  <div class="list-wrap">



    <div id="popular">

      <!--small news box start -->

      <?php $newqry = "SELECT * FROM tbl_news ORDER BY count DESC LIMIT 0 , 4";

      $newsrun = mysql_query($newqry);

      while ($newarr = mysql_fetch_assoc($newsrun)) {

      ?>

        <div class="example1-box-small">

          <div class="example1-box-small-img"></div>

          <a href="#" class="arial12black"><?= $newarr['rss_news_title'] ?></a><br />



          <a href="#" class="times-11-grey">

            <? list($dyear, $dmonth, $dday) = explode('-', $newarr['rss_news_date']);

            $date = date('d M, Y', mktime(0, 0, 0, $dmonth, $dday, $dyear));

            echo $date; ?> </a>

          <a href="#" class="times-11-grey-2"> Views: <?php echo $newarr['count']; ?> </a>

          <!--dont remove -->
          <div class="clr"></div><!--dont remove -->



        </div><!--small news box end-->

      <?php } ?>



    </div>



    <div id="recent" class="hide">

      <?php $artqry = "SELECT n.news_title,n.news_date, n.commment_count, us.user_image FROM tbl_articles n

LEFT JOIN tbl_user us ON ( n.user_id = us.user_id )

ORDER BY view_count DESC LIMIT 0 , 4";

      $artrun = mysql_query($artqry);

      while ($artarr = mysql_fetch_assoc($artrun)) {

      ?>

        <!--small news box start -->
        <div class="example1-box-small">

          <div class="example1-box-small-img"><a href="#"><img src="<?= $artarr['user_image'] ?>" width="45" height="45" /></a></div>

          <a href="#" class="arial12black"><?= $artarr['news_title'] ?></a><br />



          <a href="#" class="times-11-grey">

            <? list($dyear, $dmonth, $dday) = explode('-', $artarr['news_date']);

            $date2 = date('d M, Y', mktime(0, 0, 0, $dmonth, $dday, $dyear));
            echo $date2 ?>

          </a>

          <a href="#" class="times-11-grey-2"> Views: <?php echo $artarr['commment_count']; ?> </a>

          <!--dont remove -->
          <div class="clr"></div><!--dont remove -->



        </div><!--small news box end-->

      <?php } ?>

    </div>



    <div id="comments" class="hide">

      <?php $comqry = "SELECT n.news_id, n.news_title, n.news_date, n.view_count, us.user_image FROM tbl_articles n LEFT JOIN tbl_user us ON ( n.user_id = us.user_id ) ORDER BY commment_count DESC LIMIT 0 , 4";

      $comrun = mysql_query($comqry);

      while ($comarr = mysql_fetch_assoc($comrun)) { ?>

        <!--small news box start -->
        <div class="example1-box-small">

          <div class="example1-box-small-img"><a href="#"><img src="<?= $comarr['user_image'] ?>" width="45" height="45" /></a></div>

          <a href="author_artical.php?artical_id=<?= $comarr['news_id'] ?>?author_id=<?= $_SESSION['userid'] ?>" class="arial12black"><?= $comarr['news_title'] ?></a><br />



          <a href="#" class="times-11-grey">

            <?php list($dyear, $dmonth, $dday) = explode('-', $comarr['news_date']);

            $date3 = date('d M, Y', mktime(0, 0, 0, $dmonth, $dday, $dyear));
            echo $date3; ?> </a>

          <a href="#" class="times-11-grey-2">Views: <?php echo $comarr['view_count']; ?> </a>

          <!--dont remove -->
          <div class="clr"></div><!--dont remove -->



        </div><!--small news box end-->

      <?php } ?>

    </div>





  </div> <!-- END List Wrap -->



</div>

<a href="#" class="button-style-1"> MORE </a>



<!--dont remove -->
<div class="clr"></div><!--dont remove -->

<!--right-side tabs -->





<script language="javascript" type="text/javascript">
  $(document).ready(function() {

    $('#banner-2').cycle({

      fx: 'fade',

      speed: 5000,

      timeout: 1000

    });

  });
</script>

<div align="center">

  <!--add start-->
  <div id="banner-2" class="add-box-1" align="center">



    <?php $qrybar_left = "SELECT * FROM banner WHERE banner_position='left' && status='1'";

    $getqrybar_left = mysql_query($qrybar_left);

    while ($resultl_b = mysql_fetch_array($getqrybar_left)) {

    ?>



      <a target="_blank" href="HTTP://<?= $resultl_b['external_link'] ?>"><img src="images/banner/<?= $resultl_b['img_path'] ?>" width="160" height="266" /></a>

    <?php } ?>

  </div>

</div>

<!--add end-->

<div>

  <div class="heading-bg"><a href="#">Useful Links</a></div>

  <table>



    <?php

    $useful_links = new Database();

    $where = "link_status=1";

    $useful_links->select('tbl_links', "*", $where);

    $result_useful_links = $useful_links->getResult();

    //echo "<pre>";

    //print_r($result_useful_links);

    ?>

    <?php if (!$result_useful_links[1]) {

    ?>

      <tr>

        <td><a target="_new" href="<?php echo $useful_links_object['link_url']; ?>"> <?php echo $useful_links_object['link_name']; ?></a> </td>

      </tr>





      <?php

    } else {

      foreach ($result_useful_links as $keys => $useful_links_object) { ?>

        <tr>

          <td><a target="_new" href="<?php echo $useful_links_object['link_url']; ?>"> <?php echo $useful_links_object['link_name']; ?></a> </td>

        </tr>

    <?php

      }
    }

    ?>

  </table>

</div>

<script language="javascript">
  function update_artical(str) {

    //	alert(str);

    if (str == "")

    {

      document.getElementById("txtHint").innerHTML = "";

      return;

    }

    if (window.XMLHttpRequest)

    { // code for IE7+, Firefox, Chrome, Opera, Safari

      xmlhttp = new XMLHttpRequest();

    } else

    { // code for IE6, IE5

      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

    }

    xmlhttp.onreadystatechange = function()

    {

      if (xmlhttp.readyState == 4 && xmlhttp.status == 200)

      {

        document.getElementById("txtHint").innerHTML = xmlhttp.responseText;

      }

    }

    xmlhttp.open("GET", "include/artical_count.php?q=" + str, true);

    xmlhttp.send();

  }
</script>