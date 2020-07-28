<template>
  <div>
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div
      class="modal fade"
      :id="'deleteModal-'+customerToEdit.id"
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

              <p v-if="customerToEdit.name">Do you want to delete {{customerToEdit.name}}?</p>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button
              type="submit"
              class="btn btn-danger"
              @click="deletecustomer"
              data-dismiss="modal"
            >Delete</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["customerToEdit"],
mounted (){
console.log("customerToEdit",this.customerToEdit)

},
  methods: {
    deletecustomer() {
        axios.post("api/customer/delete/" + this.customerToEdit.id)
       .then((response) =>  window.location.href = "/")
        .catch((error) => console.log(error));
    },
  },
};
</script>
