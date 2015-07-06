<?php

class BorrowerModel
{
	protected static $writePermissions = [
    'admin' => true,
    'lender' => true
    ];

    protected static $readPermissions = [
    'admin' => true,
    'lender' => true,
    null => false
    ];

    public function checkWritePermissions() {
        $role = Auth::user()->role;
        if (self::$writePermissions[$role] != true) {
            throw new UnauthorizedException('Access to table repository is denied!');
        }
    }
    
    public function checkReadPermissions() {
        $role = Auth::user()->role;
        if (self::$readPermissions[$role] != true) {
            throw new UnauthorizedException('Read access to table repository is denied!');
        }
    }

    public function add($attributes) 
    {
    	$this->checkWritePermissions();
        $rules = [
        'lname' => 'required',
        'fname' => 'required',
        'mname' => 'required',
        'gender' => 'required',
        'home_address' => 'required'
        ];

        $validator = Validator::make($attributes, $rules);
        if ($validator->passes()) 
        {
            $userId = Borrower::create($attributes)->id;
            return $userId;
        } 
        else 
        {
            throw new ErrorException("Invalid data!");
        }
    }

    public function all(array $columns = ["*"])
    {
    	$this->checkReadPermissions();
    	return Borrower::orderBy('lname')->get($columns);
    }

    public function edit($id, $attributes)
    {
        $this->checkWritePermissions();
        $borrower = Borrower::find($id);
        if ($id == null) 
        {
            throw new ErrorException("Borrower does not exist!");
        } 
        else 
        { /* Move this to LoanModel.php
            if(array_key_exists('loan_purpose',$attributes))
            {
                $loan_purpose = $attributes['loan_purpose'];
                if(gettype($loan_purpose) == 'string')
                {
                    $borrower->loan_purpose = $attributes['loan_purpose'];
                }
                else
                {
                    throw new ErrorException('Loan Purpose should be a string!');
                }
            }
            if (array_key_exists('amount', $attributes)) 
            {
                $amount = $attributes['amount'];
                if ($amount <= 0) 
                {
                    throw new ErrorException("Amount should be greater than zero!");
                    
                }
            }
            if (array_key_exists('interest', $attributes)) 
            {
                $interest = $attributes['interest'];
                if ($interest < 0) 
                {
                    throw new ErrorException("Interest should be greater than zero");
                }
                if ($interest > 100) 
                {
                    throw new ErrorException("Interest cannot go beyond 100%!");
                }
            }
            */
            if(array_key_exists('lname',$attributes))
            {
                $lname = $attributes['lname'];
                if(gettype($lname) == 'string')
                {
                    $borrower->lname = $attributes['lname'];
                }
                else
                {
                    throw new ErrorException('Last name should be a string!');
                }
            }
            if(array_key_exists('fname',$attributes))
            {
                $fname = $attributes['fname'];
                if(gettype($fname) == 'string')
                {
                    $borrower->fname = $attributes['fname'];
                }
                else
                {
                    throw new ErrorException('First name should be a string!');
                }
            }
            if(array_key_exists('mname',$attributes))
            {
                $mname = $attributes['mname'];
                if(gettype($mname) == 'string')
                {
                    $borrower->mname = $attributes['mname'];
                }
                else
                {
                    throw new ErrorException('Middle name should be a string! TIP: If borrower has no middle name, put a dash (-) as a placeholder.');
                }
            }
            if(array_key_exists('home_address',$attributes))
            {
                $home_address = $attributes['home_address'];
                if(gettype($home_address) == 'string')
                {
                    $borrower->home_address = $attributes['home_address'];
                }
                else
                {
                    throw new ErrorException('Home address should be a string!');
                }
            }
            $borrower->update();
        }
    }

    public function delete($id) 
    {
        $borrower = Borrower::find($id);
        if ($borrower != null) 
        {
            DB::table('borrowers')->where('id', $id)->delete();
            $borrower->delete();
        }
        else 
        {
            throw new Exception("Borrower not found.");
        }
    }
}