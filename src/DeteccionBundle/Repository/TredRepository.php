<?php

namespace DeteccionBundle\Repository;
set_time_limit(300);
/**
 * TredRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TredRepository extends \Doctrine\ORM\EntityRepository
{
	public function obtenerTred($direccion)
	{
	$direccion=null;		
		exec("WMIC $direccion NIC WHERE PhysicalAdapter='TRUE' get Index", $arr, $sal);		
		unset($arr[0]);
		unset($arr[count($arr)]);		
		
		$inc=0;
        for ($i=1; $i <= count($arr); $i++) {
        	//Validando que no sean Adaptadores de VirtualBox
        	exec("WMIC $direccion NIC WHERE Index='".$arr[$i]."' get NetConnectionID", $cons, $sal);
        	$pos=strpos($cons[1], 'VirtualBox');
			if ($pos!==FALSE) {				
		        
			}else{
				$res[$inc]['mar'] = $this->ejecutar("WMIC $direccion NIC WHERE Index='".$arr[$i]."' get  Manufacturer /FORMAT:List");
		        $res[$inc]['mac'] = $this->ejecutar("WMIC $direccion NIC WHERE Index='".$arr[$i]."' get  MACAddress /FORMAT:List");
		        $res[$inc]['nco'] = $this->ejecutar("WMIC $direccion NIC WHERE Index='".$arr[$i]."' get  NetConnectionID /FORMAT:List");
		        $inc++;
			}
			$cons="";
        }
       
        return $res;
	}
	private function ejecutar($comando){
        //Ejecutando el comando MS-DOS
        $respuesta=shell_exec($comando);
        //Determinar la posicion del =
        $posicion=strpos($respuesta, '=');
        //retornamos todo lo que este DESPUES del igual
        $res1 = substr($respuesta, ($posicion+1));
        $res1 = str_replace("Conexi?n", "Conexión",utf8_decode($res1));
        $res1 = str_replace("?rea", "área",$res1);
        return $res1;
    }
}