<?php
/**
 * Created by PhpStorm.
 * User: roddy
 * Date: 01/06/2018
 * Time: 23:54
 */

class Friends extends Eloquent
{

    protected $table = 'friends';

    protected $fillable = ["id", "sender", "recipient", "status"];

    public $timestamps = false;

}