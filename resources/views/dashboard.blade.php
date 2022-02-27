<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <x-jet-loading-screen id="loading-screen"></x-jet-loading-screen>

    <div class="grid justify-items-end pt-4 px-6">
        <x-jet-button class="bg-indigo-600 hover:bg-indigo-500 active:bg-indigo-400" onclick="openModalCreateTask()">
            <i class="fa-solid fa-plus mr-2"></i> Create Task
        </x-jet-button>
    </div>

    <div class="py-4 px-6 invisible" id="table-content">
        <div class="w-full">
            <div class="shadow-md overflow-auto border-1 border-gray-200 rounded-lg bg-white">
                <table class="w-full text-sm divide-gray-200" id="dataTable"  style="width: 100%;">
                    <thead>
                        <tr>
                            <th class="px-6 py-2 text-left text-md font-large text-indigo-700 ">No.</th>
                            <th class="px-6 py-2 text-left text-md font-large text-indigo-700 ">Task Name</th>
                            <th class="px-6 py-2 text-left text-md font-large text-indigo-700">Description</th>
                            <th class="px-6 py-2 text-left text-md font-large text-indigo-700">Status</th>
                            <th class="px-6 py-2 text-left text-md font-large text-indigo-700">Proceed</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 table-auto">
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <form id="create-task-form">
        <x-jet-custome-modal id="create-task-modal">
            <x-slot name="title">
                {{ __('Create Task') }}
            </x-slot>
            <x-slot name="content">
                <div>
                    <x-jet-label for="taskName" value="{{ __('Task Name') }}" />
                    <x-jet-input id="taskName" type="text" class="mt-1 block w-full" autofocus autocomplete="off"
                        autocorrect="off" autocapitalize="off" spellcheck="false" />
                    <span class="text-red-500 mt-2" id="taskNameError"></span>
                </div>
                <div class="mt-3">
                    <x-jet-label for="description" value="{{ __('Description') }}" />
                    <x-jet-textarea id="description" type="text" class="mt-1 block w-full h-[70px]" autofocus
                        autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" />
                    <span class="text-red-500 mt-2" id="descriptionError"></span>

                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-button onclick="createTask(event)">
                    {{ __('Create') }}
                </x-jet-button>
                <x-jet-secondary-button id="close-create-task" onclick="closeModalCreateTask()">
                    {{ __('Close') }}
                </x-jet-secondary-button>
            </x-slot>
        </x-jet-custome-modal>
    </form>
    <div id="rslt">
    </div>
</x-app-layout>


<script>
    $(document).ready(function() {
        var table = getDataTableTask();
        $('#dataTable tbody').on( 'click', '.confirm-delete', function (e) {
            var data = $('#dataTable').DataTable().row( $(this).parents('tr') ).data();
            deleteTaskById(e,data)
        });
    });  
</script>

<script>
    function getDataTableTask(){
       return $('#dataTable').dataTable({
            "initComplete": function(settings, json) {
                $('#table-content').removeClass('invisible');
                $('#loading-screen').addClass('invisible');
            },
            ajax: `{{ url('/task/') }}`,
            columns: [
                { data: "No.",
                    render: function(data,type, rowData, meta){
                        return (meta.row + 1);
                    }
                },
                { data: "name" },
                { data: "description" ,
                    render: function(data,type, rowData, meta){
                        return (rowData.description ?? '-');
                    }
                },
                { data: "state",
                    render: function(data,type, rowData, meta){
                        return  '<span class="' + (rowData.state == 'Archived' ? 'bg-green-600' : 'bg-red-600')+  ' text-white text-md inline-flex items-center justify-center px-3 py-1 leading-none rounded-full">'+ rowData.state +'</span>';
                    }
                },
                { data: "Proceed",
                    render: function(data,type, rowData, meta){
                        let button1 = '<button type="button" class="bg-indigo-600 hover:bg-indigo-500 active:bg-indigo-400 inline-flex items-center px-4 py-2 bg-indigo-600 border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 active:bg-indigo-400 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"><i class="fa-solid fa-list-check"></i></button>';
                        let button2 = '<button type="button" data-name="'+rowData.name+'" data-id="'+rowData.id+'" class="bg-red-600 hover:bg-red-400 active:bg-red-400 confirm-delete inline-flex items-center px-4 py-2 bg-indigo-600 border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 active:bg-indigo-400 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"> <i class="fa-solid fa-trash-can"></i></button>';
                        return button1+button2;
                    }
                }
            ],
        });
    }

    function createTask(e) {
        e.preventDefault();
        let formData = {
            name: $("#taskName").val(),
            description: $("#description").val(),
        };

        $.ajax({
            url: "/task/add",
            type: "POST",
            cache: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: formData,
            success: function(response) {
                swal(
                    "Sccess!",
                    "Your task has been created!",
                    "success"
                )
                closeModalCreateTask();
                $('#dataTable').DataTable().ajax.reload(null, false);
            },
            error: function(response) {
                $('#taskNameError').text(response.responseJSON.errors.name);
                $('#descriptionError').text(response.responseJSON.errors.description);
            },
        });
    };

    function deleteTaskById(e,data) {
        var name = data.name;
        var id = data.id;
        e.preventDefault();
        swal({
                title: 'Are you sure?',
                text: `You won't be able to revert task ${name} !`,
                icon: 'warning',
                buttons: true,
                dangerMode: true,

            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "POST",
                        url: `{{ url('/task/delete/${id}') }}`,
                        cache: false,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            swal(
                                "Sccess!",
                                "Your task has been deleted!",
                                "success"
                            )
                            $('#dataTable').DataTable().ajax.reload(null, false);
                        },
                        error: function(response) {
                            swal(
                                "Internal Error",
                                "Oops, your task was not deleted!.",
                                "error"
                            )
                        }
                    });
                }
            });
    };

    // open create task modal
    function openModalCreateTask() {
        $('#modal-box').removeClass('hidden');
    }

    // close create task modal
    function closeModalCreateTask() {
        $('#create-task-form').trigger('reset');
        $('#modal-box').addClass('hidden');
    }
</script>
