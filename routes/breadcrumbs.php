<?php

// Dashboard
Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('Dashboard', route('dashboard'));
});

// Dashboard > Gallery
Breadcrumbs::for('gallery', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Gallery', url('gallery'));
});

// Dashboard > News
Breadcrumbs::for('news', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('News', url('news'));
});

// Dashboard > Kategori kelas
Breadcrumbs::for('kategorikelas', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('kategorikelas', url('kategorikelas'));
});

// Dasboadrd > Upload
Breadcrumbs::for('upload', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('upload', url('upload'));
});


// Dashboard > Menu
Breadcrumbs::for('menu', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Menu', url('menu'));
});

// Dashboard > Role
Breadcrumbs::for('role', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Role', url('role'));
});

// Dashboard > Role > Access Role
Breadcrumbs::for('roleaccess', function ($trail) {
    $trail->parent('role');
    $trail->push('Role Access', url('role'));
});

// Dashboard > Setting
Breadcrumbs::for('settings', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Settings', url('settings'));
});

// Dashboard > Submenu
Breadcrumbs::for('submenu', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Submenu', url('submenu'));
});

// Dashboard > Themes
Breadcrumbs::for('themes', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Themes', url('themes'));
});

// Dashboard > Users
Breadcrumbs::for('users', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Users', url('users'));
});

// Dashboard > Menu Front
Breadcrumbs::for('menufront', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Menu Front', url('menufront'));
});

// Dashboard > Menu Front
Breadcrumbs::for('submenufront', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Submenu Front', url('submenufront'));
});

// Dashboard > Related Link
Breadcrumbs::for('relatedlink', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Related Link', url('relatedlink'));
});

// Dashboard > Component
Breadcrumbs::for('component', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Component', url('component'));
});

// Dashboard > Inbox
Breadcrumbs::for('inbox', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Inbox', url('inbox'));
});

// Dashboard > Agenda
Breadcrumbs::for('agenda', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Event', url('event'));
});

// Dashboard > Complaint
Breadcrumbs::for('complaint', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Public Complaints', url('complaint'));
});

// Dashboard > Whatsapp
Breadcrumbs::for('whatsapp', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Whatsapp', url('whatsapp'));
});

// Dashboard > Daily Report
Breadcrumbs::for('daily', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Daily Report', url('daily'));
});
// // Home > About
// Breadcrumbs::for('about', function ($trail) {
//     $trail->parent('home');
//     $trail->push('About', route('about'));
// });

// // Home > Blog
// Breadcrumbs::for('blog', function ($trail) {
//     $trail->parent('home');
//     $trail->push('Blog', route('blog'));
// });

// // Home > Blog > [Category]
// Breadcrumbs::for('category', function ($trail, $category) {
//     $trail->parent('blog');
//     $trail->push($category->title, route('category', $category->id));
// });

// // Home > Blog > [Category] > [Post]
// Breadcrumbs::for('post', function ($trail, $post) {
//     $trail->parent('category', $post->category);
//     $trail->push($post->title, route('post', $post->id));
// });
