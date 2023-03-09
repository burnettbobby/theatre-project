<?php 
    session_start();
    include 'components/header.php';
    include 'account/auth/dbConfig.php';
?>
  <div class="home-banner flex items-center">
    
    <section class="bg-black w-full bg-center home-banner flex items-center">
       <div
            class="max-w-lg bg-black px-4 pt-24 py-8 mx-auto text-left md:max-w-none md:text-center"
          >
            <h1
              class="text-3xl font-extrabold leading-10 tracking-tight text-left text-white text-center sm:leading-none md:text-6xl text-4xl lg:text-7xl"
            >
              <span class="logo inline sm:block">The Local Theatre Company</span>
              <span
                class="online mt-2 bg-clip-text text-transparent bg-gradient-to-r from-gray-50 via-yellow-300 to-blue-800 bg-clip-text text-transparent md:inline-block">ONLINE<span class="bg-clip-text text-transparent bg-gradient-to-r from-teal-500 via-cyon-400 to-purple-300"></span> </span>
            </h1>
            <div
              class="mx-auto rounded-lg font-black mt-5 text-zinc-400 md:mt-12 md:max-w-lg text-center lg:text-lg"
            >
              <button class="whats-on bg-tkb border text-md text-white py-3 px-7 " onClick={signInNow}>
              WHAT'S ON
              </button>
            </div>
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

