<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\Krakow;
use AppBundle\Form\KrakowType;

/**
 * Krakow controller.
 *
 * @Route("/admin/krakow")
 */
class KrakowController extends Controller
{

    /**
     * Lists all Krakow entities.
     *
     * @Route("/", name="admin_krakow")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:Krakow')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Krakow entity.
     *
     * @Route("/", name="admin_krakow_create")
     * @Method("POST")
     * @Template("AppBundle:Krakow:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Krakow();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_krakow_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Krakow entity.
     *
     * @param Krakow $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Krakow $entity)
    {
        $form = $this->createForm(new KrakowType(), $entity, array(
            'action' => $this->generateUrl('admin_krakow_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Krakow entity.
     *
     * @Route("/new", name="admin_krakow_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Krakow();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Krakow entity.
     *
     * @Route("/{id}", name="admin_krakow_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Krakow')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Krakow entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Krakow entity.
     *
     * @Route("/{id}/edit", name="admin_krakow_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Krakow')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Krakow entity.');
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
    * Creates a form to edit a Krakow entity.
    *
    * @param Krakow $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Krakow $entity)
    {
        $form = $this->createForm(new KrakowType(), $entity, array(
            'action' => $this->generateUrl('admin_krakow_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Krakow entity.
     *
     * @Route("/{id}", name="admin_krakow_update")
     * @Method("PUT")
     * @Template("AppBundle:Krakow:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Krakow')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Krakow entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_krakow_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Krakow entity.
     *
     * @Route("/{id}", name="admin_krakow_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:Krakow')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Krakow entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_krakow'));
    }

    /**
     * Creates a form to delete a Krakow entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_krakow_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
