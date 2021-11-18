<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <div class="float-left">Cart</div>
            <div class="float-right">
              <form @submit="clean">
                <button class="btn btn-default cart_btn">Leave Empty</button>
              </form>
              <form @submit="payAll">
                <button class="btn btn-default cart_btn">Pay All</button>
              </form>
            </div>
          </div>

          <div class="card-body">
            <table>
              <tr v-for="item in items" v-bind:key="item.id">
                <td>
                  <ul>
                    <li><b>Amount:</b> {{ item.amount }}</li>
                    <li><b>Value:</b> {{ item.value }}</li>
                    <li><b>Price:</b> {{ item.price }}</li>
                    <li><b>Color:</b> {{ item.color }}</li>
                    <li><b>Size:</b> {{ item.size }}</li>
                    <li><b>Brand:</b> {{ item.brand }}</li>
                  </ul>
                </td>
                <td>
                  <form @submit="del">
                    <button class="btn btn-danger cart_btn" v-bind:id="item.id">
                      Del
                    </button>
                  </form>
                  <form @submit="pay">
                    <button
                      class="btn btn-primary cart_btn"
                      v-bind:id="item.id"
                    >
                      Pay
                    </button>
                  </form>
                </td>
              </tr>
            </table>
            <message-component :message="message"></message-component>
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
      items: [],
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
        () => (window.location.href = "http://localhost:8000/carts"),
        2000
      ),
    pay: function (e) {
      e.preventDefault();
      axios
        .get(
          "http://localhost:8000/api/carts/" + e.submitter.id + "/pay",
          this.headers_conf
        )
        .then((response) => (this.message = response.data.message))
        .then(this.refresh_timer);
    },
    del: function (e) {
      e.preventDefault();
      axios
        .get(
          "http://localhost:8000/api/carts/" + e.submitter.id + "/delete",
          this.headers_conf
        )
        .then((response) => (this.message = response.data.message))
        .then(this.refresh_timer);
    },
    clean: function (e) {
      e.preventDefault();
      axios
        .get("http://localhost:8000/api/carts/clean", this.headers_conf)
        .then((response) => (this.message = response.data.message))
        .then(this.refresh_timer);
    },
    payAll: function (e) {
      e.preventDefault();
      axios
        .get("http://localhost:8000/api/carts/payall", this.headers_conf)
        .then((response) => (this.message = response.data.message))
        .then(this.refresh_timer);
    },
  },
  mounted() {
    axios
      .get("http://localhost:8000/api/carts", this.headers_conf)
      .then((response) => (this.items = response.data.data));
  },
};
</script>
