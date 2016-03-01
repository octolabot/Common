<?php

namespace OctoLab\Common\Config\Loader;

use Symfony\Component\Config\FileLocatorInterface;

/**
 * @author Kamil Samigullin <kamil@samigullin.info>
 */
class JsonFileLoader extends FileLoader
{
    /** @var int */
    private $depth;
    /** @var int */
    private $options;

    /**
     * @param FileLocatorInterface $locator
     * @param int $depth
     * @param int $options
     *
     * @api
     */
    public function __construct(FileLocatorInterface $locator, $depth = 512, $options = 0)
    {
        parent::__construct($locator);
        $this->depth = $depth;
        $this->options = $options;
        $this->extension = 'json';
    }

    /**
     * @param string $file
     *
     * @return mixed
     */
    protected function loadFile($file)
    {
        return json_decode(file_get_contents($file), true, $this->depth, $this->options);
    }

    /**
     * @param array $content
     * @param string $sourceResource
     *
     * @throws \Symfony\Component\Config\Exception\FileLoaderLoadException
     */
    protected function parseImports($content, $sourceResource)
    {
        if (!isset($content['imports'])) {
            return;
        }
        $this->setCurrentDir(dirname($sourceResource));
        foreach ($content['imports'] as $import) {
            $isString = is_string($import);
            $hasResource = !$isString && isset($import['resource']);
            if ($isString || $hasResource) {
                if ($isString) {
                    $resource = $import;
                    $ignoreErrors = false;
                } else {
                    $resource = $import['resource'];
                    $ignoreErrors = isset($import['ignore_errors']) ? (bool) $import['ignore_errors'] : false;
                }
                $this->import($resource, null, $ignoreErrors, $sourceResource);
            }
        }
    }
}
