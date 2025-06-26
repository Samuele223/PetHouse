<?php
// stateoffer.php
enum stateoffer: string
{
    case PENDING  = 'pending';
    case PENDANT  = 'pendant';
    case ACCEPTED = 'accepted';
    case FINISHED = 'finished';

    case DENIED = 'denied';

    case EXPIRED = 'expired';

    /**
     * Converte una stringa in uno dei casi dell'enum.
     * Lancia un'eccezione se la stringa non è valida.
     */
    public static function fromString(string $value): stateoffer
    {
        $enum = self::tryFrom($value);
        if ($enum === null) {
            throw new InvalidArgumentException("Valore non valido per stateoffer: $value");
        }
        return $enum;
    }
}