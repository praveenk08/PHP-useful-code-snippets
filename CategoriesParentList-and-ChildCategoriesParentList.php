	
  
  public function getAllCategoriesParentList($category_id){
		if(!empty($category_id)){
			$result=$this->db->query("SELECT group_concat(c.id) as categories FROM ( SELECT @r AS _id, (SELECT @r := parent_id FROM category WHERE id = _id) AS parent_id, @l := @l + 1 AS level FROM (SELECT @r := ".$category_id.", @l := 0) vars, category m WHERE @r <> 0) d JOIN category c ON d._id = c.id");
			$response=$result->row_array();
			return $response;
		}
	 }
	 
	 public function getAllChildCategoriesList($category_id){
		if(!empty($category_id)){
			$result=$this->db->query("select group_concat(id) as categories from (select * from category order by parent_id, id) category, (select @pv := ".$category_id.") initialisation where find_in_set(parent_id, @pv) > 0 and @pv := concat(@pv, ',', id )");
			$response=$result->row_array();
			return $response;
		}
 	}
