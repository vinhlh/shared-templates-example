<?php

$data = array(
    'component1' => array(
        'title' => 'new title for sku' . $_GET['sku'],
        'content' => 'new content for sku' . $_GET['sku']
    ),
    'component2' => array(
        'list' => array(
        )
    )
);

for ($i = 0; $i < $_GET['sku']; $i++) {
    $data['component2']['list'][] = array('data' => 'item ' . $i . ' of sku ' . $_GET['sku']);
}

header('Content-Type: application/json');
echo json_encode($data);