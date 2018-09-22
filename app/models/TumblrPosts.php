<?php
/**
 * Created by PhpStorm.
 * User: roddy
 * Date: 01/06/2018
 * Time: 23:54
 */

class TumblrPosts extends Eloquent
{

    protected $table = 'tumblr_posts';

    protected $fillable = ["id","blog_name","type","date","summary","post_id","img_url","tag","post_url","thumbnail_url","video_url"];

    public $timestamps = false;

}