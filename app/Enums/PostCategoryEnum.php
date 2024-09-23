<?php

namespace App\Enums;

enum PostCategoryEnum: string
{
    case Videogames = 'games';
    case News = 'noticias';
    case Technology = 'tecnologia';
    case Sports = 'deportes';
    case Music = 'musica';
    case Movies = 'cine';
    case Tv = 'tv';
    case Books = 'libros';
    case Travel = 'viajes';
    case Fashion = 'moda';
    case Health = 'salud';
    case Downloads = 'descargas';
    case Programming = 'programacion';

    /**
     * Return label for category
     * @return string
     */

    public function getLabel(): string
    {
        return match ($this) {
            self::Videogames => 'Videojuegos',
            self::News => 'Noticias',
            self::Technology => 'Tecnología',
            self::Sports => 'Deportes',
            self::Music => 'Música',
            self::Movies => 'Cine',
            self::Tv => 'TV',
            self::Books => 'Libros',
            self::Travel => 'Viajes',
            self::Fashion => 'Moda',
            self::Health => 'Salud',
            self::Downloads => 'Descargas',
            self::Programming => 'Programación',
        };
    }

    /**
     * Return icon class from Tabler Icons
     * @return string
     */
    public function getIcon(): string
    {
        return match ($this) {
            self::Videogames => 'device-gamepad-2',
            self::News => 'news',
            self::Technology => 'device-laptop',
            self::Sports => 'play-football',
            self::Music => 'music',
            self::Movies => 'movie',
            self::Tv => 'device-tv-old',
            self::Books => 'book',
            self::Travel => 'plane',
            self::Fashion => 'hanger-2',
            self::Health => 'heartbeat',
            self::Downloads => 'download',
            self::Programming => 'code',
        };
    }

    /**
     * Assign color to category in HEX format
     * @return string
     */
    public function getColor(): string
    {
        return match ($this) {
            self::Videogames => 'videogames',
            self::News => 'news',
            self::Technology => 'technology',
            self::Sports => 'sports',
            self::Music => 'music',
            self::Movies => 'movies',
            self::Tv => 'tv',
            self::Books => 'books',
            self::Travel => 'travel',
            self::Fashion => 'fashion',
            self::Health => 'health',
            self::Downloads => 'downloads',
            self::Programming => 'programming',
        };
    }
}
