<template>
<nav class="navbar text-primary bg-info text-center">
    <ul class="list-unstyled">
        <kbd>{{ variable }}</kbd>
      <div>
        <p class="text-right text-warning">{{sas}}</p>
      </div>
        <button class="btn btn-primary" @click="test">Ok</button>
    </ul>
</nav>
</template>

<script>
export default {
    data() {
        return {
            variable: 'letter',
            show:true,
            sas:''
        }
    },
    methods:{
      test(){
          this.sas='Ey'
      }
    }
}
</script>
