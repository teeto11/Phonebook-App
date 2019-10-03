<template>
    <div>
        <nav class="panel column is-offset-2 is-8">
        <p class="panel-heading">
            PhoneBook
            <button class="button is-primary is-outlined" @click="showmodal">
            Add New
        </button>
        </p>
        
        <div class="panel-block">
            <p class="control has-icons-left">
            <input class="input is-small" type="text" placeholder="search" v-model="searchquery">
            <span class="icon is-small is-left">
                <i class="fas fa-search" aria-hidden="true" ></i>
            </span>
            </p>
        </div>
        
        <a class="panel-block is-active"  v-for="(item,index) in temp" :key="index">
            <span class=" column is-9">
                   {{item.name}}
            </span>
            <span class="panel-icon column is-1">
            <i class=" has-text-danger fa fa-trash" @click="del(index,item.id)" aria-hidden="true"></i>
            </span>
            <span class="panel-icon column is-1">
            <i class=" has-text-info fa fa-edit" @click="update(index)" aria-hidden="true"></i>
            </span>
            <span class="panel-icon column is-1">
            <i class=" has-text-primary fa fa-eye" aria-hidden="true" @click="show(index)"></i>
            </span>
        </a> 
        
        <div class="panel-block">
            <button class="button is-link is-outlined is-fullwidth">
            reset all filters
            </button>
        </div>
        </nav>
        <Add :openmodal="isactive" @closeRequest="close"> </Add>
        <Show :showdetail="showdetails" @closeRequest="close"></Show>
        <Update :update="showupdate" @closeRequest="close"></Update>
    </div>
</template>
<script>
import Add from './Add.vue'
import Show from './Show.vue'
import Update from './Update.vue'
export default {
    components:{
        Add,
        Show,
        Update
    },
    data(){
       return{
           isactive:false,
           lists:{},
           showdetails: '',
           showupdate:'',
           searchquery: '',
           temp: ''
       }
    },
    watch:{
        searchquery(){
            if(this.searchquery.length > 0){
                 this.temp = this.lists.filter((item)=>{
                console.log(item)
               return Object.keys(item).some((key)=>{
                   let string = String(item[key])
                   console.log("string",string);
                })
              return string.toLowerCase().indexOf(this.searchquery.toLowerCase())> -1
            })
        }else{
            this.temp = this.lists
        }
        }
    },
    mounted(){
     axios.get('/getData')
          .then((response)=>{
              this.lists = this.temp = response.data
          })
          .catch((error)=>{
              this.errors = error.response.data.errors
          })
    },
    methods:{
         showmodal:function(){
             this.isactive = 'is-active'
         },
         close(){
             this.isactive = '';
             this.showdetails = '';
              this.showupdate = ''
             console.log("closed");
         },
         show(item){
              console.log(item);
              this.$children[1].list = this.temp[item]
             this.showdetails = 'is-active'
         },
         update(item){
              console.log(item);
              this.$children[2].list = this.temp[item]
             this.showupdate = 'is-active'
         },
         del(item,id){
             console.log(item);
             if(confirm("are you sure")){
                axios.post(`/deletephonebook/${id}`)
                     .then((response)=>{
                         this.lists.splice(item,1)
                    console.log(response)
                })
                    .catch((error)=>{
                    console.log(error)
                 })
             }
         }
        
    }
}
</script>