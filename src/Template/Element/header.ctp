<?php
    use Cake\Routing\Router;
?>
<header id="header">
    <div class="container">
        <div id="header-inner" class="clearfix">
            <div id="header-logo">
                <a href="/">
                    <img src="/img/logo.png" alt="">
                </a>
            </div>

            <div id="header-nav-btn">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <div id="header-nav">
                <nav class="main-nav <?= !empty($showSubMenu) ? 'sub-nav-active' : '' ?>">
                    <div id="header-nav-close">
                        <span></span>
                        <span></span>
                    </div>
                    <ul>
                        <?php foreach ($menuItems as $item): ?>
                        <?php
                            $hasSubMenu = !empty($item['subItems']) ? true : false;
                            $subItems = $hasSubMenu ? $item['subItems'] : [];
                        ?>
                        <li class="<?= !empty($item['active']) ? 'active' : '' ?>">
                            <a href="<?= Router::url($item['link']) ?>" target="<?= !empty($item['target']) ? $item['target'] : '_self' ?>"><?= $item['name'] ?></a>
                            <?php if ($hasSubMenu): ?>
                            <div class="sub-nav">
                                <ul>
                                    <?php foreach ($subItems as $subItem): ?>
                                    <li class="<?= !empty($subItem['active']) ? 'active' : '' ?>">
                                        <a href="<?= Router::url($subItem['link']) ?>" target="<?= !empty($subItem['target']) ? $subItem['target'] : '_self' ?>"><?= $subItem['name'] ?></a>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <?php endif; ?>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>