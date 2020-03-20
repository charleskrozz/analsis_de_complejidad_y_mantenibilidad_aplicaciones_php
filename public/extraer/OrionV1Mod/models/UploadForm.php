<?php
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $fileToUpload;

    public function rules()
    {
        return [
            [['fileToUpload'], 'safe'],
        ];
    }
    
    public function upload($fullPath)
    {
        if ($this->validate()) {
            $this->fileToUpload->saveAs($fullPath);
            return true;
        } else {
            return false;
        }
    }
}

?>