<?php 
    class Job {
        private $db;
        public function __construct(){
            $this->db=new Dbh;

        }
//Get ALL Jobs
        public function getAllJobs(){
             $sql="SELECT jobs.*,c.name as cname FROM jobs INNER JOIN categories  as c ON jobs.categoryid=c.id order by post_date";
            $this->db->query($sql);
          $result=$this->db->resultSet();
          return $result;
            
           
        
            
        }
// GET Categories
        public function getCategories(){
            $sql="SELECT * FROM categories";
            $this->db->query($sql);
            $result=$this->db->resultSet();
            return $result;


        }
// GET Jobs by Categories
        public function getByCategories($category){
            $sql="SELECT jobs.*,c.name as cname FROM jobs INNER JOIN categories  as c ON jobs.categoryid=c.id WHERE categoryid=$category order by post_date DESC";
            $this->db->query($sql);
            $result=$this->db->resultSet();
            return $result;


        }

        // get Categroy title

        public function getCategory($category){
            $sql="SELECT *FROM  categories   WHERE id=$category ";
            $this->db->query($sql);
            
            $result=$this->db->single();
            return $result;


          }
          // get job for single page
          public function getJob($job_id){
            $sql="SELECT * FROM jobs WHERE id=$job_id";
            $this->db->query($sql);
            $result=$this->db->single();
            return $result;

          }

          // Create job 
          public function create($data){
          

            $sql="INSERT INTO jobs (categoryid,job_title,company,description,location,salary,contact_user,contact_email,user_id) 
            VALUES(:categoryid, :job_title, :company, :description, :location, :salary, :contact_user, :email,:userid)";
            $this->db->query($sql);
            $this->db->bind(':categoryid',$data['categoryid']);
            $this->db->bind(':job_title',$data['job_title']);
            $this->db->bind(':company',$data['company']);
            $this->db->bind(':description',$data['description']);
            $this->db->bind(':location',$data['location']);
            $this->db->bind(':salary',$data['salary']);
            $this->db->bind(':contact_user',$data['contact_user']);
            $this->db->bind(':email',$data['email']);
            $this->db->bind(':userid',$data['userid']);




            if($this->db->execute()){
              return true;
            }else{
              return false;
            }

          }


          //DELETE job
          public function delete($id){
            $sql="DELETE FROM jobs WHERE id=$id";
            $this->db->query($sql);
            if($this->db->execute()){
              return true;
            }else{
              return false;
            }

          }

          //UPDATE 
          public function update($id,$data){
            $sql="UPDATE jobs SET 
            categoryid=:categoryid, 
            job_title=:job_title,
            company=:company,
            description=:description,
            location=:location,
            salary=:salary,
            contact_user=:contact_user,
            contact_email=:email  
           WHERE id=$id";
            $this->db->query($sql);
            $this->db->bind(':categoryid',$data['categoryid']);
           
            $this->db->bind(':job_title',$data['job_title']);
            $this->db->bind(':company',$data['company']);
            $this->db->bind(':description',$data['description']);
            $this->db->bind(':location',$data['location']);
            $this->db->bind(':salary',$data['salary']);
            $this->db->bind(':contact_user',$data['contact_user']);
            $this->db->bind(':email',$data['email']);
          
          if($this->db->execute()){
            return true;
          }else{
            return false;
          }


          }


          //SQL CHECK USERNAME
          public function checkUsername($username){
            $sql="SELECT * FROM users WHERE username=:username";
            
            $this->db->query($sql);

            $this->db->bind(':username',$username);
            $result=$this->db->single();
            return $result;

    }


      //SQL INSERT INTO USERS

      public function insertUsers($username,$email,$password){

        $hashpwd=password_hash($password,PASSWORD_DEFAULT); //security password
          $sql="INSERT INTO users (username,email,pwdUser) VALUES (:username,:email,:password)" ;

          $this->db->query($sql);
          $this->db->bind(':username',$username);
          $this->db->bind(':email',$email);
          $this->db->bind(':password',$hashpwd);
        
          if($this->db->execute()){
            return true;
          }else{
            return false;
          }
      }

//GET USER FOR LOGIN
        public function getUserNameEmail($emailname){
          $sql="SELECT * FROM users WHERE username=:emailname OR email=:emailname";
        
        $this->db->query($sql);
        $this->db->bind(':emailname',$emailname);
        
          $result=$this->db->single();
          return $result;


        }
  
//GET Job ID where userid = userid 

      public function getJobid($id){
        $sql="SELECT id FROM jobs WHERE user_id=:id";
        $this->db->query($sql);

        $this->db->bind(':id',$id);
        $result=$this->db->resultSet();
          return $result;

      }
    }

?>