<?php 

use Illuminate\Support\Facades\Storage;
use Novay\Secret\Secret;

if(!function_exists('ImageKit')) {
    /**
     * Upload file.
     *
     * @param \Illuminate\Http\UploadedFile $file
     * @param string $directory
     * @param string|null $filename
     * @return string|false
     */
    function ImageKit($url, $resolution = 500) 
    {
        $cacheKey = 'imagekit_' . md5($url . $resolution);
        return cache()->remember($cacheKey, 60, function () use ($url, $resolution) {
            $cleanedUrl = str_replace('https://' . env('AWS_BUCKET') . '.s3.' . env('AWS_DEFAULT_REGION') . '.amazonaws.com/', '', $url);
            
            return "https://ik.imagekit.io/enterwind/tr:h-{$resolution}{$cleanedUrl}";
        });
    }
}

if(!function_exists('UploadCDN')) {
    /**
     * Upload file.
     *
     * @param \Illuminate\Http\UploadedFile $file
     * @param string $directory
     * @param string|null $filename
     * @param string $disk
     * @return string|false
     */
    function UploadCDN($file, $path = 'temp', $filename = null, $disk = 'bunnycdn') 
    {
        $filename = $filename ? "{$filename}.{$file->getClientOriginalExtension()}" : uniqid() . '_' . trim($file->getClientOriginalName());

        $path = $path . '/' . $filename;

        $stored = Storage::disk($disk)->put($path, file_get_contents($file->getRealPath()), ['x-amz-acl' => 'private']);

        return $stored ? '/'.$path : false;
    }
}

if (!function_exists('ShowCDN')) {
    /**
     * Dapatkan URL file dengan token BunnyCDN yang di-cache.
     *
     * @param string $path
     * @param bool $zone
     * 
     * @return string
     */
    function ShowCDN(string $path, $zone = false) 
    {
        $return = '';
        
        if ($zone) {
            $zone_url = app(Secret::class)->getSecret('bunnyUrl');
            $return .= "{$zone_url}";
        }

        return "{$return}{$path}";
    }
}

if(!function_exists('DeleteCDN')) {
    /**
     * Hapus file.
     *
     * @param string $filePath
     * @param string $disk
     * 
     * @return bool
     */
    function DeleteCDN($filePath, $disk = 'bunnycdn') 
    {
        if (empty($filePath) || !is_string($filePath)) {
            return false;
        }
        
        if (Storage::disk($disk)->exists($filePath)) {
            return Storage::disk($disk)->delete($filePath);
        }

        return false;
    }
}