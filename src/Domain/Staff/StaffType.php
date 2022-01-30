<?php


namespace Olympics\Domain\Staff;


use MyCLabs\Enum\Enum;

class StaffType extends Enum
{
    private const ADMIN = 'admin';
    private const COMPETITOR = 'competitor';
    private const JOURNALIST = 'journalist';
    private const JUDGE = 'judge';
}
