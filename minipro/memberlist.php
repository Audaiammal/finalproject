<?php include 'dbcon.php';?>
<!DOCTYPE html>
<html lang="'en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>dashboard</title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <style>
            table{
                background-color:#e0f7fa;
                border-color:navy;
            }
            thead{
                background-color:navy;
                color:white;
            }
            .btn-edit{
                background-color:rgb(20,12,109);
                color:white;
            }
            .btn-delete{
                background-color: rgb(20,12,109);
                color:white;
            }
            .btn-edit:hover,.btn-delete:hover{
                opacity:0.9;
                color:white;
            }
        </style>
    </head>
    <body>
        <div class="container mt-5">
            <h3 class="text-center" style="color:navy;">Members</h3>
            <table class="table table-bordered table-responsive-md">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Rollno</th>
                        <th>Gender</th>
                        <th>Mobile Number</th>
                        <th>Year</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="userTableBody">
                    <?php
                    $query="SELECT * FROM member";
                    $result=$conn->query($query);
                    while($row=$result->fetch_assoc()){
                        echo "<tr id='member-{$row['member_id']}'>
                            <td>{$row['firstname']}</td>
                            <td>{$row['lastname']}</td>
                            <td>{$row['username']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['password']}</td>
                            <td>{$row['roll number']}</td>
                            <td>{$row['gender']}</td>
                            <td>{$row['mobile number']}</td>
                            <td>{$row['year']}</td>
                            <td>
                                <button class='btn btn-edit btn-sm' onclick='editmember({$row['member_id']})'>Edit</button>
                                <button class='btn btn-delete btn-sm' onclick='deletemember({$row['member_id']})'>Delete</button>
                            </td>
                            </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <script>
            function editmember(memberId){
                window.location.href=`edit_member.php?member_id=${memberId}`;
            }
            function deletemember(memberId){
                if(confirm('Are you share you want to delete this member?')){
                    fetch(`delete_member.php?member_id=${memberId}`)
                    .then(response=>response.text())
                    .then(data=>{
                        if(data.trim()==='success'){
                            alert('Member deleted successfully!');
                            document.getElementById(`member-${memberId}`).remove();
                        }
                        else{
                            alert(data);
                        }
                    })
                    .catch(error=>{
                        console.error('Error:',error);
                        alert('Error deleting the member');
                    });
                }
            }
        </script>
    </body>
</html>
    