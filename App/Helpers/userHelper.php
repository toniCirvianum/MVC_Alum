<?php

    function generateToken(){
        $caracters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $token = substr( str_shuffle( $caracters ), 0, 12);
        return $token;
    }

    function validarUsername(){
        return null;
        //retornar misstge d'error si no passa validació
    }

    function validarPassword(){
        return null;
    }

    function validarMail(){
        return null;
    }





?>