<?php

namespace App\Enums;

enum MilitaryServiceStatus: string
{
    case COMPLETED = 'completed';
    case EXEMPT = 'exempt';
    case EDUCATIONAL_EXEMPTION = 'educational_exemption';
    case SUBJECT = 'subject';
    case PERMANENT_EXEMPTION = 'permanent_exemption';
}
