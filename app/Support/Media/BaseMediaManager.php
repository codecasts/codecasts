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
     * @throws UrlNotFound
     *
     * @return string Decoded Media Download URL
     */
    abstract public function getDownloadUrl();

    /**
     * @throws UrlNotFound
     *
     * @return string Decoded Media Streaming URL
     */
    abstract public function getStreamingUrl();

    /**
     * @throws UrlNotFound
     *
     * @return string Decoded Media Thumbnail URL
     */
    abstract public function getThumbUrl();

    /**
     * @throws UrlNotFound
     *
     * @return string
     */
    abstract public function getThumbContent();
}
