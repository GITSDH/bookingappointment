<x-app-layout>
    <div class="p-6">
        <table id="userTable" class="display stripe" style="width:100%">
            <thead>
                <tr>
                    <th>Sl</th>
                    <th>Subscription Number</th>
                    <th>Owner Name</th>
                    <th>Owner Email</th>
                    <th>Action</th>
                </tr>
            </thead>

        </table>
    </div>


    <x-slot name="script">
        <script>
            var datatablelist = $('#userTable').DataTable({
                processing: true,
                serverSide: true,
                    ajax: "{!! route('subscriptions.index') !!}",
                    columns: [
                        {"render": function(data, type, full, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                            }
                        },
                        {
                            data: 'sub_number',
                            name: 'sub_number'
                        },
                        {
                            data: 'owner.name',
                            name: 'name'
                        },
                        {
                            data: 'owner.email',
                            name: 'email'
                        },
                        {
                            data: null,
                            render: function(data) {
                                return `<div class="flex"><a href="${BASE_URL}subscriptions/${data.id}/edit" class="bg-green-600 rounded-md text-white py-2 px-2 mx-1 hover:bg-green-700" ><span class="iconify" data-icon="dashicons:edit"></span></a>
                                <button type="button"  class="bg-red-600 rounded-md text-white py-2 px-2 mx-1 hover:bg-red-700" onclick="userDelete(${data.id});"><span class="iconify" data-icon="bi:trash-fill"></span></button></div>`;
                            }
                        }
                    ]
                });


            function userDelete(userID) {
                Swal.fire({
                    title: "Delete ?",
                    text: "Are you sure to delete this User ?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: "Delete",
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            method: 'DELETE',
                            url: BASE_URL +'users/'+userID,
                            success: function(response) {
                                if (response.status == "success") {
                                    Swal.fire('Success!', response.message, 'success');
                                    datatablelist.draw();
                                } else if (response.status == "error") {
                                    Swal.fire('This item is not deletable!', response.message, 'error');
                                    datatablelist.draw();
                                }
                            }
                        });
                    }
                });
            }

        </script>
    </x-slot>
</x-app-layout>
