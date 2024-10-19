<?php

namespace Novay\CMS\Services;

class MenuManager
{
    protected $menuItem = [];
    protected $submenus = [];
    protected $menuList = [];

    public function title($title)
    {
        $this->menuItem = [
            'type' => 'menu', 
            'title' => __($title), 
            'description' => null, 
            'enable' => true, 
            'submenu' => [], 
            'badge' => null, 
            'route' => null, 
            'order' => 0
        ];

        return $this;
    }

    public function order($order)
    {
        if ($this->isEnabled()) {
            $this->menuItem['order'] = $order;
        }

        return $this;
    }

    public function getOrderedMenu()
    {
        usort($this->menuList, function($a, $b) {
            return $a['order'] <=> $b['order'];
        });

        return $this->menuList;
    }

    public function route($route)
    {
        if ($this->isEnabled() && !empty($route)) { 
            $this->menuItem['route'] = $route;
        }
    
        return $this->menuItem;
    }

    public function badge($badge)
    {
        if ($this->isEnabled()) {
            $this->menuItem['badge'] = $badge;
        }
        
        return $this; 
    }

    public function description($description)
    {
        if ($this->isEnabled()) {
            $this->menuItem['description'] = $description;
        }
        
        return $this; 
    }

    public function enable($enable = true)
    {
        $this->menuItem['enable'] = $enable;

        return $this; 
    }

    public function separator()
    {
        return ['type' => 'separator']; 
    }

    public function submenu(\Closure $callback)
    {
        if ($this->isEnabled()) {
            $submenuManager = new self();

            $callback($submenuManager);

            $this->menuItem['submenu'] = $submenuManager->getSubmenus();
        }

        return $this->menuItem;
    }

    public function getSubmenus()
    {
        return $this->submenus;
    }

    public function addSubmenuItem($item)
    {
        if ($item['enable'] === true) {
            $this->submenus[] = $item;
        }
    }

    public function routeSubmenu($route)
    {
        if ($this->isEnabled() && !empty($route)) {
            $this->menuItem['route'] = $route;
            $this->addSubmenuItem($this->menuItem);
        }

        $this->menuItem = [];

        return $this;
    }

    protected function isEnabled()
    {
        return isset($this->menuItem['enable']) && $this->menuItem['enable'] === true;
    }
}