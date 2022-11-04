<?php 
//Template Name: Add Post 
get_header();
if(isset($_POST['addPost'])){
    $id=wp_insert_post(
        array(
            'post_type'=>'post',
            'post_status'=>'draft',
            'post_title'=>$_POST['title'],
            'post_content'=>$_POST['description'],     
        )
    );

    wp_set_object_terms($id,$_POST['category-name'],'category');
}

$cat = get_categories(
    array('taxonomy'=>'category')
);

?>


<div class="container">
    <div class="row">
    <div class="col-10 m-auto mb-5"> <h1><?php  the_title(); ?></h1></div>
        <div class="col-10 m-auto">
                        <form method="post" class="formdata">
               
                <div class="form-group mb-3">
                    <label for="inputAddress">Add Title</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="Title" name="title" required>
                </div>
                <div class="form-group mb-3">
                    <label for="inputAddress2">Add Description</label>
                    <textarea class="form-control " id="validationTextarea" placeholder="Description" name="description" required></textarea>
                </div>
                <div class="form-group mb-3 ">
                    <label for="inputState">State</label>
                    <select id="inputState" class="form-control" name="category-name">
                      
                            <option >select category</option>
                            <?php 
                        foreach($cat as $value){
                            ?> 
                            <option value="<?php echo $value->name ?>"><?php echo $value->name ?></option>

                         <?php 
                        }
                        ?>  
                       
                    </select>
                </div>

                <div class="form-group mb-3 ">
                    <div class="custom-file">
                    <label class="custom-file-label" for="customFile">Add Feature Image</label>
                    <input type="file" class="custom-file-input" id="customFile" name="feature-image">
                    </div>
                </div>

                <div class="form-group mb-3">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        Check me out
                    </label>
                    </div>
                </div>
                <button name="addPost" type="submit" class="btn btn-primary">Add Post</button>
                </form>
        </div>
    </div>
</div>


<?php
get_footer();
?> 