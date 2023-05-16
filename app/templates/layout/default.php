<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'dashboard';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>


    <?= $this->Html->css(['dashboard', 'milligram.min', 'cake','dashboard_new']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>
<body>


<div class="sidebar close">
    <div class="logo-details">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS-XEY4HM3lPMQOivTnGZbnRm-tm7yEy3rBzQ&usqp=CAU" width="78px" height="78px" style="padding-left: 7px; padding-top: 5px;">
        <span class="logo_name">Cloth Shop</span>
    </div>
    <ul class="nav-links">
        <li>
            <a href="<?= $this->Url->build('/') ?>">
                <i class='bx bx-grid-alt' ></i>
                <span class="link_name">Dashboard</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="<?= $this->Url->build('/') ?>">Dashboard</a></li>
            </ul>
        </li>
        <li>
            <div class="iocn-link">
                <a href="#">
                    <i class='bx bxs-receipt'></i>
                    <span class="link_name">Product</span>
                </a>
                <i class='bx bxs-chevron-down arrow' ></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="#">Product</a></li>
                <li><a href="<?= $this->Url->build('/products') ?>">Product List</a></li>
                <li><a href="<?= $this->Url->build('/products/add') ?>">Add Product</a></li>
            </ul>
        </li>
        <li>
            <div class="iocn-link">
                <a href="#">
                    <i class='bx bxs-user-detail'></i>
                    <span class="link_name">Admin</span>
                </a>
                <i class='bx bxs-chevron-down arrow' ></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="#">Admin</a></li>
                <li><a href="<?= $this->Url->build('/admin') ?>">Admin List</a></li>
                <li><a href="<?= $this->Url->build('/admin/add') ?>">New Admin</a></li>
            </ul>
        </li>
        <li>
            <?php if($this->Identity->isLoggedIn()) { ?>
                <div class="profile-details">
                    <div class="profile-content">
                    </div>
                    <div class="name-job">
                        <div class="profile_name">
                            <?php echo $this->Html->link('Hi, '.$this->Identity->get('first_name'), array('controller' => 'admin', 'action' => 'logout'),['confirm' => 'Are you sure to logout?']);?>
                        </div>
                    </div>
                    <div style="padding-right: 10%">
                        <div class="name-job">
                            <i><?php echo $this->Html->link('',array('controller' => 'admin', 'action' => 'logout'),['confirm' => 'Are you sure to logout?','class'=>'bx bx-log-out'])?></i>
                        </div>
                    </div>
                </div>
            <?php } else{ ?>
               <div class="name-job">
                   <i>
                       <?php echo $this->Html->link('Login', array('controller' => 'admin', 'action' => 'login'),['class'=>' px-3 me-5 a-color']);
               ?>
                   </i>
               </div>
            </div>
            <?php } ?>
        </li>
    </ul>
</div>
<section class="home-section">
    <header style="position: fixed;background-color: rgb(253,250,244); width: 100%">
        <div class="home-content">
            <i class='bx bx-menu' ></i>
        </div>

    </header>
    <br><br><br><br><br>
    <div class="box">
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>

    </div>
</section>
<script>
    let arrow = document.querySelectorAll(".arrow");
    for (var i = 0; i < arrow.length; i++) {
        arrow[i].addEventListener("click", (e)=>{
            let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
            arrowParent.classList.toggle("showMenu");
        });
    }
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".bx-menu");
    console.log(sidebarBtn);
    sidebarBtn.addEventListener("click", ()=>{
        sidebar.classList.toggle("close");
    });
</script>
</body>
</html>
