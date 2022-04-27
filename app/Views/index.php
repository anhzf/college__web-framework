<?= $this->extend('.layouts/main') ?>

<?= $this->section('default') ?>
<section class="flex flex-col lg:flex-row justify-between gap-6 sm:gap-10 md:gap-16">
  <div class="xl:w-5/12 flex flex-col justify-between">
    <div class="sm:text-center lg:text-left lg:py-12 xl:py-24">
      <p class="text-indigo-500 md:text-lg xl:text-xl font-semibold mb-4 md:mb-6">With very proud we</p>

      <h1 class="text-black-800 text-4xl sm:text-5xl md:text-6xl font-bold mb-8 md:mb-12">Bring the Generation into Technology</h1>

      <div class="flex flex-col sm:flex-row sm:justify-center lg:justify-start gap-2.5">
        <?= $this->setVar('children', 'About us')->include('.components/btn') ?>
        <?= $this->setData(['children' => 'Read news', 'variant' => 'secondary'])->include('.components/btn') ?>
      </div>
    </div>

    <div class="flex justify-center lg:justify-start items-center gap-4 mt-8 sm:mt-16">
      <span class="text-gray-400 text-sm sm:text-base font-semibold tracking-widest uppercase">Social</span>
      <span class="w-12 h-px bg-gray-200"></span>

      <div class="flex gap-4">
        <a href="https://www.instagram.com/ptik_uns/" target="_blank" class="text-gray-400 hover:text-gray-500 active:text-gray-600 transition duration-100">
          <?= $this->setVar('attrs', 'class="w-5 h-5"')->include('.icons/instagram') ?>
        </a>

        <a href="https://twitter.com/PTIK_uns" target="_blank" class="text-gray-400 hover:text-gray-500 active:text-gray-600 transition duration-100">
          <?= $this->setVar('attrs', 'class="w-5 h-5"')->include('.icons/twitter') ?>
        </a>
        <a href="https://www.youtube.com/channel/UCy6CiXSV1WvH514Qxy7mXeQ" target="_blank" class="text-gray-400 hover:text-gray-500 active:text-gray-600 transition duration-100">
          <?= $this->setVar('attrs', 'class="w-5 h-5"')->include('.icons/youtube') ?>
        </a>
      </div>
    </div>
  </div>

  <div class="xl:w-5/12 h-48 lg:h-auto bg-gray-100 overflow-hidden shadow-lg rounded-lg">
    <iframe src="https://www.youtube.com/embed/ijdrsNmd1YE?showinfo=0&controls=0&autoplay=1&loop=1&modestbranding=1&rel=0" frameborder="0" allowfullscreen allow="autoplay" class="w-full h-full"></iframe>
  </div>
</section>
<?= $this->endSection() ?>