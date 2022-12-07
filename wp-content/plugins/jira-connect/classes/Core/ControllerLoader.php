<?php

namespace JiraConnect\Core;

use DI\Container;
use Exception;
use JiraConnect\Plugin;

class ControllerLoader {
    private $container;

    private $registerer;

    private $controllers = [];

    private $controllersObjects = [];

    /**
     * @param array $controllers
     */
    public function setControllers($controllers) {
        $this->controllers = $controllers;
    }

    /**
     * ControllerLoader constructor.
     *
     * @param Container $container
     * @param Registerer $registerer
     *
     * @uses admin_menu()
     */
    public function __construct(Container $container, Registerer $registerer) {
        $this->container = $container;
        $this->registerer = $registerer;
        $this->registerer->add_action('admin_menu', $this);
    }


    /**
     * @throws Exception
     * @author Piotr Karecki <pkarecki@gmail.com>
     */
    public function run() {
        foreach ($this->controllers as $controller) {
            /** @var ControllerCore $controllerObject */
            try {
                $controllerObject = $this->container->get($controller);
            } catch (Exception $e) {
                if (Plugin::isDebugMode()) {
                    throw $e;
                } else {
                    continue;
                }
            }
            if (method_exists($controllerObject, 'run')) {
                $controllerObject->run();
            }
            $this->controllersObjects[] = $controllerObject;
        }
    }

    public function admin_menu() {
        $menuItems = [];
        /** @var ControllerCore $controllerObject */
        foreach ($this->controllersObjects as $controllerObject) {
            if (method_exists($controllerObject, 'admin_menu')) {
                $controllerObject->admin_menu();
            }
            $menu = null;
            if (method_exists($controllerObject, 'menu')) {
                $menu = $controllerObject->menu();
            }
            if (is_array($menu)) {
                $menuItems[] = add_menu_page(
                    $menu['page_title'],
                    $menu['menu_title'],
                    $menu['capability'],
                    $menu['menu_slug'],
                    array($controllerObject, 'page'),
                    $menu['icon_url'],
                    $menu['position']
                );
            }
            $menu = null;
            if (method_exists($controllerObject, 'submenu')) {
                $menu = $controllerObject->submenu();
            }
            if (is_array($menu)) {
                $menuItems[] = add_submenu_page(
                    $menu['parent_slug'],
                    $menu['page_title'],
                    $menu['menu_title'],
                    $menu['capability'],
                    $menu['menu_slug'],
                    array($controllerObject, 'page')
                );
            }
        }
        foreach ($this->controllersObjects as $controllerObject) {
            $controllerObject->setMenuItems($menuItems);
        }
    }
}