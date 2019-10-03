<template>
    <div class="modal" :class="update">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Modal title</p>
      <button class="delete"  @click="close" aria-label="close"></button>
    </header>
    <section class="modal-card-body">
     <div class="field">
        <label class="label">Name</label>
        <div class="control">
            <input class="input" :class="{'is-danger':errors.name}" type="text" placeholder="Text input" v-model="list.name">
        </div>
        <small v-if="errors.name" class="has-text-danger">{{errors.name[0]}}</small>
        </div>

        <div class="field">
        <label class="label">Phone Number</label>
        <div class="control has-icons-left has-icons-right">
            <input class="input is-success" :class="{'is-danger':errors.phone}" type="number" placeholder="phone number" value="bulma" v-model="list.phone">
            <span class="icon is-small is-left">
            <i class="fa fa-user"></i>
            </span>
            <span class="icon is-small is-right">
            <i class="fa fa-check"></i>
            </span>
        </div>
         <small v-if="errors.phone" class="has-text-danger">{{errors.phone[0]}}</small>
        </div>

        <div class="field">
        <label class="label">Email</label>
        <div class="control has-icons-left has-icons-right">
            <input class="input is-danger" :class="{'is-danger':errors.email}" type="email" placeholder="Email" value="hello@" v-model="list.email">
            <span class="icon is-small is-left">
            <i class="fa fa-envelope"></i>
            </span>
            <span class="icon is-small is-right">
            <i class="fa fa-exclamation-triangle"></i>
            </span>
        </div>
          <small v-if="errors.email" class="has-text-danger">{{errors.email[0]}}</small>
        </div>

    </section>
    <footer class="modal-card-foot">
      <button class="button is-success" @click="save">Save changes</button>
      <button class="button" @click="close">Cancel</button>
    </footer>
  </div>
</div>
</template>
<script>
export default {
    props:['update'],
    data(){
        return{
            list:{
                name: '',
                phone:'',
                email:''
            },
        
            errors:{}
        }
    },
    methods:{
        close(){
            this.$emit('closeRequest')
        },
        save(){
            axios.patch(`/phonebook/${this.list.id}`,this.list)
                 .then((response) => this.close())
              
                 .catch((error)=> this.errors= error.response.data.errors)
                 
        }
    }
}
</script>