<?php 
    session_start();
    include 'components/header.php';
    include 'account/auth/dbConfig.php';
?>
  <div class="home-banner flex items-center">
    <section class=" w-full bg-center bg-gradient-to-r from-slate-900 to-stone-900">
      <div class="container mx-auto text-center text-white">
        <h1 class="text-5xl font-medium mb-6">Welcome to Clyde Theatre</h1>
        <p class="text-xl mb-12">Unmissable theatre, whenever you want it..</p>
        <a href="#" class="bg-yellow-300 py-4 px-12 rounded-full hover:bg-slate-600">WHAT'S ON</a>
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

