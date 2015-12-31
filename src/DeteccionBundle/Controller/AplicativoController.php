<?php

namespace DeteccionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use DeteccionBundle\Entity\Aplicativo;
use DeteccionBundle\Form\AplicativoType;

/**
 * Aplicativo controller.
 *
 */
class AplicativoController extends Controller
{

    /**
     * Lists all Aplicativo entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DeteccionBundle:Aplicativo')->findAll();

        return $this->render('DeteccionBundle:Aplicativo:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Aplicativo entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Aplicativo();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('aplicativo_show', array('id' => $entity->getId())));
        }

        return $this->render('DeteccionBundle:Aplicativo:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Aplicativo entity.
     *
     * @param Aplicativo $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Aplicativo $entity)
    {
        $form = $this->createForm(new AplicativoType(), $entity, array(
            'action' => $this->generateUrl('aplicativo_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Aplicativo entity.
     *
     */
    public function newAction()
    {
        $entity = new Aplicativo();
        $form   = $this->createCreateForm($entity);

        return $this->render('DeteccionBundle:Aplicativo:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Aplicativo entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DeteccionBundle:Aplicativo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Aplicativo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DeteccionBundle:Aplicativo:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Aplicativo entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DeteccionBundle:Aplicativo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Aplicativo entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DeteccionBundle:Aplicativo:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Aplicativo entity.
    *
    * @param Aplicativo $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Aplicativo $entity)
    {
        $form = $this->createForm(new AplicativoType(), $entity, array(
            'action' => $this->generateUrl('aplicativo_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Aplicativo entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DeteccionBundle:Aplicativo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Aplicativo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('aplicativo_edit', array('id' => $id)));
        }

        return $this->render('DeteccionBundle:Aplicativo:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Aplicativo entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('DeteccionBundle:Aplicativo')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Aplicativo entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('aplicativo'));
    }

    /**
     * Creates a form to delete a Aplicativo entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('aplicativo_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
