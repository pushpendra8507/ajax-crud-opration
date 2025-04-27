    $(document).ready(function () {

       
        getAllEmployee();

        function getAllEmployee() {
            $.ajax({
                url: "get_all_employee.php",
                method: "POST",
                dataType: "json",
                success: function (res) {
                    getUser(res.userdata);
                }
            });
        }


      
        // ✅ Render user data
        function getUser(response) {
            var data = "";
            $.each(response, function (index, value) {
                data += "<tr>";
                data += "<td>" + (index + 1) + "</td>";
                data += "<td>" + value.name + "</td>";
                data += "<td>" + value.email + "</td>";
                data += "<td>" + value.password + "</td>";
                data += "<td>" + value.com_name + "</td>";
                data += "<td><button class='btn btn-info btnEdit' data-id='" + value.id + "'>Edit</button></td>";
                data += "<td><button class='btn btn-danger btnDel' data-id='" + value.id + "'>Delete</button></td>";
                data += "</tr>";
            });
            $('tbody').html(data);
        }

      
        
        $('#btnAddEmployee').click(function (e) {
            e.preventDefault();

            $.ajax({
                url: "addemployee.php",
                method: "POST",
                data: $("#frm").serialize(),
                success: function (res) {
                    toastr.success(res, 'Added Successfully.', { timeout: 5000 });
                    getAllEmployee();
                    $('#exampleModal').modal('hide');
                    $('#frm')[0].reset();
                    
                },
                error: function () {
                    toastr.error('Something went wrong.', 'Error');
                }
            });
        });

       
        $('#btnData').click(function(e){
            e.preventDefault();

            $.ajax({
                url:'Add_employee.php',
                method:'post',
                data:$('#frm').serialize(),
                success:function(res){
                    toastr.success(res,'Added Successfully Employee.',{timeout:5000});
                    getAllEmployee();
                    $('#exampleModal').modal('hide');
                    $('#frm')[0].reset();
                },
                error:function(){
                    toastr.error('Somthing Went wrong.', 'error');
                }
            });
        });
        
        $("body").on("click", ".btnDel", function () {
            var $btn = $(this);
            var id = $btn.data("id");
            $.ajax({
                url: "delete_employee.php",
                method: 'POST',
                data: { uid: id },
                success: function (res) {
                    toastr.success(res, 'Removed Successfully.', { timeout: 5000 });
                    getAllEmployee();
                }
            });
        });

    
        $('body').on('click', ".btnEdit", function () {
            var $row = $(this).closest("tr");
            var id = $(this).data("id");      
            var name = $row.find("td:eq(1)").text();
            var email = $row.find("td:eq(2)").text();
            var password = $row.find("td:eq(3)").text();
            var com_name = $row.find("td:eq(4)").text();

        
            $('#vid').val(id);
            $('#name').val(name);
            $('#email').val(email);
            $('#password').val(password);
            $('#com_name').val(com_name);       
            $('#emp_id').val(id); 
            $('#exampleModal').modal("show");
            $('#btnAddEmployee').hide("");
            $('#btnEditEmployee').show("");
        });


    // Update Employee
    $('#btnEditEmployee').click(function (e) {
        e.preventDefault();
        $.ajax({
            url: "edit_employee.php",
            method: 'POST',
            data: $('#frm').serialize(), 
            success: function (res) {
                toastr.success(res, 'Updated Successfully', { timeout: 3000 });
                getAllEmployee();
                $('#exampleModal').modal("hide");
                $('#frm')[0].reset(); 
            },
            error: function () {
                toastr.error("Failed to update", "Error", { timeout: 3000 });
            }
        });
    });

    });
