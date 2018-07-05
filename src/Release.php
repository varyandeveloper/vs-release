<?php

namespace VS\Release;

use VS\Url\UrlInterface;

/**
 * Class Release
 * @package VS\Framework\Release
 * @author Varazdat Stepanyan
 */
class Release implements ReleaseInterface
{
    /**
     * @var ReleaseItemInterface $releaseItem
     */
    protected $releaseItem;
    /**
     * @var string $releaseName
     */
    protected $releaseName;

    /**
     * Release constructor.
     * @param UrlInterface $url
     * @throws ReleaseException
     */
    public function __construct(UrlInterface $url)
    {
        $this->releaseName = ucfirst(ltrim($url->current(), '/'));
        $this->detectCorrectRelease(ReleaseConstants::getReleases());
    }

    /**
     * @param ReleaseItemInterface $releaseItem
     */
    public function setActive(ReleaseItemInterface $releaseItem)
    {
        $this->releaseItem = $releaseItem;
    }

    /**
     * @return ReleaseItemInterface
     */
    public function getActive(): ReleaseItemInterface
    {
        if (!$this->releaseItem) {
            $this->releaseItem = $this->arrayToReleaseItem(ReleaseConstants::getReleases($this->releaseName));
        }

        return $this->releaseItem;
    }

    /**
     * @param array $data
     * @param string|null $name
     * @return ReleaseItemInterface
     */
    public function arrayToReleaseItem(array $data, string $name = null): ReleaseItemInterface
    {
        $releaseItem = new ReleaseItem();
        $releaseItem->setDescription($data['description']);
        $releaseItem->setStatus($data['status']);
        $releaseItem->setAuthor($data['author']);

        $name = $this->releaseName ?? $name;

        if(null !== $name){
            $releaseItem->setName($name);
            $this->releaseName = $name;
        }

        $releaseItem->setVersion($data['version']);
        $releaseItem->setNamespace($data['namespace'] ?? null);
        return $releaseItem;
    }

    /**
     * @param array $releases
     * @return void
     * @throws ReleaseException
     */
    protected function detectCorrectRelease(array $releases): void
    {
        if (empty($releases[$this->releaseName])) {
            $partials = explode('/', $this->releaseName);
            $length = count($partials);
            while (--$length) {
                $release = '';
                for ($i = 0; $i < $length; $i++) {
                    $release .= $partials[$i] . '/';
                }
                $release = rtrim($release, '/');
                if (!empty($releases[ucfirst($release)])) {
                    $this->releaseName = ucfirst($release);
                    break;
                }
            }
        }

        if (empty($releases[$this->releaseName])) {
            $this->releaseName = ReleaseConstants::getDefaultReleaseName();
        }
    }
}