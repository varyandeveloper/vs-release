<?php

namespace VS\Release;

/**
 * Class ReleaseConstants
 * @package VS\Framework\Release
 * @author Varazdat Stepanyan
 */
class ReleaseConstants
{
    const INVALID_DEFAULT_RELEASE_CODE = 1;

    protected const INVALID_DEFAULT_RELEASE_MESSAGE = 'Default release dose not defined.';
    protected const INVALID_RELEASE_MESSAGE = 'There is no release defined as %s.';
    protected const MESSAGES = [
        self::INVALID_DEFAULT_RELEASE_CODE => self::INVALID_DEFAULT_RELEASE_MESSAGE
    ];

    /**
     * @var string $defaultReleaseName
     */
    protected static $defaultReleaseName;
    /**
     * @var array $releases
     */
    protected static $releases = [];

    /**
     * @param array $releases
     */
    public static function setReleases(array $releases): void
    {
        self::$releases = $releases;
    }

    /**
     * @return string
     * @throws ReleaseException
     */
    public static function getDefaultReleaseName(): string
    {
        if (empty(self::$defaultReleaseName)) {
            throw new ReleaseException(self::INVALID_DEFAULT_RELEASE_MESSAGE);
        }
        return self::$defaultReleaseName;
    }

    /**
     * @param string $defaultReleaseName
     */
    public static function setDefaultReleaseName(string $defaultReleaseName): void
    {
        self::$defaultReleaseName = $defaultReleaseName;
    }

    /**
     * @param string|null $name
     * @return array
     */
    public static function getReleases(string $name = null): array
    {
        if (null !== $name) {
            if (empty(self::$releases[$name])) {
                throw new \InvalidArgumentException(sprintf(
                    self::INVALID_RELEASE_MESSAGE,
                    $name
                ));
            }
            return self::$releases[$name];
        }
        return self::$releases;
    }

    /**
     * @param int $code
     * @return bool|mixed
     */
    public static function getMessage(int $code)
    {
        $message = self::MESSAGES[$code] ?? false;

        if (!$message) {
            throw new \InvalidArgumentException(sprintf(
                'There is no message registered under code %d in %s',
                $code,
                __CLASS__
            ));
        }

        return $message;
    }
}