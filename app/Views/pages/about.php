<?= $this->extend('layouts/main') ?>

<?= $this->section('default') ?>
<main>
  <section class="relative h-screen">
    <img src="https://picsum.photos/seed/picsum/1280/720" alt="" class="absolute inset-0 w-full h-full">

    <div class="absolute inset-0 flex flex-col justify-center gap-y-4 p-8 backdrop-blur backdrop-saturate-100 bg-gray-500/20">
      <blockquote class="text-white text-4xl font-bold max-w-[40ch] [text-shadow:0_0_1px_#0B0B0B80,0_0_10px_#0B0B0B40]">
        “NVIDIA REINVENTS ITSELF EVERY SINGLE YEAR.
        WE ARE GOING TO CALL NVIDIA ‘THE GOAT,’
        THAT IS, THE GREATEST OF ALL TIME.”
      </blockquote>
      <p class="text-brand text-lg font-semibold [text-shadow:0_0_1px_#0B0B0B80]">MAD MONEY</p>
      <p class="text-white font-medium max-w-prose mt-8 [text-shadow:0_0_2px_#0B0B0B80,0_0_10px_#0B0B0B40]">NVIDIA pioneered accelerated computing to tackle challenges ordinary
        computers cannot. We make computers for the da Vincis and Einsteins
        of our time so that they can see and create the future.</p>
    </div>
  </section>
</main>
<?= $this->endSection() ?>