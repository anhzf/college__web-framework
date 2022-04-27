<?php
$mainNavigation = [
  'Home' => '/',
  'Profile' => [
    'Vision and Mission' => '/vision-mission',
    'Facilities' => '/facility',
    'Staff' => '/staff',
    'Contact' => '/contact',
  ],
  'Academic' => [
    'Courses' => '/course'
  ],
  'News' => '/news',
  'Portfolio' => '/portfolio',
];
$titleSuffix = 'Pendidikan Teknik Informatika dan Komputer UNS';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= isset($title) ? "$title | $titleSuffix" : $titleSuffix ?></title>
  <link rel="stylesheet" href="/style.css">
  <link rel="shortcut icon" href="/assets/logo_UNS.png" type="image/x-icon">
</head>

<body>
  <div class="bg-white pb-6 sm:pb-8 lg:pb-12">
    <div class="max-w-screen-2xl min-h-screen px-4 md:px-8 mx-auto">
      <header class="sticky top-0 inset-x-0 z-50 bg-white flex justify-between items-center border-b py-4 md:py-8 mb-8 md:mb-12 xl:mb-16">
        <!-- logo - start -->
        <a href="/" class="inline-flex items-center text-black-800 text-2xl md:text-3xl font-bold gap-2.5" aria-label="logo">
          <img src="/assets/logo.png" alt="logo" class="h-12 text-indigo-500">
        </a>
        <!-- logo - end -->

        <!-- nav - start -->
        <nav class="hidden lg:flex self-stretch">
          <?php foreach ($mainNavigation as $label => $item) : ?>
            <?php if (is_array($item)) : ?>
              <div class="group relative flex items-center px-6 text-gray-600 hover:text-indigo-500 active:text-indigo-700 text-lg font-semibold transition duration-100">
                <span class="cursor-default"><?= $label ?></span>

                <div class="absolute top-[130%] -left-4 w-max min-w-[25ch] max-w-screen-sm hidden group-hover:block bg-white border rounded-md shadow-lg overflow-hidden -mt-4 mx-auto">
                  <?php foreach ($item as $subLabel => $subItem) : ?>
                    <a href="<?= $subItem ?>" class="block bg-white text-gray-500 hover:bg-gray-100 active:bg-gray-200 transition duration-100 p-4">
                      <div class="flex items-center gap-1.5 mb-1">
                        <span class="font-semibold leading-none"><?= $subLabel ?></span>
                      </div>
                    </a>
                  <?php endforeach ?>
                </div>
              </div>
            <?php else : ?>
              <a href="<?= $item ?>" class="flex items-center px-6 text-gray-600 hover:text-indigo-500 active:text-indigo-700 text-lg font-semibold transition duration-100">
                <span><?= $label ?></span>
              </a>
            <?php endif ?>
          <?php endforeach; ?>
        </nav>
        <!-- nav - end -->

        <!-- buttons - start -->
        <?= $this->setData([
          'variant' => 'flat',
          'round' => true,
          'class' => 'hidden lg:inline-block',
          'children' => $this->setVar('attrs', 'class="h-6 w-6"')->include('.icons/search'),
          'attrs' => 'onclick="alert(\'AWOKAWOKW, COMING SOON NGGIH...\')"',
        ])->include('.components/btn') ?>

        <button type="button" class="inline-flex items-center lg:hidden bg-gray-200 hover:bg-gray-300 focus-visible:ring ring-indigo-300 text-gray-500 active:text-gray-700 text-sm md:text-base font-semibold rounded-lg gap-2 px-2.5 py-2">
          <?= $this->setVar('attrs', 'class="h-6 w-6"')->include('.icons/menu-alt-1') ?>

          Menu
        </button>

      </header>

      <?= $this->renderSection('default') ?>
    </div>
  </div>

  <footer class="bg-white">
    <div class="bg-indigo-500 py-6">
      <div class="max-w-screen-2xl px-4 md:px-8 mx-auto">
        <div class="flex flex-col md:flex-row justify-between items-center gap-2">
          <div class="text-center md:text-left mb-3 md:mb-0">
            <span class="text-gray-100 font-bold uppercase tracking-widest">Newsletter</span>
            <p class="text-indigo-200">Subscribe to our newsletter</p>
          </div>

          <form class="w-full md:max-w-md flex gap-2">
            <input placeholder="Email" class="w-full flex-1 bg-indigo-400 text-white placeholder-indigo-100 border border-white focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2" />

            <button class="inline-block bg-white hover:bg-gray-100 focus-visible:ring ring-indigo-300 text-indigo-500 active:text-indigo-600 text-sm md:text-base font-semibold text-center rounded outline-none transition duration-100 px-8 py-2">Send</button>
          </form>
        </div>
      </div>
    </div>

    <div class="pt-12 lg:pt-16">
      <div class="max-w-screen-2xl px-4 md:px-8 mx-auto">
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-12 lg:gap-8 mb-16">
          <div class="col-span-full lg:col-span-2">
            <!-- logo - start -->
            <div class="lg:-mt-2 mb-4">
              <a href="/" class="inline-flex items-center text-black-800 text-xl md:text-2xl font-bold gap-2" aria-label="logo">
                <img src="/assets/logo.png" alt="logo" class="h-12 text-indigo-500">
              </a>
            </div>
            <!-- logo - end -->

            <ul class="text-gray-500 sm:pr-8 mb-6">
              <li>
                Pendidikan Teknik Informatika dan Komputer
                Kampus V JPTK FKIP UNS Pabelan
              </li>
              <li>
                <address>
                  Jl. Jend. Ahmad Yani 200A Pabelan, Kartasura, Sukoharjo 57100
                </address>
              </li>
              <li>
                <span>Phone/Fax</span>
                <span>: <a href="tel:+0271648939">(0271)648939</a></span>
              </li>
              <li>
                <span>Email</span>
                <span>: <a href="mailto:ptik@fkip.uns.ac.id">ptik@fkip.uns.ac.id</a></span>
              </li>
              <li>
                <span>Website</span>
                <span>: <a href="https://ptik.fkip.uns.ac.id" target="_blank">https://ptik.fkip.uns.ac.id</a></span>
              </li>
            </ul>

            <!-- social - start -->
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
            <!-- social - end -->
          </div>

          <!-- nav - start -->
          <div>
            <div class="text-gray-800 font-bold tracking-widest uppercase mb-4">Sitemap</div>

            <nav class="flex flex-col gap-4">
              <div>
                <a href="#" class="text-gray-500 hover:text-indigo-500 active:text-indigo-600 transition duration-100">Contact</a>
              </div>

              <div>
                <a href="#" class="text-gray-500 hover:text-indigo-500 active:text-indigo-600 transition duration-100">Documentation</a>
              </div>

              <div>
                <a href="#" class="text-gray-500 hover:text-indigo-500 active:text-indigo-600 transition duration-100">Chat</a>
              </div>

              <div>
                <a href="#" class="text-gray-500 hover:text-indigo-500 active:text-indigo-600 transition duration-100">FAQ</a>
              </div>
            </nav>
          </div>
          <!-- nav - end -->

          <!-- nav - start -->
          <div>
            <div class="text-gray-800 font-bold tracking-widest uppercase mb-4">Link</div>

            <nav class="flex flex-col gap-4">
              <div>
                <a href="#" class="text-gray-500 hover:text-indigo-500 active:text-indigo-600 transition duration-100">Terms of Service</a>
              </div>

              <div>
                <a href="#" class="text-gray-500 hover:text-indigo-500 active:text-indigo-600 transition duration-100">Privacy Policy</a>
              </div>

              <div>
                <a href="#" class="text-gray-500 hover:text-indigo-500 active:text-indigo-600 transition duration-100">Cookie settings</a>
              </div>
            </nav>
          </div>
          <!-- nav - end -->
        </div>

        <div class="text-gray-400 text-sm text-center border-t py-8">© 2021 - Present Flowrift. All rights reserved.</div>
      </div>
    </div>
  </footer>
</body>

</html>