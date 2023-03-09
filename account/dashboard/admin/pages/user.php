<?php 
    session_start(); 
    include '../../../auth/dbConfig.php';
    include '../../../../components/header.php'; 
    include '../../../../components/navigation.php'; 

    $users = $conn->prepare('SELECT 
        u.id,
        u.username,
        u.email,
        u.active

       FROM users u

       
      ');
$users->execute();
$users->store_result();
$users->bind_result($userID, $userName, $userEmail, $userActive);

?>
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
	<!--Responsive Extension Datatables CSS-->
	<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">

<!--table of users  -->
    

  <!-- delete popup -->
  <div 
    class="min-w-screen h-screen animated fadeIn faster fixed left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-no-repeat bg-center bg-cover"  
    style="background-image: url(https://images.unsplash.com/photo-1623600989906-6aae5aa131d4?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1582&q=80);" 
    id="delete_modal">

      <div class="absolute bg-black opacity-80 inset-0 z-0"></div>
    <div class="w-full  max-w-lg p-5 relative mx-auto my-auto rounded-xl shadow-lg  bg-white ">
      <!--content-->
      <div class="">
        <!--body-->
        <div class="text-center p-5 flex-auto justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 -m-1 flex items-center text-red-500 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 flex items-center text-red-500 mx-auto" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                </svg>
                        <h2 class="text-xl font-bold py-4 ">Are you sure <?= $userID ?></h3>
                        <p class="text-sm text-gray-500 px-8">Do you really want to delete your account?
                This process cannot be undone</p>    
        </div>
        <!--footer-->
        <div class="p-3  mt-2 text-center space-x-4 md:block">
            <button class="mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100 cancel">
                Cancel
            </button>
            <button class="mb-2 md:mb-0 bg-red-500 border border-red-500 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-red-600 delete-yes">Delete</button>
        </div>
      </div>
    </div>
  </div>
  <div class="container w-full md:w-4/5  mx-auto px-2">

		<!--Title-->
	
    <h1>ALL USERS</h1>  


		<!--Card-->
		<div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
    <button onclick="window.location.href='./addUser.php';" class="bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150" type="button">ADD USER</button>


			<table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
				<thead>
					<tr>
						<th data-priority="1">ID</th>
						<th data-priority="2">Username</th>
						<th data-priority="3">email</th>
						<th data-priority="4">Status</th>
						<th data-priority="6">Manage</th>
					</tr>
				</thead>
				<tbody>
        <?php while ($users->fetch()): ?>
					<tr>
						<td><?= $userID ?></td>
						<td><?= $userName ?></td>
						<td><?= $userEmail ?></td>
						<td>
            <?php if ($userActive == 1): ?>
          <span class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600">
            <span class="h-1.5 w-1.5 rounded-full bg-green-600"></span>
            Active
          </span>
          <?php else: ?>  

          <span class="inline-flex items-center gap-1 rounded-full bg-red-50 px-2 py-1 text-xs font-semibold text-red-600">
            <span class="h-1.5 w-1.5 rounded-full bg-red-600"></span>
            Inactive
          </span>
          <?php endif ?>
            </td>
					
						<td>
            <div class="flex justify-end gap-4">
            <button data-user-id="<?= $userID ?>" x-data="{ tooltip: 'Delete' }" class="delete-btn">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="h-6 w-6"
                x-tooltip="tooltip"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                />
              </svg>
          </button>
          <button>
            <a x-data="{ tooltip: 'Edite' }" onclick="window.location.href='../pages/editUser.php';">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="h-6 w-6"
                x-tooltip="tooltip"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"
                />
              </svg>
            </a>
            </buttn>
            <?php if ($userActive == 1): ?>
            <button onclick="window.location.href='../config/deactivateUser.php?uid=<?= $userID ?>';">
              <svg 
                xmlns="http://www.w3.org/2000/svg" 
                fill="none" 
                viewBox="0 0 24 24" 
                stroke-width="1.5" 
                stroke="currentColor" 
                class="w-6 h-6"
                >
                <path 
                  stroke-linecap="round" 
                  stroke-linejoin="round" 
                  d="M22 10.5h-6m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" 
                  />
              </svg>
            </button>
          <?php elseif ($userActive == 0): ?>
          <button onclick="window.location.href='../config/activateUser.php?uid=<?= $userID ?>';">
              <svg 
                xmlns="http://www.w3.org/2000/svg" 
                fill="none" 
                viewBox="0 0 24 24" 
                stroke-width="1.5" 
                stroke="currentColor" 
                class="w-6 h-6"
                >
                <path 
                  stroke-linecap="round" 
                  stroke-linejoin="round" 
                  d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />

              </svg>
          </button>
         <?php endif ?>


          </div>
            </td>
					</tr>
          <?php endwhile ?>
				</tbody>

			</table>


		</div>
		<!--/Card-->


	</div>
	<!--/container-->





	<!-- jQuery -->
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

	<!--Datatables -->
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
	<script>
		$(document).ready(function() {

			var table = $('#example').DataTable({
					responsive: true
				})
				.columns.adjust()
				.responsive.recalc();
		});
	</script>

  <script>
// const deleteBtn = document.querySelectorAll('.delete-btn');
const deleteModal = document.getElementById('delete_modal');
const cancel = document.querySelector('.cancel');

const deleteBtn = document.querySelectorAll('.delete-btn').forEach(item => {
  item.addEventListener('click', event => {
    //handle click 
    deleteModal.classList.add('delete-show');
    console.log('btn clicked');
    console.log(deleteBtn.dataset.data-user-id);
  })

})
// console.log(deleteBtn)
//   deleteBtn.addEventListener('click', function() {
//     deleteModal.classList.add('delete-show');
//     console.log('btn clicked');
//   });
  cancel.addEventListener('click', function() {
    deleteModal.classList.remove('delete-show');
  });


    </script>
  <?php include '../../../../components/footer.php'; ?>