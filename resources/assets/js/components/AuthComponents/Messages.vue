<template>
<div class="container">

    <div class="row" >
        <div class="col-md-3 check ml-md-4 mt-2 mb-2" id="userList">
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

        <div class="text-left m-1">
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


        <div class="col-md-8 check ml-md-4 mt-2 mb-2" >
            
            <h4 class="text-center"> Conversatia cu John Doe </h4>
            <hr>
            <div id="chatbox">
    <ul>
                <li class="him">By Other User</li>
                <li class="me">By this User, first message</li>
                <li class="me">By this User, secondmessage</li>
                <li class="me">By this User, third message</li>
                <li class="me">By this User, fourth message</li>
                <li class="me">By this User, fourth message</li>
                <li class="me">By this User, fourth message</li>
                <li class="me">By this User, fourth message By this User, fourth message By this User, fourth message By this User, fourth message By this User, fourth message</li>
                <li class="me">By this User, fourth message By this User, fourth message By this User, fourth message By this User, fourth message By this User, fourth message</li>
                <li class="me">By this User, fourth message By this User, fourth message By this User, fourth message By this User, fourth message By this User, fourth message</li>
                <li class="me">By this User, fourth message By this User, fourth message By this User, fourth message By this User, fourth message By this User, fourth message</li>
                <li class="me">By this User, fourth message By this User, fourth message By this User, fourth message By this User, fourth message By this User, fourth message</li>
                <li class="me">By this User, fourth message By this User, fourth message By this User, fourth message By this User, fourth message By this User, fourth message</li>
                <li class="me">By this User, fourth message By this User, fourth message By this User, fourth message By this User, fourth message By this User, fourth message</li>
                <li class="me">By this User, fourth message By this User, fourth message By this User, fourth message By this User, fourth message By this User, fourth message</li>
                <li class="him">By Other User</li>
                <li class="him">By Other User</li>
</ul>
            </div>
        
           
     <div 
        class="container " 
       
        @keyup.enter.prevent="send"
        >
        <textarea-autosize 
         id="textArea"
        v-model="message"
        ></textarea-autosize>
        </div>

    
        </div>
           
    </div>

</div>
   
</template>
<script>
export default{
data(){
    return {
        message:''
    }
},

methods: {
    send(){
       console.log(this.message)
       this.message = '';
    }

}




}
</script>
<style scoped>
.areaDiv{
    width: 80%;
}

#chatbox{
    height: 400px;
    overflow: scroll;
    margin-bottom: 5px; 
}

ul{
  list-style: none;
  margin: 0;
  padding: 0;
}

ul li{
  display: inline;
  clear: both;
  padding: 8px;
  border-radius: 30px;
  margin-bottom: 2px;
  font-family: Helvetica, Arial, sans-serif;

}

.him{
  background: #eee;
  float: left;
}

.me{
  float: right;
  background: #0084ff;
  color: #fff;
}

.him + .me{
  border-bottom-right-radius: 5px;
}

.me + .me{
  border-top-right-radius: 5px;
  border-bottom-right-radius: 5px;
}

.me:last-of-type {
  border-bottom-right-radius: 30px;
  margin-bottom: 15px;
}


.check{
    border: 1px solid grey;
    height: 550px;
}
#userList{
    height: 550px;
    width: 150px;
    overflow: scroll;
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
#textArea{
    width: 100%;
    position: relative;
    top: 10px

}



</style>