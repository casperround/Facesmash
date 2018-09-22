<?php
/**
 * Created by PhpStorm.
 * User: roddy
 * Date: 02/06/2018
 * Time: 14:45
 */

class Pages extends Eloquent
{

    protected $table = 'pages';

    protected $fillable = ["id", "uid", "unique_pagename", "owner_id", "category", "about", "website", "twitter", "facebook", "youtube", "discord_invite", "banner_path", "page_img_path","post_date","post_time","visibility","page_img_path","file_extension_profile","banner_img_path","file_extension_banner"];

    public $timestamps = false;

}