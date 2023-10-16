<?php include './frontend/static-pages/static-pages.php'?>


<ul class="navbar-nav ">
    <?php foreach ($static_data as $item):?>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/rent-a-car/<?php echo $item->url?>">
             <?php echo $item->title?>
             </a>
             
        </li>
    <?php endforeach;?>
</ul>