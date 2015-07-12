<?php
$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
<html class="no-js" lang="en" >

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>

    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->meta('theme-color', '#008CBA') ?>
    <?= $this->Html->css('app.css') ?>

    <?= $this->Html->script('modernizr.js') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
</head>
<body>

    <header class="show-for-medium-up">
        <div class="row">
            <div class="site-header">
                <div class="site-header--group">
                    <a href="/" class="site-header--title">Rate persons</a>
                    <p class="site-header--subtitle">You also assess the apparitiond of other people..</p>
                </div>
            </div>
        </div>
    </header>
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
                        <a href="/"><i class="fa fa-home"></i>Home</a>
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
            </section>
        </nav>
    </div>
<?= $this->Flash->render() ?>
<div class="content">
            <?= $this->fetch('content') ?>
</div>

<?= $this->Html->script('script.js') ?>
<script>
    $(document).foundation();
</script>
<?= $this->fetch('script') ?>
</body>
</html>
