<template>
	

<div class="modal" :class='openmodal'>
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Modal title</p>
      <button class="delete" aria-label="close" @click='close'></button>
    </header>
    <section class="modal-card-body">
     <div class="field">
  <label class="label">Name</label>
  <div class="control">
    <input class="input" :class="{'is-danger':errors.name}" type="text" placeholder="Name" v-model='list.name'>
<small v-if="errors.name" class="has-text-danger">{{ errors.name[0] }}</small>

  </div>
</div>

<div class="field">
  <label class="label">Phone</label>
  <div class="control">
    <input class="input" :class="{'is-danger':errors.phone}" type="number" placeholder="Phone" v-model='list.phone'>
    <small v-if="errors.phone" class="has-text-danger">{{ errors.phone[0] }}</small>
  </div>
</div>

<div class="field">
  <label class="label">Email</label>
  <div class="control">
    <input class="input" :class="{'is-danger':errors.email}" type="text" placeholder="Email" v-model='list.email'>
    <small v-if="errors.email" class="has-text-danger">{{ errors.email[0] }}</small>
  </div>
</div>
    </section>
    <footer class="modal-card-foot">
      <button class="button is-success" @click='save'>Save changes</button>
      <button class="button" @click='close'>Cancel</button>
    </footer>
  </div>
</div>



</template>

<script>
	
export default {

props:['openmodal'],

data() {  return{ list:{ name:'', phone:'', email:''    }, 
                  errors:{},  }   },

methods:{ close() { this.$emit('closeRequest')  },

save() {  

	axios.post('laravelphone/phonebook', this.$data.list)
  .then((response) => {

    this.close() 
    this.$parent.lists.push(response.data)
    this.$parent.lists.sort(function(a,b){
            if (a.name > b.name) {
              return 1;
            }else if(a.name < b.name){
              return -1;
            }
          })
          this.list = ""
     } )
  .catch( (error) => this.errors = error.response.data);    

}


  }


}



</script>