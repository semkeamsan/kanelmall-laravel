<?php

namespace App\Helpers;
use Illuminate\Support\Facades\Session;

class CartHelper
{
    public static function __callStatic($method, $parameters)
    {
        return (new static)->$method(...$parameters);
    }

    public static $session = 'session-carts';
    /**
     * @param string $slug request()->input('slug')
     * @return array
     */
    public static function add($slug , $qty = 1)
    {
        $data = [
            'id' => $slug,
            'qty' => $qty,
        ];

        if ($slug) {
            if (Session::has(self::$session)) {
                $exists = self::exists($slug);
                if ($exists) {
                    return $exists;
                } else {
                    Session::push(self::$session, $data);
                }
            } else {
                Session::put(self::$session, [$data]);
            }
            return [
                'status'  => true,
                'id'     => $slug,
                'data'   => Session::get(self::$session),
                'count'  => count(Session::get(self::$session)),
                'message' => __('Add Successfully'),
            ];
        }
    }

    /**
     * @param $slug request()->input('slug')
     * @return array
     */
    public static function exists($slug)
    {
        if (Session::has(self::$session)) {
            $session_detail = Session::get(self::$session);
            foreach ($session_detail as $k => $session) {
                if ($session['id'] == $slug) {
                    return array(
                        'status' => true,
                        'message' => __('Exists'),
                        'data'    => $session,
                        'count'   => count(Session::get(self::$session))
                    );
                }
            }
        }
    }


    /**
     * @return array
     */
    public static function get()
    {
        if (Session::has(self::$session)) {
            return Session::get(self::$session);
        }
        return [];
    }


    /**
     * @return int
     */
    public static function count()
    {
        return count(self::get());
    }

    /**
     * @param $slug request()->input('slug')
     * @return array
     */
    public static function delete($slug)
    {
        if (Session::has(self::$session)) {
            $session_detail = Session::get(self::$session);
            foreach ($session_detail as $k => $session) {
                if ($session['id'] == $slug) {
                    unset($session_detail[$k]);
                    Session::put(self::$session, $session_detail);
                    return array(
                        'status' => true,
                        'id'     => $slug,
                        'message' => __('Delete Successfully'),
                        'count'   => count(Session::get(self::$session))
                    );
                }
            }
        }
    }

    public static function clear(){
        foreach (self::get() as $key => $value) {
            self::delete($value['id']);
        }
    }
}
