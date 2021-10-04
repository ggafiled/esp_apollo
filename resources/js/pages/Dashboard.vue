<template>
    <section class="content">
        <div class="container-fluid">
            <div class="row" v-if="currentProviderEditCount == 0">
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
                                                                <a
                                                                    href="!#"
                                                                    @click.prevent="
                                                                        goToProviderPanel(
                                                                            item
                                                                        )
                                                                    "
                                                                >
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
                                                        {{
                                                            item.releases_count ||
                                                                0
                                                        }}
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
            <div class="row" v-else>
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
                                    @click="newModalRelease"
                                >
                                    <i class="fa fa-plus-square"></i>
                                    {{ translate("New Release") }}
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-2">
                            <div class="d-flex flex-column p-2 pb-5">
                                <div class="row mt-2">
                                    <button
                                        type="button"
                                        class="btn btn-md btn-default ml-2"
                                        @click="clearProviderPanel"
                                    >
                                        <i class="bi bi-chevron-left"></i>
                                    </button>
                                    <div
                                        class="d-flex flex-row align-items-center p-0 m-0"
                                    >
                                        <h3
                                            class="flex-order-1 text-uppercase p-0 m-0 p-2 mr-2"
                                        >
                                            {{
                                                currentProviderEdit.provider_name
                                            }}
                                        </h3>
                                        <small class="flex-order-2 text-muted"
                                            >{{
                                                releaseCount || 0
                                            }}
                                            release</small
                                        >
                                    </div>
                                </div>
                                <template v-if="releaseCount > 0">
                                    <div class="d-flex flex-row">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Provider</th>
                                                    <th>File</th>
                                                    <th>File Size</th>
                                                    <th>Created At</th>
                                                    <th>Updated At</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr
                                                    v-for="(item,
                                                    i) in releases"
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
                                                                <h5
                                                                    class="mb-0"
                                                                >
                                                                    {{
                                                                        item.releases_name
                                                                    }}
                                                                </h5>
                                                                <p
                                                                    class="text-muted mb-0"
                                                                >
                                                                    ESP32,
                                                                    ESP8266
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        {{ item.file }}
                                                    </td>
                                                    <td>
                                                        {{ item.file_size }}
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
                                                        <div
                                                            class="dropdown open"
                                                        >
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
                                                                class="dropdown-menu dropdown-menu-left"
                                                                aria-labelledby="triggerId1"
                                                            >
                                                                <div
                                                                    class="dropdown-item cursor"
                                                                    @click="
                                                                        setProviderUseThisRelease(
                                                                            item
                                                                        )
                                                                    "
                                                                >
                                                                    <i
                                                                        class="fa bi bi-megaphone mr-1"
                                                                    ></i>
                                                                    Release
                                                                </div>
                                                                <div
                                                                    class="dropdown-item cursor"
                                                                    @click="
                                                                        editModalRelease(
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
                                                                        deleteItemRelease(
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
                                        class="d-flex flex-column justify-content-center align-content-center align-items-center pt-3 pb-5"
                                    >
                                        <img
                                            id="projectNull"
                                            src="/images/release.png"
                                            draggable="false"
                                        />
                                        <h4
                                            class="text-muted text-wrap p-0 m-0 pb-3 pt-3"
                                        >
                                            Now, You don't have any release.
                                        </h4>
                                        <button
                                            type="button"
                                            class="btn btn-md btn-primary"
                                            @click="newModalRelease"
                                        >
                                            <i class="fa fa-plus-square"></i>
                                            {{ translate("New Release") }}
                                        </button>
                                    </div>
                                </template>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>

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

            <div
                class="modal fade"
                id="addNewRelease"
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
                                {{ translate("Create New Release") }}
                                <span class="text-uppercase">
                                    <i class="text-muted bi bi-dot mr-1"></i>
                                    [{{
                                        currentProviderEdit.provider_name
                                    }}]</span
                                >
                            </h5>
                            <h5 class="modal-title" v-show="editmode">
                                {{ translate("Update's Release") }}
                                <span class="text-uppercase">
                                    <i class="text-muted bi bi-dot mr-1"></i>
                                    [{{
                                        currentProviderEdit.provider_name
                                    }}]</span
                                >
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
                                editmode
                                    ? updateItemRelease()
                                    : createItemRelease()
                            "
                        >
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Release Name</label>
                                    <input
                                        v-model="formRelease.releases_name"
                                        type="text"
                                        name="releases_name"
                                        class="form-control"
                                        placeholder="Release/Tag Name"
                                        :class="{
                                            'is-invalid': formRelease.errors.has(
                                                'releases_name'
                                            )
                                        }"
                                    />
                                    <has-error
                                        :form="formRelease"
                                        field="releases_name"
                                    ></has-error>
                                </div>
                                <div class="form-group">
                                    <label>File</label>
                                    <VueFileAgent
                                        :multiple="false"
                                        :deletable="true"
                                        :accept="'.ino'"
                                        :maxSize="'5MB'"
                                        :helpText="'Choose binary file'"
                                        :errorText="{
                                            type:
                                                'Invalid file type. Only .ino Allowed',
                                            size:
                                                'Files should not exceed 5MB in size'
                                        }"
                                        v-model="formRelease.file_path"
                                    ></VueFileAgent>
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
            currentProviderEdit: [],
            releases: [],
            editmode: false,
            selected: "",
            form: new Form({
                id: "",
                provider_name: ""
            }),
            formRelease: new Form({
                provider_key: "",
                releases_name: "",
                file_path: []
            })
        };
    },
    computed: {
        releaseCount: function() {
            return this.releases.length;
        },
        userProviderCount: function() {
            return this.userProvider.length;
        },
        currentProviderEditCount: function() {
            return this.currentProviderEdit.length;
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
        async loadRelease() {
            this.$Progress.start();
            await axios.get("/release").then(response => {
                this.releases = response.data.data;
                this.formRelease.provider_key =
                    this.currentProviderEdit.provider_key || "";
            });
            await this.loadProvider();
            this.$Progress.finish();
        },
        setProviderUseThisRelease(item){
            //do stuff
        },
        goToProviderPanel(item) {
            this.renameCurrentPath(item.provider_key);
            this.currentProviderEdit = item;
            this.formRelease.provider_key = item.provider_key;
            this.releases = item.releases;
        },
        renameCurrentPath(target) {
            const urlParams = new URLSearchParams();
            urlParams.set("p", target);

            if (history.pushState && target.length) {
                var newurl =
                    window.location.protocol +
                    "//" +
                    window.location.host +
                    window.location.pathname +
                    "?" +
                    urlParams;
                window.history.pushState({ path: newurl }, "", newurl);
            } else {
                var newurl =
                    window.location.protocol +
                    "//" +
                    window.location.host +
                    window.location.pathname;
                window.history.pushState({ path: newurl }, "", newurl);
            }
        },
        async goToProviderPanelWithURL(providerId) {
            if (providerId) {
                await axios.get(`/provider/${providerId}`).then(response => {
                    this.currentProviderEdit = response.data.data;
                    this.releases = response.data.data.releases;
                    this.formRelease.provider_key =
                        response.data.data.provider_key;
                });
            }
        },
        clearProviderPanel() {
            this.renameCurrentPath("");
            this.currentProviderEdit = [];
            this.formRelease.provider_key = "";
        },
        newModal() {
            this.editmode = false;
            this.selected = "";
            this.form.reset();
            $("#addNew").modal("show");
        },
        newModalRelease() {
            this.editmode = false;
            this.selected = "";
            this.formRelease.reset();
            this.formRelease.provider_key =
                this.currentProviderEdit.provider_key || "";
            $("#addNewRelease").modal("show");
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
        updateItemRelease() {
            this.$Progress.start();
            this.formRelease
                .put("/release/" + this.form.id)
                .then(async response => {
                    // success
                    $("#addNewRelease").modal("hide");
                    Toast.fire({
                        icon: "success",
                        title: response.data.message
                    });
                    await this.loadRelease();
                })
                .catch(() => {
                    this.$Progress.fail();
                });
        },
        editModal(item) {
            this.editmode = true;
            this.form.reset();
            $("#addNew").modal("show");
            this.form.fill(item);
        },
        editModalRelease(item) {
            console.log(item);
            this.editmode = true;
            this.formRelease.reset();
            $("#addNewRelease").modal("show");
            this.formRelease.fill(item);
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
        deleteItemRelease(item) {
            Swal.fire({
                title: window.translate(
                    "permission.alert.delete_building_title"
                ),
                text:
                    window.translate("permission.alert.delete_building_text") +
                    ` [${item.releases_name.toUpperCase()}]`,
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
                    this.formRelease
                        .delete("/release/" + item.id)
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
                            await this.loadRelease();
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
        },
        createItemRelease() {
            if (this.selected == null || this.selected == undefined)
                return false;

            this.formRelease
                .post("/release")
                .then(async response => {
                    $("#addNewRelease").modal("hide");

                    Toast.fire({
                        icon: "success",
                        title: response.data.message
                    });

                    await this.loadRelease();
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
        this.goToProviderPanelWithURL(this.$route.query.p);
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
