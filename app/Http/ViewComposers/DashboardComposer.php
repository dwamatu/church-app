<?php
namespace App\Http\ViewComposers;

use App\Event;
use App\Group;
use App\User;
use Illuminate\View\View;

class DashboardComposer
{
    public $movieList = [];
    /**
     * Create a movie composer.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {   //Build Dash Stats
        $dashstats = collect([]);

        $this->retrieveEventStats($dashstats);

        $this->retrieveUserStats($dashstats);

        $this->retrieveGroupStats($dashstats);

        $view->with('dashstats', $dashstats);
    }

    /**
     * @param $dashstats
     */
    private function retrieveUserStats($dashstats)
    {
        $users = User::all()->count();
        $dashstats->put('users', $users);
    }

    /**
     * @param $dashstats
     */
    private function retrieveEventStats($dashstats)
    {
        $events = Event::all()->count();
        $dashstats->put('events', $events);
    }

    private function retrieveGroupStats($dashstats)
    {
        $groups = Group::all()->count();
        $dashstats->put('groups', $groups);
    }
}