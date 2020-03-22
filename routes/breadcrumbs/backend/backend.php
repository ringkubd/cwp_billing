<?php

Breadcrumbs::for('admin.dashboard', function ($trail) {
    $trail->push(__('strings.backend.dashboard.title'), route('admin.dashboard'));
});

Breadcrumbs::for('admin.server.index', function ($trail){
    $trail->push(__('strings.backend.server.index.title'), route('admin.server.index'));
});

Breadcrumbs::for('admin.server.create', function ($trail){
    $trail->parent('admin.server.index');
    $trail->push(__('strings.backend.server.index.create'), route('admin.server.create'));
});

Breadcrumbs::for('admin.server.edit', function ($trail, $id){
    $trail->parent('admin.server.index');
    $trail->push(__('strings.backend.server.index.create'), route('admin.server.edit', $id));
});



require __DIR__.'/auth.php';
require __DIR__.'/log-viewer.php';
require __DIR__.'/auth/permission.php';
