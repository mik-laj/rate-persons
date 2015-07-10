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

    <?= $this->Html->css('app.css') ?>

    <?= $this->Html->script('modernizr.js') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
</head>
<body>

    <header class="show-for-medium-up">
        <div class="row">
            <div class="header">
                <div class="header--group">
                    <a href="/" class="header--title">Rate persons</a>
                    <p>You also assess the apparitiond of other people..</p>
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
                <!-- Right Nav Section -->
                <ul class="right">
                    <li class="active"><a href="#">Right Button Active</a></li>
                    <li class="has-dropdown">
                        <a href="#">Right Button Dropdown</a>
                        <ul class="dropdown">
                            <li><a href="#">First link in dropdown</a></li>
                            <li class="active"><a href="#">Active link in dropdown</a></li>
                        </ul>
                    </li>
                </ul>

                <!-- Left Nav Section -->
                <ul class="left">
                    <li><a href="#">Left Nav Button</a></li>
                </ul>
            </section>
        </nav>
    </div>
<?= $this->Flash->render() ?>
<div class="content">
    <div class="row">
        <div class="large-12 column">
            <?= $this->fetch('content') ?>
        </div>
    </div>
</div>

<?= $this->Html->script('script.js') ?>
<script>
    $(document).foundation();
</script>
<?= $this->fetch('script') ?>
</body>
</html>
