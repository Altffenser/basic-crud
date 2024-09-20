<?php

namespace App\Enums;

enum PostCategoryEnum: string
{
    case Games = 'games';
    case Noticias = 'noticias';
    case Tecnologia = 'tecnologia';
    case Deportes = 'deportes';
    case Musica = 'musica';
    case Cine = 'cine';
    case Tv = 'tv';
    case Libros = 'libros';
    case Viajes = 'viajes';
    case Moda = 'moda';
    case Salud = 'salud';
    case Descargas = 'descargas';
    case Programacion = 'programacion';

    /**
     * Return label for category
     * @return string
     */

    public function getLabel(): string
    {
        return match ($this) {
            self::Games => 'Juegos',
            self::Noticias => 'Noticias',
            self::Tecnologia => 'Tecnología',
            self::Deportes => 'Deportes',
            self::Musica => 'Música',
            self::Cine => 'Cine',
            self::Tv => 'TV',
            self::Libros => 'Libros',
            self::Viajes => 'Viajes',
            self::Moda => 'Moda',
            self::Salud => 'Salud',
            self::Descargas => 'Descargas',
            self::Programacion => 'Programación',
        };
    }

    /**
     * Return icon class from Tabler Icons
     * @return string
     */
    public function getIcon(): string
    {
        return match ($this) {
            self::Games => 'device-gamepad-2',
            self::Noticias => 'news',
            self::Tecnologia => 'device-laptop',
            self::Deportes => 'play-football',
            self::Musica => 'music',
            self::Cine => 'movie',
            self::Tv => 'device-tv-old',
            self::Libros => 'book',
            self::Viajes => 'plane',
            self::Moda => 'hanger-2',
            self::Salud => 'heartbeat',
            self::Descargas => 'download',
            self::Programacion => 'code',
        };
    }

    /**
     * Assign color to category in HEX format
     * @return string
     */
    public function getColor(): string
    {
        return match ($this) {
            self::Games => '#f6c23e',
            self::Noticias => '#4e73df',
            self::Tecnologia => '#36b9cc',
            self::Deportes => '#1cc88a',
            self::Musica => '#6610f2',
            self::Cine => '#858796',
            self::Tv => '#f6c23e',
            self::Libros => '#f6c23e',
            self::Viajes => '#f6c23e',
            self::Moda => '#f6c23e',
            self::Salud => '#f6c23e',
            self::Descargas => '#f6c23e',
            self::Programacion => '#f6c23e',
        };
    }
}
