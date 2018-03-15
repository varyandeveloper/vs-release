<?php

namespace VS\Release;

/**
 * Class ReleaseItem
 * @package VS\Framework\Release
 * @author Varazdat Stepanyan
 */
class ReleaseItem implements ReleaseItemInterface
{
    /**
     * @var string $version
     */
    protected $version;
    /**
     * @var string $author
     */
    protected $author;
    /**
     * @var string $description
     */
    protected $description;
    /**
     * @var string $status
     */
    protected $status;
    /**
     * @var string $name
     */
    protected $name;
    /**
     * @var string $namespace
     */
    protected $namespace;

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->version;
    }

    /**
     * @param string $version
     * @return ReleaseItemInterface
     */
    public function setVersion(string $version): ReleaseItemInterface
    {
        $this->version = $version;
        return $this;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @param string $author
     * @return ReleaseItemInterface
     */
    public function setAuthor(string $author): ReleaseItemInterface
    {
        $this->author = $author;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return ReleaseItemInterface
     */
    public function setDescription(string $description): ReleaseItemInterface
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return ReleaseItemInterface
     */
    public function setStatus(string $status): ReleaseItemInterface
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return ReleaseItemInterface
     */
    public function setName(string $name): ReleaseItemInterface
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getNamespace(): ?string
    {
        return $this->namespace;
    }

    /**
     * @param null|string $namespace
     * @return ReleaseItemInterface
     */
    public function setNamespace(?string $namespace): ReleaseItemInterface
    {
        $this->namespace = $namespace;
        return $this;
    }

    /**
     * @return array|mixed
     */
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}