<div class="w-full">
    {{ $slot }}
</div>

@push('styles')
    <!-- Datatables -->
    <!--<link href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.min.css" rel="stylesheet" />-->
    <!--<link href="https://cdn.datatables.net/buttons/2.0.0/css/buttons.dataTables.min.css" rel="stylesheet" />-->
    <!--<link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css" rel="stylesheet">-->
    <link rel="stylesheet" href="{{ asset('libs/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/css/responsive.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/css/buttons.dataTables.min.css') }}">
    <!-- Selector -->
    <!--<link href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css" rel="stylesheet" />-->
    <link rel="stylesheet" href="{{ asset('libs/css/select.dataTables.min.css') }}">
@endpush


@push('scripts')

    <!-- jQuery -->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
    <script src="{{ asset('libs/js/jquery.min.js') }}" type="text/javascript" ></script>
    <!-- Datatables -->
    <!--<script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>-->
    <!--<script src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>-->
    <!--<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>-->
    <script src="{{ asset('libs/js/jquery.dataTables.min.js') }}"  type="text/javascript" ></script>
    <script src="{{ asset('libs/js/dataTables.buttons.min.js') }}"  type="text/javascript" ></script>
    <script src="{{ asset('libs/js/dataTables.responsive.min.js') }}"  type="text/javascript" ></script>
    <!-- Selector -->
    <!--<script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>-->
    <script src="{{ asset('libs/js/dataTables.select.min.js') }}"  type="text/javascript" ></script>
    <!-- Print -->
    <!--<script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script>-->
    <script src="{{ asset('libs/js/buttons.print.min.js') }}"  type="text/javascript" ></script>
    <!-- Column visibility -->
    <!--<script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.colVis.min.js"></script>-->
    <script src="{{ asset('libs/js/buttons.colVis.min.js') }}"  type="text/javascript" ></script>
    <!-- HTML5 Export Copy Csv Exel -->
    <!--<script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>-->
    <script src="{{ asset('libs/js/buttons.html5.min.js') }}"  type="text/javascript" ></script>
    <!-- Reading Zip -->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>-->
    <script src="{{ asset('libs/js/jszip.min.js') }}"  type="text/javascript" ></script>
    <!-- PDF -->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>-->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>-->
    <!--<script src="{{ asset('libs/js/pdfmake.min.js') }}"  type="text/javascript" ></script>-->
    <!--<script src="{{ asset('libs/js/vfs_fonts.js') }}"  type="text/javascript" ></script>-->

    <script>
        $(function () {
            let selectAllButtonTrans = '{{ __('panel.select_all') }}'
            let selectNoneButtonTrans = '{{ __('panel.deselect_all') }}'
            let copyButtonTrans = '{{ __('panel.datatables.copy') }}'
            let csvButtonTrans = '{{ __('panel.datatables.csv') }}'
            let excelButtonTrans = '{{ __('panel.datatables.excel') }}'
            let pdfButtonTrans = '{{ __('panel.datatables.pdf') }}'
            let printButtonTrans = '{{ __('panel.datatables.print') }}'
            let colvisButtonTrans = '{{ __('panel.datatables.colvis') }}'

            let languages = {
                'en': "{{ asset('libs/languages/en-gb.json') }}",
                'fa': "{{ asset('libs/languages/fa.json') }}"
            };

            $.extend(true, $.fn.dataTable.Buttons.defaults.dom.button, {className: 'inline-block px-3 py-2 rounded-sm text-sm mx-1 select-none cursor-pointer focus:outline-none hover:no-underline'})
            $.extend(true, $.fn.dataTable.defaults, {
                responsive: true,
                language: {
                    url: languages['{{ app()->getLocale() }}']
                },
                columnDefs: [{
                    orderable: false,
                    className: 'select-checkbox',
                    targets: 0
                }, {
                    orderable: false,
                    searchable: false,
                    targets: -1
                }],
                select: {
                    style: 'multi+shift',
                    selector: 'tr:not(.no-select) td:first-child'
                },
                order: [],
                scrollX: true,
                pageLength: 25,
                dom: 'Bfrtilp<"actions">',
                buttons: [
                    {
                        extend: 'selectAll',
                        className: 'bg-indigo-600 text-white hover:bg-indigo-700',
                        text: selectAllButtonTrans,
                        exportOptions: {
                            columns: ':visible'
                        },
                        action: function (e, dt) {
                            e.preventDefault()
                            dt.rows().deselect();
                            dt.rows({search: 'applied'}).select();
                            dt.rows('.no-select').deselect();
                        }
                    },
                    {
                        extend: 'selectNone',
                        className: 'bg-indigo-600 text-white hover:bg-indigo-700 disabled:opacity-50 disabled:pointer-events-none',
                        text: selectNoneButtonTrans,
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'copy',
                        className: 'bg-gray-300 text-black hover:bg-gray-400',
                        text: copyButtonTrans,
                        exportOptions: {
                            columns: [':visible :not(.no-export)']
                        }
                    },
                    {
                        extend: 'csv',
                        className: 'bg-gray-300 text-black hover:bg-gray-400',
                        text: csvButtonTrans,
                        exportOptions: {
                            columns: [':visible :not(.no-export)']
                        }
                    },
                    {
                        extend: 'excel',
                        className: 'bg-gray-300 text-black hover:bg-gray-400',
                        text: excelButtonTrans,
                        exportOptions: {
                            columns: [':visible :not(.no-export)']
                        }
                    },
                    /*{
                        extend: 'pdf',
                        className: 'bg-gray-300 text-black hover:bg-gray-400',
                        text: pdfButtonTrans,
                        exportOptions: {
                            columns: [':visible :not(.no-export)']
                        }
                    },*/
                    {
                        extend: 'print',
                        className: 'bg-gray-300 text-black hover:bg-gray-400',
                        text: printButtonTrans,
                        exportOptions: {
                            columns: [':visible :not(.no-export)']
                        }
                    },
                    {
                        extend: 'colvis',
                        className: 'bg-gray-300 text-black hover:bg-gray-400',
                        text: colvisButtonTrans,
                        exportOptions: {
                            columns: ':visible'
                        }
                    }
                ]
            });
        });
    </script>
@endpush

