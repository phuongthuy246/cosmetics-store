<?php
// include('../admincp/config/config.php');
session_start();
// $user = [];
$user = (isset($_SESSION['admin'])) ? $_SESSION['admin'] : [];

if (isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {
    unset($_SESSION['admin']);
    header('Location:../../NLN/client/index.php');
}
?>
<header class="header">
    <div class="grid">
        <div class="nav">
            <nav class="navbar">
                <ul class="navbar_list">
                    <li class="navbar_itemm" style="
    width: 135px;
    margin: 0;">
                        <img style="
    box-sizing: border-box;
    padding-top: 9px;
    width: 141%;
    padding-left: 18px;
    height: auto;" src="../../NLN/client/images/lg.png" />
                    </li>
                    <div class="collapseButton" onclick="handleCollapse()">
                <i class="fas fa-bars"></i>
                </div>
                </ul>
                <ul class="navbar_list">
                    <li class="navbar_item">
                        <a href="index.php" class="navbar_link">
                        <i class="navbar_icon fas fa-user-alt"></i></i><?php echo $user['TenAD']; ?>
                        </a>
                    </li>
                    <li class="navbar_item">
                        <a href="index.php?dangxuat=1" class="navbar_link">
                            <i class="navbar_icon fas fa-sign-out-alt"></i>Đăng xuất
                        </a>
                    </li>
                </ul>

            </nav>
        </div>
    </div>
</header>