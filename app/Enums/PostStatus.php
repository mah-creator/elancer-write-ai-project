<?php

namespace App\Enums;

enum PostStatus: string
{
    case draft = 'draft';
    case published = 'published';
    case archived = 'archived';
    case deleted = 'deleted';

    public function label(): string
    {
        return match ($this) {
            self::draft => 'Draft',
            self::published => 'Published',
            self::archived => 'Archived',
            self::deleted => 'Deleted',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::draft => 'primary',
            self::published => 'secondary',
            self::archived => 'white',
            self::deleted => 'error',
        };
    }
}
