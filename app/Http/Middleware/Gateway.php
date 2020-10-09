<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Event;

class Gateway
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
<<<<<<< HEAD
    public function handle($request, Closure $next, $leveling)
    {
        $level = session()->get("level");
        if ($level == NULL) {
            Event::listen("JeroenNoten\LaravelAdminLte\Events\BuildingMenu", function ($e) {
=======
    public function handle($request, Closure $next,$leveling)
    {
        $level = session()->get("level");
        if ($level == NULL) {
            Event::listen("JeroenNoten\LaravelAdminLte\Events\BuildingMenu",function ($e) {
>>>>>>> e1cbd417b9d64bbcfb5c2e4e3ca769a5b312d70e
                $e->menu->add([
                    "text" => "Login",
                    "url" => "/login",
                    "icon" => "fa fa-sign-in-alt"
                ]);
            });
<<<<<<< HEAD
            return redirect("/login")->withErrors(["message" => "Hak Akses Ditolak"]);
        } else {
            $split = explode("|", $leveling);
            if (count($split) > 0) {
                $is_authorize = false;
                if (in_array(1, $split) && $level == 1) {
                    //Admin
                    Event::listen("JeroenNoten\LaravelAdminLte\Events\BuildingMenu", function ($e) {
                        $e->menu->add([
                            "text" => "Dashboard",
                            "url" => "/administrator",
                            "icon" => "fa fa-home"
=======
            return redirect("/login")->withErrors(["message"=>"Hak Akses Ditolak"]);
        } else {
            $split = explode("|",$leveling);
            if (count($split) > 0){
                $is_authorize = false;
                if (in_array(1,$split) && $level == 1){
                    //Admin
                    Event::listen("JeroenNoten\LaravelAdminLte\Events\BuildingMenu",function ($e){
                        $e->menu->add([
                            "text"=>"Dashboard",
                            "url"=>"/administrator",
                            "icon"=>"fa fa-home"
>>>>>>> e1cbd417b9d64bbcfb5c2e4e3ca769a5b312d70e
                        ]);

                        $e->menu->add([
                            'text'    => 'Master',
                            'icon'    => 'fas fa-file',
                            'submenu' => [
                                [
                                    'text' => 'User',
                                    'url'  => '/administrator/user',
                                ],
                                [
                                    'text' => 'New User',
                                    'url'  => '/administrator/user/create',
                                ],
                            ],
                        ]);

                        $e->menu->add([
<<<<<<< HEAD
                            'text'    => 'Gallery',
                            'icon'    => 'fas fa-image',
                            'submenu' => [
                                [
                                    'text' => 'Image',
                                    'url'  => '/administrator/image_gallery',
                                ],
                                [
                                    'text' => 'Video',
                                    'url'  => '/administrator/video_gallery',
=======
                            'text'    => 'Portofolio',
                            'icon'    => 'fas fa-file',
                            'submenu' => [
                                [
                                    'text' => 'Portofolio',
                                    'url'  => '/administrator/portfolio',
                                ],
                                [
                                    'text' => 'New Portofolio',
                                    'url'  => '/administrator/portfolio/create',
>>>>>>> e1cbd417b9d64bbcfb5c2e4e3ca769a5b312d70e
                                ],
                            ],
                        ]);

                        $e->menu->add([
                            'text'    => 'Announcement',
                            'icon'    => 'fas fa-file',
                            'submenu' => [
                                [
                                    'text' => 'Announcement',
                                    'url'  => '/administrator/announcement',
                                ],
                                [
                                    'text' => 'New Announcement',
                                    'url'  => '/administrator/announcement/create',
                                ],
                            ],
                        ]);
                    });
                    $is_authorize = true;
<<<<<<< HEAD
                } elseif (in_array(2, $split) && $level == 2) {
                    //Author
                    Event::listen("JeroenNoten\LaravelAdminLte\Events\BuildingMenu", function ($e) {
                        $e->menu->add([
                            "text" => "Dashboard",
                            "url" => "/author",
                            "icon" => "fa fa-home"
                        ]);

                        $e->menu->add([
                            'text'    => 'Master',
                            'icon'    => 'fas fa-file',
                            'submenu' => [
                                [
                                    'text' => 'Category',
                                    'url'  => '/author/category',
                                ],
                                [
                                    'text' => 'New Category',
                                    'url'  => '/author/category/create',
                                ],
                            ],
                        ]);

                        $e->menu->add([
                            'text'    => 'Article',
                            'icon'    => 'fas fa-file',
                            'submenu' => [
                                [
                                    'text' => 'Article',
                                    'url'  => '/author/article',
                                ],
                                [
                                    'text' => 'New Article',
                                    'url'  => '/author/article/create',
                                ],
                            ],
                        ]);
                    });
                    $is_authorize = true;
                } elseif (in_array(3, $split) && $level == 3) {
=======
                }elseif (in_array(2,$split) && $level == 2){
                    $is_authorize = true;
                    //Author

                }elseif (in_array(3,$split) && $level == 3){
>>>>>>> e1cbd417b9d64bbcfb5c2e4e3ca769a5b312d70e
                    $is_authorize = true;
                    //Normal
                }
                //Semua Hak Akses
<<<<<<< HEAD
                if (in_array(1, $split) || in_array(2, $split)) {
                    Event::listen("JeroenNoten\LaravelAdminLte\Events\BuildingMenu", function ($e) {
=======
                if (in_array(1,$split)){
                    Event::listen("JeroenNoten\LaravelAdminLte\Events\BuildingMenu",function ($e) {
>>>>>>> e1cbd417b9d64bbcfb5c2e4e3ca769a5b312d70e
                        $e->menu->add([
                            "text" => "Profile",
                            "url" => "/profile",
                            "icon" => "fa fa-users"
                        ]);
                    });
<<<<<<< HEAD
                }

                Event::listen("JeroenNoten\LaravelAdminLte\Events\BuildingMenu", function ($e) {
=======

                }

                Event::listen("JeroenNoten\LaravelAdminLte\Events\BuildingMenu",function ($e) {
>>>>>>> e1cbd417b9d64bbcfb5c2e4e3ca769a5b312d70e
                    $e->menu->add([
                        "text" => "Logout",
                        "url" => "/logout",
                        "icon" => "fa fa-sign-out-alt"
                    ]);
                });
<<<<<<< HEAD
                if ($is_authorize) {
                    return $next($request);
                }
                return redirect("/login")->withErrors(["message" => "Hak Akses Ditolak"]);
            } else {
                return redirect("/login")->withErrors(["message" => "Hak Akses Ditolak"]);
=======
                if ($is_authorize){
                    return $next($request);
                }
                return redirect("/login")->withErrors(["message"=>"Hak Akses Ditolak"]);
            }else{
                return redirect("/login")->withErrors(["message"=>"Hak Akses Ditolak"]);

>>>>>>> e1cbd417b9d64bbcfb5c2e4e3ca769a5b312d70e
            }
        }
    }
}
