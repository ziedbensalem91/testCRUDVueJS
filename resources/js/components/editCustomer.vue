<template>
  <div>
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div
      class="modal fade"
      id="editModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <label for="name">Name:</label>
              <input type="text" name="name" id="name" v-model="customerToEdit.name" required />
              <label for="type">Email:</label>
              <input type="text" name="email" id="email" v-model="customerToEdit.email" required />
              <label for="address">Address:</label>
              <input type="text" name="address" id="address" v-model="customerToEdit.address" required />
              <label for="phone">phone:</label>
              <input
                type="text"
                name="phone"
                id="phone"
                v-model="customerToEdit.phone"
                required
              />
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" @click="updatecustomer" data-dismiss="modal">Save changes</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["customerToEdit"],
  methods: {
    updatecustomer() {
      axios
        .post("api/customer/Edit/" + this.customerToEdit.id, {
          name: this.customerToEdit.name,
           email: this.customerToEdit.email,
            address: this.customerToEdit.address,
             phone: this.customerToEdit.phone,
        })
        .then((response) =>  window.location.href = "/")
        .catch((error) => console.log(error));
    },
  },
};
</script>
