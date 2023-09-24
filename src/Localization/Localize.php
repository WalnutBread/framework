<?php

namespace WalnutBread\Localization;

class Localize
{

    public $path = null;

    public function setPath($path) {
        $this->path = $path;
    }

    public function getPath() {
        return $this->path;
    }

    public function getFileContents($fileUrl) {
        return file_get_contents($fileUrl);
    }

    public function getReadFile($local) {

        switch ($local) {
            case "en":
                $file = $this->getFileContents($this->getPath()."/en.json");
                break;
            case "ko":
                $file = $this->getFileContents($this->getPath()."/ko.json");
                break;
            default:
                $file = null;
                break;
        }

        return $file;
    }
}