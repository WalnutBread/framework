<?php

namespace WalnutBread\Localization;

class Localize
{

    /**
     * 패스 경로 상태
     */
    public $path = null;

    /**
     * 패스 경로 설정
     */
    public function setPath($path) {
        $this->path = $path;
    }

    /**
     * 패스 경로 가져오기
     */
    public function getPath() {
        return $this->path;
    }

    /* @param $fileUrl
     * file_get_contents 를 이용한 json 파일 읽기
     */
    public function getFileContents($fileUrl) {
        return file_get_contents($fileUrl);
    }

    /* @param $local 로컬 파일의 경로
     * json 파일을 읽어들입니다.
     **/
    public function getReadFile($local) {
        /* php <= 8.0 */
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