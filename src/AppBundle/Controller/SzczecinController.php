<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\Szczecin;
use AppBundle\Form\SzczecinType;

/**
 * Szczecin controller.
 *
 * @Route("/admin/szczecin")
 */
class SzczecinController extends Controller
{

    /**
     * Lists all Szczecin entities.
     *
     * @Route("/", name="admin_szczecin")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:Szczecin')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Szczecin entity.
     *
     * @Route("/", name="admin_szczecin_create")
     * @Method("POST")
     * @Template("AppBundle:Szczecin:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Szczecin();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_szczecin_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Szczecin entity.
     *
     * @param Szczecin $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Szczecin $entity)
    {
        $form = $this->createForm(new SzczecinType(), $entity, array(
            'action' => $this->generateUrl('admin_szczecin_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Szczecin entity.
     *
     * @Route("/new", name="admin_szczecin_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Szczecin();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Szczecin entity.
     *
     * @Route("/{id}", name="admin_szczecin_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Szczecin')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Szczecin entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Szczecin entity.
     *
     * @Route("/{id}/edit", name="admin_szczecin_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Szczecin')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Szczecin entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Szczecin entity.
    *
    * @param Szczecin $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Szczecin $entity)
    {
        $form = $this->createForm(new SzczecinType(), $entity, array(
            'action' => $this->generateUrl('admin_szczecin_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Szczecin entity.
     *
     * @Route("/{id}", name="admin_szczecin_update")
     * @Method("PUT")
     * @Template("AppBundle:Szczecin:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Szczecin')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Szczecin entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_szczecin_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Szczecin entity.
     *
     * @Route("/{id}", name="admin_szczecin_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:Szczecin')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Szczecin entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_szczecin'));
    }

    /**
     * Creates a form to delete a Szczecin entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_szczecin_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
