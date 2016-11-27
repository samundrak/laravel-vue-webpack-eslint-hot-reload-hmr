<?php

namespace App\Profiyo\Service\Resume;

use App\Entities\Repository\Repository;

class Resume
{

    /**
     * @var Repository
     */
    private $repository;

    public function __construct(Repository $repository)
    {

        $this->repository = $repository;
    }

    public function save($resumePayloads)
    {
        dd($resumePayloads);
    }
}