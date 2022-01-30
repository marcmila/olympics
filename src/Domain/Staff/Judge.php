<?php


namespace Olympics\Domain\Staff;

use DateTime;

class Judge extends Staff
{
    private $judgeId;

    /**
     * Judge constructor.
     * @param string $name
     * @param string $lastName
     * @param string $passport
     * @param int $judgeId
     * @throws \Exception
     */
    public function __construct(
        string $name,
        string $lastName,
        string $passport,
        int $judgeId
    ) {
        $this->judgeId = $judgeId;
        parent::__construct($name, $lastName, $passport);
    }

    /**
     * @return int
     */
    public function getJudgeId(): int
    {
        return $this->judgeId;
    }

    /**
     * @param int $judgeId
     */
    public function setJudgeId(int $judgeId): void
    {
        $this->judgeId = $judgeId;
    }
}
