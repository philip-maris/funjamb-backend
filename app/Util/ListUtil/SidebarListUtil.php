<?php

namespace App\Util\ListUtil;

trait SidebarListUtil
{

    public array $sidebarList = array(

        [
            'icon' => 'bi bi-grid',
            'heading' => 'Dashboard',
            'navItem' => 'OverView',
            'link'=>"overview"
        ],
        [
            'icon' => 'bi bi-person-square',
            'heading' => 'User Management',
            'navItem' => 'Users',
            'child' =>[
                [
                    'icon' => 'bi bi-book-half',
                    'title' => 'view',
                    'link' => 'users',
                ],
            ],
        ],
        [
            'icon' => 'bi bi-person-square',
            'heading' => '',
            'navItem' => 'Staffs',
            'child' =>[
                [
                    'icon' => 'bi bi-book-half',
                    'title' => 'view',
                    'link' => 'staffs',
                ],
                [
                    'icon' => 'bi bi-book-half',
                    'title' => 'add',
                    'link' => 'createStaff',
                ],
            ],
        ],
        [
            'icon' => 'bi bi-bag',
            'heading' => 'Shops',
            'navItem' => 'categories',
            'child' =>[
                [
                    'icon' => 'bi bi-bag',
                    'title' => 'view',
                    'link' => 'categories',
                ],
                [
                    'icon' => 'bi bi-bag',
                    'title' => 'add',
                    'link' => 'addCategory',
                ],
            ],
        ],
        [
            'icon' => 'bi bi-bag',
            'heading' => '',
            'navItem' => 'questions',
            'child' =>[
                [
                    'icon' => 'bi bi-bag',
                    'title' => 'view',
                    'link' => 'questions',
                ],
                [
                    'icon' => 'bi bi-bag',
                    'title' => 'add',
                    'link' => 'addQuestion',
                ],
            ],
        ],
        );

   /* public array $superAdminSideList = array(

        [
            'icon' => 'bi bi-grid',
            'heading' => 'Dashboard',
            'navItem' => 'OverView',
            'link'=>"overview"
        ],
        [
            'icon' => 'bi bi-person-square',
            'heading' => 'User Management',
            'navItem' => 'Customers',
            'child' =>[
                [
                    'icon' => 'bi bi-book-half',
                    'title' => 'view',
                    'link' => 'customers',
                ],
            ],
        ],
        [
            'icon' => 'bi bi-person-square',
            'heading' => '',
            'navItem' => 'Staffs',
            'child' =>[
                [
                    'icon' => 'bi bi-book-half',
                    'title' => 'view',
                    'link' => 'staffs',
                ],
                [
                    'icon' => 'bi bi-book-half',
                    'title' => 'add',
                    'link' => 'createStaff',
                ],
            ],
        ],
        [
            'icon' => 'bi bi-bag',
            'heading' => 'Shops',
            'navItem' => 'categories',
            'child' =>[
                [
                    'icon' => 'bi bi-bag',
                    'title' => 'view',
                    'link' => 'categories',
                ],
                [
                    'icon' => 'bi bi-bag',
                    'title' => 'add',
                    'link' => 'addCategory',
                ],
            ],
        ],
        [
            'icon' => 'bi bi-bag',
            'heading' => '',
            'navItem' => 'brands',
            'child' =>[
                [
                    'icon' => 'bi bi-bag',
                    'title' => 'view',
                    'link' => 'brands',
                ],
                [
                    'icon' => 'bi bi-bag',
                    'title' => 'add',
                    'link' => 'addBrand',
                ],
            ],
        ],
        [
            'icon' => 'bi bi-bag',
            'heading' => '',
            'navItem' => 'questions',
            'child' =>[
                [
                    'icon' => 'bi bi-bag',
                    'title' => 'view',
                    'link' => 'questions',
                ],
                [
                    'icon' => 'bi bi-bag',
                    'title' => 'add',
                    'link' => 'addProduct',
                ],
            ],
        ],
        [
            'icon' => 'bi bi-bag',
            'heading' => '',
            'navItem' => 'deliveries',
            'child' =>[
                [
                    'icon' => 'bi bi-bag',
                    'title' => 'view',
                    'link' => 'deliveries',
                ],
                [
                    'icon' => 'bi bi-bag',
                    'title' => 'add',
                    'link' => 'deliveries',
                ],
            ],
        ],
        [
            'icon' => 'bi bi-bag',
            'heading' => '',
            'navItem' => 'orders',
            'child' =>[
                [
                    'icon' => 'bi bi-bag',
                    'title' => 'view',
                    'link' => 'orders',
                ],
            ],
        ],
        [
            'icon' => 'bi bi-bag',
            'heading' => '',
            'navItem' => 'subscription',
            'child' =>[
                [
                    'icon' => 'bi bi-bag',
                    'title' => 'view',
                    'link' => 'orders',
                ],
            ],
        ],
        [
            'icon' => 'bi bi-bag',
            'heading' => '',
            'navItem' => 'transactions',
            'child' =>[
                [
                    'icon' => 'bi bi-bag',
                    'title' => 'transactions',
                    'link' => 'brands',
                ],
            ],
        ],
        [
            'icon' => 'bi bi-bag',
            'heading' => '',
            'navItem' => 'testimonies',
            'child' =>[
                [
                    'icon' => 'bi bi-bag',
                    'title' => 'testimonies',
                    'link' => 'brands',
                ],
            ],
        ],
        [
            'icon' => 'bi bi-bag',
            'heading' => 'Ui',
            'navItem' => 'banner-type',
            'child' =>[
                [
                    'icon' => 'bi bi-bag',
                    'title' => 'view',
                    'link' => 'brands',
                ],
                [
                    'icon' => 'bi bi-bag',
                    'title' => 'add',
                    'link' => 'brands',
                ],
            ],
        ],
        [
            'icon' => 'bi bi-bag',
            'heading' => '',
            'navItem' => 'banners',
            'child' =>[
                [
                    'icon' => 'bi bi-bag',
                    'title' => 'view',
                    'link' => 'brands',
                ],
                [
                    'icon' => 'bi bi-bag',
                    'title' => 'add',
                    'link' => 'brands',
                ],
            ],
        ],
    );*/
}
