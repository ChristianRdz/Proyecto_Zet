<?php

namespace zetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use zetBundle\Entity\Usuarios;

class MainController extends Controller
  {
    public function mostrarAction()
    {
      $varphp1= 50;
      $varphp2= 35;
        return  $this->render("zetBundle::vista1.html.twig", array("varphp1" => $varphp1,"varphp2"=> $varphp2));
    }
    public function pistearAction()
    {
        return $this->render("zetBundle::persona.html.twig");
    }

    public function menAction()
    {
        return $this->render("zetBundle::stemen.html.twig");
    }

    public function FormularioAction(Request $request)
    {

      $nombre= $request->get("nombre");
      $apellidos=$request->get("apellidos");
      $edad =$request->get("edad");
      $email=$request->get("email");

      return $this-> render("zetBundle::Ejemplo.html.twig",array(
        "nombre"=>$nombre,
        "apellidos"=>$apellidos,
        "edad"=>$edad,
        "email"=>$email
      ));
    }
        public function FormulaAction(Request $request)
        {
          $request = Request::createFromGlobals();
          $em = $this->getDoctrine()->getManager();
          $usuarios = new Usuarios();

          $usuarios->setNombre($request->get("nombre"));
          $usuarios->setApellidos($request->get("apellidos"));
          $usuarios->setEdad($request->get("edad"));
          $usuarios->setEmail($request->get("email"));
          $usuarios->setOcupacion($request->get("ocupacion"));

          $em->persist($usuarios);
          $em->flush();

          return $this-> redirectToRoute("rutaUsuarios");
    }
    public function usuariosAction()
    {
        return $this->render("zetBundle::Ejemplo.html.twig");
    }
    public function gamerAction()
    {
        $em = $this->getDoctrine()->getManager();
        $usuariosRepo = $em ->getRepository("zetBundle:Usuarios");
        $usuariosAll = $usuariosRepo->findAll();
        return $this->render("zetBundle::nueva.html.twig", array("usuarios" => $usuariosAll));
    }
    public function otraAction()
    {
        return $this->render("zetBundle::otravista.html.twig");
    }
    public function enviaremailAction()
    {
      $mailer=\Swift_Mailer::newInstance(
        \Swift_SmtpTransport::newInstance("smtp.tuServidor.com",663,"tls")
        ->setUsername("Nombre_De_Usuario_Del_Administrador_SMTP")
        ->setPassword("contraseña")
      );
$message= \Swift_Massage::newInstance()
  ->setSubject("Un desconosido")
  ->setFrom("tuCorreo@email.com")
  ->setTo("tuCrush@email.com")
  ->setBody("holi. te amo.", "text/html");

$mailer->send($massage);

    }
    public function BonetoAction()
    {
        return $this->render("zetBundle::Yomero.html.twig");
    }

    public function OmoewaAction()
    {
        return $this->render("zetBundle::Llamame.html.twig");
    }

  }
##################################
#bien sad mi vida :,v
#key:                    #value:
#                        #int-> 50
