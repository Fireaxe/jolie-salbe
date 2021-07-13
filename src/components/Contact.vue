<template>
  <section id="contact" class="contact">
    <div class="row">
      <div class="col-md-12 offset-lg-1 col-lg-5">
        <h1 class="page-title">
          {{ $t("page.contact.page") }}
        </h1>
      </div>
    </div>

    <div class="row contact-block">
      <div class="col-md-12 offset-lg-1 col-lg-5">
        <h4>{{ $t("page.contact.description.contact") }}</h4>

        <div class="row">
          <div class="col-md-12 col-lg-6 p-0">
            <div class="icon-info">
              <div class="image">
                <img
                  width="24"
                  height="24"
                  src="../assets/images/phone_receiver.svg"
                  alt="phone"
                />
              </div>
              <ul>
                <li>06.62.66.87.17</li>
                <li>06.50.34.13.43</li>
              </ul>
            </div>
          </div>
          <div class="col-md-12 col-lg-6 p-0">
            <div class="icon-info">
              <div class="image">
                <img
                  width="32"
                  height="32"
                  src="../assets/images/email.svg"
                  alt="email"
                />
              </div>
              <p>
                stein.claire24@gmail.com
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12 col-lg-6 address-block">
        <h4>{{ $t("page.contact.description.address") }}</h4>

        <ul class="address">
          <li>Lieu dit : Jolysable</li>
          <li>14 rue des fontaines</li>
          <li>17800 Pons</li>
          <li>{{ $t("page.contact.description.behind") }}</li>
        </ul>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: "Contact"
};
</script>
