<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="theme-color" content="#009688">
    <title>LRC Control panel - <?php echo $data['title'] ?></title>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <header>
        <div class="header-content">
			<a href="/"><h1>LRC Control panel</h1></a>
            <p>Advanced remote control system</p>
        </div>
        <div><a href="/admin/logout">OOO</a></div>
    </header>

    <div class="wrapper">
        <aside>
            <div class="mt-block">
                <div class="mt-block-header">
                    <h2>Menu</h2>
                </div>
                <div class="mt-block-content">
                    <ul class="main-menu">
                        <li><a href="/">Home</a></li>
                        <li><a href="/contacts">Contacts</a></li>
                        <li><a href="/services">Services</a></li>
                        <li><a href="/portfolio">Portfolio</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="mt-block">
                <div class="mt-block-header">
                    <h2>Server status</h2>
                </div>
                <div class="mt-block-content">
                    <p>
                        Ha-ha.
                    </p>
					<p>
						Of cource it is still under develop. We don't fucking even know, when it will be released.
					</p>
					<p>
						So... Be patient.
					</p>
                </div>
            </div>
        </aside>

        <main>
            <div class="mt-block">
                <div class="mt-block-header">
                    <h2><?php echo $data['title'] ?></h2>
                </div>
                <div class="mt-block-content mt-padding">
                    <?php include 'application/views/'.$content_view; ?>
                </div>
            </div>
        </main>
    </div>

</body>
</html>
