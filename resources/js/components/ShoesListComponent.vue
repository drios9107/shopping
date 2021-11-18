<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <div class="float-left">Shoes</div>
            <div class="float-right" v-if="mounted">
              <a href="/carts">Cart</a>
            </div>
          </div>

          <div class="card-body">
            <form @submit="add">
              <input type="hidden" name="_token" :value="csrf" />
              <table class="table table-striped table-bordered table-hover">
                <tbody>
                  <tr>
                    <th>Color</th>
                    <th>Size</th>
                    <th>Price</th>
                    <th>Brand</th>
                    <th></th>
                  </tr>
                </tbody>
                <tr v-for="shoe in shoes" v-bind:key="shoe.id">
                  <td>{{ shoe.color }}</td>
                  <td>{{ shoe.size }}</td>
                  <td>{{ shoe.price }}</td>
                  <td>{{ shoe.brand }}</td>
                  <td class="center">
                    <button class="btn btn-default" v-bind:id="shoe.id">
                      <img src="/img/i.png" class="cart_size" />
                    </button>
                  </td>
                </tr>
              </table>
            </form>
            <div class="alert alert-success" v-if="message">
              {{ message }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
      shoes: [],
      mounted: false,
      message: "",
      headers_conf: {
        headers: {
          Authorization: "Bearer " + App.apiToken,
        },
      },
    };
  },
  methods: {
    refresh_timer: () =>
      setTimeout(
        () => (window.location.href = "http://localhost:8000/shoes"),
        2000
      ),
    add: function (e) {
      e.preventDefault();
      axios
        .get(
          "http://localhost:8000/api/carts/" + e.submitter.id + "/add",
          this.headers_conf
        )
        .then((response) => (this.message = response.data.message))
        .then(this.refresh_timer);
    },
  },
  mounted() {
    axios
      .get("http://localhost:8000/api/carts/is_mounted", this.headers_conf)
      .then((response) => (this.mounted = response.data.message));
    axios
      .get("http://localhost:8000/api/shoes", this.headers_conf)
      .then((response) => (this.shoes = response.data.data));
  },
};
</script>
