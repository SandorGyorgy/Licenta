<template>
<div class="container">

    <div class="row" >
        <div class="col-md-3 check ml-md-4">
            <h4 class="text-center"> Mesaje </h4> 

<div class="singleConv mb-2">
   <div class="row ">
        <div>
            <img 
            src="http://raisingkarma.com/images/anonymousProfile.jpg" 
            width="80px" 
            height="80px" 
            class="rounded-circle m-1"> 
        </div>

        <div class="text-left">
            <h6> Nume utilizator </h6>
            anunt
            <br>
            PRET 
         </div>    
     </div>
</div>

<div class="singleConv">
   <div class="row ">
        <div>
            <img 
            src="http://raisingkarma.com/images/anonymousProfile.jpg" 
            width="80px" 
            height="80px" 
            class="rounded-circle m-1"> 
        </div>

        <div class="text-left">
            <h6> Nume utilizator </h6>
            anunt
            <br>
            PRET 
         </div>    
     </div>
</div>
       
         

        </div>


        <div class="col-md-8 check ml-md-4">
            
            <h4 class="text-center"> Conversatia cu John Doe </h4>

        </div>
    </div>

</div>
   
</template>
<script>

</script>
<style scoped>

.check{
    border: 1px solid black;
    height: 500px;
}
#userList{
    height: 500px;
    width: 150px;
}
#mesages{
   display: flex;
}
.singleConv{
    height: 85px;
}
.singleConv :hover{
    background-color: grey;
}

</style>