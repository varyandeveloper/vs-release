<?php

namespace VS\Release;

/**
 * Interface ReleaseItemInterface
 * @package VS\Framework\Release
 * @author Varazdat Stepanyan
 */
interface ReleaseItemInterface extends \JsonSerializable
{
    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return string
     */
    public function getVersion(): string;

    /**
     * @return string
     */
    public function getAuthor(): string;

    /**
     * @return string
     */
    public function getDescription(): string;

    /**
     * @return string
     */
    public function getStatus(): string;

    /**
     * @return null|string
     */
    public function getNamespace(): ?string;
}