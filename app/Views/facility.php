<?= $this->setVar('title', 'Facilities')->extend('.layouts/main') ?>

<?= $this->section('default') ?>
<div class="bg-white py-6 sm:py-8 lg:py-12">
  <div class="max-w-screen-2xl px-4 md:px-8 mx-auto">
    <div class="flex justify-between items-center gap-8 mb-4 sm:mb-8 md:mb-12">
      <div class="flex items-center gap-12">
        <h2 class="text-gray-800 text-2xl lg:text-3xl font-bold">Facilities</h2>

        <p class="max-w-screen-sm hidden md:block text-gray-500">PTIK occupies a fairly representative and strategic building in the Fifth Campus (JPTK FTTE) of Sebelas Maret University. The campus is located on the Pabelan campus, Surakarta, which is the central campus of FKIP UNS. There are many other facilities to support the teaching and learning activities.</p>
      </div>

      <!-- <a href="#" class="inline-block bg-white hover:bg-gray-100 active:bg-gray-200 focus-visible:ring ring-indigo-300 border text-gray-500 text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-4 md:px-8 py-2 md:py-3">More</a> -->
    </div>

    <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 md:gap-6 xl:gap-8">
      <?php foreach ($facilities as $i => $facility) : ?>
        <a href="/facility/<?= $facility['id'] ?>" class="group h-48 md:h-80 flex items-end bg-gray-100 overflow-hidden rounded-lg shadow-lg relative">
          <!-- <a href="#" class="group h-48 md:h-80 md:col-span-2 flex items-end bg-gray-100 overflow-hidden rounded-lg shadow-lg relative"> -->
          <img src="<?= $facility['image_url'] ?>" loading="lazy" alt="Photo by Magicle" class="w-full h-full object-cover object-center absolute inset-0 group-hover:scale-110 transition duration-200" />

          <div class="bg-gradient-to-t from-gray-800 via-transparent to-transparent opacity-50 absolute inset-0 pointer-events-none"></div>

          <span class="inline-block text-white text-sm md:text-lg relative ml-4 md:ml-5 mb-3"><?= $facility['name'] ?></span>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
</div>
<?= $this->endSection() ?>