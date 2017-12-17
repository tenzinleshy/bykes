<?php

namespace OrderBundle\Controller;

use OrderBundle\Entity\Customer;
use OrderBundle\Entity\OrderRequest;
use OrderBundle\Entity\Specialist;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class OrderRequestController extends Controller
{
    /**
     *  Matches / exactly
     * @Route("/", name="order_index")
     */
    public function indexAction()
    {
        return $this->render('OrderBundle:OrderRequest:index.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/create", name="order_create")
     */
    public function createAction(Request $request)
    {
        $orderRequest = new OrderRequest();
        $customer = new Customer();
        $customer->setComment('dddd');
        $customer->setEmail('email@email.com');
        $customer->setPhone('89064568778');
        $customer->addOrderRequest($orderRequest);
        $specialist = new Specialist();
        $specialist->setFirstName('Alex');
        $specialist->setLastName('Chi');
        $specialist->addOrderRequest($orderRequest);
        $orderRequest->setCustomer($customer);
        $orderRequest->setSpecialist($specialist);

        $em = $this->getDoctrine()->getManager();
        $em->persist($orderRequest);
        $em->persist($customer);
        $em->persist($specialist);
        // actually executes the queries (i.e. the INSERT query)
        $em->flush();
        return $this->render('OrderBundle:OrderRequest:index.html.twig', array(
            // ...
        ));
    }

}
