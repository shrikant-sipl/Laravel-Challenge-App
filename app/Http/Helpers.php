<?php

class Helpers
{
    /**
     * Create folder
     * @param $path
     * @return bool
     */
    public static function createFolder($path){
        return \File::makeDirectory($path, 0777);
    }

    /**
     * @param $template
     * @param $data
     * @param $attributes
     * @return mixed
     */
    public static function sendEmail($template, $data, $attributes)
    {
        \Mail::send($template, $data, function($message) use($attributes)
        {
            $message->from("no-reply@challenge.dev", "Challenge");
            $message->to($attributes['email_to'], $attributes['name_to'])->subject($attributes['subject']);
        });
        return Mail::failures();
    }
}