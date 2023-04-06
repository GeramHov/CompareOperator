<?php
    class Offer
    {
        private $id;
        private $destinationId;
        private $companyId;
        private $price;

        public function __construct($data)
        {
            $this->hydrate($data); 
        }
    
        public function hydrate(array $data) {
            $this->setId($data['id']);
            $this->setDestinationId($data['destination_id']);
            $this->setCompanyId($data['tour_operator_id']);
            $this->setPrice($data['price']);
        }


        public function getId()
        {
                return $this->id;
        }

        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        public function getDestinationId()
        {
                return $this->destinationId;
        }

        public function setDestinationId($destinationId)
        {
                $this->destinationId = $destinationId;

                return $this;
        }

        public function getCompanyId()
        {
                return $this->companyId;
        }

        public function setCompanyId($companyId)
        {
                $this->companyId = $companyId;

                return $this;
        }

        public function getPrice()
        {
                return $this->price;
        }

        public function setPrice($price)
        {
                $this->price = $price;

                return $this;
        }
    }
?>