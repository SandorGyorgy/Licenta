<template>
<div class="container">
 <navbar-component class="pageStyle" style="display:block;"></navbar-component>
            <div class=" mt-2 mb-2" style="display:block !important;">
                <transition name="slide" mode="out-in">
                    <router-view class="pageStyle" style="display:block !important;"></router-view>
                </transition>
            </div>
 <footer-component class="pageStyle" style="display:block;"></footer-component>
</div>
</template>

<script>
import NavbarComponent from "./LayoutComponents/NavbarComponent.vue";
import FooterComponent from "./LayoutComponents/FooterComponent.vue";
export default {
  components: {
    NavbarComponent,
    FooterComponent
  },
  created() {
    this.$store.dispatch("tryAutoLogin");
  }
};
</script>

 <style>
body {
  background-color: #c5dbe3;
}

.pageStyle {
  background-color: white;
  border-radius: 5px;
}

.slide-enter-active {
  animation: slide-in 150ms ease-out forwards;
}
.slide-leave-active {
  animation: slide-out 150ms ease-out forwards;
}
@keyframes slide-in {
  from {
    transform: translateY(20px);
    opacity: 0;
  }
  to {
    transform: translateX(0);
    opacity: 1;
  }
}

@keyframes slide-out {
  from {
    transform: translateX(0);
    opacity: 1;
  }

  to {
    transform: translateY(-20px);
    opacity: 0;
  }
}
</style>
