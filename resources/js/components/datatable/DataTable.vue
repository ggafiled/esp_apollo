<template>
  <table class="table table-striped table-bordered" ref="items" id="items">
    <thead>
      <tr>
        <th>NO</th>
        <th v-for="(col, i) in options.columns" :key="i">{{ col.title }}</th>
        <th>Action</th>
      </tr>
    </thead>
  </table>
</template>

<script>
export default {
  props: {
    search: String,
    options: Object,
  },
  data() {
    return {
      table: null,
    };
  },
  methods: {
    reloadItems() {
      this.table.ajax.reload();
    },
    generateTable() {
      console.log(this.options.ajax);
      var vm = this;
      this.table = $(this.$refs.items).DataTable({
        dom: this.options.dom ? this.options.dom : "Blfrtip",
        ajax: this.options.ajax,
        responsive: true,
        processing: true,
        autoWidth: true,
        pageLength: this.options.pageLength ? this.options.pageLength : 15,
        lengthMenu: [
          [10, 15, 25, 50, -1],
          [10, 15, 25, 50, "All"],
        ],
        select: true,
        language: {
          lengthMenu: translate("datatables.lengthMenu"),
          zeroRecords: translate("datatables.zeroRecords"),
          info: translate("datatables.info"),
          infoEmpty: translate("datatables.infoEmpty"),
          infoFiltered: translate("datatables.infoFiltered"),
          loadingRecords: translate("datatables.loadingRecords"),
          processing: translate("datatables.processing"),
          search: translate("datatables.search"),
          paginate: {
            first: translate("datatables.paginate.first"),
            last: translate("datatables.paginate.last"),
            next: translate("datatables.paginate.next"),
            previous: translate("datatables.paginate.previous"),
          },
          aria: {
            sortAscending: translate("datatables.aria.sortAscending"),
            sortDescending: translate("datatables.aria.sortDescending"),
          },
        },
        buttons: [
          "colvis",
          {
            extend: "copy",
            text: "<i class='bi bi-clipboard mr-1'></i>Copy",
            title: null,
            header: null,
            exportOptions: {
              columns: "th:not(.notexport)",
            },
          },
          {
            extend: "excelHtml5",
            title: null,
            autoFilter: true,
            sheetName: "Building",
            text: "<i class='bi bi-file-earmark-excel mr-1'></i>Excel",
            exportOptions: {
              columns: "th:not(.notexport)",
            },
          },
          {
            extend: "print",
            title: null,
            text: "<i class='bi bi-printer mr-1'></i>Print",
          },
          {
            text:
              "<i class='bi bi-list-check mr-1'></i>" +
              window.translate(
                "datatables.alert.display_selected_record_title"
              ) +
              "",
            action: function (e, dt, node, config) {
              var rowsel = dt
                .rows({ selected: true })
                .data()
                .map(function (item) {
                  return item.id;
                })
                .join(",");
              if (!rowsel.length) {
                return Swal.fire({
                  title: window.translate(
                    "datatables.alert.display_selected_record_empty_title"
                  ),
                  text: window.translate(
                    "datatables.alert.display_selected_record_empty_text"
                  ),
                  timer: 2000,
                  showCancelButton: false,
                  showConfirmButton: false,
                });
              }
              $.fn.dataTable.ext.search.pop();
              $.fn.dataTable.ext.search.push(function (
                settings,
                data,
                dataIndex
              ) {
                return $(vm.table.row(dataIndex).node()).hasClass("selected")
                  ? true
                  : false;
              });

              vm.table.draw();
            },
          },
          ...this.options.button || [],
          {
            text: "<i class='bi bi-arrow-repeat mr-1'></i>Refresh",
            action: function (e, dt, node, config) {
              console.info("button: Clear");
              $.fn.dataTable.ext.search.pop();
              dt.search("").draw();
              dt.columns().search("").draw();
              dt.rows().deselect();
              dt.ajax.reload();
            },
          },
        ],
        columns: [
          {
            data: null,
            defaultContent: "",
            className: "dt-body-center notexport",
          },
          ...this.options.columns || [],
          {
            data: null,
            className: "dt-body-center notexport",
            render: function (data, type, row, meta) {
              return "<a class='edit-items btn btn-success btn-sm p-1 m-0' href='#'><i class='bi bi-pen'></i> </a> <a class='delete-items btn btn-danger btn-sm p-1 m-0' href='#'> <i class='bi bi-trash'></i> </a>";
            },
          },
        ],
        columnDefs: [
          {
            targets: 0,
            searchable: false,
            orderable: false,
            className: "dt-body-center",
            checkboxes: {
              selectRow: true,
            },
          },
          ...this.options.columnDefs || [],
        ],
        select: { selector: "td:not(:last-child)", style: "os" },
        order: [[1, "desc"]],
      });

      $("tbody", this.$refs.items).on("click", ".edit-items", function (e) {
        e.preventDefault();
        var tr = $(this).closest("tr");
        var row = vm.table.row(tr);
        vm.$emit("edit", row.data());
      });

      $("tbody", this.$refs.items).on("click", ".delete-items", function (e) {
        e.preventDefault();
        var tr = $(this).closest("tr");
        var row = vm.table.row(tr);
        vm.$emit("delete", row.data());
      });
    },
  },
  mounted() {
    this.generateTable();
  },
};
</script>

<style lang="scss" scoped>
</style>
