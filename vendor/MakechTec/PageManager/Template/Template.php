<?php
namespace MakechTec\Template;

class Template{
    private $filePath;
    private $content;
    private $bagData;
    private $errorMessage;

    public static function fromFile( $filePath = null ){
        if( !file_exists( $filePath ) ){
            throw new Exception("Failed creating Template from file");
        }
        else{
            $template = new Template();
            $template->build();
            return $template;
        }
    }
    
    public function build(){
        $bagData = $this->getBagData();

        ob_start();
        $fileContent = ob_get_contents();
        $this->setContent( $fileContent );
        ob_clean();
    }

    public function getFilePath()
    {
        return $this->filePath;
    }

    public function setFilePath($filePath)
    {
        $this->filePath = $filePath;

        return $this;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    public function getBagData()
    {
        return $this->bagData;
    }

    public function setBagData($bagData)
    {
        $this->bagData = $bagData;

        return $this;
    }

    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    public function setErrorMessage($errorMessage)
    {
        $this->errorMessage = $errorMessage;

        return $this;
    }
}