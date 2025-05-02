<?php
    Class Util {
        public static function crearArchivo($nombre_archivo, $contenido) {
            try {
                $archivo = fopen($nombre_archivo, "w");
                if ($archivo) {
                    fwrite($archivo, $contenido);
                    fclose($archivo);
                }
            } finally { }
        }

        public static function leerArchivo($params) {
            try {
                if (file_exists($params)) {
                    $contenido = file_get_contents($params);
                    return $contenido;
                } else {
                    return "error";
                }
            } catch (Exception $e) {
                return "error";
            }
        }

        public static function guid() {
            $guid_cadena = sprintf(
                '%04X%04X-%04X-%04X-%04X-%04X%04X%04X',
                mt_rand(0, 65535),
                mt_rand(0, 65535),
                mt_rand(0, 65535),
                mt_rand(16384, 20479),
                mt_rand(32768, 49151),
                mt_rand(0, 65535),
                mt_rand(0, 65535),
                mt_rand(0, 65535)
            );
            return $guid_cadena;   
        }
    }
?>