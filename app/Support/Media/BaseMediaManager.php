<?php

namespace Codecasts\Support\Media;

use Codecasts\Support\Media\Exceptions\UrlNotFound;

abstract class BaseMediaManager
{
    /**
     * @var string Media Key
     */
    protected $media;

    /**
     * @var string Storage Bucket / Folder
     */
    protected $bucket;

    /**
     * @var string Time to live (signed url expiration)
     */
    protected $ttl;

    /**
     * BaseMediaManager constructor.
     *
     * @param $media
     * @param $bucket
     * @param string $ttl
     */
    public function __construct($media, $bucket, $ttl = '+30 minutes')
    {
        $this->media = $media;

        $this->bucket = $bucket;

        $this->ttl = $ttl;
    }

    /**
     * @param $url
     *
     * @return string
     */
    protected function decodeUrl($url)
    {
        return urldecode($url);
    }

    /**
     * @param $url
     *
     * @return bool
     */
    protected function isUrlValid($url)
    {
        return true;
    }

    /**
     * @return string Decoded Media Download URL
     *
     * @throws UrlNotFound
     */
    abstract public function getDownloadUrl();

    /**
     * @return string Decoded Media Streaming URL
     *
     * @throws UrlNotFound
     */
    abstract public function getStreamingUrl();

    /**
     * @return string Decoded Media Thumbnail URL
     *
     * @throws UrlNotFound
     */
    abstract public function getThumbUrl();

    /**
     * @return string
     *
     * @throws UrlNotFound
     */
    abstract public function getThumbContent();
}
