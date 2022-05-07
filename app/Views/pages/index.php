<?= $this->extend('layouts/main') ?>

<?= $this->section('default') ?>
<section class="flex flex-col lg:flex-row justify-between gap-6 sm:gap-10 md:gap-16">
  <div class="xl:w-5/12 flex flex-col justify-between">
    <div class="sm:text-center lg:text-left lg:py-12 xl:py-24">
      <p class="text-indigo-500 md:text-lg xl:text-xl font-semibold mb-4 md:mb-6">in the NVIDIA Studio</p>

      <h1 class="text-black-800 text-4xl sm:text-5xl md:text-6xl font-bold mb-8 md:mb-12">Experience NVIDIA Solutions Instantly—from Anywhere</h1>

      <div class="flex flex-col sm:flex-row sm:justify-center lg:justify-start gap-2.5">
        <?= $this->setData([
          'tag' => 'a',
          'attrs' => 'href="/about"',
          'children' => 'About us',
        ])->include('components/btn') ?>
        <?= $this->setData([
          'tag' => 'a',
          'attrs' => 'href="/products"',
          'variant' => 'secondary',
          'children' => 'Shop now',
        ])->include('components/btn') ?>
      </div>
    </div>

    <div class="flex justify-center lg:justify-start items-center gap-4 mt-8 sm:mt-16">
      <span class="text-gray-400 text-sm sm:text-base font-semibold tracking-widest uppercase">Social</span>
      <span class="w-12 h-px bg-gray-200"></span>

      <div class="flex gap-4">
        <a href="https://www.facebook.com/NVIDIA" target="_blank" class="text-gray-400 hover:text-gray-500 active:text-gray-600 transition duration-100">
          <?= $this->setVar('attrs', 'class="w-5 h-5"')->include('icons/facebook') ?>
        </a>
        <a href="https://www.linkedin.com/company/nvidia" target="_blank" class="text-gray-400 hover:text-gray-500 active:text-gray-600 transition duration-100">
          <?= $this->setVar('attrs', 'class="w-5 h-5"')->include('icons/linkedin') ?>
        </a>
        <a href="https://www.instagram.com/nvidia" target="_blank" class="text-gray-400 hover:text-gray-500 active:text-gray-600 transition duration-100">
          <?= $this->setVar('attrs', 'class="w-5 h-5"')->include('icons/instagram') ?>
        </a>
        <a href="https://twitter.com/nvidia" target="_blank" class="text-gray-400 hover:text-gray-500 active:text-gray-600 transition duration-100">
          <?= $this->setVar('attrs', 'class="w-5 h-5"')->include('icons/twitter') ?>
        </a>
        <a href="https://www.youtube.com/user/nvidia" target="_blank" class="text-gray-400 hover:text-gray-500 active:text-gray-600 transition duration-100">
          <?= $this->setVar('attrs', 'class="w-5 h-5"')->include('icons/youtube') ?>
        </a>
      </div>
    </div>
  </div>

  <div class="xl:w-5/12 h-48 lg:h-auto bg-gray-100 overflow-hidden shadow-lg rounded-lg">
    <iframe src="https://www.youtube.com/embed/39ubNuxnrK8?showinfo=0&controls=0&autoplay=1&loop=1&modestbranding=1&rel=0" frameborder="0" allowfullscreen allow="autoplay" class="w-full h-full"></iframe>
  </div>
</section>

