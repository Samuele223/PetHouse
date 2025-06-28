<?php

enum stateoffer: string
{
    case PENDING  = 'pending';
    case PENDANT  = 'pendant';
    case ACCEPTED = 'accepted';
    case FINISHED = 'finished';

    case DENIED = 'denied';

    case EXPIRED = 'expired';

   
    public static function fromString(string $value): stateoffer
    {
        $enum = self::tryFrom($value);
        if ($enum === null) {
            throw new InvalidArgumentException("Valore non valido per stateoffer: $value");
        }
        return $enum;
    }
}