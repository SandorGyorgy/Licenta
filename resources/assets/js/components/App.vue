<template>
<div class="container">
 <navbar-component class="pageStyle"></navbar-component>
            <div class=" mt-2 mb-2">
                <transition name="slide" mode="out-in">
                    <router-view class="pageStyle"></router-view>
                </transition>
            </div>
 <footer-component class="pageStyle"></footer-component>
</div>
</template>

<script>
import NavbarComponent from './LayoutComponents/NavbarComponent.vue'
import FooterComponent from './LayoutComponents/FooterComponent.vue'
export default {
    components: {
        NavbarComponent,
        FooterComponent
    }
  
}
</script>

 <style>
         body{
            background-color : #C5DBE3       ;
         }

          .pageStyle{
                background-color: white;
                border-radius: 5px;}
               
       .slide-enter-active{
           animation: slide-in 150ms ease-out forwards;

       }
       .slide-leave-active{
           animation: slide-out 150ms ease-out forwards;
       }
       @keyframes slide-in{
           from {
               transform: translateY(20px);
               opacity : 0;
           }
           to {
               transform: translateX(0);
               opacity: 1;
           }
       }

       @keyframes slide-out{
           from {
   transform: translateX(0);
   opacity: 1;
           }

           to {
 transform: translateY(-20px);
               opacity : 0;
           }

       }
    

   
         </style>
