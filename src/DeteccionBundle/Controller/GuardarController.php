<?php

namespace DeteccionBundle\Controller;

use DeteccionBundle\Entity\Aplicativo;
use DeteccionBundle\Entity\Conf_sistema;
use DeteccionBundle\Entity\Configuracion;
use DeteccionBundle\Entity\Cpu;
use DeteccionBundle\Entity\Disco;
use DeteccionBundle\Entity\Licencia;
use DeteccionBundle\Entity\Memoria;
use DeteccionBundle\Entity\Rol;
use DeteccionBundle\Entity\Seccion;
use DeteccionBundle\Entity\Tred;
use DeteccionBundle\Entity\Uoptica;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class GuardarController extends Controller
{
    public function saveAction($online)
    {
        //VARIABLES
        $user="ITP";
        $pass="itp";
        //Decodificar el JSON
        $direcciones =json_decode($online);
        //Numero de direcciones IP
        $nip=count($direcciones);

    //::::::::::  RECORRER CADA UNA DE LAS DIRECCIONES IP ::::::::::::::::://   
        for ($i=0; $i < $nip; $i++) {
            $acceso="/NODE:\"$direcciones[$i]\" /USER:$user /PASSWORD:$pass";
            //MENSAJE
            $this->addFlash(
            'notice',
            'ESCANEANDO: '.$direcciones[$i]);

        //******* Detectando: CPU *********//
            $res1 = $this->getDoctrine()->getRepository('DeteccionBundle:Cpu')->obtenerCpu($acceso);
            $cpu=new Cpu();
            $cpu->setNse($res1['nse']);
            $cpu->setNom($res1['nom']);
            $cpu->setFab($res1['fab']);
            $cpu->setSepro($res1['sepro']);
            $cpu->setNopro($res1['nopro']);
            $cpu->setNupro($res1['nupro']);
            $cpu->setVepro($res1['vepro']);
            $cpu->setLopro($res1['lopro']);
            $cpu->setFapro($res1['fapro']);
            $cpu->setArpro($res1['arpro']);
        // //******* Detectando: CONF DE SISTEMA *********//
        //     $vaConf_sistema= $this->getDoctrine()->getRepository('DeteccionBundle:Conf_sistema')->obtenerConf($acceso);
        //     $conf_sistema=new Conf_sistema();
        //     $conf_sistema->setNso($vaConf_sistema['nso']);
        //     $conf_sistema->setVso($vaConf_sistema['vso']);
        //     $conf_sistema->setAso($vaConf_sistema['aso']);
        //     $conf_sistema->setCpu($cpu);
        // //*******     Detectando: DISCOS  ***********//
        //     $res = $this->getDoctrine()->getRepository('DeteccionBundle:Disco')->obtenerDisco($acceso);
        //     $disco=new Disco();            
        //     $disco->setCap($res['cap']);
        //     $disco->setTip($res['tip']);
        //     $disco->setNse($res['nse']);
        //     $disco->setFab(utf8_encode($res['fab']));
        //     // $disco->setFab(utf8_encode($res['fab']));
        //     $disco->setModelo($res['mod']);
        //     $disco->setCpu($cpu);
            
         //*******     Detectando: MEMORIA  ***********//
            // $res = $this->getDoctrine()->getRepository('DeteccionBundle:Memoria')->obtenerMemoria($acceso);
            // $cantm= $this->getDoctrine()->getRepository('DeteccionBundle:Memoria')->ejecutar("WMIC MEMPHYSICAL get MemoryDevices /FORMAT:List");

            // if ($cantm>"1") {
            //     for ($i=0; $i < $cantm; $i++) { 
            //         $memoria[$i]=new Memoria();
            //         $memoria[$i]->setSer($res[$i]['ser']);
            //         $memoria[$i]->setMar($res[$i]['mar']);
            //         $memoria[$i]->setCap($res[$i]['cap']);
            //         $memoria[$i]->setVel($res[$i]['vel']);
            //         $memoria[$i]->setTip($res[$i]['tip']);
            //         $memoria[$i]->setCpu($cpu);
            //     }                
            // }else{
            //     $memoria[0]=new Memoria();
            //     $memoria[0]->setSer($res['ser']);
            //     $memoria[0]->setMar($res['mar']);
            //     $memoria[0]->setCap($res['cap']);
            //     $memoria[0]->setVel($res['vel']);
            //     $memoria[0]->setTip($res['tip']);
            //     $memoria[0]->setCpu($cpu);
            // }
        // ************ Detectando: UOPTICAS ********** //
            // $res = $this->getDoctrine()->getRepository('DeteccionBundle:Uoptica')->obtenerUoptica($acceso);
            // $cantu=count($res);            
            // if (count($res)>1) {
            //     for ($i=1; $i <= count($res); $i++) { 
            //         $uoptica[$i]=new Uoptica();
            //         $uoptica[$i]->setNse($res[$i]['nom']);
            //         $uoptica[$i]->setMar($res[$i]['mar']);
            //         $uoptica[$i]->setLet($res[$i]['let']);
            //         $uoptica[$i]->setCpu($cpu);
            //     }
            // }else{
            //     $uoptica=new Uoptica();
            //     $uoptica[0]->setNse($res['nom']);
            //     $uoptica[0]->setMar($res['mar']);
            //     $uoptica[0]->setLet($res['let']);
            //     $uoptica[0]->setCpu($cpu);
            // }
        // ************ Detectando: TRED ********** //
            $res6 = $this->getDoctrine()->getRepository('DeteccionBundle:Tred')->obtenerTred($acceso);
            print_r($res6);
            for ($i=0; $i < count($res6); $i++) { 
                $tred[$i]=new Tred();
                $tred[$i]->setMar($res6[$i]['mar']);
                $tred[$i]->setMac($res6[$i]['mac']);
                $tred[$i]->setNco($res6[$i]['nco']);
                $tred[$i]->setCpu($cpu);
            }
        // ************ Detectando: CONF_RED ********** //
            $res7 = $this->getDoctrine()->getRepository('DeteccionBundle:Conf_red')->obtenerConf_red($acceso, $tred);

        /////////////////////////////////////////////
        ///////////// GUARDDANDO DATOS /////////////
            $em=$this->getDoctrine()->getManager();
            $em->persist($cpu);
            // // $em->persist($conf_sistema);
            // // $em->persist($disco);
            // // // -- G: Memorias -- //
            // // for ($i=0; $i < $cantm; $i++) { 
            // //     $em->persist($memoria[$i]);
            // // }
            // // // -- G: Uopticas -- //
            // // for ($i=1; $i <= $cantu; $i++) { 
            // //     $em->persist($uoptica[$i]);
            // // }
            // ///// -- G: Tred  ---- //
            for ($i=0; $i < count($res6); $i++) { 
                $em->persist($tred[$i]);
            }
            // $em->flush();
            

            return new response("ok");

        //******* Detectando: APLICATIVO *********//
            //$vaSo= $this->getDoctrine()->getRepository('DeteccionBundle:Aplicativo')->obtenerAplicativo($acceso);
            //$programas = shell_exec("psexec \\\\$direcciones[$i] -u usuario -p clave -c -f nombrearchivo.bat")



        //////////////// GUARDANDO DATOS ///////////////
            

        }
    //:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::/
        
    }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function guardarAction(Request $request)
    {
        $seccion=new Seccion();
        $seccion->setNom("Nueva S");

        $rol=new Rol();
        $rol->setDes("Nuevo");

        //INGRESO DE SISTEMAS OPERATIVOS
        for ($i=0; $i < 2; $i++) { 
            $arr["$i"]= new So();
            $arr["$i"]->setNom("$i");
            $arr["$i"]->setVer("$i");
            $arr["$i"]->setArq("$i");
        }
        //INGRESO DE APLICATIVOS
        for ($i=0; $i < 5; $i++) { 
            $aplicativo["$i"]=new Aplicativo();
            $aplicativo["$i"]->setNom("$i");
            $aplicativo["$i"]->setVer("$i");
            $aplicativo["$i"]->setArq("$i");
        }

        $cpu=new Cpu();
        $cpu->setNse("123");
        $cpu->setNom("ITP-1");
        $cpu->setFab("HP");
        $cpu->setSepro("123");
        $cpu->setNopro("Intel");
        $cpu->setNupro("4");
        $cpu->setLopro("nuevo");
        $cpu->setVepro("2.5");
        $cpu->setFapro("Intel");
        $cpu->setArpro("86");
        $cpu->setRol($rol);
        $cpu->setSeccion($seccion);
        for ($i=0; $i < 2; $i++) { 
            $cpu->addAplicativo($aplicativo["$i"]);
        }
        for ($i=0; $i < 2; $i++) { 
            $cpu->addSo($arr["$i"]);
        }
        
        

        $uoptica=new Uoptica();
        $uoptica->setNse("111111");
        $uoptica->setMar("Nueva");
        $uoptica->setCpu($cpu);

        $tred=new Tred();
        $tred->setNco("LAN");
        $tred->setMac("MAC");
        $tred->setMar("Nueva");
        $tred->setCpu($cpu);

        $configuracion=new Configuracion();
        $configuracion->setDns1("8.8.8.8");
        $configuracion->setDns2("8.8.4.4");
        $configuracion->setIp("198.0.0.6");
        $configuracion->setMas("255.255.255.0");
        $configuracion->setPen("198.0.0.254");
        $configuracion->setTred($tred);

        $memoria=new Memoria();
        $memoria->setCpu($cpu);
        $memoria->setMar("Nueva");
        $memoria->getSer("1111");
        $memoria->setCap("1000");
        $memoria->setVel("1600");
        $memoria->setTip("DDR 3");

        $disco=new Disco();
        $disco->setCpu($cpu);
        $disco->setMar("Samgsumg");
        $disco->setCap("1048576");
        $disco->setTip("SATA");
        //GUARDANDO DATOS
        $em=$this->getDoctrine()->getManager();
        $em->persist($seccion);
        $em->persist($rol);
        $em->persist($arr['1']);
        $em->persist($cpu);
        $em->persist($uoptica);
        $em->persist($tred);
        $em->persist($memoria);
        $em->persist($configuracion);
        $em->persist($disco);
        for ($i=0; $i < 2; $i++) { 
            $em->persist($aplicativo["$i"]);
        }
        


        $em->flush();
        //MOSTRANDO LOS REGISTROS
        $registros = $em->getRepository('DeteccionBundle:Cpu')->findAll();

        return $this->render('DeteccionBundle:Cpu:index.html.twig', array(
            'entities'=>$registros));
    }


}
