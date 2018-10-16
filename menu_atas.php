
<style>
#cssmenu{ height:37px; display:block; padding:0; margin:0;  border:1px solid; border-radius:5px; } 
#cssmenu > ul {list-style:inside none; padding:0; margin:0;} 
#cssmenu > ul > li {list-style:inside none; padding:0; margin:0; float:left; display:block; position:relative;} 
#cssmenu > ul > li > a{ outline:none; display:block; position:relative; padding:12px 20px; font:bold 13px/100% Arial, Helvetica, sans-serif; text-align:center; text-decoration:none; text-shadow:1px 1px 0 rgba(0,0,0, 0.4); } 
#cssmenu > ul > li:first-child > a{border-radius:5px 0 0 5px;} 
#cssmenu > ul > li > a:after{ content:''; position:absolute; border-right:1px solid; top:-1px; bottom:-1px; right:-2px; z-index:99; } 
#cssmenu ul li.has-sub:hover > a:after{top:0; bottom:0;} 
#cssmenu > ul > li.has-sub > a:before{ content:''; position:absolute; top:18px; right:6px; border:5px solid transparent; border-top:5px solid #fff; } 
#cssmenu > ul > li.has-sub:hover > a:before{top:19px;} 
#cssmenu ul li.has-sub:hover > a{ background:#3f3f3f; border-color:#3f3f3f; padding-bottom:13px; padding-top:13px; top:-1px; z-index:999; } 
#cssmenu ul li.has-sub:hover > ul, #cssmenu ul li.has-sub:hover > div{display:block;} 
#cssmenu ul li.has-sub > a:hover{background:#3f3f3f; border-color:#3f3f3f;} 
#cssmenu ul li > ul, #cssmenu ul li > div{ display:none; width:auto; position:absolute; top:38px; padding:10px 0; background:#3f3f3f; border-radius:0 0 5px 5px; z-index:999; } 
#cssmenu ul li > ul{width:180px;} 
#cssmenu ul li > ul li{display:block; list-style:inside none; padding:0; margin:0; position:relative;} 
#cssmenu ul li > ul li a{ outline:none; display:block; position:relative; margin:0; padding:8px 20px; font:10pt Arial, Helvetica, sans-serif; color:#fff; text-decoration:none; text-shadow:1px 1px 0 rgba(0,0,0, 0.5); } 
#cssmenu, #cssmenu > ul > li > ul > li a:hover{ background:#3f4547; background:-moz-linear-gradient(top, #3f4547 0%, #1a4e63 100%); background:-webkit-gradient(linear, left top, left bottom, color-stop(0%,#3f4547), color-stop(100%,#1a4e63)); background:-webkit-linear-gradient(top, #3f4547 0%,#1a4e63 100%); background:-o-linear-gradient(top,  #3f4547 0%,#1a4e63 100%); background:-ms-linear-gradient(top, #3f4547 0%,#1a4e63 100%); background:linear-gradient(top,  #3f4547 0%,#1a4e63 100%); filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#3f4547', endColorstr='#1a4e63',GradientType=0); } 
#cssmenu{border-color:#3589a1;} 
#cssmenu > ul > li > a{border-right:1px solid #3589a1; color:#fff;} 
#cssmenu > ul > li > a:after{border-color:#6ed1ff;} 
#cssmenu > ul > li > a:hover{background:#840d19;} 

</style>

<div id='cssmenu'>
<ul>
  <?php
    if($_SESSION['level'] == '1'){

    include 'koneksi.php';
  $sql = mysqli_query($kon,"select nama from guru where nip = $_SESSION[username]");
  $sql2 = mysqli_fetch_assoc($sql);
?>
   <li class='has-sub '><a href='#'><span><?php echo $sql2['nama']; ?></span></a>
 <?php } ?>

  <?php
    if($_SESSION['level'] == '3'){

    
  $sql = mysqli_query($kon,"select nama from tata_usaha where nip = $_SESSION[username]");
  $sql2 = mysqli_fetch_assoc($sql);
?>
   <li class='has-sub '><a href='#'><span><?php echo $sql2['nama']; ?></span></a>
 <?php } ?>

 <?php
    if($_SESSION['level'] == '4'){

    
  $sql = mysqli_query($kon,"select nama from administrator where id_admin = $_SESSION[username]");
  $sql2 = mysqli_fetch_assoc($sql);
?>
   <li class='has-sub '><a href='#'><span><?php echo $sql2['nama']; ?></span></a>
 <?php } ?>
      <ul>
         <li><a href='?act=profil'><span>Profil</span></a></li>
         <li><a href='index.php?act=ganti_password'><span>Ganti Password</span></a></li>
      </ul>
   </li>
   <li><a href='logout.php'><span>Logout</span></a></li>
</ul>
</div>