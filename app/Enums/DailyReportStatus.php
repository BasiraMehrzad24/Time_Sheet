<?php

namespace App\Enums;

enum DailyReportStatus: int
{
    case Pending = 1;
    case Approved = 2;
    case Rejected = 3;
}
