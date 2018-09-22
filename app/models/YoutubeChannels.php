<?php
/**
 * Created by PhpStorm.
 * User: roddy
 * Date: 09/06/2018
 * Time: 12:41
 */

class YoutubeChannels extends Eloquent
{

    protected $table = 'yt_channels';

    protected $fillable = ["id", "channel_title", "channel_thumbnail", "channel_banner", "channel_id", "channel_owner_id"];

    public $timestamps = false;

}