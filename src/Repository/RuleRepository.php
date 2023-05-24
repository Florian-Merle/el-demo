<?php

declare(strict_types=1);

namespace App\Repository;

final class RuleRepository
{
    private string $eligiblePourBourseFile;

    public function __construct(
        string $projectDirectory,
    ){
        $this->eligiblePourBourseFile = sprintf('%s/var/eligible_pour_bourse', $projectDirectory);
    }


    public function saveEligiblePourBourse(string $expression): void
    {
        file_put_contents($this->eligiblePourBourseFile, $expression);
    }

    public function findEligiblePourBourse(): string
    {
        if (false === file_exists($this->eligiblePourBourseFile)) {
            return '';
        }

        return file_get_contents($this->eligiblePourBourseFile);
    }
}
