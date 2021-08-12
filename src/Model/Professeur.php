<?php
namespace Model;


class Professeur
{
    private int $_id;
    private string $_nom;
    private string $_prenom;
    private string $_dateNaissance;
    private string $_adresse;
    private string $_email;
    private string $_telephone;
    private string $_dateEntre;
    private string $_age;





    public function __construct(int $id, string $nom, string $prenom, string $dateNaissance, string $adresse, string $email, string $telephone, string $dateEntre,?string $age = null)
    {
        $this->_id = $id;
        $this->_nom = $nom;
        $this->_prenom = $prenom;
        $this->_dateNaissance = $dateNaissance;
        $this->_adresse = $adresse;
        $this->_email = $email;
        $this->_telephone = $telephone;
        $this->_dateEntre = $dateEntre;
        $this->_age = $age;
    }


    public function getId(): int
    {
        return $this->_id;
    }


    public function setId(int $id): void
    {
        $this->_id = $id;
    }


    public function getNom(): string
    {
        return $this->_nom;
    }


    public function setNom(string $nom): void
    {
        $this->_nom = $nom;
    }


    public function getPrenom(): string
    {
        return $this->_prenom;
    }


    public function setPrenom(string $prenom): void
    {
        $this->_prenom = $prenom;
    }


    public function getDateNaissance(): string
    {
        return $this->_dateNaissance;
    }


    public function setDateNaissance(string $dateNaissance): void
    {
        $this->_dateNaissance = $dateNaissance;
    }


    public function getAdresse(): string
    {
        return $this->_adresse;
    }


    public function setAdresse(string $adresse): void
    {
        $this->_adresse = $adresse;
    }


    public function getEmail(): string
    {
        return $this->_email;
    }


    public function setEmail(string $email): void
    {
        $this->_email = $email;
    }


    public function getTelephone(): string
    {
        return $this->_telephone;
    }


    public function setTelephone(string $telephone): void
    {
        $this->_telephone = $telephone;
    }


    public function getDateEntre(): string
    {
        return $this->_dateEntre;
    }


    public function setDateEntre(string $dateEntre): void
    {
        $this->_dateEntre = $dateEntre;
    }

    public function getAge(): string
    {
        return $this->_age;
    }

    public function setAge(string $age): void
    {
        $this->_age = $age;
    }


}