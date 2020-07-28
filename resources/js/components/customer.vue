<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">

        <div class="card">


          <addCustomer></addCustomer>

          <div class="table-responsive">
            <table class="table table-bordered table-striped table-vcenter table-hover">
              <thead>
                <tr>
                  <th>name</th>
                  <th>email</th>
                  <th>address</th>
                  <th>phone</th>
                  <th>actions</th>
                </tr>
              </thead>
              <tbody>
                <td v-if="!customers" colspan="5" class="text-center">No item in inventory</td>
                <tr v-for="customer in customers" :key="customer.id">
                  <td>{{customer.name}}</td>
                  <td>{{customer.email}}</td>
                  <td>{{customer.address}}</td>
                  <td>{{customer.phone}}</td>
                  <td>
                    <button
                      type="button"
                      class="btn btn-secondary"
                      data-toggle="modal"
                      data-target="#editModal"
                      @click="getCustomer(customer.id)"
                    >edit</button>

                    <button
                      type="button"
                      class="btn btn-danger"
                      data-toggle="modal"
                      :data-target="'#deleteModal-'+customer.id"
                      @click="getCustomer(customer.id)"
                    >delete</button>
                    <editCustomer
                      v-bind:customerToEdit="customerToEdit"
                      @customerUpdated="refresh"
                    ></editCustomer>

                    <deleteCustomer
                      :customerToEdit="customer"
                      @customerDeleted="refresh"
                    ></deleteCustomer>
                  </td>
                </tr>
              </tbody>
            </table>
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
      customers: {},
      customerToEdit: "",
      q: "",
    };
  },
  created() {

  },
  mounted() {
    console.log("Component mounted.");
    this.getCustomers();
  },

  methods: {
    // Our method to GET results from a Laravel endpoint
    getCustomers(){
     axios
      .get("api/customers",)
      .then(response => this.customers = response.data)
      .catch((error) => console.log(error));
},

    getResults(page = 1) {
      axios.get("api/customer?page=" + page).then(response =>
        this.customers = response.data
      );
    },
    getCustomer(id) {
      axios
        .get("api/customer/Edit/" + id)
        .then(response => this.customerToEdit = response.data)
        .catch((error) => console.log(console.error()));
    },
    refresh(customers) {
      this.customers = customers;
    },
    search() {
      if (this.q.length > 3) {
        axios
          .get("api/customer/" + this.q)
          .then((response) => (this.customers = response.data))
          .catch((error) => console.log(error));
      } else {
        axios
          .get("api/customer")
          .then((response) => (this.customers = response.data))
          .catch((error) => console.log(error));
      }
    },
  },
};
</script>
