<?php
namespace App\Class;

use DateTime;

class User
{
    private int $id;

    private string $nickname;

    private string $password;

    private string $role;


    private DateTime $created_at;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getNickname(): string
    {
        return $this->nickname;
    }

    /**
     * @param string $nickname
     */
    public function setNickname(string $nickname): void
    {
        $this->nickname = $nickname;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * @param string $role
     */
    public function setRole(string $role): void
    {
        $this->role = $role;
    }

    /**
     * @return int
     */
    public function getBaniereId(): int
    {
        return $this->baniere_id;
    }

    /**
     * @param int $baniere_id
     */
    public function setBaniereId(int $baniere_id): void
    {
        $this->baniere_id = $baniere_id;
    }

    /**
     * @return Date
     */
    public function getCreatedAt(): Date
    {
        return $this->created_at;
    }

    /**
     * @param Date $created_at
     */
    public function setCreatedAt(Date $created_at): void
    {
        $this->created_at = $created_at;
    }



}