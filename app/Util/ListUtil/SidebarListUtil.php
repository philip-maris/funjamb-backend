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
            'navItem' => 'Customers',
            'child' =>[
                [
                    'icon' => 'bi bi-book-half',
                    'title' => 'View Users',
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
                    'title' => 'View staffs',
                    'link' => 'customers',
                ],
                [
                    'icon' => 'bi bi-book-half',
                    'title' => 'Add staffs',
                    'link' => 'customers',
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
                    'title' => 'categories',
                    'link' => 'categories',
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
                    'title' => 'brands',
                    'link' => 'brands',
                ],
            ],
        ],
        [
            'icon' => 'bi bi-bag',
            'heading' => '',
            'navItem' => 'products',
            'child' =>[
                [
                    'icon' => 'bi bi-bag',
                    'title' => 'products',
                    'link' => 'products',
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
                    'title' => 'deliveries',
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
                    'title' => 'orders',
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
                    'title' => 'subscriptions',
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
                    'title' => 'banner-type',
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
                    'title' => 'banners',
                    'link' => 'brands',
                ],
            ],
        ],
        );
}
