<!-- HEADER -->
<header>
    <div class="container-fluid">
        <table style="width:100%">
            <tr>
                <td rowspan="2">
                    <img class="site-logo" src="<?php bloginfo('template_url'); ?>/img/brain.svg" alt="logo" />
                </td>
                <td>
                    <h1 style="text-align: right;">
                        <?php bloginfo('name');?>
                    </h1>
                </td>
            </tr>
            <tr>
                <td>
                    <h1 style="text-align: right;">
                        <small>
                            <?php bloginfo('description'); ?>
                        </small>
                    </h1>
                </td>
            </tr>
        </table>
    </div>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Brand</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
                    <li><a href="#">Link</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a class="navbar-link" href="/wp-admin/index.php">Admin</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
