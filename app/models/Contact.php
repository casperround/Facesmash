<?php
/**
 * Created by PhpStorm.
 * User: roddy
 * Date: 01/06/2018
 * Time: 23:54
 */

class Contact extends Eloquent
{

    protected $table = 'contact';

    protected $fillable = ["id", "sender", "subject", "message","time","date"];

    public $timestamps = false;

}