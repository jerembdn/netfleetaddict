<?php


namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\SheetService;
use App\Validation\Dto\CreateSheetDto;
use App\Validation\CustomValidator;
use Symfony\Component\Serializer\SerializerInterface;
use App\Helper\HttpResponseHelper;

#[Route('/sheet', name: 'sheet')]
class ApiSheetController extends AbstractController
{
  private SheetService $sheetService;
  private CustomValidator $validator;
  private SerializerInterface $serializer;

  public function __construct(SheetService $sheetService, CustomValidator $validator, SerializerInterface $serializer)
  {
    $this->sheetService = $sheetService;
    $this->validator = $validator;
    $this->serializer = $serializer;
  }

  #[Route('/create', name: '_create', methods: ['POST'])]
  public function create(Request $request)
  {
    $data = json_decode($request->getContent(), true);
    $dto = $this->serializer->denormalize($data, CreateSheetDto::class);
    $this->validator->validate($dto);

    $sheet = $this->sheetService->create($dto);

    return $this->json(HttpResponseHelper::success($sheet), Response::HTTP_CREATED);
  }

  #[Route('/getall', name: '_list', methods: ['GET'])]
  public function getAll()
  {
    $sheets = $this->sheetService->findAll();

    return $this->json(HttpResponseHelper::success($sheets), 200);
  }

  #[Route('/get/{id}', name: '_get', methods: ['GET'])]
  public function get($id)
  {
    $sheet = $this->sheetService->find($id);

    if (!$sheet) {
      $this->json(HttpResponseHelper::notFound("Sheet not found"), 404);
    }

    return $this->json(HttpResponseHelper::success($sheet), 200);
  }
}