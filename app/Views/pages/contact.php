<?= $this->extend('layouts/main') ?>

<?= $this->section('default') ?>
<div class="bg-white py-6 sm:py-8 lg:py-12">
  <div class="max-w-screen-2xl px-4 md:px-8 mx-auto">
    <!-- text - start -->
    <div class="mb-10 md:mb-16">
      <h2 class="text-gray-800 text-2xl lg:text-3xl font-bold text-center mb-4 md:mb-6">Contacts</h2>

      <p class="max-w-screen-md text-gray-500 md:text-lg text-center mx-auto">Get in touch with us</p>
    </div>
    <!-- text - end -->

    <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 md:gap-6 xl:gap-8">
      <a href="#" class="group h-48 md:h-96 flex justify-end items-end bg-gray-100 overflow-hidden rounded-lg shadow-lg relative">
        <?= $this->setVar('attrs', 'class="w-full h-full object-cover object-center absolute inset-0 group-hover:scale-110 transition duration-200"')->include('icons/facebook') ?>

        <div class="bg-gradient-to-t from-gray-800 via-transparent to-transparent opacity-50 absolute inset-0 pointer-events-none"></div>

        <span class="inline-block text-gray-200 text-xs md:text-sm border border-gray-500 rounded-lg backdrop-blur relative px-2 md:px-3 py-1 mr-3 mb-3">Facebook</span>
      </a>

      <a href="#" class="group h-48 md:h-96 flex justify-end items-end bg-gray-100 overflow-hidden rounded-lg shadow-lg relative">
        <?= $this->setVar('attrs', 'class="w-full h-full object-cover object-center absolute inset-0 group-hover:scale-110 transition duration-200"')->include('icons/instagram') ?>

        <div class="bg-gradient-to-t from-gray-800 via-transparent to-transparent opacity-50 absolute inset-0 pointer-events-none"></div>

        <span class="inline-block text-gray-200 text-xs md:text-sm border border-gray-500 rounded-lg backdrop-blur relative px-2 md:px-3 py-1 mr-3 mb-3">Instagram</span>
      </a>

      <a href="#" class="group h-48 md:h-96 flex justify-end items-end bg-gray-100 overflow-hidden rounded-lg shadow-lg relative">
        <?= $this->setVar('attrs', 'class="w-full h-full object-cover object-center absolute inset-0 group-hover:scale-110 transition duration-200"')->include('icons/linkedin') ?>

        <div class="bg-gradient-to-t from-gray-800 via-transparent to-transparent opacity-50 absolute inset-0 pointer-events-none"></div>

        <span class="inline-block text-gray-200 text-xs md:text-sm border border-gray-500 rounded-lg backdrop-blur relative px-2 md:px-3 py-1 mr-3 mb-3">Linkedin</span>
      </a>
    </div>
  </div>
</div>
<?= $this->endSection() ?>