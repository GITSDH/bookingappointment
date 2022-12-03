<x-app-layout>
    <x-slot name="submenu">
        <!-- Navigation Links -->
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-nav-link :href="route('specialities.index')" :active="request()->routeIs('specialities.index')">
                {{ __('All Specialitys') }}
            </x-nav-link>
            <x-nav-link :href="route('specialities.create')" :active="request()->routeIs('specialities.create')">
                {{ __('Add New Speciality') }}
            </x-nav-link>
        </div>
    </x-slot>

    <div class="p-6">
        <table id="locationTable" class="display stripe" style="width:100%">
            <thead>
                <tr>
                    <th>Sl</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>

        </table>
    </div>


    <x-slot name="script">
        <script>
            var datatablelist = $('#locationTable').DataTable({
                processing: true,
                serverSide: true,
                    ajax: "{!! route('specialities.index') !!}",
                    columns: [
                        {"render": function(data, type, full, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                            }
                        },
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: null,
                            render: function(data) {
                                return `<div class="flex"><a href="${BASE_URL}specialities/${data.id}/edit" class="bg-green-600 rounded-md text-white py-2 px-2 mx-1 hover:bg-green-700" ><span class="iconify" data-icon="dashicons:edit"></span></a>
                                <button type="button"  class="bg-red-600 rounded-md text-white py-2 px-2 mx-1 hover:bg-red-700" onclick="locationDelete(${data.id});"><span class="iconify" data-icon="bi:trash-fill"></span></button></div>`;
                            }
                        }
                    ]
                });


            function locationDelete(locationID) {
                Swal.fire({
                    title: "Delete ?",
                    text: "Are you sure to delete this Speciality ?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: "Delete",
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            method: 'DELETE',
                            url: BASE_URL +'specialities/'+locationID,
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
