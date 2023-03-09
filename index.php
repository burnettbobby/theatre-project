<?php 
    session_start();
    include 'components/header.php';
    include 'account/auth/dbConfig.php';
?>
  <div class="bg-gray-50 flex items-center">
    <section class="w-full bg-cover bg-center py-32" style="background-image: url('<?= ROOT_DIR ?>/assets/images/shows/header-bg.jpg');">
      <div class="container mx-auto text-center text-white">
        <h1 class="text-5xl font-medium mb-6">Welcome to Clyde Theatre</h1>
        <p class="text-xl mb-12">Unmissable theatre, whenever you want it..</p>
        <a href="#" class="bg-indigo-500 text-white py-4 px-12 rounded-full hover:bg-indigo-600">WHAT'S ON</a>
      </div>
    </section>
    
  </div>
  
<?php include 'components/navigation.php'; ?>
<!-- advert component - 3 boxes -->
<?php include 'components/latest.php'; ?>
<!-- Upcoming shows -->
<?php include 'components/blogSection.php'; ?>
<?php include 'components/upcomingShows.php'; ?>
<?php include 'components/footer.php'; ?>

