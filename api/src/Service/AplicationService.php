<?php

namespace App\Service;

use App\Entity\Aplication;
use App\Repository\AplicationRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\DateTime;

class AplicationService
{
    private \DateTime $date;

    public function __construct(private readonly AplicationRepository $aplicationRepository, public string $uploadDir, public FileUploader $uploader, public EntityManagerInterface $entityManager)
    {
        $this->date = new \DateTime();
    }

    function getAllAplications()
    {
        return $this->aplicationRepository->findAll();
//        return 'test';
    }

    public function addNewApplication(Request $request)
    {
        $description = $request->get('description');
        $comment = $request->get('comment');
        $creation_date = $this->date;
        $last_update_date = $this->date;
        $path = $this->saveUploadedFile($request->files->get('file'));
        $select = $request->get('select');
        $creator = 'User1';
        $model = new Aplication();
        $model->setDescription($description)
            ->setFiles($path)
            ->setComment($comment)
            ->setCreator($creator)
            ->setCreationDate($creation_date)
            ->setLastUpdateDate($last_update_date)
            ->setStatus($select);
        $this->entityManager->persist($model);
        $this->entityManager->flush();
        return 'Saved new product with id ' . $model->getId();
    }

    public function saveUploadedFile($file): string|bool
    {
        if (empty($file)) {
            return false;
//            return $this->json(["status"=>false,"message"=>"file could not be uploaded"]);
        }
        $filename = $file->getClientOriginalName();
        return $this->uploader->upload($this->uploadDir, $file, $filename);
    }
}