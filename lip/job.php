<?php 
class job{
	private $db;
	public function __construct()
	{
		$this->db = new database;
	}
	//get all jobs
	public function getAllJobs()
	{
		$this->db->query('SELECT JOBS.* , categories.name AS cname  FROM jobs
			INNER JOIN categories ON jobs.category_id =
			categories.id 
			ORDER BY post_date DESC
			');//desc y3ni tnazoli
		//assign result set
		$results = $this->db->resultSet();

		return $results;
	}
	//get all categories
	public function getCategories()
	{
		$this->db->query('SELECT * FROM categories');//desc y3ni tnazoli
		//assign result set
		$results = $this->db->resultSet();

		return $results;
	}
	//get jobs by categor
	public function getByCategory($category)
	{
		$this->db->query('SELECT JOBS.* , categories.name AS cname  FROM jobs
			INNER JOIN categories ON jobs.category_id =
			categories.id 
			WHERE jobs.category_id='. $category.'
			ORDER BY post_date DESC
			');//desc y3ni tnazoli
		//assign result set
		$results = $this->db->resultSet();

		return $results;
	}

	public function getCategory($category_id)
	{

		$this->db->query('SELECT * FROM categories WHERE id = :category_id');
		$this->db->bind(':category_id',$category_id);
		//assign th row
		$row = $this->db->single();

		return $row;
	}
	
	public function getJob($id)
	{
		$this->db->query('SELECT * FROM jobs WHERE id = :id');
		$this->db->bind(':id', $id);
		//assign th row
		$row = $this->db->single();

		return $row;
	}

	public function delete($id)
	{
		$this->db->query('DELETE FROM jobs WHERE id = '.$id);

		//execute

		if($this->db->execute())
		{
			return ture;
		}
		else
		{
			return false;
		}
	}

	public function create($data)
	{
		$this->db->query('INSERT INTO 
		 jobs
		 (category_id , job_title, company ,discription,location,salary,contact_user,contact_email)
		 VALUES 
		 (:category_id , :job_title, :company ,:discription,:location,:salary,:contact_user,:contact_email)');

		$this->db->bind(':category_id',$data[':category_id']);
		$this->db->bind(':job_title',$data['job_title']);
		$this->db->bind(':company',$data['company']);
		$this->db->bind(':discription',$data['description']);
		$this->db->bind(':location',$data['location']);
		$this->db->bind(':salary',$data['salary']);
		$this->db->bind(':contact_user',$data['contact_user']);
		$this->db->bind(':contact_email',$data['contact_email']);

		//execute

		if($this->db->execute())
		{
			return ture;
		}
		else
		{
			return false;
		}

	}

	
	//update job
	public function update($id,$data)
	{
		$this->db->query("UPDATE jobs
				SET 
				category_id = :category_id,
				job_title = :job_title,
				company = :company,
				discription = :description,
				location = :location,
				salary = :salary,
				contact_user = :contact_user,
				contact_email = :contact_email 
				WHERE id =". "$id");

		$this->db->bind(':category_id',$data[':category_id']);
		$this->db->bind(':job_title',$data['job_title']);
		$this->db->bind(':company',$data['company']);
		$this->db->bind(':description',$data['description']);
		$this->db->bind(':location',$data['location']);
		$this->db->bind(':salary',$data['salary']);
		$this->db->bind(':contact_user',$data['contact_user']);
		$this->db->bind(':contact_email',$data['contact_email']);

		//execute

		if($this->db->execute())
		{
			return ture;
		}
		else
		{
			return false;
		}
	}
}