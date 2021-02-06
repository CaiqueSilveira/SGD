<!-- Bootstrap WYSIHTML5 -->
<!-- DataTables buttons scripts -->
<script src="../../bootstrap/js/plugins/plugins_datatable/buttons.min.js"></script>
<script src="../../bootstrap/js/plugins/plugins_datatable/buttons.print.min.js"></script>
<script src="../../bootstrap/js/plugins/plugins_datatable/dataTables.buttons.min.js"></script>
<script src="../../bootstrap/js/plugins/plugins_datatable/buttons.colVis.min.js"></script>
<script src="../../bootstrap/js/plugins/plugins_datatable/jszip.min.js"></script>
<script src="../../bootstrap/js/plugins/plugins_datatable/pdfmake.min.js"></script>
<script src="../../bootstrap/js/plugins/plugins_datatable/vfs_fonts.js"></script>
<link href="../../bootstrap/js/plugins/plugins_datatable/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />

    <script>
         var dataTable = $('#lista_usuario').DataTable({ 

                dom: "<'row'<'col-sm-3'l><'col-sm-6 text-center'B><'col-sm-3'f>r>"+
                 "t"+"<'row'<'col-xs-6'i><'col-xs-6'p>>",

                buttons: [
                {
                    extend: 'copy',
                    text: 'Copiar <i class="fa fa-files-o"></i>',
                    className: 'btn-default btn-sm'
                },
                {
                    extend: 'excel',
                    text: 'Gerar Excel <i class="fa fa-file-excel-o"></i>',
                    className: 'btn-default btn-sm'
                },
                {
                    extend: 'pdf',
                    text: 'Gerar PDF <i class="fa fa-file-pdf-o"></i>',
                    title: 'Informações do Aluno ',
                    className: 'btn-default btn-sm',
                    orientation: 'landscape'
                },
                {
                    extend: 'print',
                    customize: function (win) {
                        $(win.document.body).css('font-size', '7pt');
                        $(win.document.body).find('table').addClass('compact').css('font-size', 'inherit');
                    },
                    text: 'Imprimir <i class="fa fa-print"></i>',
                    className: 'btn-default btn-sm',
                    title: 'Informações do Usuário',
                    orientation: 'landscape',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'colvis',
                    text: 'Ocultar colunas <i class="fa fa-compress"></i>',
                    className: 'btn-default btn-sm'
                }
            ],


            "bLengthChange": true,
            'paging': true,
            'searching': true,
            'info': true,
            'autoWidth': false,

            "columnDefs": [
                { className: "nsd", "targets": [  0, 1, 2, 4, 5, 6]}
                ],
                    
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "table/data_usuario.php",
                    "type": "POST",
            // ajax: "ajax/datatable",
             }

            });

    </script>

