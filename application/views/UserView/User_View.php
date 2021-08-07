<?phpdefined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<?php
    $this->load->view('layout/header.php');
?>

<body>
    <div class="container">
        
        <br><br>
      
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
          Add User
        </button><br><br>


    <form id="createForm">
        <div class="modal fade" id="createModal" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Add User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">

                
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" placeholder="name" name="name">
                     </div>
                     <div class="form-group">
                        <label>Roll No</label>
                        <input type="text" class="form-control" placeholder="roll_no" name="roll_no">
                     </div>
                     <div class="form-group">
                        <label>Date of Birth</label>
                        <input type="date" class="form-control" placeholder="dob" name="dob">
                     </div>
                     <div class="form-group">
                        <label>Percentage</label>
                        <input type="text" class="form-control" placeholder="percentage" name="percentage">
                     </div>
               
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </div>
          </div>
        </div>
         </form>

        <table id="table_data" class="display table">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>Roll No</th>
                    <th>Date of Birth</th>
                    <th>Percentage</th>
                    <th>Action</th>
                </tr>
            </thead>

        </table>
    </div>
   
    <!-- edit modal -->

     <div class="modal fade" id="editModal" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">x</span>
                </button>
              </div>
              <form id="editForm">
              <div class="modal-body">

                 <div class="form-group">
                        <input type="hidden" class="form-control" placeholder="id" name="id" id="editID">
                     </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" placeholder="name" name="name" id="editName">
                     </div>
                     <div class="form-group">
                        <label>Roll No</label>
                        <input type="text" class="form-control" placeholder="roll_no" name="roll_no" id="editRoll_No">
                     </div>
                     <div class="form-group">
                        <label>Date of Birth</label>
                        <input type="date" class="form-control" placeholder="dob" name="dob" id="editDOB">
                     </div>
                     <div class="form-group">
                        <label>Percentage</label>
                        <input type="text" class="form-control" placeholder="percentage" name="percentage" id="editPercentage">
                     </div>
                </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
          </form>
            </div>
          </div>
        </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
     <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script> 
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
 
    <script type="text/javascript">

        $("#createForm").submit(function(event) {
            event.preventDefault();
            $.ajax({
                    url: "<?php echo base_url('User/create'); ?>",
                    data: $("#createForm").serialize(),
                    type: "post",
                    dataType: 'json',
                    success: function(response){
                      
                        $('#createModal').modal('hide');
                        $('#createForm')[0].reset();
                        alert('Successfully inserted');
                       $('#table_data').DataTable().ajax.reload();
                      },
                   error: function()
                   {
                    alert("error");
                   }
          });
        });

        //fetching data from database

         $(document).ready(function(){
        $('#table_data').DataTable({
            "ajax":  "<?php echo base_url('User/fetchDatafromDB'); ?>",
            "order":[],
        });

    });

        function editData(id)
        { 
            $.ajax({
                url: "<?php echo base_url('User/getEditData'); ?>",
                method:"post",
                data:{id:id},
                dataType:"json",
                success:function(response)
                {
                    $('#editID').val(response.id);
                    $('#editName').val(response.name);
                    $('#editRoll_No').val(response.roll_no);
                    $('#editDOB').val(response.dob);
                    $('#editPercentage').val(response.percentage);
                    $('#editModal').modal({
                        backdrop:"static",
                        keyboard:false,
                    });
                }
            })
        }


        $("#editForm").submit(function(event) {
            event.preventDefault();
            $.ajax({
                url: "<?php echo base_url('User/update'); ?>",
                data: $("#editForm").serialize(),
                type: "post",
                async: false,
                dataType: 'json',
                success: function(response){
                  
                    $('#editModal').modal('hide');
                    $('#editForm')[0].reset();
                    if(response==1)
                    {
                        alert('Successfully updated');

                    } 
                    else{
                        alert('Updation Failed !');
                        }
                        $('#table_data').DataTable().ajax.reload();
                  },
               error: function()
               {
                alert("error");
               }
          });
        });

        //edit function work end here

        //delete function start here
        function deleteData(id)
        {
            if(confirm('Are you sure?')==true)
            {
                $.ajax({
                    url:'<?php echo base_url('User/deleteSingleData'); ?>',
                    method:"post",
                    dataType:"json",
                    data:{id:id},
                    success:function(response)
                    {
                        if(response==1)
                        {
                            alert('Data Deleted Successfully');
                            $('#table_data').DataTable().ajax.reload();
                        }
                        else
                        {
                            alert('Deletion Failed !');
                        }
                    }
                })
            }
        }
        //delete function end here

    </script>

<?php  $this->load->view('layout/footer.php'); ?>
