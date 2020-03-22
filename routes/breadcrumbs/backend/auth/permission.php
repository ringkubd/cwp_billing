<?php

Breadcrumbs::for('admin.auth.permission.index', function ($trail) {
    $trail->push(__('menus.backend.access.permission.index'), route('admin.auth.permission.index'));
});
