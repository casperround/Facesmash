<?php
/**
 * Created by PhpStorm.
 * User: roddy
 * Date: 01/06/2018
 * Time: 23:54
 */

class Flags extends Eloquent
{

    protected $table = 'flags';

    protected $fillable = ["id", "relation", "relation_id", "reporter_id"];

    public $timestamps = false;

}