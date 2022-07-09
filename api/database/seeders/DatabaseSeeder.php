<?php

namespace Database\Seeders;

use App\Models\Enums\ReservationPaymentStatus;
use App\Models\Enums\ReservationStatus;
use App\Models\Reservation;
use App\Models\ReservationPayment;
use App\Models\Room;
use App\Models\User;
use Faker\Generator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

/**
 * This seeder is dedicated for development purpose, in production please use ProductionSeeder.
 */
class DatabaseSeeder extends Seeder
{
  private Generator $faker;

  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    $faker = $this->faker = \Faker\Factory::create(config('app.locale'));

    /* Seed the users */
    /** @var User */
    $userAdmin = User::factory()->create([
      'name' => 'Admin',
      'email' => env('APP_ADMIN_EMAIL', 'admin@e-nyileh.com'),
      'role' => 'admin',
      'email_verified_at' => now(),
      'verified_by_id' => null,
      'is_internal' => true,
      'is_internal_verified_at' => null,
      'is_internal_verified_by_id' => null,
    ]);

    $users = User::factory()->count(10)->hasAdmin($userAdmin)->create();

    $userAdmin
      ->addMediaFromUrl('https://picsum.photos/200.jpg')
      ->toMediaCollection('avatar');

    $users->each(fn (User $user) => $user
      ->addMediaFromUrl('https://picsum.photos/200.jpg')
      ->toMediaCollection('avatar'));

    /* Seed the rooms */
    /** @var Room */
    $roomLabSoft = $userAdmin->addedRooms()->create([
      'name' => 'Software Engineering Laboratory',
    ]);
    $roomLabSoft->prices()->create([
      'label' => 'default',
      'price_start' => 50_000,
      'price_per_hour' => 15_000,
    ]);
    /** @var Room */
    $roomLabNet = $userAdmin->addedRooms()->create([
      'name' => 'Networking Laboratory',
    ]);
    $roomLabNet->prices()->create([
      'label' => 'default',
      'price_start' => 45_000,
      'price_per_hour' => 15_000,
    ]);
    /** @var Room */
    $roomMultimedia = $userAdmin->addedRooms()->create([
      'name' => 'Multimedia Studio',
    ]);
    $roomMultimedia->prices()->create([
      'label' => 'default',
      'price_start' => 40_000,
      'price_per_hour' => 15_000,
    ]);

    $roomLabSoft->addMedia(database_path('seeders/assets/room_software-lab.jpg'))
      ->preservingOriginal()
      ->toMediaCollection();
    $roomLabNet->addMedia(database_path('seeders/assets/room_networking-lab.png'))
      ->preservingOriginal()
      ->toMediaCollection();
    $roomMultimedia->addMedia(database_path('seeders/assets/room_multimedia-studio.jpg'))
      ->preservingOriginal()
      ->toMediaCollection();

