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