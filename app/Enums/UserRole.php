<?php

namespace App\Enums;

// enum UserRole:string
// {
//     case HeadAdmin = 'HeadAdmin';
//     case Admin = 'Admin';
//     case GuildMaster = 'GuildMaster';
//     case Default = 'Default';
// }

enum UserRole:int
{
    case Master = 1;
    case Admin = 2;
    case GuildMaster = 3;
    case Default = 4;
}
