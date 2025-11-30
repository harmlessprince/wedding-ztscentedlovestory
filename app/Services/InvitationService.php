<?php

namespace App\Services;

use Cloudinary\Cloudinary;
use Illuminate\Support\Facades\Log;
use Spatie\Browsershot\Browsershot;
use Illuminate\Support\Facades\Storage;

class InvitationService
{

    public static function generateInvitation(string $name)
    {
        // Render the Blade view to a string with the dynamic name
        $html = view('invitation', ['recipientName' => $name])->render();

        $timestamp = now()->format('Ymd-His');
        $fileName = "{$name}-invite-{$timestamp}.png";

        $imagePath = storage_path("app/public/invitations/{$fileName}");

        // Ensure directory exists
        if (!file_exists(dirname($imagePath))) {
            mkdir(dirname($imagePath), 0755, true);
        }

        // Save PNG of the .email-container element
        Browsershot::html($html)
            ->setNodeBinary('/usr/bin/node')
            ->setChromePath('/usr/bin/chromium')
            ->addChromiumArguments([
                '--no-sandbox'
            ])
            ->select('.email-container')
            ->windowSize(600, 500)
            ->deviceScaleFactor(2)
            ->save($imagePath);


        // Upload to cloudinary
        $cloud_url = self::uploadToCloudinary($imagePath, [
            'folder' => 'invitations',
            'public_id' => $fileName,
            'resource_type' => 'image',
        ]);
        return [
            'cloud_url' => $cloud_url,
            'local_url' => $imagePath,
        ];
    }


    /**
     * Upload a local file to Cloudinary and return upload result array
     *
     * @param string $localPath Absolute path to local file
     * @param array $options Options forwarded to Cloudinary upload API
     * @return string|null        Cloudinary response (associative) or null on failure
     */
    public static function uploadToCloudinary(string $localPath, array $options = []): ?string
    {
        if (!file_exists($localPath)) {
            Log::error("InvitationService: file does not exist: {$localPath}");
            return null;
        }

        try {
            // Instantiate Cloudinary client using env vars
            $cloudinary = new Cloudinary([
                'cloud' => [
                    'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                    'api_key' => env('CLOUDINARY_API_KEY'),
                    'api_secret' => env('CLOUDINARY_API_SECRET'),
                ]
            ]);

            // Use upload API
            $uploadApi = $cloudinary->uploadApi();

            // Default options (can be overridden by $options)
            $defaultOptions = [
                'folder' => 'invitations',
                'use_filename' => false,
                'unique_filename' => true,
                // 'overwrite' => false,
            ];

            $finalOptions = array_merge($defaultOptions, $options);

            // For local files, pass the local path directly
            $result = $uploadApi->upload($localPath, $finalOptions);
            Log::info($result->serialize());
            // result is an associative array: e.g. ['public_id' => '...', 'secure_url' => '...', ...]
            return $result['secure_url'];
        } catch (\Exception $e) {
            \Log::error('InvitationService::uploadToCloudinary error: ' . $e->getMessage(), [
                'path' => $localPath,
            ]);
            return null;
        }
    }
}
