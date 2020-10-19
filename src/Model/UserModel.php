<?php

namespace Wog\Model;

use Wog\Http\Request;

class UserModel implements \JsonSerializable
{
    private
        /**
         * @var string
         */
        $phone, /**
     * @var string
     */
        $surname,
        /**
         * @var string
         */
        $firstName,
        /**
         * @var string
         */
        $lastName,
        /**
         * @var string
         */
        $email,
        /**
         * @var string
         */
        $adress,
        /**
         * @var string
         */
        $city,
        /**
         * @var string
         */
        $zip,
        /**
         * @var string
         */
        $password,
        /**
         * @var string
         */
        $token;

    public function __construct(
        \stdClass $data = null
    )
    {
        if (null !== $data) {
            foreach ($this as $key => $value) {
                if (property_exists($data, $key)) {
                    $this->$key = $data->$key;
                }
            }
        }
    }

    /**
     * @return mixed
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getSurname(): ?string
    {
        return $this->surname;
    }

    /**
     * @param mixed $surname
     */
    public function setSurname($surname): void
    {
        $this->surname = $surname;
    }

    /**
     * @return mixed
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getAdress(): ?string
    {
        return $this->adress;
    }

    /**
     * @param mixed $adress
     */
    public function setAdress($adress): void
    {
        $this->adress = $adress;
    }

    /**
     * @return mixed
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city): void
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getZip(): ?string
    {
        return $this->zip;
    }

    /**
     * @param mixed $zip
     */
    public function setZip($zip): void
    {
        $this->zip = $zip;
    }

    /**
     * @return mixed
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getToken(): ?string
    {
        return $this->token;
    }

    /**
     * @param mixed $token
     */
    public function setToken($token): void
    {
        $this->token = $token;
    }

    /**
     * Specify data which should be serialized to JSON
     * @link https://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        $prop = [
            "phone" => $this->phone,
            "surname" => $this->surname,
            "firstName" => array_key_exists("first_name", $this) ? $this->first_name : $this->firstName,
            "lastName" => array_key_exists("last_name", $this) ? $this->last_name : $this->lastName,
            "password" => $this->password,
            "email" => $this->email,
            "adress" => $this->adress,
            "city" => $this->city,
            "zip" => $this->zip,
//            "token" => $this->token
        ];
        return $prop;
    }
}