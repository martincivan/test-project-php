<?php

/**
 * User model
 */
class User extends BaseModel{
	
	// Define neccessary constansts so we know from which table to load data
	const tableName = 'users';
	// ClassName constant is important for find and findOne static functions to work
	const className = 'User';
	
	// Create getter functions
	
	public function getName() {
		return $this->getField('name');
	}
	
	public function getEmail() {
		return $this->getField('email');
	}
	
	public function getCity() {
		return $this->getField('city');
	}

    public function getPhone() {
        $value = $this->getField('phone');
        return $this->denormalizePhone($value);
    }

    /**
     * @throws InvalidArgumentException
     *
     * @return void
     */
    public function insert($data = array())
    {
        parent::insert($data);
    }

    protected function setFields($data)
    {
        $this->validateName($data['name'] ?? null);
        $this->validateEmail($data['email'] ?? null);
        $this->validateCity($data['city'] ?? null);
        $this->validatePhone($data['phone'] ?? null);
        $data['phone'] = $this->normalizePhone($data['phone']);
        parent::setFields($data);
    }

    private function denormalizePhone($value)
    {
        //HACK - limitation of framework - numeric values are not escaped properly
        if (is_string($value) && !empty($value) && $value[0] === "_") {
            $value = substr($value, 1);
        }
        return $value;
    }

    private function normalizePhone($phone)
    {
        //HACK - limitation of framework - numeric values are not escaped properly
        return "_" . $phone;
    }

    private function validateName($name)
    {
        if (empty($name)) {
            throw new InvalidArgumentException('Name cannot be empty');
        }
        if (!is_string($name)) {
            throw new InvalidArgumentException('Name is not a valid string');
        }
    }

    private function validateEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException('Email is not valid');
        }
    }

    private function validateCity($city)
    {
        if (empty($city)) {
            throw new InvalidArgumentException('City cannot be empty');
        }
        if (!is_string($city)) {
            throw new InvalidArgumentException('City is not a valid string');
        }
    }

    private function validatePhone($phone)
    {
        if (empty($phone)) {
            throw new InvalidArgumentException('Phone cannot be empty');
        }
        if (!is_string($phone)) {
            throw new InvalidArgumentException('Phone is not a valid string');
        }
    }
}