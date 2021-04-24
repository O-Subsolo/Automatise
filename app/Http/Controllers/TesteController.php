<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function __construct()
    {

    }

    public function domains($length = null)
    {


    $file = fopen("https://registro.br/dominio/lista-processo-liberacao.txt", "r");
    //$file = fopen("teste.txt", "r");

        while (!feof($file)) {

            $stop = false;

            $line = fgets($file);

            if (substr($line, 0, 1) !== "#") {
                $length = $length ? $length : 3;

                for ($i = 0; $i < $length; $i++) {
                    $char = substr($line, $i, 1);

                    if (is_numeric($char)) {
                        $stop = true;
                    }

                }

                if (!$stop) {
                    $point = substr($line, $length, 1);

                    if ($point === ".") {

                        $final = strstr($line, '.com.br');

                        if ($final)
                            echo $line . "<br>";

                    }
                }
            }

        }

        fclose($file);
    }
}
