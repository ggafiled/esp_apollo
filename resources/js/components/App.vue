<template>
    <div>
        <vue-progress-bar></vue-progress-bar>
        <router-view></router-view>
    </div>
</template>

<script>
export default {
    methods: {
        listenForChanges() {
            window.Echo.channel("system").listen(
                "DatabaseBackUpNotification",
                post => {
                    console.log("--- Incoming Notify ---");
                    console.log(post);
                    if (!("Notification" in window)) {
                        alert("Web Notification is not supported");
                        return;
                    }
                    this.notify(post);
                }
            );
        },
        notify(post) {
            Notification.requestPermission().then(permission => {
                console.log(
                    `User notify permission is ${Notification.permission}`
                );
                if (Notification.permission !== "granted") {
                    Notification.requestPermission();
                } else {
                    console.log("Else clause Notification");
                    let notification = new Notification(
                        "New database backup alert!",
                        {
                            body: `${post.message}, process result ${
                                post.status
                            } at ${moment(post.created_at)}`, // content for the alert
                            icon:
                                "https://sv1.picz.in.th/images/2021/02/11/o138qN.png" // optional image url
                        }
                    );
                    // link to page on clicking the notification
                    notification.onclick = () => {
                        window.open(window.location.href);
                    };
                }
            });
        },
        listenForChangesPusher() {
            window.Pusher.subscribe("system").bind(
                "DatabaseBackUpNotification",
                data => {
                    console.log("--- Incoming Notify ---");
                    console.log(data);
                    this.notify(data);
                }
            );
        },
        requestPermission() {
            if (Notification.permission !== "granted") {
                return Notification.requestPermission();
            }
        }
    },
    created() {},
    mounted() {
        this.requestPermission();
        if(this.$gate.isAdmin()){
            this.listenForChangesPusher();
        }
    }
};
</script>

<style>
.vue-tags-input .ti-tag {
    position: relative;
    background: #b0bec5 !important;
    color: #37474f !important;
}
.DTFC_LeftHeadWrapper th {
    background-color: white;
}
.DTFC_RightHeadWrapper th {
    background-color: white;
}
.cursor-pointer {
    cursor: pointer;
}
.modal.modal-fullscreen .modal-dialog {
    width: 100vw;
    height: 100vh;
    margin: 0;
    padding: 0;
    max-width: none;
    overflow: scroll;
}

.modal.modal-fullscreen .modal-content {
    height: auto;
    height: 100;
    border-radius: 0;
    border: none;
}

.modal.modal-fullscreen .modal-body {
    overflow-y: auto;
}

.select2 {
    padding: 0;
    min-width: 100px !important;
    width: 100% !important;
}
.select2-selection {
    display: flex !important;
    min-height: 30px !important;
    height: 100% !important;
    vertical-align: middle !important;
}
.shadow {
    box-shadow: 0 0.5rem 1rem rgb(0 0 0 / 10%) !important;
}
.card-title {
    font-size: 1.3rem !important;
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
}
.dt-checkboxes-cell input[type="checkbox"] {
    cursor: pointer !important;
}
div.ag-theme-alpine div.ag-row {
    font-size: 16px !important;
}
</style>
