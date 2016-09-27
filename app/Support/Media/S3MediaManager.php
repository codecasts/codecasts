<?php

namespace Codecasts\Support\Media;

use Aws\S3\S3Client;
use Codecasts\Support\Media\Exceptions\UrlNotFound;

/**
 * Class S3MediaManager.
 */
class S3MediaManager extends BaseMediaManager
{
    /**
     * Streaming URL.
     *
     * @return string
     */
    public function getStreamingUrl()
    {
        return $this->preSign();
    }

    /**
     * Download URL.
     *
     * @return string
     */
    public function getDownloadUrl()
    {
        return $this->preSign([
            'ResponseContentDisposition' => 'attachment',
        ]);
    }

    /**
     * Thumbnail URL.
     *
     * @return string
     */
    public function getThumbUrl()
    {
        return $this->preSign();
    }

    /**
     * PreSign the URL.
     *
     * @param array $headers
     *
     * @return string
     *
     * @throws UrlNotFound
     */
    protected function preSign($headers = [])
    {
        /** @var S3Client $s3 */
        $s3 = \Storage::disk('s3')->getAdapter()->getClient();

        $cmd = $s3->getCommand('GetObject', array_merge([
            'Bucket' => $this->bucket,
            'Key' => $this->media,
        ], $headers));

        $request = $s3->createPresignedRequest($cmd, $this->ttl);

        $url = (string) $request->getUri();

        if (!$this->isUrlValid($url)) {
            throw new UrlNotFound();
        }

        return $url;
    }

    /**
     * Stream the thumbnail contents.
     *
     * @return mixed
     */
    public function getThumbContent()
    {
        $contents = app('cache')->remember('thumb_'.$this->media, 60, function () {
            /** @var S3Client $s3 */
            $s3 = \Storage::disk('s3')->getAdapter()->getClient();

            $object = $s3->getObject([
                'Bucket' => $this->bucket,
                'Key' => $this->media,
            ]);

            return (string) $object['Body'];
        });

        return $contents;
    }
}
