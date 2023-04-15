 <?php
    include "./functions.inc.php";
    $bookArr = fetch_image();
    //  var_dump($bookArr);
    ?>
 <style>
td img{
cursor: pointer;
}
 </style>
 <!-- dash-items -->
 <section class="grid-table">
     <div class="student-table">
         <div class="table-header">
             <h2>Image Details</h2>
             <button>see all</button>
         </div>
         <div class="table-body">
             <div class="table">
                 <table width="100%">
                     <thead>
                         <tr>
                             <td>Sr.no</td>
                             <td>Name</td>
                             <td>Size</td>
                             <td>Uploaded date</td>
                             <td> Image</td>
                             <td>Action</td>
                         </tr>
                     </thead>
                     <tbody>
                         <?php

                            if (count($bookArr)) {
                                $no = 0;
                                foreach ($bookArr as $image) {
                                    $no++;
                                    echo "<tr>
                            <td>" . $no . "</td>
                            <td>" . $image['name'] . "</td>
                            <td>" . $image['size'] . "</td>
                            <td>" . $image['date'] . "</td>
                            <td><a href='./Image_details.php'><img src='" . $image['image'] . "' height='50px' width='50px' cursor='pointer'/ ></a></td>
                            <td>
                            <form action='./Images.php' method='POST'>
                            <input type='hidden' name='image_id' value=" . $image['name'] . ">
                            <button type='submit' value='submit' name='delete_image' class='form-input form-btn' margin-top='12px'>Delete Image</button>
                            </form>
                            
                            </td>
                        </tr>";
                                }
                            } else {
                                echo "<h1>No image available</h1>";
                            }

                            ?>
                     </tbody>
                 </table>
             </div>
         </div>
     </div>
 </section>