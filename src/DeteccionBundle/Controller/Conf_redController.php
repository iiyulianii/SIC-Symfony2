<?php

namespace DeteccionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use DeteccionBundle\Entity\Conf_red;
use DeteccionBundle\Form\Conf_redType;

/**
 * Conf_red controller.
 *
 */
class Conf_redController extends Controller
{

    /**
     * Lists all Conf_red entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DeteccionBundle:Conf_red')->findAll();

        return $this->render('DeteccionBundle:Conf_red:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Conf_red entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Conf_red();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('conf_red_show', array('id' => $entity->getId())));
        }

        return $this->render('DeteccionBundle:Conf_red:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Conf_red entity.
     *
     * @param Conf_red $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Conf_red $entity)
    {
        $form = $this->createForm(new Conf_redType(), $entity, array(
            'action' => $this->generateUrl('conf_red_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Conf_red entity.
     *
     */
    public function newAction()
    {
        $entity = new Conf_red();
        $form   = $this->createCreateForm($entity);

        return $this->render('DeteccionBundle:Conf_red:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Conf_red entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DeteccionBundle:Conf_red')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Conf_red entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DeteccionBundle:Conf_red:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Conf_red entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DeteccionBundle:Conf_red')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Conf_red entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DeteccionBundle:Conf_red:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Conf_red entity.
    *
    * @param Conf_red $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Conf_red $entity)
    {
        $form = $this->createForm(new Conf_redType(), $entity, array(
            'action' => $this->generateUrl('conf_red_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Conf_red entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DeteccionBundle:Conf_red')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Conf_red entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('conf_red_edit', array('id' => $id)));
        }

        return $this->render('DeteccionBundle:Conf_red:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Conf_red entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('DeteccionBundle:Conf_red')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Conf_red entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('conf_red'));
    }

    /**
     * Creates a form to delete a Conf_red entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('conf_red_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
