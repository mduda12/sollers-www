<?php

namespace JiraConnect\Core;

abstract class ControllerCore {
    public $menuItems = [];

    public function setMenuItems($menuItems) {
        $this->menuItems = $menuItems;
    }

    public function isCurrentMenuItem($menuItem) {
        return in_array($menuItem, $this->menuItems);
    }
}