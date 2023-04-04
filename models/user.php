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

    protected function setFields($data): void
    {
        $this->validateName($data['name'] ?? null);
        $this->validateEmail($data['email'] ?? null);
        $this->validateCity($data['city'] ?? null);
        parent::setFields($data);
    }

    private function validateName($name): void
    {
        if (empty($name)) {
            throw new InvalidArgumentException('Name cannot be empty');
        }
        if (!is_string($name)) {
            throw new InvalidArgumentException('Name is not a valid string');
        }
    }

    private function validateEmail($email): void
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException('Email is not valid');
        }
    }

    private function validateCity($city): void
    {
        if (empty($city)) {
            throw new InvalidArgumentException('City cannot be empty');
        }
        if (!is_string($city)) {
            throw new InvalidArgumentException('City is not a valid string');
        }
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
}