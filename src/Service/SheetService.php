<?php


namespace App\Service;

use App\Helper\HttpResponseHelper;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Repository\SheetRepository;
use App\Entity\Sheet;
use App\Validation\Dto\CreateSheetDto;

/**
 * Sheet service.
 */
class SheetService
{
  private $sheetRepository;

  public function __construct(SheetRepository $sheetRepository)
  {
    $this->sheetRepository = $sheetRepository;
  }

  public function findById(int $id): Sheet
  {
    $sheet = $this->sheetRepository->find($id);

    if (!$sheet) {
      throw new NotFoundHttpException(HttpResponseHelper::NOT_FOUND);
    }

    return $sheet;
  }

  /**
   * Find all sheets.
   * 
   * @return array
   */
  public function findAll(): array
  {
    return $this->sheetRepository->findAll();
  }

  public function create(CreateSheetDto $dto): Sheet
  {
    $sheet = new Sheet();
    $creationDate = new \DateTime();

    $sheet->setName($dto->name);
    $sheet->setSynopsis($dto->synopsis);
    $sheet->setType($dto->type);
    $sheet->setCreatedAt($creationDate);

    $this->sheetRepository->save($sheet, true);

    return $sheet;
  }
}