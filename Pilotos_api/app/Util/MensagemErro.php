<?php 

namespace App\Util;

class MensagemErro {

    public static function getJSONErro($msg, $MensagemErro = "", $httpStatus = 500): string {
        $erro['mensagem'] = $msg;
        $erro['mensagemErro'] = $MensagemErro;
        $erro['status'] = $httpStatus;
        return json_encode($erro);
    }

}