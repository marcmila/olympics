<?php


class Judge extends Staff
{
    private $judgeId;

    /**
     * Judge constructor.
     * @param int $id
     * @param string $name
     * @param string $lastName
     * @param string $passport
     * @param int $judgeId
     * @param DateTime $created
     * @param DateTime $modified
     * @param bool $deleted
     */
    public function __construct(
        int $id,
        string $name,
        string $lastName,
        string $passport,
        int $judgeId,
        DateTime $created,
        DateTime $modified,
        bool $deleted
    ) {
        $this->judgeId = $judgeId;
        parent::__construct($id, $name, $lastName, $passport, $created, $modified, $deleted);
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
