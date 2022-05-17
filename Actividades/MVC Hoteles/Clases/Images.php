<?php

class Images
{
    private int $id;
    private int $hotelID;
    private string $url;

    /**
     * @param int $id
     * @param int $hotelID
     * @param string $url
     */
    public function __construct(int $id, int $hotelID, string $url)
    {
        $this->id = $id;
        $this->hotelID = $hotelID;
        $this->url = $url;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getHotelID(): int
    {
        return $this->hotelID;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }


}