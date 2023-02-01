<?php

namespace App\Service;

use App\Helper\HttpResponseHelper;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Repository\SheetRepository;

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
    $sheet->setName($dto->name);
    $sheet->setSynopsis($dto->synopsis);
    $sheet->setType($dto->type);

    $this->sheetRepository->save($sheet, true);

    return $sheet;
  }
}