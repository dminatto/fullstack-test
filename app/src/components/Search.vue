<template>
  <div>
    <v-container>
      <v-card class="mx-auto search-music">
        <v-card-text>
          <div>
            <img class="img" src="./../assets/happy_music.png" />
          </div>
          <div>
            <h2>Music Weather</h2>
          </div>
          <p>Match music with <s>your</s> weather</p>
          <p class="">
            <!--<v-text-field
              label="Digite o nome da sua cidade*"
              v-model="name"
              required
            ></v-text-field> -->
          </p>
          <p class="">
            <v-autocomplete
              clearable
              solo
              v-model="model"
              :items="entries"
              :loading="isLoading"
              :search-input.sync="search"
              return-object
              label="Public APIs"
            ></v-autocomplete>
          </p>
        </v-card-text>
        <v-card-actions>
          <v-btn text color="deep-purple accent-4"> Search </v-btn>
        </v-card-actions>
      </v-card>
    </v-container>
  </div>
</template>
<script>
import { mapMutations, mapState, mapActions } from "vuex";

export default {
  name: "Search",
  data: () => ({
    model: null,
    search: null,
    isLoading: false,
  }),
  created() {},
  methods: {
    ...mapMutations("Weather", ["setDados", "getDados", "setName", "getName"]),
    ...mapActions("Weather", ["getWeather"]),
  },
  computed: {
    ...mapState("Weather", {
      entries: (state) =>
        state.entries.map((entry) => {
          const Description =
            entry.name.length > 60
              ? entry.name.slice(0, 60) + "..."
              : entry.name;

          return Description + " - " + entry.main.temp;
        }),
    }),
  },
  watch: {
    search(val) {
      this.setName(val);
      if (val.length < 1) return;
      if (this.isLoading) return;
      this.isLoading = true;
      this.getWeather();
      this.isLoading = false;
    },
  },
};
</script>

<style scoped>
.search-music {
  display: inline-flex;
  flex-direction: column;
  align-content: center;
  align-items: center;
  max-width: 50%;
}

.img {
  max-width: 50%;
}
</style>
