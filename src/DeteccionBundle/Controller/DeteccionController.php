<?php

namespace DeteccionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use DeteccionBundle\Entity\Deteccion;
use DeteccionBundle\Form\DeteccionType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Deteccion controller.
 *
 */
class DeteccionController extends Controller
{

    public function createAction(Request $request)
    {
        $entity = new Deteccion();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);


        // if (!$request->isXmlHttpRequest()) {
        //     return new JsonResponse(array('message' => '¡Acceso denegado!'), 400);
        // }        
            //OBTENIENDO DATOS EL FORMULARIO
            $seg1 = $form->get('seg1')->getData();
            $seg2 = $form->get('seg2')->getData();
            $seg3 = $form->get('seg3')->getData();
            $seg4 = $form->get('seg4')->getData();
            $seg5 = $form->get('seg5')->getData();
            //FUNCION:: ENLISTAR LAS DIR IP
            $listaip=$this->listarAction($seg1, $seg2, $seg3, $seg4, $seg5);
            //FUNCION:: VERIFICA ESTADO ONLINE DE EQUIPOS            
            $estados=$this->escanearAction($listaip);

            if (!$estados==null) {
                if (!isset($estados['offline'])) {
                    $estados['offline']=null;
                }
                if (!isset($estados['online'])) {
                    $estados['online']=null;
                }
                
                $desconectados=$estados['offline'];
                $conectados=$estados['online'];

                //VALIDAR QUE AL MENOS 1 ip ESTA Online
                if ((count($listaip))==(count($desconectados))) {
                    //Resp:: Todas las ip estan Offline
                    return new JsonResponse(array(
                        'validacion2'=>false,
                        'validacion'=>false,
                        'offline'=>$desconectados,
                        'online'=>$conectados), 200);
                }
                //Resp:: Almenos 1 ip esta Online
                if ((count($desconectados))>0) {
                    return new JsonResponse(array(
                        'validacion2'=>true,
                        'validacion'=>false,
                        'offline'=>$desconectados,
                        'online'=>$conectados), 200);
                }
                //Resp:: Todas las ip estan Online
                return new JsonResponse(array(
                    'validacion'=>true,
                    'online'=>$conectados), 200);
            }
            
            return new JsonResponse(array(
                'validacion'=>false), 200);

            // $response = new Response(json_encode(array('online' => $listaip, 'validacion'=>true)));
            // return $response;

            // $respuesta = $this->forward('DeteccionBundle:Guardar:save', array(
            //     'online'  => $listaip,                
            // ));
            // return $respuesta;
            
            // return $this->redirect($this->generateUrl('homepage'));
    }
    /////////////////////////////////////////////////////////////
    //------------ FUNCION:: ENLISTAR IP  --------------------//
    private function listarAction($seg1, $seg2, $seg3, $seg4, $seg5)
    {
        $aux=$seg1.".".$seg2.".".$seg3.".".$seg4;        
        $listado = array($aux);
        $aux2=$seg4;
        for ($i=$seg4; $i < $seg5 ; $i++) {
            $aux2=$aux2+1;
            $aux=$seg1.".".$seg2.".".$seg3.".".$aux2;             
            array_push($listado, $aux);
        }
        return $listado;
    }
    private function escanearAction($direcciones)
    {
        //Detectar si los equipos con las D. Ip ingresadas se encuentran ON
        //$direcciones = array('192.168.1.1', '192.168.1.2', '192.168.1.3');
        
        $tamaño=count($direcciones);
        $inc=0;
        $inc2=0;
        for ($i=0; $i < $tamaño; $i++) { 
            $res=shell_exec("ping -n 3 -w 3 $direcciones[$i]");           
           if (strpos($res, "recibidos = 0") || strpos($res, "Host de destino inaccesible.")) {
               $dir['offline'][$inc]=$direcciones[$i];
               $inc++;
           }else{
                $dir['online'][$inc2]=$direcciones[$i];
                $inc2++;
           }

        }
        //SE DETERMINA SI LA VARIABLE EXISTE
        //si existe quiere decir que hay ip fuera de linea
        if (isset($dir)) {
            return $dir;
        }
        return null;
    }


    private function createCreateForm(Deteccion $entity){
        $form = $this->createForm(new DeteccionType(), $entity, array(
            'action' => $this->generateUrl('deteccion_create'),
            'method' => 'POST',
        ));

        $form->add('detectar', 'submit', array('label' => 'Detectar Equipos'));

        return $form;
    }
    public function newAction(){
        $entity = new Deteccion();
        $form   = $this->createCreateForm($entity);

        return $this->render('DeteccionBundle:Deteccion:deteccion.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }
}
