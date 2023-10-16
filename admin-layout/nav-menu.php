<?php
include './admin-layout/static-pages/static-pages.php';
?>
<nav id="sidebarMenu" class="sidebarMainMenu col-md-3 col-lg-2 d-md-block bg-light sidebar collapse p-0">
    <div class="position-sticky sidebar-sticky">
        <?php foreach ($static_data as $item):?>
            <?php if ( $item["role"] === $row['role']):?>
                <ul class="nav flex-column">
                    <?php foreach ($item['children'] as $page):?>
                        <li class="nav-item <?php if ( $page["page"] === $currentPage):?> active <?php else:?> <?php endif;?>">
                            <a class="nav-link " aria-current="page" href="/rent-a-car/<?php echo $page['url']?>">
                            <span data-feather="home" class="align-text-bottom"></span>
                                <?php echo $page['title']?>
                            </a>
                        </li>
                    <?php endforeach;?>
                </ul>
            <?php endif;?>
        <?php endforeach;?>
    </div>
</nav>
