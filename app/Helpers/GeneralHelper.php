<?php

namespace App\Helpers;

class GeneralHelper {
    /*
    All function return type
        string, int, float, bool, array, void
        Collection, Carbon, Response, RedirectResponse
        model_name  //User, Product
        View  //->view('welcome')
        ?string  //null or string
    */

    public static function generateRandomString(
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
        $length = 8
    ) : string
    {
        $charactersLength = strlen($characters);
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }

        return $randomString;
    }

    public static function createSlug($string) : string
    {
        $search = array(
            '#(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)#',
            '#(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)#',
            '#(ì|í|ị|ỉ|ĩ)#',
            '#(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)#',
            '#(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)#',
            '#(ỳ|ý|ỵ|ỷ|ỹ)#',
            '#(đ)#',
            '#(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)#',
            '#(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)#',
            '#(Ì|Í|Ị|Ỉ|Ĩ)#',
            '#(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)#',
            '#(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)#',
            '#(Ỳ|Ý|Ỵ|Ỷ|Ỹ)#',
            '#(Đ)#',
            "/[^a-zA-Z0-9\-\_]/",
        );
        $replace = array(
            'a',
            'e',
            'i',
            'o',
            'u',
            'y',
            'd',
            'A',
            'E',
            'I',
            'O',
            'U',
            'Y',
            'D',
            '-',
        );

        $stringWithoutSpecialCharacters = preg_replace($search, $replace, $string);

        $stringHyphens = preg_replace('/(-)+/', '-', $stringWithoutSpecialCharacters);

        $slug = strtolower($stringHyphens);

        return $slug;
    }

    public static function convertStringToArray($string) : Array
    {
        $arr = explode(', ', $string);

        return $arr;
    }

    public static function customPhotoInfo($filePhoto) : Object
    {
        $photoInfo = (object) [
            'path' => $filePhoto->getPath(),
            'originalName' => $filePhoto->getClientOriginalName(),
            'hashName' => $filePhoto->hashName(),
            'extension' => $filePhoto->extension(),
            'clientExtension' => $filePhoto->clientExtension(),
            'type' => $filePhoto->getType(),
            'mimeType' => $filePhoto->getMimeType(),
            'size' => $filePhoto->getSize()
        ];

        return $photoInfo;
    }
}
