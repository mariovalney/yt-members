<?php

namespace App\Http\View\Composers;

use Auth;
use Route;
use Illuminate\View\View;

class BodyClassComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $class = array_merge(
            (array) $this->classesForRoutes(),
            (array) $this->classesForAuth(),
            (array) $this->classesForLayout($view)
        );

        natsort($class);
        $class = array_filter($class);
        $view->with('body_class', implode(' ', $class));
    }

    /**
     * Get classes based on current route
     *
     * @return array
     */
    private function classesForRoutes()
    {
        $route = Route::current();
        if (empty($route)) {
            return null;
        }

        $routeName = explode('.', $route->getName());

        $class = [ 'page-' . implode('-', $routeName) ];
        if ($routeName[0] === 'admin') {
            $class[] = 'page-admin';
        }

        for ($i = 2; $i < count($routeName) ; $i++) {
            $class[] = 'page-' . implode('-', array_slice($routeName, 0, $i));
        }

        return $class;
    }

    /**
     * Get classes based on Auth
     *
     * @return array
     */
    private function classesForAuth()
    {
        $user = Auth::user();

        if (empty($user)) {
            return ['user-not-logged'];
        }

        $class = ['user-is-logged'];
        if ($user->isAdministrator()) {
            $class[] = 'user-is-admin';
        }

        return $class;
    }

    /**
     * Get classes based on current view
     *
     * @return array
     */
    private function classesForLayout(View $view)
    {
        $name = str_replace( 'layouts.', '', $view->getName() );
        if (empty($name)) {
            return null;
        }

        return [ 'layout-' . str_replace('.', '-', $name) ];
    }

}
