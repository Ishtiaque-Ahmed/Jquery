<?php

class  User{
    private $mail;
    private $password;
    function  __construct($mail,$password)
    {
        $this->mail=$mail;
        $this->password=$password;

    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    public function log( )
    {
            echo $this->getMail().'<br>';
            echo $this->getPassword().'<br>';
            $conn=new mysqli("localhost","root","");
            if($conn)
            {
                $query="select * from user where EMail=".$this->getMail();
                $res=$conn->query($query);

                if($conn->Email==$this->getMail() && $conn->Password==$this->getPassword() )
                {
                    echo "successful";
                }
                else
                {
                    echo "unsuccessful";
                }
            }
    }



}

