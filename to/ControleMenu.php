<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControleMenu
 *
 * @author lukas
 */
class ControleMenu implements IPrivateTO {

    public function inicio() {
        $v = new TGui("inicio");
        $v->renderizar();
    }

}
