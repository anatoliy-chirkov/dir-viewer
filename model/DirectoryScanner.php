<?php

class DirectoryScanner
{
    private $items = array();

    /**
     * @param string $dir
     * @return $this
     */
    public function scan($dir)
    {
        $elements = array_diff(scandir($dir), array('..', '.'));

        $counter = 0;

        foreach ($elements as $item) {
            $itemPath = $dir.DIRECTORY_SEPARATOR.$item;

            $stat = stat($itemPath);

            $this->items[$counter]['name'] = $item;
            $this->items[$counter]['size'] = !is_dir($itemPath) ? $stat['size'] : '[DIR]';
            $this->items[$counter]['type'] = !is_dir($itemPath) ? (new SplFileInfo($item))->getExtension() : null;
            $this->items[$counter]['last_modified'] = date("Y-m-d H:i:s", $stat['mtime']);

            $counter++;
        }

        return $this;
    }

    /**
     * @return array
     */
    public function getItems()
    {
        return $this->items;
    }
}
