<?php 

include "header.php";

include "sidemenu.php";

?>
<div class="p-4 sm:ml-64 dark:bg-gray-800 h-[100vh]">
   <div class="p-4 mt-14">

        

<form method="post" action="./inc/functions.php" class="max-w-sm">

  <div class="mb-5">
    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
    <input type="text" id="name" name="name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Enter Your Name Here" required />
  </div>

  <div class="mb-5">
    <label for="vehicle-number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Plate Number</label>
    <input type="text" id="vehicle-number" name="vehicle-number" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Enter Your Plate Number" required />
  </div>

  <div class="mb-5">
    <label for="color" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Vehicle Color</label>
    <input type="text" id="vehicle-color" name="vehicle-color" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Enter Vehicle Color" required />
  </div>

  <div class="mb-5">
    <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Vehicle Type</label>
    <select type="text" name="vehicle-type" id="vehicle-type" autocomplete="family-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
      <option value="Null">Not Selected</option>
      <option value="2 wheeler">2 wheeler</option>
      <option value="4 wheeler">4 wheeler</option>
      <option value="more than 4 wheeler">More than 4 wheeler</option>
    </select>
  </div>

  <div class="mb-5">
    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
    <input type="email" id="email" name="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Enter Your Email" required />
  </div>

  <div class="mb-5">
    <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone</label>
    <input type="phone" id="phone" name="phone" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Enter Your Phone" required />
  </div>
  
  <div class="flex items-start mb-5">
    <div class="flex items-center h-5">
      <input id="terms" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" required />
    </div>
    <label for="terms" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">I agree with the <a href="#" class="text-blue-600 hover:underline dark:text-blue-500">terms and conditions</a></label>
  </div>
  <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Record Vehicle Entry</button>
</form>


   </div>
</div>
<?php 

include "footer.php";