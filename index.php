<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

<?php
include('vendor/autoload.php');
include('Render.php');

// init data
$data = array(
    'component1' => array(
        'title' => 'init title',
        'content' => 'init content'
    ),
    'component2' => array(
        'list' => array(
            array('data' => 'item 1'),
            array('data' => 'item 2')
        )
    )
);

$r = new Render(new Mustache_Engine());
?>

<div id="main">
    <div content-id="component1">
        <?php echo $r->render('component1', $data['component1']); ?>
    </div>
    <div content-id="component2">
        <?php echo $r->render('component2', $data['component2']); ?>
    </div>
    <a href="#" update-content-handler data-update-url="update.php?sku=10" data-callback="onUpdate">Update content for sku 10</a>
    <a href="#" update-content-handler data-update-url="update.php?sku=7" data-callback="onUpdate">Update content for sku 7</a>
</div>

<?php
// render all js templates which used to render by js
echo $r->renderAllJsTemplates();
?>

<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="js/lib/mustache.min.js"></script>
<script src="js/lib/render.js"></script>
<script src="js/lib/refreshable_content.js"></script>
<script>
    // an js callback function example
    var onUpdate = function (resp) {
        console.log('update sucessfully!', resp);
    }
</script>
</body>
</html>