    /* Seed facilities to created rooms */
    Collection::times($faker->numberBetween(1, 10), fn () => $roomLabSoft->facilities()->create([
      'name' => 'Whiteboard',
      'description' => $faker->paragraph(),
      'added_by_id' => $userAdmin->id,
    ])->addMediaFromStream($faker->image)->toMediaCollection());
    Collection::times($faker->numberBetween(1, 10), fn () => $roomLabSoft->facilities()->create([
      'name' => 'Computer',
      'description' => $faker->paragraph(),
      'added_by_id' => $userAdmin->id,
    ])->addMediaFromStream($faker->image)->toMediaCollection());
    Collection::times($faker->numberBetween(1, 10), fn () => $roomLabNet->facilities()->create([
      'name' => 'Router',
      'description' => $faker->paragraph(),
      'added_by_id' => $userAdmin->id,
    ])->addMediaFromStream($faker->image)->toMediaCollection());
    Collection::times($faker->numberBetween(1, 10), fn () => $roomLabNet->facilities()->create([
      'name' => 'UTP Cable',
      'description' => $faker->paragraph(),
      'added_by_id' => $userAdmin->id,
    ])->addMediaFromStream($faker->image)->toMediaCollection());
    Collection::times($faker->numberBetween(1, 10), fn () => $roomLabNet->facilities()->create([
      'name' => 'Switch',
      'description' => $faker->paragraph(),
      'added_by_id' => $userAdmin->id,
    ])->addMediaFromStream($faker->image)->toMediaCollection());
    Collection::times($faker->numberBetween(1, 10), fn () => $roomMultimedia->facilities()->create([
      'name' => 'Camera',
      'description' => $faker->paragraph(),
      'added_by_id' => $userAdmin->id,
    ])->addMediaFromStream($faker->image)->toMediaCollection());
    Collection::times($faker->numberBetween(1, 10), fn () => $roomMultimedia->facilities()->create([
      'name' => 'Microphone',
      'description' => $faker->paragraph(),
      'added_by_id' => $userAdmin->id,
    ])->addMediaFromStream($faker->image)->toMediaCollection());
    Collection::times($faker->numberBetween(1, 10), fn () => $roomMultimedia->facilities()->create([
      'name' => 'Sound System',
      'description' => $faker->paragraph(),
      'added_by_id' => $userAdmin->id,
    ])->addMediaFromStream($faker->image)->toMediaCollection());

    /* Seed reservations */
    $users->map(fn (User $user) => $user->reservations()->saveMany(
      Collection::times($faker->numberBetween(1, 5), fn () => $this->createReservations($roomLabSoft, $userAdmin, $user))
        ->concat(Collection::times($faker->numberBetween(1, 5), fn () => $this->createReservations($roomLabNet, $userAdmin, $user)))
        ->concat(Collection::times($faker->numberBetween(1, 5), fn () => $this->createReservations($roomMultimedia, $userAdmin, $user)))
    ))
      /* Attach billings */
      ->each(
        fn (Collection $reservations) => $reservations
          ->map(fn ($r) => $this->attachBillings($r))->filter()
          ->each(fn (Collection $billings) => $billings->each(fn ($b) => $this->attachAttachmentToBillings($b)))
      );
  }

  private function createReservations(Room $room, User $userAdmin, User $user)
  {
    $status = $this->faker->randomElement(ReservationStatus::cases());
    return $room->reservations()->make([
      'user_id' => $user->id,
      'start' => $this->faker->dateTimeBetween('now', '+1 month'),
      'long' => $this->faker->randomElement([$this->faker->numberBetween(1, 3) * 60, null]),
      'description_short' => $this->faker->sentence(),
      'description' => $this->faker->randomElement([$this->faker->paragraph(), null]),
      'status' => $status,
      'approval_assigned_by_id' => $status === ReservationStatus::Approved ? $userAdmin->id : null,
      'approval_assigned_at' => $status === ReservationStatus::Approved ? now() : null,
    ]);
  }

  private function attachBillings(Reservation $reservation)
  {
    $count = $this->faker->numberBetween(1, 3);
    return $reservation->user->is_internal ? null : $reservation->billings()->saveMany(
      Collection::times($count, fn ($i) => $reservation->billings()->make([
        'reservation_id' => $reservation->id,
        'billed_amount' => $reservation->countBill(),
        'status' => ($reservation->status === ReservationStatus::Approved
          ? ReservationPaymentStatus::Paid
          : ($i < $count
            ? ReservationPaymentStatus::Rejected : ReservationPaymentStatus::Pending)),
      ]))
    );
  }

  private function attachAttachmentToBillings(ReservationPayment $bill)
  {
    try {
      $bill->addMediaFromUrl("https://via.placeholder.com/200?text={$bill->billed_amount}")->toMediaCollection();
    } catch (\Spatie\MediaLibrary\MediaCollections\Exceptions\UnreachableUrl $th) {
    }
  }
}
