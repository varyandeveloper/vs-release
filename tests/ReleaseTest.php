<?php

/**
 * Class ReleaseTest
 * @author Varazdat Stepanyan
 */
class ReleaseTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \VS\Release\ReleaseInterface $release
     */
    protected $Release;

    public static function setUpBeforeClass()
    {
        \VS\Release\ReleaseConstants::setDefaultReleaseName('Application');
        \VS\Release\ReleaseConstants::setReleases([
            'Application' => [
                "author" => "Varazdat Stepanyan",
                "version" => "1.0.0",
                "description" => "Default release to get basic information about release",
                "status" => "Under development"
            ],
            'Api' => [
                "author" => "Varazdat Stepanyan",
                "version" => "1.0.0",
                "description" => "Test Api release",
                "status" => "Under development"
            ]
        ]);
    }

    public function setUp()
    {
        $this->Release = new VS\Release\Release(\VS\Url\Url::getInstance());
    }

    public function testActiveRelease()
    {
        $releaseItem = new \VS\Release\ReleaseItem();
        $releaseItem->setName('Application');
        $releaseItem->setAuthor('Varazdat Stepanyan');
        $releaseItem->setVersion("1.0.0");
        $releaseItem->setDescription('Default release to get basic information about release');
        $releaseItem->setStatus('Under development');
        $this->assertEquals($releaseItem, $this->Release->getActive());
    }

    public function testReleaseExists()
    {
        $releaseItem = $this->Release->arrayToReleaseItem(
            \VS\Release\ReleaseConstants::getReleases('Api'),
            'Api'
        );

        $this->Release->setActive($releaseItem);
        $this->assertEquals($releaseItem, $this->Release->getActive());
    }

    public function testInvalidReleaseName()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->Release->arrayToReleaseItem(
            \VS\Release\ReleaseConstants::getReleases('test'),
            'test'
        );
    }
}