<main class="flex flex-col gap-y-12 pt-12">
  <section class="bg-white py-6 sm:py-8 lg:py-12">
    <div class="max-w-screen-2xl px-4 md:px-8 mx-auto">
      <h2 class="text-gray-800 text-2xl lg:text-3xl font-bold text-center mb-4 md:mb-8 xl:mb-12">Gallery</h2>

      <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4 md:gap-6 xl:gap-8 mb-4 md:mb-8">
        <!-- image - start -->
        <a href="#" class="group h-48 md:h-80 flex items-end bg-gray-100 overflow-hidden rounded-lg shadow-lg relative">
          <img src="https://images.unsplash.com/photo-1593508512255-86ab42a8e620?auto=format&q=75&fit=crop&w=600" loading="lazy" alt="Photo by Minh Pham" class="w-full h-full object-cover object-center absolute inset-0 group-hover:scale-110 transition duration-200" />

          <div class="bg-gradient-to-t from-gray-800 via-transparent to-transparent opacity-50 absolute inset-0 pointer-events-none"></div>

          <span class="inline-block text-white text-sm md:text-lg relative ml-4 md:ml-5 mb-3">VR</span>
        </a>
        <!-- image - end -->

        <!-- image - start -->
        <a href="#" class="group h-48 md:h-80 flex items-end bg-gray-100 overflow-hidden rounded-lg shadow-lg relative">
          <img src="https://images.unsplash.com/photo-1542759564-7ccbb6ac450a?auto=format&q=75&fit=crop&w=600" loading="lazy" alt="Photo by Magicle" class="w-full h-full object-cover object-center absolute inset-0 group-hover:scale-110 transition duration-200" />

          <div class="bg-gradient-to-t from-gray-800 via-transparent to-transparent opacity-50 absolute inset-0 pointer-events-none"></div>

          <span class="inline-block text-white text-sm md:text-lg relative ml-4 md:ml-5 mb-3">Tech</span>
        </a>
        <!-- image - end -->

        <!-- image - start -->
        <a href="#" class="group h-48 md:h-80 flex items-end bg-gray-100 overflow-hidden rounded-lg shadow-lg relative">
          <img src="https://images.unsplash.com/photo-1610465299996-30f240ac2b1c?auto=format&q=75&fit=crop&w=600" loading="lazy" alt="Photo by Martin Sanchez" class="w-full h-full object-cover object-center absolute inset-0 group-hover:scale-110 transition duration-200" />

          <div class="bg-gradient-to-t from-gray-800 via-transparent to-transparent opacity-50 absolute inset-0 pointer-events-none"></div>

          <span class="inline-block text-white text-sm md:text-lg relative ml-4 md:ml-5 mb-3">Dev</span>
        </a>
        <!-- image - end -->

        <!-- image - start -->
        <a href="#" class="group h-48 md:h-80 flex items-end bg-gray-100 overflow-hidden rounded-lg shadow-lg relative">
          <img src="https://images.unsplash.com/photo-1550745165-9bc0b252726f?auto=format&q=75&fit=crop&w=600" loading="lazy" alt="Photo by Lorenzo Herrera" class="w-full h-full object-cover object-center absolute inset-0 group-hover:scale-110 transition duration-200" />

          <div class="bg-gradient-to-t from-gray-800 via-transparent to-transparent opacity-50 absolute inset-0 pointer-events-none"></div>

          <span class="inline-block text-white text-sm md:text-lg relative ml-4 md:ml-5 mb-3">Retro</span>
        </a>
        <!-- image - end -->
      </div>

      <div class="flex justify-between items-start sm:items-center gap-8">
        <p class="max-w-screen-sm text-gray-500 text-sm lg:text-base">From 3D design collaboration with NVIDIA Omniverse Enterprise to early access to VMware's Project Monterey, fast-track your enterprise projects with free curated labs.</p>

        <a href="#" class="inline-block bg-white hover:bg-gray-100 active:bg-gray-200 focus-visible:ring ring-indigo-300 border text-gray-500 text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-4 md:px-8 py-2 md:py-3">More</a>
      </div>
    </div>
  </section>

  <section class="bg-white py-6 sm:py-8 lg:py-12">
    <div class="max-w-screen-lg px-4 md:px-8 mx-auto">
      <!-- text - start -->
      <div class="mb-8 md:mb-12">
        <h2 class="text-gray-800 text-2xl lg:text-3xl font-bold text-center mb-4 md:mb-6">Our Team by the numbers</h2>

        <p class="max-w-screen-md text-gray-500 md:text-lg text-center mx-auto">This is a section of some simple filler text, also known as placeholder text. It shares some characteristics of a real written text but is random or otherwise generated.</p>
      </div>
      <!-- text - end -->

      <div class="grid grid-cols-2 md:grid-cols-4 bg-indigo-500 rounded-lg gap-6 md:gap-8 p-6 md:p-8">
        <!-- stat - start -->
        <div class="flex flex-col items-center">
          <div class="text-white text-xl sm:text-2xl md:text-3xl font-bold">200</div>
          <div class="text-indigo-200 text-sm sm:text-base">People</div>
        </div>
        <!-- stat - end -->

        <!-- stat - start -->
        <div class="flex flex-col items-center">
          <div class="text-white text-xl sm:text-2xl md:text-3xl font-bold">500+</div>
          <div class="text-indigo-200 text-sm sm:text-base">People</div>
        </div>

        <!-- stat - start -->
        <div class="flex flex-col items-center">
          <div class="text-white text-xl sm:text-2xl md:text-3xl font-bold">1000+</div>
          <div class="text-indigo-200 text-sm sm:text-base">Customers</div>
        </div>
        <!-- stat - end -->

        <!-- stat - start -->
        <div class="flex flex-col items-center">
          <div class="text-white text-xl sm:text-2xl md:text-3xl font-bold">A couple</div>
          <div class="text-indigo-200 text-sm sm:text-base">Coffee breaks</div>
        </div>
        <!-- stat - end -->
      </div>
    </div>
  </section>

  <section class="bg-white py-6 sm:py-8 lg:py-12">
    <div class="max-w-screen-2xl px-4 md:px-8 mx-auto">
      <div class="flex justify-between items-end gap-4 mb-6">
        <h2 class="text-gray-800 text-2xl text-center lg:text-3xl font-bold">
          Featured Products
        </h2>

        <a href="/products" class="inline-block bg-white hover:bg-gray-100 active:bg-gray-200 focus-visible:ring ring-indigo-300 border text-gray-500 text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-4 md:px-8 py-2 md:py-3">Show more</a>
      </div>

      <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-x-4 md:gap-x-6 lg:gap-x-12 gap-y-8">
        <?php foreach ($products ?? [] as $item) : ?>
          <!-- product - start -->
          <div>
            <a href="/products/<?= $item['id'] ?>" class="group h-40 block bg-gray-100 rounded-lg overflow-hidden relative mb-2 lg:mb-3">
              <img src="<?= $item['image'] ?>" loading="lazy" alt="<?= $item['name'] ?>" class="w-full h-full object-scale-down object-center group-hover:scale-110 transition duration-200" />

              <span class="bg-red-500 text-white text-sm tracking-wider uppercase rounded-br-lg absolute left-0 top-0 px-3 py-1.5">sale</span>
            </a>

            <div>
              <a href="#" class="text-gray-500 hover:gray-800 lg:text-lg transition duration-100 mb-1"><?= $item['name'] ?></a>

              <div class="flex items-end gap-2">
                <span class="text-gray-800 lg:text-lg font-bold"><?= $item['price'] ?></span>
              </div>
            </div>
          </div>
          <!-- product - end -->
        <?php endforeach; ?>
      </div>
    </div>
  </section>
</main>
<?= $this->endSection() ?>