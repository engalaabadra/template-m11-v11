<?php

namespace App\Routing;

use Illuminate\Routing\ResourceRegistrar as OriginalRegistrar;

class ResourceRegistrar extends OriginalRegistrar
{
    // add data to the array
    /**
     * The default actions for a resourceful controller.
     *
     * @var array
     */
    protected $resourceDefaults = ['index','search','trash','restoreAll','restore','create', 'store','storeTrans', 'show', 'edit', 'update','changeActivate', 'destroy','forceDelete'];

 /**
     * update in  the index method for a resourceful route.
     *
     * @param  string  $name
     * @param  string  $base
     * @param  string  $controller
     * @param  array   $options
     * @return \Illuminate\Routing\Route
     */
    protected function addResourceIndex($name, $base, $controller, $options)
    {
        $uri = $this->getResourceUri($name).'/';

        $action = $this->getResourceAction($name, $controller, 'index', $options);

        return $this->router->get($uri, $action);
    }

    /**
     * Add the search method for a resourceful route.
     *
     * @param  string  $name
     * @param  string  $base
     * @param  string  $controller
     * @param  array   $options
     * @return \Illuminate\Routing\Route
     */
    protected function addResourceSearch($name, $base, $controller, $options)
    {
        $uri = $this->getResourceUri($name).'/search/{word}';

        $action = $this->getResourceAction($name, $controller, 'search', $options);

        return $this->router->get($uri, $action);
    }
    /**
     * Add the trash method for a resourceful route.
     *
     * @param  string  $name
     * @param  string  $base
     * @param  string  $controller
     * @param  array   $options
     * @return \Illuminate\Routing\Route
     */
    protected function addResourceTrash($name, $base, $controller, $options)
    {
        $uri = $this->getResourceUri($name).'/trash';

        $action = $this->getResourceAction($name, $controller, 'trash', $options);

        return $this->router->get($uri, $action);
    }
    /**
     * Add the RestoreAll method for a resourceful route.
     *
     * @param  string  $name
     * @param  string  $base
     * @param  string  $controller
     * @param  array   $options
     * @return \Illuminate\Routing\Route
     */
    protected function addResourceRestoreAll($name, $base, $controller, $options)
    {
        $uri = $this->getResourceUri($name).'/restore-all';

        $action = $this->getResourceAction($name, $controller, 'restoreAll', $options);

        return $this->router->get($uri, $action);
    }

        /**
     * Add the Restore method for a resourceful route.
     *
     * @param  string  $name
     * @param  string  $base
     * @param  string  $controller
     * @param  array   $options
     * @return \Illuminate\Routing\Route
     */
    protected function addResourceRestore($name, $base, $controller, $options)
    {
        $uri = $this->getResourceUri($name).'/restore/{id}';

        $action = $this->getResourceAction($name, $controller, 'restore', $options);

        return $this->router->get($uri, $action);
    }
    /**
     * Add the store method for a resourceful route.
     *
     * @param  string  $name
     * @param  string  $base
     * @param  string  $controller
     * @param  array   $options
     * @return \Illuminate\Routing\Route
     */
    protected function addResourceStore($name, $base, $controller, $options)
    {
        $uri = $this->getResourceUri($name).'/';

        $action = $this->getResourceAction($name, $controller, 'store', $options);

        return $this->router->post($uri, $action);
    }
    /**
     * Add the storeTrans method for a resourceful route.
     *
     * @param  string  $name
     * @param  string  $base
     * @param  string  $controller
     * @param  array   $options
     * @return \Illuminate\Routing\Route
     */
    protected function addResourceStoreTrans($name, $base, $controller, $options)
    {
        $uri = $this->getResourceUri($name).'/{id}';

        $action = $this->getResourceAction($name, $controller, 'storeTrans', $options);

        return $this->router->post($uri, $action);
    }
    /**
     * Add the store method for a resourceful route.
     *
     * @param  string  $name
     * @param  string  $base
     * @param  string  $controller
     * @param  array   $options
     * @return \Illuminate\Routing\Route
     */
    protected function addResourceUpdate($name, $base, $controller, $options)
    {
        $uri = $this->getResourceUri($name).'/{id}';

        $action = $this->getResourceAction($name, $controller, 'update', $options);

        return $this->router->put($uri, $action);
    }
   /**
     * Add the changeActivate method for a resourceful route.
     *
     * @param  string  $name
     * @param  string  $base
     * @param  string  $controller
     * @param  array   $options
     * @return \Illuminate\Routing\Route
     */
    protected function addResourceChangeActivate($name, $base, $controller, $options)
    {
        $uri = $this->getResourceUri($name).'/change-activate/{id}';

        $action = $this->getResourceAction($name, $controller, 'changeActivate', $options);

        return $this->router->put($uri, $action);
    }
     /**
     * Add the destroy method for a resourceful route.
     *
     * @param  string  $name
     * @param  string  $base
     * @param  string  $controller
     * @param  array   $options
     * @return \Illuminate\Routing\Route
     */
    protected function addResourceDestroy($name, $base, $controller, $options)
    {
        $uri = $this->getResourceUri($name).'/{id}';

        $action = $this->getResourceAction($name, $controller, 'destroy', $options);

        return $this->router->delete($uri, $action);
    }
    /**
     * Add the ForceDelete method for a resourceful route.
     *
     * @param  string  $name
     * @param  string  $base
     * @param  string  $controller
     * @param  array   $options
     * @return \Illuminate\Routing\Route
     */
    protected function addResourceForceDelete($name, $base, $controller, $options)
    {
        $uri = $this->getResourceUri($name).'/force-delete/{id}';

        $action = $this->getResourceAction($name, $controller, 'forceDelete', $options);

        return $this->router->delete($uri, $action);
    }
    /**
     * Add the DeleteAll method for a resourceful route.
     *
     * @param  string  $name
     * @param  string  $base
     * @param  string  $controller
     * @param  array   $options
     * @return \Illuminate\Routing\Route
     */
    protected function addResourceDeleteAll($name, $base, $controller, $options)
    {
        $uri = $this->getResourceUri($name).'/delete-all';

        $action = $this->getResourceAction($name, $controller, 'DeleteAll', $options);

        return $this->router->delete($uri, $action);
    }
}