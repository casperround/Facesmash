<?php
/**
 * Created by PhpStorm.
 * User: roddy
 * Date: 01/06/2018
 * Time: 23:54
 */

class Posts extends Eloquent
{

    protected $table = 'posts';

    protected $fillable = ["id", "post_id", "author_id", "relation","relation_id", "group_id", "media_type", "file_path", "file_extension", "text", "post_date", "post_time", "visibility"];

    public $timestamps = false;

}