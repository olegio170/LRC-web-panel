<p>
    Error 404 – Page Not Found
</p>
<p>
    The page you requested could not be found.
</p>
<p>
    <?php
    if(isset($data['error']) && $data['error'])
    {
        echo $data['data'];
    }
    ?>
</p>
