<?php
/**
 * Created by PhpStorm.
 * User: roddy
 * Date: 01/06/2018
 * Time: 23:54
 */

class Chats extends Eloquent
{

    protected $table = 'chats';

    protected $fillable = ["id", "sender", "recipient", "message","seen"];

    public $timestamps = false;

}