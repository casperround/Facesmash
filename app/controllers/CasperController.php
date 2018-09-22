<?php

class CasperController extends BaseController
{


    public function index()
    {

        return View::make("casper.index");

    }
    public function blog()
    {

        return View::make("casper.post");

    }
    public function post()
    {
        if (Input::hasFile("file_upload")) {


            $uid = str_random(10);

            $savePath = 'data_store/post_media/';
            $file = Input::file('file_upload');
            $fileExtension = $file->getClientOriginalExtension();
            $filename = $uid . '.' . $file->getClientOriginalExtension();

            $file->move($savePath, $filename);
            $filePath = $savePath . $filename;

            if ($fileExtension == "mp4") {


                $ffmpeg = FFMpeg\FFMpeg::create();
                $video = $ffmpeg->open($savePath . $filename);
                $video->frame(FFMpeg\Coordinate\TimeCode::fromSeconds(10))->save($savePath . $uid . '.jpg');
            }
            $media_type = $fileExtension;
            $home_post = Input::get("home_post");
            $post_time = date("H:i:s");
            $post_date = date("d-m-Y");
            $relation = Input::get("relation");
            $visibility = Input::get("visibility");


            Posts::create([
                "post_id" => $uid,
                "text" => $home_post,
                "post_time" => $post_time,
                "post_date" => $post_date,
                "visibility" => $visibility,
                "file_path" => $filePath,
                "relation" => $relation,
                "file_extension" => $fileExtension,
                "media_type" => $media_type
            ]);

        } else {

            $home_post = Input::get("home_post");
            $post_id = str_random(10);
            $media_type = "text";
            $post_time = date("H:i:s");
            $post_date = date("d-m-Y");
            $relation = Input::get("relation");
            $visibility = Input::get("visibility");

            Posts::create([
                "post_id" => $post_id,
                "text" => $home_post,
                "post_time" => $post_time,
                "post_date" => $post_date,
                "relation" => $relation,
                "visibility" => $visibility,
                "media_type" => $media_type
            ]);

        }


        return Redirect::route("casper.blog");

    }

}