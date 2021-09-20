export default {
    methods: {
        getTitle() {
            const { title } = this.$options;
            if (title) {
                return typeof title === "function" ? title.call(this) : title;
            }
        }
    },
    mounted() {
        const title = this.getTitle();

        if (title) {
            document.title = title.concat(
                ` ${process.env.MIX_APP_NAME || "First Mile ERP System"}`
            );
        }
    }
};
