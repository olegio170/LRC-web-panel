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
    <div class="wrapper" style="width: 350px;">
        <main style="width: 100%; text-align: center; margin: 20px;">
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
