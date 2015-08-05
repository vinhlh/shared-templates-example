<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

<?php
include('vendor/autoload.php');
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

$m = new Mustache_Engine;

$component1 = file_get_contents('templates/component1.html');
$component2 = file_get_contents('templates/component2.html');
?>

<div id="main">
    <div content-id="component1">
        <?php echo $m->render($component1, $data['component1']); ?>
    </div>
    <div content-id="component2">
        <?php echo $m->render($component2, $data['component2']); ?>
    </div>
    <a href="#" update-content-handler data-update-url="update.php?sku=10" data-callback="onUpdate">Update content for sku 10</a>
    <a href="#" update-content-handler data-update-url="update.php?sku=7" data-callback="onUpdate">Update content for sku 7</a>
</div>

<script type="text/template" template-id="component1">
<?php echo $component1; ?>
</script>

<script type="text/template" template-id="component2">
<?php echo $component2; ?>
</script>

<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="js/lib/mustache.min.js"></script>
<script src="js/lib/render.js"></script>
<script src="js/lib/refreshable_content.js"></script>
<script>
    var onUpdate = function (resp) {
        console.log('update sucessfully!', resp);
    }
</script>
</body>
</html>