<?php

namespace App\Helpers;

use Carbon;
use Illuminate\Support\Facades\Storage;

class FileHelper {
    public static function setImgStorage(Object $photo, string $nameFolder = 'general', string $key = 'image'): string
    {
        $pathPhoto = null;
        $originalName = $photo->getClientOriginalName();
        $currentTime = Carbon\Carbon::now();

        if ($originalName) {
            $customName = $currentTime->format('Ymd_His') . '_' . $key . '_' . $originalName;

            $pathPhoto = Storage::disk('public')->putFileAs('photos/' . $nameFolder, $photo, $customName);
        }

        return $pathPhoto;
    }

    public static function getImgStorage(Object $photo): void
    {
        //
    }

    public function deleteFileFromStorage(string $dirFilename): void
    {
        Storage::disk('public')->delete($dirFilename);
    }
}
