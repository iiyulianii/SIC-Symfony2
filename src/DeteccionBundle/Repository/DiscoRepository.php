<?php

namespace DeteccionBundle\Repository;

/**
 * DiscoRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class DiscoRepository extends \Doctrine\ORM\EntityRepository
{
	public function obtenerDisco($direccion)
	{		

        
        $res['cap'] = $this->ejecutar("WMIC $direccion DISKDRIVE get  Size /FORMAT:List");
        $res['tip'] = $this->ejecutar("WMIC $direccion DISKDRIVE get  InterfaceType /FORMAT:List");
        $res['nse'] = $this->ejecutar("WMIC $direccion DISKDRIVE get  SerialNumber /FORMAT:List");
        $res['fab'] = $this->ejecutar("WMIC $direccion DISKDRIVE get  Manufacturer /FORMAT:List");
        $res['mod'] = $this->ejecutar("WMIC $direccion DISKDRIVE get  Model /FORMAT:List");

        return $res;
	}
	private function ejecutar($comando){
        //Ejecutando el comando MS-DOS
        $respuesta=shell_exec($comando);
        //Determinar la posicion del =
        $posicion=strpos($respuesta, '=');
        //retornamos todo lo que este DESPUES del igual
        return substr($respuesta, ($posicion+1));
    }
}
