<?php

class MainController
{
    public function showDirectories($refresh = null)
    {
        $model = new DirectoryModel();

        if ($refresh || $model->isTableEmpty()) {
            $model->cleanAll();

            $directories = (new DirectoryScanner())->scan($_SERVER['DOCUMENT_ROOT'])->getItems();

            foreach ($directories as $item) {
                $dir = new DirectoryModel();
                $dir->name = $item['name'];
                $dir->size = $item['size'];
                $dir->type = $item['type'];
                $dir->lastModified = $item['last_modified'];
                $dir->save();
            }
        } else {
            $directories = $model->getAll();
        }

        return $this->render($directories);
    }

    private function render($data)
    {
        return include($_SERVER['DOCUMENT_ROOT']."/dirViewer/view/index.php");
    }
}
