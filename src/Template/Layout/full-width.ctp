<!DOCTYPE html>
<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
<html class="no-js" lang="en" >

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
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
    <?= $this->element('topBar') ?>
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
