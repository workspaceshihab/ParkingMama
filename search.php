<?php 
include "header.php";
include "sidemenu.php";
?>

<div class="p-4 sm:ml-64 dark:bg-gray-800 h-[100vh]">
   <div class="p-4 mt-14">
      <form class="max-w-md mx-auto" method="post" action="search.php">   
         <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
         <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
               <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
               </svg>
            </div>
            <input type="search" name="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search by any field..." required />
            <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
         </div>
      </form>

      <?php
      // Update the status if 'edit_id' is set in the URL
      if (isset($_GET['edit_id'])) {
         $edit_id = intval($_GET['edit_id']);

         // Database connection parameters
         $servername = "localhost";
         $username = "root";
         $password = "";
         $dbname = "parkingmama";

         // Create connection
         $conn = new mysqli($servername, $username, $password, $dbname);

         // Check connection
         if ($conn->connect_error) {
             die("Connection failed: " . $conn->connect_error);
         }

         // Update the status
         $stmt = $conn->prepare("UPDATE parkingmamadb SET status = 'left' WHERE id = ?");
         $stmt->bind_param("i", $edit_id);
         $stmt->execute();
         $stmt->close();
         $conn->close();

         echo "Status updated successfully!<br>";
      }

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
         if (isset($_POST['search']) && !empty(trim($_POST['search']))) {
             // Database connection parameters
             $servername = "localhost";
             $username = "root";
             $password = "";
             $dbname = "parkingmama";

             // Create connection
             $conn = new mysqli($servername, $username, $password, $dbname);

             // Check connection
             if ($conn->connect_error) {
                 die("Connection failed: " . $conn->connect_error);
             } 

             // Sanitize and prepare the search term
             $search = $conn->real_escape_string(trim($_POST['search']));
             $searchTerm = "%" . $search . "%";

             // Use a prepared statement to prevent SQL injection
             $stmt = $conn->prepare("SELECT * FROM parkingmamadb WHERE id LIKE ? OR name LIKE ? OR number LIKE ? OR phone LIKE ? OR email LIKE ? OR color LIKE ? OR type LIKE ? OR entrytime LIKE ? OR status LIKE ?");
             $stmt->bind_param("sssssssss", $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm);
             
             if ($stmt->execute()) {
                 $result = $stmt->get_result();
                 if ($result->num_rows > 0) {
                     // Output the results in a table
                     echo "
                     <div class='pt-5 relative overflow-x-auto shadow-md sm:rounded-lg'>
                        <table class='w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400'>
                           <thead class='text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400'>
                              <tr>
                                 <th scope='col' class='px-6 py-3'>ID</th>
                                 <th scope='col' class='px-6 py-3'>Name</th>
                                 <th scope='col' class='px-6 py-3'>Plate Number</th>
                                 <th scope='col' class='px-6 py-3'>Phone</th>
                                 <th scope='col' class='px-6 py-3'>Email</th>
                                 <th scope='col' class='px-6 py-3'>Color</th>
                                 <th scope='col' class='px-6 py-3'>Type</th>
                                 <th scope='col' class='px-6 py-3'>Entry Time</th>
                                 <th scope='col' class='px-6 py-3'>Status</th>
                                 <th scope='col' class='px-6 py-3'><span class='sr-only'>Update</span></th>
                              </tr>
                           </thead>
                           <tbody>
                     ";

                     while ($row = $result->fetch_assoc()) {
                         echo "<tr><td class='px-6 py-4'>" . htmlspecialchars($row['id']) . "</td>";
                         echo "<td class='px-6 py-4'>" . htmlspecialchars($row['name']) . "</td>";
                         echo "<td class='px-6 py-4'>" . htmlspecialchars($row['number']) . "</td>";
                         echo "<td class='px-6 py-4'>" . htmlspecialchars($row['phone']) . "</td>";
                         echo "<td class='px-6 py-4'>" . htmlspecialchars($row['email']) . "</td>";
                         echo "<td class='px-6 py-4'>" . htmlspecialchars($row['color']) . "</td>";
                         echo "<td class='px-6 py-4'>" . htmlspecialchars($row['type']) . "</td>";
                         echo "<td class='px-6 py-4'>" . htmlspecialchars($row['entrytime']) . "</td>";
                         echo "<td class='px-6 py-4'>" . htmlspecialchars($row['status']) . "</td>";
                         echo "<td class='px-6 py-4'><a href='search.php?edit_id=" . htmlspecialchars($row['id']) . "' class='text-blue-600 hover:underline'>Update Status</a></td></tr>";
                     }

                     echo "
                           </tbody>
                        </table>
                     </div>
                     ";
                 } else {
                     echo "No results found<br>";
                 }
             } else {
                 echo "Query execution failed: " . $stmt->error . "<br>";
             }

             // Close the statement and the connection
             $stmt->close();
             $conn->close();
         } else {
             echo "Search term is required<br>";
         }
      }
      ?>
   </div>
</div>

<?php 
include "footer.php";
?>
