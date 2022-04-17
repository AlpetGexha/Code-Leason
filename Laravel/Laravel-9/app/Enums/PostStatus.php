<?php

namespace App\Enums;

enum PostStatus: String
{
    case Draft = 'draft';
    case Publiced = 'public';
    case Privated = 'private';
}
