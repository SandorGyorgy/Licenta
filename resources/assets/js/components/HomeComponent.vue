<template>

<div class="p-3 ">
        <div class="row mb-4 ml-1 mr-1">
            <div class=" text-center col-md-4 mb-2 container mx-auto" style="width: 250px;"  id="form-container">
                <form action="">
                    <h5 class="card-title">Card title</h5>

                    <div class="card-body ">
                        <div class="card-text">

                            <div :class="formClasses">
                            <label for="oras"> Oras : </label>
                            <input type="text" id="oras">
                        </div>

                         <div :class="formClasses">
                            <label for="pret"> Pret : </label>
                            <input type="text" id="pret">
                        </div>

                         <div :class="formClasses">
                            <label for="camere"> Camere : </label>
                            <input type="text" id="camere">
                        </div>

                        </div>

                      <a class="btn btn-primary mt-3">Go somewhere</a>

                    </div>

                </form>
            </div>

<div class="col-md-4"></div>

       <div class="card mr-2 mx-auto " style="width: 20rem;">
                <img class="card-img-top" src="https://vignette.wikia.nocookie.net/arianagrande/images/7/70/Example.png/revision/latest?cb=20160301231046" alt="">
        <div class="card-body ">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
        </div>
    </div>



    
    <div class="card-deck text-center mr-1 ">

        <div class="card " style="width: 18rem;">
                <img class="card-img-top" src="https://vignette.wikia.nocookie.net/arianagrande/images/7/70/Example.png/revision/latest?cb=20160301231046" alt="">
        <div class="card-body ">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
        </div>

        <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="https://vignette.wikia.nocookie.net/arianagrande/images/7/70/Example.png/revision/latest?cb=20160301231046" alt="">
        <div class="card-body ">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
        </div>


        <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="https://vignette.wikia.nocookie.net/arianagrande/images/7/70/Example.png/revision/latest?cb=20160301231046" alt="">
        <div class="card-body ">
            <h5 class="card-title ">Card title</h5>
            <p class="card-text ">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary  ">Go somewhere</a>
        </div>
        </div>

    </div>


     
</div>

</template>
<script>

export default {
    data : function() {
        return{
            formClasses: 'form-group float-right mr-1'
        }
    }

}


</script>

<style scoped >

.alignCenter{

    text-align: center;
    align-items: center;

}
#form-container{
    width: 250px;
    border: 1px solid black;
    border-radius: 5px;
    height: 350px;


}
   

</style>