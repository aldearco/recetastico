<template>
  <div class="likes-block">
    <div class="text-center">
      <span
        class="d-block mx-auto like-btn"
        @click="likeReceta"
        :class="{ 'like-active': isActive }"
      ></span>
    </div>
    <p class="d-block">Le gusta a {{ cantidadLikes }} usuarios</p>
  </div>
</template>

<script>
export default {
  props: ["recetaId", "like", "likes"],
  data: function(){
      return {
          isActive: this.like,
          totalLikes: this.likes
      }
  },
  methods: {
    likeReceta() {
      axios
        .post("/receta/" + this.recetaId)
        .then((respuesta) => {
          if(respuesta.data.attached.length > 0){
              this.$data.totalLikes++;
          } else {
              this.$data.totalLikes--;
          }

          this.isActive = !this.isActive;
        })
        .catch((error) => {
          if(error.response.status === 401){
              window.location = '/register'
          }
        });
    },
  },
  computed: {
    cantidadLikes: function () {
      return this.totalLikes;
    },
  },
};
</script>