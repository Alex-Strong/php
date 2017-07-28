<?php
namespace PHPBootcamp\Controllers;
class FruitsController extends AbstractController{
    public function fruitsAction(){
        $fruits = $this->container->get('model.fruits');
        $listOfFruits = $fruits->getListOfFruits();

        $templateVariables = ['fruits' => $listOfFruits];
        $template = '/fruits.view.php';

        return $this->render($template, $templateVariables);
    }


}