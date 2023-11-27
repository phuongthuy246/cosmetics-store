<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Thithi Beauty - Mỹ phẩm chính hãng</title>
    <link rel="shortcut icon" href="./images/Favicon.png" type="image/x-icon" />
    <link rel="stylesheet" href="./css/main.css?v=<?php echo time(); ?>" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
</head>

<body>
    <div class="web">
        <?php
        session_start();
        // session_destroy();
        include("admincp/config/config.php");
        include("pages/header.php");
        include("pages/banner.php");
        include("pages/main.php");
        include("pages/footer.php");
        ?>
    </div>
</body>
<script>
    // Get the modal
    var modal = document.getElementById("id01");

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    };
</script>
<script>
    function hidding(a) {
        if (a.innerText == "Xem thêm nội dung") {
            document.getElementsByClassName("hidding")[0].style.display = "none";
            document.getElementsByClassName("product-motasp-grid")[0].style.height = "100%";
            a.innerText = "Thu gọn nội dung";
        } else {
            document.getElementsByClassName("hidding")[0].style.display = "block";
            document.getElementsByClassName("product-motasp-grid")[0].style.height = "400px";
            a.innerText = "Xem thêm nội dung";
        }
    }
</script>

<script src="https://kit.fontawesome.com/72a902116d.js" crossorigin="anonymous"></script>
<script src="../client/js/script.js" ></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>