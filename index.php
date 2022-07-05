<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <title>CRUD</title>
</head>

<body>
  <div class="container text-center mt-5">
        <div class="row" >
            <!-- Button trigger modal -->
            <div class="d-flex justify-content-end mb-5">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Add User
                </button>
            </div> 
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="row" id="addForm" method="post">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label float-start">Name</label>
                                    <input type="text" class="form-control" id="inputName" aria-describedby="emailHelp"
                                        name="name" />
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label float-start">Address</label>
                                    <input type="text" class="form-control" id="inputAddress" name="address" />
                                </div>
                                <div class="d-flex mb-3 ">
                                    <input type="radio" class="p-1" name="cast" value="genral" />
                                    <label for="html" class="p-1">Genral</label><br />
                                    <input type="radio" name="cast" value="obc"  />
                                    <label for="css" class="p-1">OBC</label><br />
                                    <input type="radio" name="cast" value="sc/st"  />
                                    <label for="css" class="p-1">SC/ST</label><br />
                                </div>
                                <div class="mb-3">
                                    <label for="productImage" class="form-label float-start">Image:</label>
                                    <input class="form-control" type="file" id="productImage" name="productImage" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label float-start">Hobbies</label>
                                    <select id="chooseCompany" class="form-select" name="chooseHobbie">
                                        <option value="reading">reading</option>
                                        <option value="writing">writing</option>
                                        <option value="trecking">trecking</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-primary submit">
                                Save changes
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="text-center mt-3">
            <table class="col-md-12 table table-striped" id="show-hidden-row" role="grid"
                aria-describedby="show-hidden-row_info" >
                <thead>
                    <tr role="row">
                        <th class="w-25 sorting_asc" tabindex="0" aria-controls="show-hidden-row" rowspan="1"
                            colspan="1" style="width: 182px;" aria-sort="ascending"
                            aria-label="Products: activate to sort column descending">Profile image</th>
                        <th class="sorting" tabindex="0" aria-controls="show-hidden-row" rowspan="1" colspan="1"
                            style="width: 54px;" aria-label="Brand: activate to sort column ascending">Name
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="show-hidden-row" rowspan="1" colspan="1"
                            style="width: 63px;" aria-label="Location: activate to sort column ascending">
                            Address</th>
                        <th class="sorting" tabindex="0" aria-controls="show-hidden-row" rowspan="1" colspan="1"
                            style="width: 83px;" aria-label="Description: activate to sort column ascending">
                           Cast</th>
                        <th class="sorting" tabindex="0" aria-controls="show-hidden-row" rowspan="1" colspan="1"
                            style="width: 50px;" aria-label="Weight: activate to sort column ascending">Hobbie
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="show-hidden-row" rowspan="1" colspan="1"
                            style="width: 50px;" aria-label="Weight: activate to sort column ascending">Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                <?php
                        require_once("connection.php");
                        $sql = "SELECT * FROM user_details ORDER BY id DESC";
                        $res = mysqli_query($con, $sql);
                        while ($data = mysqli_fetch_array($res)) {
                            $id=$data['id'];
                            $name = $data['name'];
                            $address = $data['address'];
                            $cast = $data['cast'];
                            $image = $data['image'];
                            $hobbie = $data['hobbie'];
                            ?>
                       <tr role="row" class="odd">
                        <td tabindex="0" class="sorting_1"><img src="images/<?php echo $image; ?>"
                                class="w-25"></td>
                        <td><?php echo $name; ?> </td>
                        <td style=""><?php echo $address; ?></td>
                        <td style=""><?php echo $cast; ?></td>
                        <td style=""><?php echo $hobbie; ?></td>
                        <td id="<?php echo $id; ?>" class="w-25">
                            <a class="btn btn-primary btn-sm edit-btn" href="javascript:void(0);"
                                data-original-title="btn btn-primary btn-xs" title="" data-bs-toggle="modal"
                                data-bs-target="#editModal1" data-bs-original-title="">
                                <!--<i class="icon-pencil-alt"></i>-->
                                Edit
                            </a>
                          
                            <a class="btn btn-danger btn-sm delete-btn" href="javascript:void(0);"
                                data-original-title="btn btn-danger btn-xs" title="" data-bs-original-title="">
                                <!--<i class="icon-trash"></i>-->
                                Delete
                            </a>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
            </div>
            <div class="modal fade" id="editModal1" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit</h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal"
                                aria-label="Close" data-bs-original-title="" title=""></button>
                        </div>
                        <div class="modal-body">
                        <div class="mb-3">
                                <label for="exampleeditinputEmail1" class="form-label float-start">Name</label>
                                <input type="text" class="form-control" id="editinputName" aria-describedby="emailHelp"
                                    name="editname" value=""/>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label float-start">Address</label>
                                <input type="text" class="form-control" id="editinputAddress" name="editaddress" value=""/>
                            </div>
                            <div class="d-flex mb-3 ">
                                <input type="radio" id="radio-btn1" class="p-1" name="editcast" value="genral" />
                                <label for="html" class="p-1">Genral</label><br />
                                <input type="radio" id="radio-btn2"  name="editcast" value="obc"   />
                                <label for="css" class="p-1">OBC</label><br />
                                <input type="radio" id="radio-btn3"  name="editcast" value="sc/st"  />
                                <label for="css" class="p-1">SC/ST</label><br />
                            </div>
                            <div class="mb-3">
                                <label for="productImage" class="form-label float-start">Image:</label>
                                <input class="form-control" type="file" id="editproductImage" name="editImage" value="" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label float-start">Hobbies</label>
                                <select id="choosehobbie" class="form-select" name="editchooseHobbie">
                                    <option value="reading">reading</option>
                                    <option value="writing">writing</option>
                                    <option value="trecking">trecking</option>
                                </select>
                            </div>
                            <div class="mb3 update-msg d-none">
                                Updated successfully.
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary update-btn" type="button"
                                data-bs-original-title="" title="">Update</button>
                            <input type="hidden" id="hidden_input">
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(".submit").click(function (e) {
            e.preventDefault;
            let form = $('#addForm')[0];
            let formData = new FormData(form);
            console.log([...formData])
            $.ajax({
                type: "POST",
                url: "addStudent.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response == "success") {
                        $(".success-msg").removeClass("d-none");
                         location.reload(true);
                    } else if (response == "") {
                        alert("no response");
                    }
                    else {
                        alert(response);
                    }
                }
            });
        })
      $(".delete-btn").click(function(){
          if (confirm("Are you sure you want to delete?") == true) {
            let id = $(this).closest('td').attr('id');
              $.ajax({
                  type: "POST",
                  url: "delete.php",
                  data: {"id":id},
                  success: function()
                  {
                      location.reload(true);
                  }
              });
          }
      })
      $(".edit-btn").click(function(){
          let id = $(this).closest('td').attr('id');
          $.ajax({
              type: "POST",
              url: "edit.php",
              data: { "id":id},
              success: function(res)
              {  let data = JSON.parse(res)
                 $('#editinputName').val(data.name)
                 $('#editinputAddress').val(data.address)
                 $('#choosehobbie').val(data.hobbie)
                 $('#hidden_input').val(data.id)
                 if(data.cast == 'sc/st'){
                    $('#radio-btn3').prop('checked', true)
                 } else if (data.cast == 'genral') {
                    $('#radio-btn1').prop('checked', true)
                } else {
                    $('#radio-btn2').prop('checked', true)
                }
              }
          });
      })
      $(".update-btn").click(function(){
          let id = $('#hidden_input').val();
          let name = $('#editinputName').val();
          let address =  $('#editinputAddress').val();
          let image = $("input[name=editImage]").val();
          let cast = $("input[name=editcast]").val();
          let  hobbie = $('#choosehobbie').val()
          console.log(id,name,address,image,cast,hobbie);
          $.ajax({
              type: "POST",
              url: "update.php",
              data: { "image":image,"id":id, "name":name,"address":address,"cast":cast,"hobbie":hobbie },
              success: function(res){
                location.reload(true);
              }
        })
    })   
    </script>
</body>

</html>