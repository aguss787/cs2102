<?php
    include __DIR__ . '/../db/dbhandler.php';
    include __DIR__ . '/exceptions.php';

    class Pet {
        private $isFromDb;
        private $db;
        private $email;
        private $password;
        private $firstName;
        private $lastName;
        private $address;
        private $contactNumber;
        private $activate;

        private function __construct($isFromDb = false) {
            $this->db = new DbHandler();
            $this->isFromDb = $isFromDb;
        }

        public static function withProperties($email = NULL, 
                                              $password = NULL, 
                                              $firstName = NULL, 
                                              $lastName = NULL,
                                              $address = NULL, 
                                              $contactNumber = NULL,
                                              $activate = NULL) {
            $result = new User(false);
            $result->setEmail($email);
            $result->setPassword($password);
            $result->setFirstName($firstName);
            $result->setLastName($lastName);
            $result->setAddress($address);
            $result->setContactNumber($contactNumber);
            $result->setStatus($activate ? "true" : "false");

            return $result;
        }

        public static function loadFromDb($email) {
            $user = new User(true);

            $db = $user->getDbHandler();
            $result = $db->runQuery(
                "SELECT * FROM users WHERE email = '$email'"
            );

            if(count($result) == 0) {
                throw ElementNotFound();
            }
            $result = $result[0];

            $user->setEmail($result->email);
            $user->setPlainPassword($result->password);
            $user->setFirstName($result->first_name);
            $user->setLastName($result->last_name);
            $user->setAddress($result->address);
            $user->setContactNumber($result->contact_number);
            $user->setStatus($result->activate ? "true" : "false");

            return $user;
        }

        public function save() {
            $db = $this->db;

            $email = $this->getEmail();
            $password = $this->getPassword();
            $firstName = $this->getFirstName();
            $lastName = $this->getLastName();
            $address = $this->getAddress();
            $contactNumber = $this->getContactNumber();
            $activate = $this->getStatus();

            $db->runQuery(
                "INSERT INTO users " .
                "VALUES (" .
                    "'$email', " .
                    "'$password', " .
                    "'$firstName', " .
                    "'$lastName', " .
                    "'$address', " .
                    "'$contactNumber', " .
                    "'$activate' " .
                ") ON CONFLICT (email) DO UPDATE " .
                "SET " .
                    "password = excluded.password, " .
                    "first_name = excluded.first_name, " .
                    "last_name = excluded.last_name, " .
                    "address = excluded.address, " .
                    "contact_number = excluded.contact_number, " .
                    "activate = excluded.activate" .
                ";"
            );
        }

        public function setEmail($email) {
            return $this->email = $email;
        }

        public function setPassword($password) {
            return $this->password = md5($password);
        }

        public function setPlainPassword($password) {
            return $this->password = $password;
        }

        public function setFirstName($firstName) {
            return $this->firstName = $firstName;
        }

        public function setLastName($lastName) {
            return $this->lastName = $lastName;
        }

        public function setAddress($address) {
            return $this->address = $address;
        }

        public function setContactNumber($contactNumber) {
            return $this->contactNumber = $contactNumber;
        }

        public function setStatus($activate) {
            return $this->activate = $activate;
        }

        public function getEmail() {
            return $this->email;
        }

        public function getPassword() {
            return $this->password;
        }

        public function getFirstName() {
            return $this->firstName;
        }

        public function getLastName() {
            return $this->lastName;
        }

        public function getFullName() {
            return $this->firstName . " " . $this->lastName;
        }

        public function getAddress() {
            return $this->address;
        }

        public function getContactNumber() {
            return $this->contactNumber;
        }

        public function getStatus() {
            return $this->activate;
        }

        public function getDbHandler() {
            return $this->db;
        }
    }
?>