<?php

final class Redirect
{
    /**
     * redirect another route
     *
     * @param [string] $page
     * @return void
     */
    public static function to(string $page)
    {
        return header('location: ' .URLROOT. '/' . $page);
    }

    /**
     * redirect same page
     *
     * @return void
     */
    public static function back()
    {
       return header('Location: '.$_SERVER['PHP_SELF']);
    }
}