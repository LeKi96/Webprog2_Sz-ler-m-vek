<?php

class Elerhetoseg_alapinfok_Controller
{
	public $baseName = 'elerhetoseg_alapinfok';  
	public function main(array $vars) 
	{

		$MnbModel = new Mnb_Model;
        $retData = $MnbModel->mnb_currency($vars);
        $this->baseName = "elerhetoseg_alapinfok";

		$view = new View_Loader($this->baseName."_main");

		foreach($retData as $name => $value)
            $view->assign($name, $value);
	}
}

?>
