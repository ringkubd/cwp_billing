<?php

Breadcrumbs::for('admin.auth.permission.index', function ($trail) {
    $trail->push(__('menus.backend.access.permission.index'), route('admin.auth.permission.index'));
});
Breadcrumbs::for('admin.auth.permission.create', function ($trail) {
    $trail->parent('admin.auth.permission.index');
    $trail->push(__('menus.backend.access.permission.create'), route('admin.auth.permission.create'));
});
Breadcrumbs::for('admin.auth.permission.edit', function ($trail, $id) {
    $trail->parent('admin.auth.permission.index');
    $trail->push(__('menus.backend.access.permission.edit'), route('admin.auth.permission.edit', $id));
});
