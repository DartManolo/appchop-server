<?php
    Class Auth {
        function __construct() { }

        public static function verify() {
            if(!isset($_SESSION['Token'])) {
                http_response_code(401);
                die('No autorizado (1)');
            }
            $mysql = new Mysql();
            $token = $_SESSION['Token'];
            $verificar = $mysql->executeReader(
                "CALL STP_VERIFICAR_AUTORIZATION('{$token}')",
                true
            );
            if(!isset($verificar->TOKEN)) {
                http_response_code(401);
                die('No autorizado (2)');
            }
            if(intval($verificar->TOKEN) <= 0) {
                http_response_code(401);
                die('No autorizado (3)');
            }
        }

        public static function crearArchivo($nombre, $contenido) {
            try {
                $nombre_archivo = "../logserror/$nombre.txt";
                $archivo = fopen($nombre_archivo, "w");
                if ($archivo) {
                    fwrite($archivo, $contenido);
                    fclose($archivo);
                }
            } finally { }
        }
    }
?>