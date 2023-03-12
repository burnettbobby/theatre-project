<!-- component -->
<section class="bg-black">
<?php if ($_SESSION['is_admin'] == 0): ?>
       <div
            class="max-w-lg bg-black px-4 pt-24 py-8 mx-auto text-left md:max-w-none md:text-center"
          >
            <h1
              class="text-3xl font-extrabold leading-10 tracking-tight text-left text-white text-center sm:leading-none md:text-6xl text-4xl lg:text-7xl"
            >
              <span class="inline text-md sm:block">Sign up to our</span>
              <span
                class=" mt-2 bg-clip-text text-transparent bg-gradient-to-r from-purple-400 via-emerald-400 to-green-500 md:inline-block"
              > Newsletter<span class="bg-clip-text text-transparent bg-gradient-to-r from-teal-500 via-cyon-400 to-purple-300">For exclusive offers</span> </span>
            </h1>
            <div
              class="mx-auto rounded-lg font-black mt-5 text-zinc-400 md:mt-12 md:max-w-lg text-center lg:text-lg"
            >
              <button class="bg-tkb border text-sm text-white py-3 px-7 rounded-full" onClick={signInNow}>
              Sign Up!
              </button>
            </div>
          </div>
          <?php elseif ($_SESSION['is_admin'] == 1): ?>
            <div class="max-w-lg bg-black px-4 pt-24 py-8 mx-auto text-left md:max-w-none md:text-center">     
              <div class="mx-auto rounded-lg font-black mt-5 text-zinc-400 md:mt-12 md:max-w-lg text-center lg:text-lg">
                

              </div>
              <footer class="bg-black pb-5">
  <div class="max-w-screen-xl px-4 pt-8 mx-auto ">
    <div class="sm:flex sm:items-center sm:justify-between">
      <div class="flex justify-center text-teal-300 sm:justify-start">
          <img class="rounded-full" src="<?= ROOT_DIR ?>assets/images/cat-roof.jfif" width="400" height="400" />
      </div>
      <p class="mt-4 text-sm text-center text-gray-400 lg:text-right lg:mt-0">
        T&C &nbsp; Career &nbsp; Privacy & Policy &nbsp; Developers
      </p>
    </div>
  </div>
</footer>
            </div>
     
       
          <?php endif ?>

  </section>

