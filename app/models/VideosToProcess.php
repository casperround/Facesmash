<?php
/**
 * Created by PhpStorm.
 * User: roddy
 * Date: 09/06/2018
 * Time: 12:32
 */

class VideosToProcess extends Eloquent
{

    protected $table = 'videos_to_process';

    protected $fillable = ["id", "video_id", "channel_id","thumbnail","title","description"];

    public $timestamps = false;

}