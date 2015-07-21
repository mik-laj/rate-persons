    <div class="contain-to-grid sticky">
        <nav class="top-bar" data-topbar role="navigation">
            <ul class="title-area">
                <li class="name">
                    <h1 class="show-for-small-only"><a href="#">Rate persons</a></h1>
                </li>
                <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
            </ul>

            <section class="top-bar-section">
                <ul class="left">
                    <li>
                        <a href="/"><i class="fa fa-home"></i> Home</a>
                    </li>
                    <li>
                        <?= $this->Html->link(
                            '<i class="fa fa-check-square-o"></i> '.__('Vote'),
                            ['controller' => 'Vote'],
                            ['escape' => false])
                        ?>
                    </li>
                    <li>
                        <?= $this->Html->link(
                            '<i class="fa fa-users"></i> '.__('Persons'),
                            ['controller' => 'Stats', 'action'=>'index'],
                            ['escape' => false])
                        ?>
                    </li>
                    <li>
                        <?= $this->Html->link(
                            '<i class="fa fa-pie-chart"></i> '.__('Categories'),
                            ['controller' => 'Stats', 'action'=>'categories'],
                            ['escape' => false]) ?>
                    </li>
                </ul>
                <?php if($is_logged): ?>
                <ul class="right">
                    <li class="divider"></li>
                    <li class="has-dropdown">
                        <a href="#"><i class="fa fa-wrench"></i> Admin</a>
                        <ul class="dropdown">
                            <li>
                                <?= $this->Html->link(__('Categories'), ['controller' => 'Categories']) ?>
                            </li>
                            <li>
                                <?= $this->Html->link(__('Votes'), ['controller' => 'Votes']) ?>
                            </li>
                            <li>
                                <?= $this->Html->link(__('Vote Single'), ['controller' => 'VotesSingle']) ?>
                            </li>
                            <li>
                                <?= $this->Html->link(__('Persons'), ['controller' => 'Persons']) ?>
                            </li>
                            <li>
                                <?= $this->Html->link(__('Users'), ['controller' => 'Users']) ?>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <?=
                                    $this->Html->link(
                                    '<i class="fa fa-sign-out"></i> '.__('Logout'),
                                    ['controller' => 'Users', 'action'=>'logout'],
                                    ['escape' => false])
                                ?>
                            </li>
                        </ul>
                    </li>
                </ul>
                <?php endif; ?>
            </section>
        </nav>
    </div>
