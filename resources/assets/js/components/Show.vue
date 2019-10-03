<template>
    <div class="modal" :class="showdetail">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Modal title</p>
      <button class="delete" @click="close"  aria-label="close"></button>
    </header>
    <section class="modal-card-body">
        <li class="panel-block">
            <label class="column is-2">Name</label>{{list.name}}
        </li>
         <li class="panel-block">
            <label class="column is-2">Phone Number</label>{{list.phone}}
        </li>
         <li class="panel-block">
            <label class="column is-2">Email</label>{{list.email}}
        </li>
     
    </section>
    <footer class="modal-card-foot">
      <button class="button" @click="close">Cancel</button>
    </footer>
  </div>
</div>
</template>
<script>
export default {
    props:['showdetail'],
    data(){
        return{
           list:''
        }
    },
    methods:{
        close(){
            this.$emit('closeRequest')
        },
    }
}
</script>