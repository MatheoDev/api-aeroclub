<?php

namespace App\Controller;

use App\Repository\AvionsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerInterface;

class ApiAvionsController extends AbstractController
{
    /**
     * @Route("/api/avions", name="api_avions_index", methods={"GET"})
     */
    public function index(AvionsRepository $avionsRepo)
    {
        // $avions = $avionsRepo->findAll();

        // conversion de l'objet en json et normalisation de l'objet pr recup data des attribut en privé
        // $avionsNormaliser = $normalizer->normalize($avions);
        // $json = json_encode($avionsNormaliser);

        // remplace les deux ligne en commentaire ci-dessus
        // $json = $serializer->serialize($avions, "json");

        // $response = new Response($json, 200, [
        //     "Content-Type" => 'application/json'
        // ]);

        // remplace la la response ci-dessus
        // $response = new JsonResponse($json, 200, [], true);

        // remplace toute les lignes ci-dessus
        return $this->json($avionsRepo->findAll(), 200, [], []);
    }
}
