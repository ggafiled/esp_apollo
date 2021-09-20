export default class Gate {
    constructor(user) {
        this.user = user;
        this.roles_of_admin = ["superadministrator", "administrator"];
    }

    isAuthenticated() {
        return (
            typeof this.user !== "undefined" &&
            typeof this.user !== null &&
            typeof Laravel !== "undefined" &&
            "user" in Laravel
        );
    }

    isAdmin() {
        return (
            "user" in Laravel &&
            this.roles_of_admin.indexOf(Laravel.user.roles[0].name) != -1
        );
    }

    isUser() {
        return (
            "user" in Laravel &&
            this.roles_of_admin.indexOf(Laravel.user.roles[0].name) == -1
        );
    }

    isAdminOrUser() {
        return (
            "user" in Laravel && ["superadministrator", "administrator", "user"].indexOf(
                Laravel.user.roles[0].name
            ) != -1
        );
    }

    iscurrentUser(value) {
        return "user" in Laravel && Laravel.user.id === value ? true : false;
    }

    hasPermissionsNeeded(to) {
        if (typeof to.meta.permissions !== "undefined") {
            return to.meta.permissions
                .map((val, index) => {
                    return (
                        Laravel.permissions.indexOf(val.toLowerCase()) !== -1
                    );
                })
                .every(function(e) {
                    return e === true;
                });
        }

        if (typeof to.meta.roles !== "undefined") {
            return to.meta.roles
                .map((val, index) => {
                    return (
                        Laravel.user.roles[0].name
                        .toLowerCase()
                        .indexOf(val.toLowerCase()) !== -1
                    );
                })
                .some(function(e) {
                    return e === true;
                });
        }

        if (
            typeof to.meta.roles === "undefined" ||
            typeof to.meta.permissions === "undefined"
        ) {
            return true;
        }
    }
}