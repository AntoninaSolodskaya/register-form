<?php
class Validator
{
    private $data;
    private $errors = [];
    private static $fields = ['username', 'email'];

    public function __construct($post_data)
    {
        $this->data = $post_data;
    }

    public function validateForm()
    {
       foreach(self::$fields as $field)
       {
           if(!array_key_exists($field, $this->data))
           {
               trigger_error($field . "is not present in data");
               return;
           }
       }

       $this->validateUsername();
       $this->validateEmail();
       $this->validatePhoto();
       $this->validateSummary();
       $this->validateAge();
       $this->validatePhone();
       return $this->errors;
    }

    private function validateUsername()
    {
       $val = trim($this->data['username']);
       if(empty($val))
       {
           $this->addError('username', 'username cannot be empty');
       } else 
       {
           if(!preg_match('/^[a-zA-Z0-9]{2,30}$/', $val))
               $this->addError('username', 'username must be 2-30 chars & alphanumeric');
        }
    }

    private function validateEmail()
    {
        $val = trim($this->data['email']);
        if(empty($val))
        {
            $this->addError('email', 'email cannot be empty');
        } else 
        {
            if(!filter_var($val, FILTER_VALIDATE_EMAIL))
                $this->addError('email', 'email must be a valid email');
        }
    }

    private function validateAge()
    {
        $val = trim($this->data['age']);
        if(empty($val))
            $this->addError('age', 'age cannot be empty');
    }

    private function validatePhone()
    {
        $val = $this->data['phone'];
        foreach ($val as $key => $value) {
            if (empty($value)) {
                $this->addError('phone', 'add phone number please');
                unset($val[$key]);
            }
        }
    }

    private function validatePhoto()
    {
        try {
            if (
                !isset($_FILES['photo']['error']) ||
                is_array($_FILES['photo']['error'])
            ) {
                throw new RuntimeException('Invalid parameters.');
            }
        
            switch ($_FILES['photo']['error']) {
                case UPLOAD_ERR_OK:
                    break;
                case UPLOAD_ERR_NO_FILE:
                    throw new RuntimeException('No file sent.');
                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE:
                    throw new RuntimeException('Exceeded filesize limit.');
                default:
                    throw new RuntimeException('Unknown errors.');
            }
        
            if ($_FILES['photo']['size'] > 1000000) {
                throw new RuntimeException('Exceeded filesize limit.');
            }
        
        
            $finfo = new finfo(FILEINFO_MIME_TYPE);
            if (false === $ext = array_search(
                $finfo->file($_FILES['photo']['tmp_name']),
                array(
                    'jpg' => 'image/jpeg',
                    'png' => 'image/png',
                    'gif' => 'image/gif',
                ),
                true
            )) {
                throw new RuntimeException('Invalid file format.');
            }
            echo 'File is uploaded successfully.';
        
        } catch (RuntimeException $e) {
            $this->addError('photo', $e->getMessage()); 
        }
    
    }

    private function validateSummary()
    {
       $val = trim($this->data['summary']);

       if(empty($val))
       {
           $this->addError('summary', 'summary cannot be empty');
       } else 
       {
           if(strlen($val) < 2)
            $this->addError('summary', 'summary must be bigger when 2 chars');
        }
    }



    private function addError($key, $val)
    {
        $this->errors[$key] = $val;
    }

}
