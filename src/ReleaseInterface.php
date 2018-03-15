<?php

namespace VS\Release;

/**
 * Interface ReleaseInterface
 * @package VS\Framework\Release
 * @author Varazdat Stepanyan
 */
interface ReleaseInterface
{
    /**
     * @param ReleaseItemInterface $releaseItem
     * @return void
     */
    public function setActive(ReleaseItemInterface $releaseItem);

    /**
     * @return ReleaseItemInterface
     */
    public function getActive(): ReleaseItemInterface;

    /**
     * @param array $data
     * @param string $name
     * @return ReleaseItemInterface
     */
    public function arrayToReleaseItem(array $data, string $name): ReleaseItemInterface;
}