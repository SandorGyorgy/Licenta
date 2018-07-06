<template>

<!--Footer-->
<div >
<footer class="page-footer font-small unique-color-dark pt-0">
    <div style="background-color: #138496;">
        <div class="container">
            <!--Grid row-->
            <div class="row py-4 d-flex align-items-center">

                <!--Grid column-->
                <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
                    <h6 class="mb-0 white-text">
Conectează-te cu noi pe rețelele de socializare!</h6>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-6 col-lg-7 text-center text-md-right">
                    <!--Facebook-->
                    <a class="fb-ic ml-0" :class="socialIconStyle" href="http://facebook.com" target="_blank">
                        <i class="fa-facebook" :class="socialIconStyle2"> </i>
                    </a>
                    <!--Twitter-->
                    <a class="tw-ic" :class="socialIconStyle" href="http://twitter.com" target="_blank">
                        <i class="fa-twitter" :class="socialIconStyle2"> </i>
                    </a>
                    <!--Google +-->
                    <a class="gplus-ic" :class="socialIconStyle" href="http://google.com" target="_blank">
                        <i class="fa-google-plus" :class="socialIconStyle2"> </i>
                    </a>
                    <!--Linkedin-->
                    <a class="li-ic" :class="socialIconStyle" href="http://linkedin.com" target="_blank">
                        <i class="fa-linkedin" :class="socialIconStyle2"> </i>
                    </a>
                    <!--Instagram-->
                    <a class="ins-ic" :class="socialIconStyle" href="http://instagram.com" target="_blank">
                        <i class="fa-instagram" :class="socialIconStyle2"> </i>
                    </a>
                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->
        </div>
    </div>

    <!--Footer Links-->
    <div class="container mt-5 mb-4 text-center text-md-left">
        <div class="row mt-3">

            <!--First column-->
            <div class="col-md-3 col-lg-4 col-xl-3 mb-4">
                <h6 :class="columnTitle">
                    <strong>New Way Rent</strong>
                </h6>
                <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p>New Way Rent a fost fondat in 2018. </p>
            </div>
            <!--/.First column-->

            <!--Second column-->
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                <h6 :class="columnTitle">
                    <strong>Tehnologii Folosite</strong>
                </h6>
                <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p>
                    <a href="#!">Vue js</a>
                </p>
                <p>
                    <a href="#!">Laravel</a>
                </p>
                <p>
                    <a href="#!">Google maps</a>
                </p>
                <p>
                    <a href="#!">Bootstrap</a>
                </p>
            </div>
            <!--/.Second column-->

            <!--Third column-->
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                <h6 :class="columnTitle">
                    <strong>Useful links</strong>
                </h6>
                <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p>
                    <a href="#!">Udemy</a>
                </p>
                <p>
                    <a href="#!">SkillShare</a>
                </p>
                <p>
                    <a href="#!">Treehouse</a>
                </p>
                <p>
                    <a href="#!">Udacity</a>
                </p>
            </div>
            <!--/.Third column-->

            <!--Fourth column-->
            <div class="col-md-4 col-lg-3 col-xl-3">
                <h6 :class="columnTitle">
                    <strong>Contact</strong>
                </h6>
                <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p>
                    <i class=" fa-home " :class="contactIconClass"></i> Victoriei 22 , Baia Mare</p>
                <p>
                    <i class=" fa-envelope " :class="contactIconClass"></i> newWayRent@gmail.com</p>
                <p>
                    <i class=" fa-phone " :class="contactIconClass"></i> 0756562120</p>
                <p>
                    <i class=" fa-print " :class="contactIconClass"></i> + 01 234 567 89</p>
            </div>
            <!--/.Fourth column-->

        </div>
    </div>
    <!--/.Footer Links-->

    <!-- Copyright-->
    <div class="footer-copyright py-3 text-center">
        © 2018 Copyright:
        <a >
            <strong>György Sándor</strong>
        </a>
    </div>
    <!--/.Copyright -->

</footer>
<!--/.Footer-->
</div>

</template>


<script>
export default {
  data: function() {
    return {
      contactIconClass: "fa mr-3 fa-2x",
      socialIconStyle: " fa-2x colorBlack",
      socialIconStyle2: "fa white-text mr-4",
      columnTitle: "text-uppercase font-weight-bold"
    };
  }
};
</script>


<style>
.colorBlack {
  color: black;
}
</style>