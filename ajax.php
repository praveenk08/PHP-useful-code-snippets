<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('admin/_parts/header');?>

<body class="">
  <!-- Extra details for Live View on GitHub Pages -->
  <!-- Google Tag Manager (noscript) -->
  <noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0" style="display:none;visibility:hidden"></iframe>
  </noscript>
  <style>
	.clearfix {
	display: flow-root;
	}

	.error {
	color:red;
	font-size: 15px;
	}
	.mandatory{color:red;}
	</style>

 
  <!-- End Google Tag Manager (noscript) -->
  <div class="wrapper ">
    <?php  $this->load->view('admin/_parts/left_nav');?>
    <div class="main-panel">
	<?php  $this->load->view('admin/_parts/top_nav');?>
      <!-- Navbar -->
      
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
           <div class="col-md-12">
              <form id="add_update_page" accept-charset="utf-8" class="form-horizontal advocate-form" action="" method="POST" enctype="multipart/form-data">
                <div class="card ">
                  <div class="card-header card-header-rose card-header-text">
                    <div class="card-text">
                      <h4 class="card-title"><?php echo $page['id'] ? 'Update ':' Add '?> Page</h4>
                    </div>
                  </div>
                  <div class="card-body ">
				  <div id="success_message" ><?php //echo $this->session->flashdata('success_message');?></div>
					 
					<div class="row">
						<div class="form-group col-md-12">
							<label for="Page Name">Page Name<span class="mandatory">*</span></label>
                            <input type="text" name="page_name" id="page_name" class="form-control" placeholder="Page Name" value="<?php echo $page['page_name'];?>">
                            <span id="page_name_error" class="error"></span>
						</div>
						 
					</div>
					 

                    <div class="row">
                    <div class="form-group col-md-12">
              <label for="Meta Title">Meta Title<span class="mandatory">*</span></label>
                <input type="text" name="meta_title" class="form-control" id="meta_title" placeholder="Meta Title" value="<?php echo $page['meta_title'];?>">
				 <span id="meta_title_error" class="error"></span>
              </div>
			  </div>

              <div class="row">
                    <div class="form-group col-md-12">
              <label for="Meta Keywords">Meta Keywords<span class="mandatory">*</span></label>
                  <textarea name="meta_keywords" id="meta_keywords" class="form-control" placeholder="Meta Keywords"><?php echo $page['meta_keywords'];?></textarea>
				  <span id="meta_keywords_error" class="error"></span>
              </div>

              </div>

              <div class="row">
                    <div class="form-group col-md-12">
  					<label for="Meta Description">Meta Description<span class="mandatory">*</span></label>
                  <textarea name="meta_description" id="meta_description"  class="form-control" placeholder="Meta Description"><?php echo $page['meta_description'];?></textarea>
				  <span id="meta_description_error" class="error"></span>
                </div>
                </div>
				
				
                <div class="row">
                    <div class="form-group col-md-12">
  					<label for="Brief">Brief<span class="mandatory">*</span></label>
                  <textarea name="brief"  id="brief" class="form-control" placeholder="Brief"><?php echo $page['brief'];?></textarea>
				  <span id="brief_error" class="error"></span>
                  </div> 
                  </div>
				
                  <div class="row">
                    <div class="form-group col-md-12">
 					<label for="Description">Description<span class="mandatory">*</span></label>
                  <textarea name="description" class="form-control" placeholder="Description" id="description"><?php echo $page['description'];?></textarea>
				   <span id="description_error" class="error"></span>
                   </div> 
                   </div>

 
					
                    <div class="row">
                    <div class="form-group col-md-12">
                        <label for="Status">Status</label>
                        <select id="page_status" name="page_status" class="form-control">
                            <option value="1"<?php if($page['status']==1){ echo "Selected";} ?>>Active</option>
                            <option value="0" <?php if($page['status']==0){ echo "Selected";} ?>>In-active</option>
                        </select>
                        </div>
                    </div>
					
					 
					 

                  </div>
                  <div class="card-footer ml-auto mr-auto">
                    <button type="button" class="btn btn-rose" id="add_page">Save</button>
                    <a href="<?php echo base_url('admin-manage-pages');?>" class="btn btn-rose" >Cancel</a>
					<input type="hidden" name="id" id="id" value="<?php echo $page['id'];?>">
                    </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
	  <?php $this->load->view('admin/_parts/footer');?>
	 
    </div>
  </div>
   <?php $this->load->view('admin/_parts/footer_include');?>
	</body>
	</html>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	 <script>
	  $(function(){
		CKEDITOR.replace('meta_description');
		CKEDITOR.replace('brief');
		CKEDITOR.replace('description');
 	    $('#add_page').click(function(){
			buttonEnableDisable('add_page',1);
 		   $('#add_update_page input,select,textarea').css('border', '1px solid #ccc');
		   $('.error').html('');
		   var status=true;
		   var page_name=$('#page_name').val();
           var meta_title=$('#meta_title').val();
           var meta_keywords=$('#meta_keywords').val();
           var brief = trim(CKEDITOR.instances.brief.getData());
           var meta_description = trim(CKEDITOR.instances.meta_description.getData());
           var description = trim(CKEDITOR.instances.description.getData());

 		   var errorMessage=[];
		    

            if(page_name==''){
  				errorMessage['page_name']="Page Name is Required!";
            }
            
            if(meta_title==''){
  				errorMessage['meta_title']="Meta Title is Required!";
            }

            if(meta_keywords==''){
  				errorMessage['meta_keywords']="Meta Keywords is Required!";
            }

            
            if(brief==''){
  				errorMessage['brief']="Brief is Required!";
            }
            
            if(description==''){
  				errorMessage['description']="Description is Required!";
			}
			 
			for ( instance in CKEDITOR.instances )
			CKEDITOR.instances[instance].updateElement();
			 
			var errorLength=Object.keys(errorMessage).length;
 			if(errorLength>0){
				for (var key in errorMessage) {
					if (errorMessage.hasOwnProperty(key)) {           
						$('#'+key).css('border', '1px solid #cc0000');
						$('#'+key+'_error').html(errorMessage[key]);
					}
				}
				$('#success_message').html('<div class="alert alert-danger">There is error in submitting form!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				buttonEnableDisable('add_page',0);
			}else{
				 
 				  $.ajax({
					type: "POST",
					url: '<?php echo base_url('admin-save-page')?>',
					data: $('#add_update_page').serialize(),
					success: function(ajaxresponse){
						  response=JSON.parse(ajaxresponse);
						if(!response['status']){
							$.each(response, function(key, value) {
								$('#' + key).css('border', '1px solid #cc0000');
								$('#'+key+'_error').html(value);
							});
							$('#success_message').html('<div class="alert alert-danger">There is error in submitting form!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
							buttonEnableDisable('add_page',0);
						}else{
  							location.replace("<?php echo base_url('admin-manage-pages')?>");
						}  
					}
				});   
			  }
	    })
	 })
 
	 
	  </script>
    
    
    
    public function savePage(){
		if ($this->input->is_ajax_request()) {
			$response['status']=true;
   			$this->form_validation->set_rules('page_name', 'Page Name', 'trim|required');
   			$this->form_validation->set_rules('meta_title', 'Meta Title', 'trim|required');
   			$this->form_validation->set_rules('meta_keywords', 'Meta keywords', 'trim|required');
   			$this->form_validation->set_rules('meta_description', 'Meta Description', 'trim|required');
    			$this->form_validation->set_rules('description', 'Description', 'trim|required');
			 
			if ($this->form_validation->run() == FALSE) {
				$response=$this->form_validation->error_array();
				$response['status']=false;
				$response['message']='There is error in submitting form!';
			}else{
				$save_data=array(
					'id'=>$this->input->post('id')? $this->input->post('id'):0,
 					'page_name'=>$this->input->post('page_name'),
 					'meta_title'=>$this->input->post('meta_title'),
 					'meta_keywords'=>$this->input->post('meta_keywords'),
 					'meta_description'=>$this->input->post('meta_description'),
 					//'brief'=>$this->input->post('brief'),
 					'description'=>$this->input->post('description'),
 					//'status'=>$this->input->post('page_status'),
 				);
				$page_id=$this->Admin_model->AddUpdateData('cms_pages',$save_data);
				if($save_data['id']>0){
					$message="Page Updated Successfully!";
 					$id=$save_data['id'];
					$action="Updated";
 				}else{
					$message="Page Added Successfully!";
 					$id=$page_id;
					$action="Added";
 				}
				$this->session->set_flashdata('success_message',$message);
 				$slug=makeSlug($save_data['page_name'].'-'.$id);
				$update_data=array('id'=>$id,'slug'=>$slug,'modified_date'=>'now()');
				$this->Admin_model->AddUpdateData('cms_pages',$update_data);
			}
			echo json_encode($response);
		}
		return false;
    }
    
