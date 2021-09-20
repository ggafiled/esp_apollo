<template>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <i class="bi bi-layers mr-1"></i
                >{{ translate("permission.header") }}
              </h3>

              <div class="card-tools">
                <button
                  type="button"
                  class="btn btn-sm btn-primary"
                  @click="newModal"
                >
                  <i class="fa fa-plus-square"></i>
                  {{ translate("permission.addnew") }}
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-2">
              <data-tables
                ref="items"
                :options="options"
                @edit="editModal"
                @delete="deleteRole"
              ></data-tables>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>

      <!-- Modal -->
      <div
        class="modal fade"
        id="addNew"
        tabindex="-1"
        role="dialog"
        aria-labelledby="addNew"
        aria-hidden="true"
      >
        <div class="modal-dialog" role="dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" v-show="!editmode">
                {{ translate("permission.create.header") }}
              </h5>
              <h5 class="modal-title" v-show="editmode">
                {{ translate("permission.update.header") }}
              </h5>
              <button
                type="button"
                class="close"
                data-dismiss="modal"
                aria-label="Close"
              >
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <!-- <form @submit.prevent="createRole"> -->

            <form @submit.prevent="editmode ? updateRole() : createRole()">
              <div class="modal-body">
                <div class="form-group">
                  <label>Name</label>
                  <input
                    v-model="form.name"
                    type="text"
                    name="name"
                    class="form-control"
                    :class="{
                      'is-invalid': form.errors.has('name'),
                    }"
                  />
                  <has-error :form="form" field="name"></has-error>
                </div>
                <div class="form-group">
                  <label>Display Name</label>
                  <input
                    v-model="form.display_name"
                    type="text"
                    name="display_name"
                    class="form-control"
                    :class="{
                      'is-invalid': form.errors.has('display_name'),
                    }"
                  />
                  <has-error :form="form" field="display_name"></has-error>
                </div>

                <div class="form-group">
                  <label>Description</label>
                  <input
                    v-model="form.description"
                    type="text"
                    name="description"
                    class="form-control"
                    :class="{
                      'is-invalid': form.errors.has('description'),
                    }"
                    autocomplete="false"
                  />
                  <has-error :form="form" field="description"></has-error>
                </div>
                <div class="form-group">
                  <label>Permissions</label>
                  <vue-tags-input
                    v-model="permission"
                    :tags="form.permissions"
                    :autocomplete-items="filteredItems"
                    @tags-changed="(newTags) => (form.permissions = newTags)"
                  />
                  <has-error :form="form" field="permissions"></has-error>
                </div>
              </div>
              <div class="modal-footer">
                <button
                  type="button"
                  class="btn btn-secondary"
                  data-dismiss="modal"
                >
                  {{ translate("permission.actions.close") }}
                </button>
                <button v-show="editmode" type="submit" class="btn btn-success">
                  {{ translate("permission.actions.update") }}
                </button>
                <button
                  v-show="!editmode"
                  type="submit"
                  class="btn btn-primary"
                >
                  {{ translate("permission.actions.create") }}
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import VueTagsInput from "@johmun/vue-tags-input";

export default {
  title: "Permission -",
  components: {
    VueTagsInput,
  },
  data() {
    return {
      editmode: false,
      roles: {},
      selected: "",
      form: new Form({
        id: "",
        name: "",
        display_name: "",
        description: "",
        permissions: [],
      }),
      permission: "",
      autocompleteItems: [],
      options: {
        ajax: "/api/role",
        button: [
        ],
        columns: [
          {
            data: "name",
            title: "Name",
            className: "text-capitalize",
          },
          {
            data: "display_name",
            title: "Display Name",
          },
          {
            data: "description",
            title: "Description",
          },
          {
            data: "created_at",
            title: "Created At",
            render: function (data, type, row, meta) {
              return moment(data.created_at).format("MMMM Do YYYY");
            },
          },
        ],
      },
    };
  },
  methods: {
    reloadtable(){
        this.$Progress.start();
        this.$refs.items.reloadItems();
        this.$Progress.finish();
    },
    newModal() {
      this.editmode = false;
      this.selected = "";
      this.form.reset();
      $("#addNew").modal("show");
    },
    deleteRole(item) {
      Swal.fire({
        title: window.translate("permission.alert.delete_building_title"),
        text:
          window.translate("permission.alert.delete_building_text") +
          ` [${item.name.replace(/\b\w/g, (l) => l.toUpperCase())}]`,
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        cancelButtonText: window.translate(
          "permission.alert.delete_building_cancel_button_text"
        ),
        confirmButtonText: window.translate(
          "permission.alert.delete_building_confirm_button_text"
        ),
      }).then((result) => {
        // Send request to the server
        if (result.value) {
          this.form
            .delete("/role/" + item.id)
            .then(() => {
              Swal.fire(
                window.translate("permission.alert.comfirm_delete_title"),
                window.translate("permission.alert.confirm_delete_message"),
                "success"
              );
              // Fire.$emit('AfterCreate');
              this.reloadtable();
              this.loadRoles();
              this.loadPermissions();
            })
            .catch((data) => {
              Swal.fire("Failed!", data.message, "warning");
            });
        }
      });
    },
    updateRole() {
      this.$Progress.start();
      // console.log('Editing data');
      this.form
        .put("/role/" + this.form.id)
        .then((response) => {
          // success
          $("#addNew").modal("hide");
          Toast.fire({
            icon: "success",
            title: response.data.message,
          });
          this.reloadtable();
          //  Fire.$emit('AfterCreate');

          this.loadRoles();
          this.loadPermissions();
        })
        .catch(() => {
          this.$Progress.fail();
        });
    },
    editModal(role) {
      this.editmode = true;
      this.form.reset();
      $("#addNew").modal("show");
      this.form.fill(role);
    },
    loadRoles() {
      this.$Progress.start();

      if (this.$gate.isAdmin()) {
        axios.get("/role").then(({ data }) => (this.roles = data.data));
      }

      this.$Progress.finish();
    },
    loadPermissions() {
      this.$Progress.start();

      if (this.$gate.isAdmin()) {
        axios
          .get("/permission/list")
          .then((response) => {
            this.autocompleteItems = response.data.data.map((a) => {
              return { text: a.name, id: a.id };
            });
          })
          .catch(() => console.warn("Oh. Something went wrong"));
      }

      this.$Progress.finish();
    },
    createRole() {
      if (this.selected == null || this.selected == undefined) return false;
      this.form
        .post("/role")
        .then((response) => {
          $("#addNew").modal("hide");

          Toast.fire({
            icon: "success",
            title: response.data.message,
          });

          this.reloadtable();
          this.form.reset();
          this.loadRoles();
          this.loadPermissions();
        })
        .catch(() => {
          Toast.fire({
            icon: "error",
            title: "Some error occured! Please try again",
          });
        });
    },
  },
  computed: {
    filteredItems() {
      return this.autocompleteItems.filter((i) => {
        return (
          i.text.toLowerCase().indexOf(this.permission.toLowerCase()) !== -1
        );
      });
    },
  },
  created() {
    this.$Progress.start();
    LoadingWait.fire();
    this.loadRoles();
    this.loadPermissions();
    this.$Progress.finish();
  },
  mounted() {
    setTimeout(() => {
      LoadingWait.close();
    }, 2000);
  },
};
</script>
