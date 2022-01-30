<?php


namespace Olympics\Application\Commands;


class AddResultCommand implements CommandInterface
{
    private $competitorId;
    private $modality;
    private $position;

    /**
     * AddResultCommand constructor.
     * @param int $competitorId
     * @param string $modality
     * @param int $position
     */
    public function __construct(
        int $competitorId,
        string $modality,
        int $position
    ) {
        $this->competitorId = $competitorId;
        $this->modality = $modality;
        $this->position = $position;
    }

    /**
     * @return int
     */
    public function getCompetitorId(): int
    {
        return $this->competitorId;
    }

    /**
     * @param int $competitorId
     */
    public function setCompetitorId(int $competitorId): void
    {
        $this->competitorId = $competitorId;
    }

    /**
     * @return string
     */
    public function getModality(): string
    {
        return $this->modality;
    }

    /**
     * @param string $modality
     */
    public function setModality(string $modality): void
    {
        $this->modality = $modality;
    }

    /**
     * @return int
     */
    public function getPosition(): int
    {
        return $this->position;
    }

    /**
     * @param int $position
     */
    public function setPosition(int $position): void
    {
        $this->position = $position;
    }
}
