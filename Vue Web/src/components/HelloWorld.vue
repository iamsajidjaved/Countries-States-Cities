<template>
  <div class="hello row text-left">
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <div class="form-group">
        <label for="country">Select Country:</label>
        <select
          class="form-control"
          id="country"
          v-model="country_name"
          v-on:change="getStates(country_name)"
        >
          <option
            v-for="country in countries"
            v-bind:value="country"
            :key="country"
          >
            {{ country }}
          </option>
        </select>
      </div>
      <div class="form-group">
        <label for="state">Select State:</label>
        <select
          class="form-control"
          id="state"
          v-model="state_name"
          v-on:change="getCities(state_name)"
        >
          <option v-for="state in states" v-bind:value="state" :key="state">
            {{ state }}
          </option>
        </select>
      </div>
      <div class="form-group">
        <label for="city">Select City:</label>
        <select class="form-control" id="city" v-model="city_name">
          <option v-for="city in cities" v-bind:value="city" :key="city">
            {{ city }}
          </option>
        </select>
      </div>
    </div>
    <div class="col-md-4"></div>
  </div>
</template>

<script>
export default {
  name: "HelloWorld",
  data: () => ({
    countries: "",
    states: "",
    cities: "",
    country_name: "Afghanistan",
    state_name: "",
    city_name: "",
  }),
  methods: {
    getCountries: function () {
      const baseURI = "http://localhost/country_state_city/get_countries.php";
      this.$http
        .get(baseURI)
        .then((result) => {
          this.countries = result.data;
        })
        .catch((error) => {
          console.log("error", error);
        });
    },
    getStates: function (country_name) {
      const baseURI =
        "http://localhost/country_state_city/get_states.php?country=" +
        country_name;
      this.$http
        .get(baseURI)
        .then((result) => {
          this.states = result.data;
        })
        .catch((error) => {
          console.log("error", error);
        });
    },
    getCities: function (state_name) {
      const baseURI =
        "http://localhost/country_state_city/get_cities.php?state=" +
        state_name;
      this.$http
        .get(baseURI)
        .then((result) => {
          this.cities = result.data;
        })
        .catch((error) => {
          console.log("error", error);
        });
    },
  },
  mounted() {
    this.getCountries();
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
</style>
