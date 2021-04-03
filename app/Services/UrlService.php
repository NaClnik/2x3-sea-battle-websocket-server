<?php


namespace App\Services;


class UrlService
{
    // Поля класса.
    private string $server_url;

    public function __construct()
    {
    } // __construct.

    #region Аксессоры класса
    // Аксессоры класса.
    /**
     * @return string
     */
    public function getServerUrl(): string
    {
        return $this->server_url;
    }
    #endregion

    public function fillProperties()
    {
        $this->server_url = 'http://sea-battle-backend-aliciesy';
    } // fillProperties.
} // UrlService.