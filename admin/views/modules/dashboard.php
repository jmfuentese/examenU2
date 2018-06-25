<?php
if(!$_SESSION["validar"]){
    //header("location:index.php?action=ingresar");
    echo "<script>window.location.href='index.php?action=ingresar'</script>";
    exit();
}

?>
    <!-- Content Wrapper. Contains page content -->
    <div class="center" style="padding:20px;">
        <img src="views/dist/img/danzlife.png" alt="Danzlife" width="200px">
        <div class="row center" style="text-align: center">
            <img class="materialboxed" src="views/dist/img/danzlife_gallery1.png" alt="" width="240px" style="margin-left: 130px;">
            <img class="materialboxed" src="views/dist/img/danzlife_gallery2.png" alt="" width="240px" style="margin-left: 50px;">
            <img class="materialboxed" src="views/dist/img/danzlife_gallery3.png" alt="" width="240px" style="margin-left: 50px;">
            <img class="materialboxed" src="views/dist/img/danzlife_gallery4.png" alt="" width="240px" style="margin-left: 50px;">
        </div>
    </div>
