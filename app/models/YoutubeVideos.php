<?php
/**
 * Created by PhpStorm.
 * User: roddy
 * Date: 09/06/2018
 * Time: 12:42
 */

class YoutubeVideos extends Eloquent
{

    protected $table = 'youtube_videos';

    protected $fillable = ["id", "video_id", "title", "description", "thumbnail_url", "channel_id"];

    public $timestamps = false;

}