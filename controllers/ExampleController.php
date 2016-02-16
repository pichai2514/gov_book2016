<?php
class ExampleController extends Controller
{
     
    public function actionIndex()
    {
        $model = new UploadFile();
        $this->render('index', array(
            'model' => $model
        ));
    }
     
}

?>