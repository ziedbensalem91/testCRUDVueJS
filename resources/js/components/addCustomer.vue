<template>
  <div>
    <!-- Button trigger modal -->
    <button
      type="button"
      class="btn btn-primary"
      data-toggle="modal"
      data-target="#exampleModal"
    >Add</button>

    <!-- Modal -->
    <div
      class="modal fade"
      id="exampleModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add customer</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <label for="name">Name:</label>
              <input type="text" name="name" id="name" v-model="name" required >
              <label for="type">Type:</label>
              <input type="text" name="type" id="type" v-model="email" required >
              <label for="address">address:</label>
              <input type="address" name="address" id="address" v-model="address" required >
              <label for="phone">phone:</label>
              <input type="text" name="phone" id="phone" v-model="phone" required >
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" @click="storecustomer">Create</button>
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
      name: "",
      email: "",
      address: "",
      phone: "",
    };
  },
  mounted() {
    console.log("Component mounted.");
  },
  methods: {
    storecustomer() {
        console.log(this.name)
        console.log(this.email)
        console.log(this.address)
        console.log(this.phone)
      axios
        .post("api/customerStore", {
          name: this.name,
          email: this.email,
          address: this.address,
          phone: this.phone,
        })
        .then((response) =>  window.location.href = "/")
        .catch((error) => console.log(error));
    },
  },
};
</script>
