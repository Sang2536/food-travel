<?php

namespace App\Helpers;

use Carbon;
use Illuminate\Support\Facades\Storage;

class FileHelper {
    public static function setImgStorage(Object $photo): string
    {
        $pathPhoto = null;
        $originalName = $photo->getClientOriginalName();
        $currentTime = Carbon\Carbon::now();

        if ($originalName) {
            $customName = $currentTime->format('Ymd_His') . '_' . $originalName;

            $pathPhoto = Storage::disk('public')->putFileAs('photos/users', $photo, $customName);
        }

        return $pathPhoto;
    }

    public static function getImgStorage(Object $photo): string
    {
        return '123';
    }
}
