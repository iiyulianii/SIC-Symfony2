<?php

namespace DeteccionBundle\Repository;

/**
 * UopticaRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UopticaRepository extends \Doctrine\ORM\EntityRepository
{
	public function obtenerUoptica($direccion)
	{
		
		exec("WMIC $direccion CDROM get Drive", $arr, $sal);
		
		for ($i=0; $i < count($arr); $i++) { 
			$arr[$i]=trim($arr[$i]);
		}
		unset($arr[0]);
		unset($arr[count($arr)]);
		
		if (count($arr)>1) {
			for ($f=1; $f <= count($arr); $f++) {
				$res[$f]['mar'] = $this->ejecutar2("WMIC $direccion CDROM WHERE Drive='".$arr[$f]."' get  Manufacturer /FORMAT:List");
				$res[$f]['nom'] = $this->ejecutar2("WMIC $direccion CDROM WHERE Drive='".$arr[$f]."' get  Name /FORMAT:List");
				$res[$f]['let'] = $arr[$f];
			}	
		} else {
			$res['mar'] = $this->ejecutar("WMIC $direccion CDROM get  Manufacturer /FORMAT:List");
			$res['nom'] = $this->ejecutar("WMIC $direccion CDROM get  VolumeSerialNumber /FORMAT:List");
			$res['let'] = $this->ejecutar("WMIC $direccion CDROM get  Drive /FORMAT:List");
		}
		//Arreglar las tildes
		
        return $res;
	}

	public function ejecutar2($comando)
    {
        //Ejecutando el comando MS-DOS
        $respuesta=shell_exec($comando);
        //Determinar la posicion del =
        $posicion=strpos($respuesta, '=');
        //retornamos todo lo que este DESPUES del igual
        
        $res1 = substr($respuesta, ($posicion+1));
        $res1 = str_replace("est?ndar", "estándar",utf8_decode($res1));
        return $res1;
    }
}