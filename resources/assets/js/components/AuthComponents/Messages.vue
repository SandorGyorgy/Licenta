<template>
<div class="container">

    <div class="row" >
        <div class="col-md-3 check ml-md-4 mt-2 mb-2" id="userList">
            <h4 class="text-center"> Mesaje </h4> 

<div class="singleConv mb-2"
v-for="person in contacts"
:key="person.id"
@click="showConv(person.id)"
>
   <div class="row ">
        <div>
            <img 
            :src="person.profile_picture" 
            width="80px" 
            height="80px" 
            class="rounded-circle m-1"> 
        </div>

        <div class="text-left m-1">
            <h6> {{person.name}} </h6>
            
         </div>    
     </div>
</div>






       
</div>


        <div class="col-md-8 check ml-md-4 mt-2 mb-2" >
            
            <h4 class="text-center"> Conversatia cu John Doe </h4>
            <hr>
            <div id="chatbox">
            <ul
            v-for="(text , index) in conversation" :key="index"
            >
                <li class="him"  v-if="text.from == convWith">{{text.text}}</li>
                <li class="me" v-if="text.from == myId">{{text.text}}</li>
               
            </ul>
            </div>
        
           
     <div 
        class="container" 
        @keyup.enter.prevent="send(convWith)"
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
import axios from '../../axios-auth'
export default{
data(){
    return {
        message:'',
        contacts:'',
        conversation:'',
        myId: this.$store.state.userId,
        convWith :'' 
    }
},

beforeMount(){
    this.getContacts()
},

methods: {
    send(convWith){
       
       
        const text = {
            to: this.convWith,
            text : this.message
        }
       axios.post('/create/message' , text)
       .then(res => {

           this.showConv(convWith)

       })
       .catch(error => console.log(error)) 
       this.message = '';
    },
    getContacts(){

        axios.get('/contacts')
        .then(response => {
            this.contacts = response.data
             
        })
        .catch(error=>console.log(error))

    },
    showConv(id){
        this.convWith = id ;
        this.conversation = '';
        axios.get('get/messages/'+id )
        .then(res => {
            this.conversation = res.data
            console.log(res.data)
        })
       
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