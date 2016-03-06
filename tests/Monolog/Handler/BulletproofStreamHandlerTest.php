<?php

namespace OctoLab\Common\Monolog\Handler;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

/**
 * @author Kamil Samigullin <kamil@samigullin.info>
 */
class BulletproofStreamHandlerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @dataProvider loggerProvider
     *
     * @param Logger $logger
     */
    public function writeToMovedLogFile(Logger $logger)
    {
        $stream = $this->getStream();
        $newStreamLocation = $this->getNewStreamLocation();
        $logger->pushHandler(new StreamHandler($stream));
        $logger->info('Start logging.');
        self::assertFileExists($stream);
        $this->mv($stream, $newStreamLocation);
        self::assertFileNotExists($stream);
        $logger->info('End logging.');
        self::assertFileExists($newStreamLocation);
        $content = file_get_contents($newStreamLocation);
        self::assertContains('Start logging.', $content);
        self::assertContains('End logging.', $content);
        $this->rm($newStreamLocation);
    }

    /**
     * @test
     * @dataProvider loggerProvider
     *
     * @param Logger $logger
     */
    public function bulletproofWriteToMovedLogFile(Logger $logger)
    {
        $stream = $this->getStream();
        $newStreamLocation = $this->getNewStreamLocation();
        $logger->pushHandler(new BulletproofStreamHandler($stream));
        $logger->info('Start logging.');
        self::assertFileExists($stream);
        $this->mv($stream, $newStreamLocation);
        self::assertFileNotExists($stream);
        $logger->info('End logging.');
        self::assertFileExists($stream);
        self::assertFileExists($newStreamLocation);
        self::assertContains('Start logging.', file_get_contents($newStreamLocation));
        self::assertContains('End logging.', file_get_contents($stream));
        $this->rm($stream);
        $this->rm($newStreamLocation);
    }

    /**
     * @test
     * @dataProvider loggerProvider
     *
     * @param Logger $logger
     */
    public function writeToRemovedLogFile(Logger $logger)
    {
        $stream = $this->getStream();
        $logger->pushHandler(new StreamHandler($stream));
        $logger->info('Start logging.');
        self::assertFileExists($stream);
        $this->rm($stream);
        $logger->info('End logging.');
        self::assertFileNotExists($stream);
    }

    /**
     * @test
     * @dataProvider loggerProvider
     *
     * @param Logger $logger
     */
    public function bulletproofWriteToRemovedLogFile(Logger $logger)
    {
        $stream = $this->getStream();
        $logger->pushHandler(new BulletproofStreamHandler($stream));
        $logger->info('Start logging.');
        self::assertFileExists($stream);
        $this->rm($stream);
        $logger->info('End logging.');
        self::assertFileExists($stream);
        self::assertContains('End logging.', file_get_contents($stream));
        $this->rm($stream);
    }

    /**
     * @return array<int,Logger[]>
     */
    public function loggerProvider()
    {
        return [
            [new Logger('test')],
        ];
    }

    /**
     * @return string
     */
    private function getStream()
    {
        return __DIR__ . '/test.log';
    }

    /**
     * @return string
     */
    private function getNewStreamLocation()
    {
        return __DIR__ . '/moved.log';
    }

    /**
     * @param string $file
     */
    private function rm($file)
    {
        shell_exec(sprintf('rm %s', escapeshellarg($file)));
    }

    /**
     * @param string $file
     * @param string $location
     */
    private function mv($file, $location)
    {
        shell_exec(sprintf('mv %s %s', escapeshellarg($file), escapeshellarg($location)));
    }
}
