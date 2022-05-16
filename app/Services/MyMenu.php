<?php

namespace App\Services;

use Pratiksh\Adminetic\Traits\SidebarHelper;
use Pratiksh\Adminetic\Contracts\SidebarInterface;

class MyMenu implements SidebarInterface
{
    use SidebarHelper;

    public function myMenu(): array
    {
        return [
            [
                'type' => 'breaker',
                'name' => 'Cooperation',
                'description' => 'Category & Company',
            ],
            [
                'type' => 'menu',
                'name' => 'Categories',
                'is_active' => request()->routeIs('category*') ? 'active' : '',
                'conditions' => [
                    [
                        'type' => 'or',
                        'condition' => auth()->user()->can('view-any', App\Models\Admin\Category::class),
                    ],
                    [
                        'type' => 'or',
                        'condition' => auth()->user()->can('create', App\Models\Admin\Category::class),
                    ],
                ],
                'children' => $this->indexCreateChildren('category', App\Models\Admin\Category::class)
            ],
            [
                'type' => 'menu',
                'name' => 'Companies',
                'is_active' => request()->routeIs('company*') ? 'active' : '',
                'conditions' => [
                    [
                        'type' => 'or',
                        'condition' => auth()->user()->can('view-any', App\Models\Admin\Company::class),
                    ],
                    [
                        'type' => 'or',
                        'condition' => auth()->user()->can('create', App\Models\Admin\Company::class),
                    ],
                ],
                'children' => $this->indexCreateChildren('company', App\Models\Admin\Company::class)
            ],
            [
                'type' => 'breaker',
                'name' => 'DEV TOOLS',
                'description' => 'Development Environment',
            ],
            [
                'type' => 'menu',
                'name' => 'Builder',
                'conditions' => [
                    [
                        'type' => 'or',
                        'condition' => env('APP_ENV') == 'local'
                    ],
                ],
                'children' => [
                    [
                        'type' => 'submenu',
                        'name' => 'Form Builder 1',
                        'link' => 'http://admin.pixelstrap.com/cuba/theme/form-builder-1.html',
                    ],
                    [
                        'type' => 'submenu',
                        'name' => 'Form Builder 2',
                        'link' => 'http://admin.pixelstrap.com/cuba/theme/form-builder-2.html',
                    ],
                    [
                        'type' => 'submenu',
                        'name' => 'Page Builder',
                        'link' => 'http://admin.pixelstrap.com/cuba/theme/pagebuild.html',
                    ],
                    [
                        'type' => 'submenu',
                        'name' => 'Buttom Builder',
                        'link' => 'http://admin.pixelstrap.com/cuba/theme/button-builder.html',
                    ],
                ]
            ],
            [
                'type' => 'menu',
                'name' => 'Documentation',
                'conditions' => [
                    [
                        'type' => 'or',
                        'condition' => env('APP_ENV') == 'local'
                    ],
                ],
                'children' => [
                    [
                        'type' => 'submenu',
                        'name' => 'Frontend Docs',
                        'link' => 'https://docs.pixelstrap.com/cuba/all_in_one/document/index.html',
                    ],
                    [
                        'type' => 'submenu',
                        'name' => 'Adminetic Docs',
                        'link' => 'https://pratikdai404.gitbook.io/adminetic/',
                    ],
                ]
            ],
            [
                'type' => 'link',
                'name' => 'Github',
                'icon' => 'fab fa-github',
                'link' => 'https://github.com/pratiksh404/admineticl',
            ],
            [
                'type' => 'link',
                'name' => 'Font Awesome',
                'icon' => 'fa fa-font"',
                'link' => route('fontawesome'),
            ],
        ];
    }
}
