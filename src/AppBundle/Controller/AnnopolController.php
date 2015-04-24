<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\Annopol;
use AppBundle\Form\AnnopolType;

/**
 * Annopol controller.
 *
 * @Route("/admin/annopol")
 */
class AnnopolController extends Controller
{

    /**
     * Lists all Annopol entities.
     *
     * @Route("/", name="admin_annopol")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:Annopol')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Annopol entity.
     *
     * @Route("/", name="admin_annopol_create")
     * @Method("POST")
     * @Template("AppBundle:Annopol:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Annopol();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_annopol_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Annopol entity.
     *
     * @param Annopol $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Annopol $entity)
    {
        $form = $this->createForm(new AnnopolType(), $entity, array(
            'action' => $this->generateUrl('admin_annopol_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Annopol entity.
     *
     * @Route("/new", name="admin_annopol_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Annopol();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Annopol entity.
     *
     * @Route("/{id}", name="admin_annopol_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Annopol')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Annopol entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Annopol entity.
     *
     * @Route("/{id}/edit", name="admin_annopol_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Annopol')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Annopol entity.');
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
    * Creates a form to edit a Annopol entity.
    *
    * @param Annopol $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Annopol $entity)
    {
        $form = $this->createForm(new AnnopolType(), $entity, array(
            'action' => $this->generateUrl('admin_annopol_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Annopol entity.
     *
     * @Route("/{id}", name="admin_annopol_update")
     * @Method("PUT")
     * @Template("AppBundle:Annopol:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Annopol')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Annopol entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_annopol_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Annopol entity.
     *
     * @Route("/{id}", name="admin_annopol_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:Annopol')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Annopol entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_annopol'));
    }

    /**
     * Creates a form to delete a Annopol entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_annopol_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
