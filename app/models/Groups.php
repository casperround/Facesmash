<?php
/**
 * Created by PhpStorm.
 * User: roddy
 * Date: 02/06/2018
 * Time: 14:45
 */

class Groups extends Eloquent
{

    protected $table = 'groups';

    protected $fillable = ["id", "uid", "unique_groupname", "owner_id", "category", "about", "website", "twitter", "facebook", "youtube", "discord_invite", "banner_path", "page_img_path","post_date","post_time","visibility"];

    public $timestamps = false;

}