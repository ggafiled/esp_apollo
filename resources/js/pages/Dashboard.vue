<template>
    <section class="content">
        <div class="container-fluid">
            <div class="row" v-if="$gate.isAdmin()">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="bi bi-kanban mr-2"></i
                                >{{ translate("Provider Management") }}
                            </h3>
                            <div class="card-tools">
                                <button
                                    type="button"
                                    class="btn btn-md btn-primary"
                                    @click="newModal"
                                >
                                    <i class="fa fa-plus-square"></i>
                                    {{ translate("New Provider") }}
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-2">
                            <template v-if="userProviderCount > 0">
                                <div class="d-flex flex-row">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Provider</th>
                                                <th>Status</th>
                                                <th>Release/Tag</th>
                                                <th>Created At</th>
                                                <th>Updated At</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr
                                                v-for="(item,
                                                i) in userProvider"
                                                :key="i"
                                            >
                                                <td>
                                                    <div class="user-info">
                                                        <div
                                                            class="user-info__img"
                                                        >
                                                            <img
                                                                src="images/project_placeholder.jpg"
                                                                alt="User Img"
                                                            />
                                                        </div>
                                                        <div
                                                            class="user-info__basic text-uppercase"
                                                        >
                                                            <h5 class="mb-0">
                                                                <a href="!#">
                                                                    {{
                                                                        item.provider_name
                                                                    }}
                                                                </a>
                                                            </h5>
                                                            <p
                                                                class="text-muted mb-0"
                                                            >
                                                                ESP32, ESP8266
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span
                                                        class="btn btn-success"
                                                        >IN USE</span
                                                    >
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">
                                                        3
                                                    </h6>
                                                    <small>version</small>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">
                                                        {{
                                                            moment(
                                                                item.created_at
                                                            ).format(
                                                                "MMMM Do YYYY"
                                                            )
                                                        }}
                                                    </h6>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">
                                                        {{
                                                            moment(
                                                                item.updated_at
                                                            ).format(
                                                                "MMMM Do YYYY"
                                                            )
                                                        }}
                                                    </h6>
                                                </td>
                                                <td>
                                                    <div class="dropdown open">
                                                        <a
                                                            href="#!"
                                                            class="px-2"
                                                            id="triggerId1"
                                                            data-toggle="dropdown"
                                                            aria-haspopup="true"
                                                            aria-expanded="false"
                                                        >
                                                            <i
                                                                class="fa fa-ellipsis-v"
                                                            ></i>
                                                        </a>
                                                        <div
                                                            class="dropdown-menu"
                                                            aria-labelledby="triggerId1"
                                                        >
                                                            <div
                                                                class="dropdown-item cursor"
                                                                @click="
                                                                    editModal(
                                                                        item
                                                                    )
                                                                "
                                                            >
                                                                <i
                                                                    class="fa bi bi-pen mr-1"
                                                                ></i>
                                                                Edit
                                                            </div>
                                                            <div
                                                                class="dropdown-item text-danger cursor"
                                                                @click="
                                                                    deleteItem(
                                                                        item
                                                                    )
                                                                "
                                                            >
                                                                <i
                                                                    class="fa fa-trash mr-1"
                                                                ></i>
                                                                Delete
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </template>
                            <template v-else>
                                <div
                                    class="d-flex flex-column justify-content-center align-content-center align-items-center pb-5"
                                >
                                    <img
                                        id="projectNull"
                                        src="/images/project.jpg"
                                        draggable="false"
                                    />
                                    <h4
                                        class="text-muted text-wrap p-0 m-0 pb-3"
                                    >
                                        Now, You don't have any provider.
                                    </h4>
                                    <button
                                        type="button"
                                        class="btn btn-md btn-primary"
                                        @click="newModal"
                                    >
                                        <i class="fa fa-plus-square"></i>
                                        {{ translate("New Provider") }}
                                    </button>
                                </div>
                            </template>
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
                data-backdrop="static"
                data-keyboard="false"
            >
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" v-show="!editmode">
                                {{ translate("Create New Provider") }}
                            </h5>
                            <h5 class="modal-title" v-show="editmode">
                                {{ translate("Update's Provider") }}
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

                        <form
                            @submit.prevent="
                                editmode ? updateItem() : createItem()
                            "
                        >
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input
                                        v-model="form.provider_name"
                                        type="text"
                                        name="provider_name"
                                        class="form-control"
                                        :class="{
                                            'is-invalid': form.errors.has(
                                                'provider_name'
                                            )
                                        }"
                                    />
                                    <has-error
                                        :form="form"
                                        field="provider_name"
                                    ></has-error>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button
                                    type="button"
                                    class="btn btn-secondary"
                                    data-dismiss="modal"
                                >
                                    {{ translate("user.actions.close") }}
                                </button>
                                <button
                                    v-show="editmode"
                                    type="submit"
                                    class="btn btn-success"
                                >
                                    {{ translate("user.actions.update") }}
                                </button>
                                <button
                                    v-show="!editmode"
                                    type="submit"
                                    class="btn btn-primary"
                                >
                                    {{ translate("user.actions.create") }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--/. container-fluid -->
    </section>
</template>

<script>
import anime from "animejs/lib/anime.es.js";
import pattern from "patternomaly";
export default {
    title: "Dashboard -",
    components: {},
    data() {
        return {
            userProvider: [],
            editmode: false,
            selected: "",
            form: new Form({
                provider_name: ""
            })
        };
    },
    computed: {
        userProviderCount: function() {
            return this.userProvider.length;
        }
    },
    methods: {
        async loadProvider() {
            this.$Progress.start();
            await axios
                .get("/provider")
                .then(response => (this.userProvider = response.data.data));
            this.$Progress.finish();
        },
        newModal() {
            this.editmode = false;
            this.selected = "";
            this.form.reset();
            $("#addNew").modal("show");
        },
        updateItem() {
            this.$Progress.start();
            this.form
                .put("/provider/" + this.form.id)
                .then(async response => {
                    // success
                    $("#addNew").modal("hide");
                    Toast.fire({
                        icon: "success",
                        title: response.data.message
                    });
                    await this.loadProvider();
                })
                .catch(() => {
                    this.$Progress.fail();
                });
        },
        editModal(item) {
            console.log(item);
            this.editmode = true;
            this.form.reset();
            $("#addNew").modal("show");
            this.form.fill(item);
        },
        deleteItem(item) {
            Swal.fire({
                title: window.translate(
                    "permission.alert.delete_building_title"
                ),
                text:
                    window.translate("permission.alert.delete_building_text") +
                    ` [${item.provider_name.toUpperCase()}]`,
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                cancelButtonText: window.translate(
                    "permission.alert.delete_building_cancel_button_text"
                ),
                confirmButtonText: window.translate(
                    "permission.alert.delete_building_confirm_button_text"
                )
            }).then(result => {
                // Send request to the server
                if (result.value) {
                    this.form
                        .delete("/provider/" + item.id)
                        .then(async () => {
                            Swal.fire(
                                window.translate(
                                    "permission.alert.comfirm_delete_title"
                                ),
                                window.translate(
                                    "permission.alert.confirm_delete_message"
                                ),
                                "success"
                            );
                            await this.loadProvider();
                        })
                        .catch(data => {
                            Swal.fire("Failed!", data.message, "warning");
                        });
                }
            });
        },
        createItem() {
            if (this.selected == null || this.selected == undefined)
                return false;
            this.form
                .post("/provider")
                .then(async response => {
                    $("#addNew").modal("hide");

                    Toast.fire({
                        icon: "success",
                        title: response.data.message
                    });

                    await this.loadProvider();
                })
                .catch(() => {
                    Toast.fire({
                        icon: "error",
                        title: "Some error occured! Please try again"
                    });
                });
        }
    },
    async created() {
        LoadingWait.fire();
        await this.loadProvider();
    },
    mounted() {
        setTimeout(() => {
            LoadingWait.close();
        }, 3000);
    }
};
</script>
<style lang="scss">
@import url("https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap");
$primary: #007bff;
$success: #28a745;
$warning: #ffc107;
$danger: #dc3545;

.main-content {
    padding-top: 100px;
    padding-bottom: 100px;
    font-family: "Roboto", sans-serif;
}

#projectNull {
    filter: grayscale(1);
    opacity: 0.6;
    max-width: 680px;
    max-height: 450px;
    width: auto;
    height: auto;
}

.table {
    border-spacing: 0 15px;
    border-collapse: separate;
    thead,
    tbody {
        tr {
            th,
            td {
                vertical-align: middle;
                border: none;
                &:nth-last-child(1) {
                    text-align: center;
                }
            }
        }
    }
    tbody {
        tr {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            td {
                background: #fff;
                &:nth-child(1) {
                    border-radius: 5px 0 0 5px;
                }
                &:nth-last-child(1) {
                    border-radius: 0 5px 5px 0;
                }
            }
        }
    }
}

.user-info {
    display: flex;
    align-items: center;
    &__img {
        img {
            margin-right: 15px;
            height: 55px;
            width: 55px;
            border-radius: 45px;
            border: 3px solid #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
    }
}
</style>
