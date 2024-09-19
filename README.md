Font-family
<!-- default -->
font-family: Glacial-Regular
<!-- lebih cocok untuk header -->
font-family: Glacial-Bold

How to use font-family
<!-- default -->
<div class="fw-regular">
      THE 2023 NATIONAL ENGLISH OLYMPICS
</div>
<!-- semibold -->
<div class="fw-semibold">
      THE 2023 NATIONAL ENGLISH OLYMPICS
</div>
<!-- header -->
<div class="" style="font-family: Glacial-Bold">
      THE 2023 NATIONAL ENGLISH OLYMPICS
</div>

-----------------------------------------------------------------------

How to call image

php artisan storage:link in terminal

put your image in storage/app/public/...
you can also make folder for example {logo} => storage/app/public/logo/...

<!-- option 1 call statically-->
<img src="/storage/logo/NEO-WORD/Colored.png" alt="NEO" width="90" class="img-fluid">

<!-- option 2 usualy use for calling name picture from database -->
<img src="{{ asset('/storage/images/supports/' . $mediaPartner->logo) }}" alt="{{ $mediaPartner->logo }}" style="aspect-ratio: 3/2;width:100%;object-fit: contain" class="img-fluid">

------------------------------------------------------------------------

Navbar

Navbar karena pakai fixed top jadinya mirip position absolute, buat solve problem itu bisa pakai ini ya
<div class="col-12 py-4" style="visibility:hidden">padding</div>

For example: 
<x-app title="NEO 2023">
      <x-slot name="navbar"></x-slot>
      <div class="container">
            <div class="row">
                  <div class="col-12 py-4" style="visibility:hidden">padding</div>
                  <div class="col fw-regular">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, ea eius tempore nisi at, aut quas asperiores magni eveniet porro rem consectetur quis amet accusantium sapiente tempora qui velit distinctio voluptas perferendis! Eos nesciunt commodi, rem voluptas consequuntur nostrum ex itaque quia accusamus ullam dolores officia explicabo dolorum enim doloribus, adipisci suscipit, corrupti animi quos esse. Provident, qui quidem. Quia animi, libero tempore explicabo non beatae eligendi esse odio! Libero ratione nulla modi similique nemo ipsam quae sapiente quaerat doloribus quisquam beatae sit quidem a odio vel, voluptate earum culpa tempore autem alias dolorem quia quam. Iusto voluptatum maxime voluptas.sdsds
                  </div>
            </div>
      </div>
</x-app>
