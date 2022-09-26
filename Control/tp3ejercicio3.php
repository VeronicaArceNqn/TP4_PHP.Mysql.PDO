<?php
class tp3ejercicio3
{

    public function verificar_pelicula($datos)
    {
        $result = array();
        $error = true;
        $url_archivo = '';
        $restricciones = '';

        if (isset($datos['titulo'])) {
            if ($datos['titulo'] != '' && $datos['titulo'] != null) {
                $result['titulo'] = $datos['titulo'];
            } else {
                $error = false;
            }
        } else {
            $error = false;
        }

        if (isset($datos['actores'])) {
            if ($datos['actores'] != '' && $datos['actores'] != null) {
                $result['actores'] = $datos['actores'];
            } else {
                $error = false;
            }
        } else {
            $error = false;
        }

        if (isset($datos['director'])) {
            if ($datos['director'] != '' && $datos['director'] != null) {
                $result['director'] = $datos['director'];
            } else {
                $error = false;
            }
        } else {
            $error = false;
        }

        if (isset($datos['guion'])) {
            if ($datos['guion'] != '' && $datos['guion'] != null) {
                $result['guion'] = $datos['guion'];
            } else {
                $error = false;
            }
        } else {
            $error = false;
        }

        if (isset($datos['produccion'])) {
            if ($datos['produccion'] != '' && $datos['produccion'] != null) {
                $result['produccion'] = $datos['produccion'];
            } else {
                $error = false;
            }
        } else {
            $error = false;
        }

        if (isset($datos['anio'])) {
            if ($datos['anio'] != '' && $datos['anio'] != null) {
                $result['anio'] = $datos['anio'];
            } else {
                $error = false;
            }
        } else {
            $error = false;
        }

        if (isset($datos['nacionalidad'])) {
            if ($datos['nacionalidad'] != '' && $datos['nacionalidad'] != null) {
                $result['nacionalidad'] = $datos['nacionalidad'];
            } else {
                $error = false;
            }
        } else {
            $error = false;
        }

        if (isset($datos['duracion'])) {
            if ($datos['duracion'] != '' && $datos['duracion'] != null) {
                $result['duracion'] = $datos['duracion'];
            } else {
                $error = false;
            }
        } else {
            $error = false;
        }

        if (isset($datos['restriccion'])) {
            if ($datos['restriccion'] != '' && $datos['restriccion'] != null) {
                $restricciones = $datos['restriccion'];
            } else {
                $error = false;
            }
        } else {
            $error = false;
        }



        if (isset($datos['sinopsis'])) {
            if ($datos['sinopsis'] != '' && $datos['sinopsis'] != null) {
                $result['sinopsis'] = $datos['sinopsis'];
            } else {
                $error = false;
            }
        } else {
            $error = false;
        }

        if (isset($datos['genero'])) {
            if ($datos['genero'] != '' && $datos['genero'] != null) {
                $result['genero'] = $datos['genero'];
            } else {
                $error = false;
            }
        } else {
            $error = false;
        }
      
        $directorio = '../uploads/img/';

        if (!file_exists($directorio)) {
            //si no existe crea la carpeta
            mkdir($directorio, 0777, true);
        }
        


        if (isset($_FILES)) {
            $fichero_subida = $directorio . basename($_FILES['archivo']['name']);
            $fileName = $_FILES['archivo']['name'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));

            $allowedfileExtensions = array('jpg','png','jpeg');
            if (!in_array($fileExtension, $allowedfileExtensions)) {
                $error = false;
            }

            if ($error != false) {
                if (move_uploaded_file($_FILES['archivo']['tmp_name'], $fichero_subida)) {
                    $url_archivo = $directorio. $_FILES['archivo']['name'];
                }
            }
        }

        $result['error'] = $error;
        $result['restricciones'] = $restricciones;
        $result['url_archivo'] = $url_archivo;
        return $result;
    }
}
